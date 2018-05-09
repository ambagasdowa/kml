<?php

/**
 * PHPExcel_Writer_HTML
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_HTML
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
class PHPExcel_Writer_HTML extends PHPExcel_Writer_Abstract implements PHPExcel_Writer_IWriter
{
    /**
     * PHPExcel object
     *
     * @var PHPExcel
     */
    protected $phpExcel;

    /**
     * Sheet index to write
     *
     * @var int
     */
    private $sheetIndex = 0;

    /**
     * Images root
     *
     * @var string
     */
    private $imagesRoot = '.';

    /**
     * embed images, or link to images
     *
     * @var boolean
     */
    private $embedImages = false;

    /**
     * Use inline CSS?
     *
     * @var boolean
     */
    private $useInlineCss = false;

    /**
     * Array of CSS styles
     *
     * @var array
     */
    private $cssStyles;

    /**
     * Array of column widths in points
     *
     * @var array
     */
    private $columnWidths;

    /**
     * Default font
     *
     * @var PHPExcel_Style_Font
     */
    private $defaultFont;

    /**
     * Flag whether spans have been calculated
     *
     * @var boolean
     */
    private $spansAreCalculated = false;

    /**
     * Excel cells that should not be written as HTML cells
     *
     * @var array
     */
    private $isSpannedCell = array();

    /**
     * Excel cells that are upper-left corner in a cell merge
     *
     * @var array
     */
    private $isBaseCell = array();

    /**
     * Excel rows that should not be written as HTML rows
     *
     * @var array
     */
    private $isSpannedRow = array();

    /**
     * Is the current writer creating PDF?
     *
     * @var boolean
     */
    protected $isPdf = false;

    /**
     * Generate the Navigation block
     *
     * @var boolean
     */
    private $generateSheetNavigationBlock = true;

    /**
     * Create a new PHPExcel_Writer_HTML
     *
     * @param    PHPExcel    $phpExcel    PHPExcel object
     */
    public function __construct(PHPExcel $phpExcel)
    {
        $this->phpExcel = $phpExcel;
        $this->defaultFont = $this->phpExcel->getDefaultStyle()->getFont();
    }

    /**
     * Save PHPExcel to file
     *
     * @param    string        $pFilename
     * @throws    PHPExcel_Writer_Exception
     */
    public function save($pFilename = null)
    {
        // garbage collect
        $this->phpExcel->garbageCollect();

        $saveDebugLog = PHPExcel_Calculation::getInstance($this->phpExcel)->getDebugLog()->getWriteDebugLog();
        PHPExcel_Calculation::getInstance($this->phpExcel)->getDebugLog()->setWriteDebugLog(false);
        $saveArrayReturnType = PHPExcel_Calculation::getArrayReturnType();
        PHPExcel_Calculation::setArrayReturnType(PHPExcel_Calculation::RETURN_ARRAY_AS_VALUE);

        // Build CSS
        $this->buildCSS(!$this->useInlineCss);

        // Open file
        $fileHandle = fopen($pFilename, 'wb+');
        if ($fileHandle === false) {
            throw new PHPExcel_Writer_Exception("Could not open file $pFilename for writing.");
        }

        // Write headers
        fwrite($fileHandle, $this->generateHTMLHeader(!$this->useInlineCss));

        // Write navigation (tabs)
        if ((!$this->isPdf) && ($this->generateSheetNavigationBlock)) {
            fwrite($fileHandle, $this->generateNavigation());
        }

        // Write data
        fwrite($fileHandle, $this->generateSheetData());

        // Write footer
        fwrite($fileHandle, $this->generateHTMLFooter());

        // Close file
        fclose($fileHandle);

        PHPExcel_Calculation::setArrayReturnType($saveArrayReturnType);
        PHPExcel_Calculation::getInstance($this->phpExcel)->getDebugLog()->setWriteDebugLog($saveDebugLog);
    }

    /**
     * Map VAlign
     *
     * @param    string        $vAlign        Vertical alignment
     * @return string
     */
    private function mapVAlign($vAlign)
    {
        switch ($vAlign) {
            case PHPExcel_Style_Alignment::VERTICAL_BOTTOM:
                return 'bottom';
            case PHPExcel_Style_Alignment::VERTICAL_TOP:
                return 'top';
            case PHPExcel_Style_Alignment::VERTICAL_CENTER:
            case PHPExcel_Style_Alignment::VERTICAL_JUSTIFY:
                return 'middle';
            default:
                return 'baseline';
        }
    }

    /**
     * Map HAlign
     *
     * @param    string        $hAlign        Horizontal alignment
     * @return string|false
     */
    private function mapHAlign($hAlign)
    {
        switch ($hAlign) {
            case PHPExcel_Style_Alignment::HORIZONTAL_GENERAL:
                return false;
            case PHPExcel_Style_Alignment::HORIZONTAL_LEFT:
                return 'left';
            case PHPExcel_Style_Alignment::HORIZONTAL_RIGHT:
                return 'right';
            case PHPExcel_Style_Alignment::HORIZONTAL_CENTER:
            case PHPExcel_Style_Alignment::HORIZONTAL_CENTER_CONTINUOUS:
                return 'center';
            case PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY:
                return 'justify';
            default:
                return false;
        }
    }

    /**
     * Map border style
     *
     * @param    int        $borderStyle        Sheet index
     * @return    string
     */
    private function mapBorderStyle($borderStyle)
    {
        switch ($borderStyle) {
            case PHPExcel_Style_Border::BORDER_NONE:
                return 'none';
            case PHPExcel_Style_Border::BORDER_DASHDOT:
                return '1px dashed';
            case PHPExcel_Style_Border::BORDER_DASHDOTDOT:
                return '1px dotted';
            case PHPExcel_Style_Border::BORDER_DASHED:
                return '1px dashed';
            case PHPExcel_Style_Border::BORDER_DOTTED:
                return '1px dotted';
            case PHPExcel_Style_Border::BORDER_DOUBLE:
                return '3px double';
            case PHPExcel_Style_Border::BORDER_HAIR:
                return '1px solid';
            case PHPExcel_Style_Border::BORDER_MEDIUM:
                return '2px solid';
            case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOT:
                return '2px dashed';
            case PHPExcel_Style_Border::BORDER_MEDIUMDASHDOTDOT:
                return '2px dotted';
            case PHPExcel_Style_Border::BORDER_MEDIUMDASHED:
                return '2px dashed';
            case PHPExcel_Style_Border::BORDER_SLANTDASHDOT:
                return '2px dashed';
            case PHPExcel_Style_Border::BORDER_THICK:
                return '3px solid';
            case PHPExcel_Style_Border::BORDER_THIN:
                return '1px solid';
            default:
                // map others to thin
                return '1px solid';
        }
    }

    /**
     * Get sheet index
     *
     * @return int
     */
    public function getSheetIndex()
    {
        return $this->sheetIndex;
    }

    /**
     * Set sheet index
     *
     * @param    int        $pValue        Sheet index
     * @return PHPExcel_Writer_HTML
     */
    public function setSheetIndex($pValue = 0)
    {
        $this->sheetIndex = $pValue;
        return $this;
    }

    /**
     * Get sheet index
     *
     * @return boolean
     */
    public function getGenerateSheetNavigationBlock()
    {
        return $this->generateSheetNavigationBlock;
    }

    /**
     * Set sheet index
     *
     * @param    boolean        $pValue        Flag indicating whether the sheet navigation block should be generated or not
     * @return PHPExcel_Writer_HTML
     */
    public function setGenerateSheetNavigationBlock($pValue = true)
    {
        $this->generateSheetNavigationBlock = (bool) $pValue;
        return $this;
    }

    /**
     * Write all sheets (resets sheetIndex to NULL)
     */
    public function writeAllSheets()
    {
        $this->sheetIndex = null;
        return $this;
    }

    /**
     * Generate HTML header
     *
     * @param    boolean        $pIncludeStyles        Include styles?
     * @return    string
     * @throws PHPExcel_Writer_Exception
     */
    public function generateHTMLHeader($pIncludeStyles = false)
    {
        // PHPExcel object known?
        if (is_null($this->phpExcel)) {
            throw new PHPExcel_Writer_Exception('Internal PHPExcel object not set to an instance of an object.');
        }

        // Construct HTML
        $properties = $this->phpExcel->getProperties();
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">' . PHP_EOL;
        $html .= '<!-- Generated by PHPExcel - http://www.phpexcel.net -->' . PHP_EOL;
        $html .= '<html>' . PHP_EOL;
        $html .= '  <head>' . PHP_EOL;
        $html .= '      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . PHP_EOL;
        if ($properties->getTitle() > '') {
            $html .= '      <title>' . htmlspecialchars($properties->getTitle()) . '</title>' . PHP_EOL;
        }
        if ($properties->getCreator() > '') {
            $html .= '      <meta name="author" content="' . htmlspecialchars($properties->getCreator()) . '" />' . PHP_EOL;
        }
        if ($properties->getTitle() > '') {
            $html .= '      <meta name="title" content="' . htmlspecialchars($properties->getTitle()) . '" />' . PHP_EOL;
        }
        if ($properties->getDescription() > '') {
            $html .= '      <meta name="description" content="' . htmlspecialchars($properties->getDescription()) . '" />' . PHP_EOL;
        }
        if ($properties->getSubject() > '') {
            $html .= '      <meta name="subject" content="' . htmlspecialchars($properties->getSubject()) . '" />' . PHP_EOL;
        }
        if ($properties->getKeywords() > '') {
            $html .= '      <meta name="keywords" content="' . htmlspecialchars($properties->getKeywords()) . '" />' . PHP_EOL;
        }
        if ($properties->getCategory() > '') {
            $html .= '      <meta name="category" content="' . htmlspecialchars($properties->getCategory()) . '" />' . PHP_EOL;
        }
        if ($properties->getCompany() > '') {
            $html .= '      <meta name="company" content="' . htmlspecialchars($properties->getCompany()) . '" />' . PHP_EOL;
        }
        if ($properties->getManager() > '') {
            $html .= '      <meta name="manager" content="' . htmlspecialchars($properties->getManager()) . '" />' . PHP_EOL;
        }

        if ($pIncludeStyles) {
            $html .= $this->generateStyles(true);
        }

        $html .= '  </head>' . PHP_EOL;
        $html .= '' . PHP_EOL;
        $html .= '  <body>' . PHP_EOL;

        return $html;
    }

    /**
     * Generate sheet data
     *
     * @return    string
     * @throws PHPExcel_Writer_Exception
     */
    public function generateSheetData()
    {
        // PHPExcel object known?
        if (is_null($this->phpExcel)) {
            throw new PHPExcel_Writer_Exception('Internal PHPExcel object not set to an instance of an object.');
        }

        // Ensure that Spans have been calculated?
        if (!$this->spansAreCalculated) {
            $this->calculateSpans();
        }

        // Fetch sheets
        $sheets = array();
        if (is_null($this->sheetIndex)) {
            $sheets = $this->phpExcel->getAllSheets();
        } else {
            $sheets[] = $this->phpExcel->getSheet($this->sheetIndex);
        }

        // Construct HTML
        $html = '';

        // Loop all sheets
        $sheetId = 0;
        foreach ($sheets as $sheet) {
            // Write table header
            $html .= $this->generateTableHeader($sheet);

            // Get worksheet dimension
            $dimension = explode(':', $sheet->calculateWorksheetDimension());
            $dimension[0] = PHPExcel_Cell::coordinateFromString($dimension[0]);
            $dimension[0][0] = PHPExcel_Cell::columnIndexFromString($dimension[0][0]) - 1;
            $dimension[1] = PHPExcel_Cell::coordinateFromString($dimension[1]);
            $dimension[1][0] = PHPExcel_Cell::columnIndexFromString($dimension[1][0]) - 1;

            // row min,max
            $rowMin = $dimension[0][1];
            $rowMax = $dimension[1][1];

            // calculate start of <tbody>, <thead>
            $tbodyStart = $rowMin;
            $theadStart = $theadEnd   = 0; // default: no <thead>    no </thead>
            if ($sheet->getPageSetup()->isRowsToRepeatAtTopSet()) {
                $rowsToRepeatAtTop = $sheet->getPageSetup()->getRowsToRepeatAtTop();

                // we can only support repeating rows that start at top row
                if ($rowsToRepeatAtTop[0] == 1) {
                    $theadStart = $rowsToRepeatAtTop[0];
                    $theadEnd   = $rowsToRepeatAtTop[1];
                    $tbodyStart = $rowsToRepeatAtTop[1] + 1;
                }
            }

            // Loop through cells
            $row = $rowMin-1;
            while ($row++ < $rowMax) {
                // <thead> ?
                if ($row == $theadStart) {
                    $html .= '        <thead>' . PHP_EOL;
                    $cellType = 'th';
                }

                // <tbody> ?
                if ($row == $tbodyStart) {
                    $html .= '        <tbody>' . PHP_EOL;
                    $cellType = 'td';
                }

                // Write row if there are HTML table cells in it
                if (!isset($this->isSpannedRow[$sheet->getParent()->getIndex($sheet)][$row])) {
                    // Start a new rowData
                    $rowData = array();
                    // Loop through columns
                    $column = $dimension[0][0] - 1;
                    while ($column++ < $dimension[1][0]) {
                        // Cell exists?
                        if ($sheet->cellExistsByColumnAndRow($column, $row)) {
                            $rowData[$column] = PHPExcel_Cell::stringFromColumnIndex($column) . $row;
                        } else {
                            $rowData[$column] = '';
                        }
                    }
                    $html .= $this->generateRow($sheet, $rowData, $row - 1, $cellType);
                }

                // </thead> ?
                if ($row == $theadEnd) {
                    $html .= '        </thead>' . PHP_EOL;
                }
            }
            $html .= $this->extendRowsForChartsAndImages($sheet, $row);

            // Close table body.
            $html .= '        </tbody>' . PHP_EOL;

            // Write table footer
            $html .= $this->generateTableFooter();

            // Writing PDF?
            if ($this->isPdf) {
                if (is_null($this->sheetIndex) && $sheetId + 1 < $this->phpExcel->getSheetCount()) {
                    $html .= '<div style="page-break-before:always" />';
                }
            }

            // Next sheet
            ++$sheetId;
        }

        return $html;
    }

    /**
     * Generate sheet tabs
     *
     * @return    string
     * @throws PHPExcel_Writer_Exception
     */
    public function generateNavigation()
    {
        // PHPExcel object known?
        if (is_null($this->phpExcel)) {
            throw new PHPExcel_Writer_Exception('Internal PHPExcel object not set to an instance of an object.');
        }

        // Fetch sheets
        $sheets = array();
        if (is_null($this->sheetIndex)) {
            $sheets = $this->phpExcel->getAllSheets();
        } else {
            $sheets[] = $this->phpExcel->getSheet($this->sheetIndex);
        }

        // Construct HTML
        $html = '';

        // Only if there are more than 1 sheets
        if (count($sheets) > 1) {
            // Loop all sheets
            $sheetId = 0;

            $html .= '<ul class="navigation">' . PHP_EOL;

            foreach ($sheets as $sheet) {
                $html .= '  <li class="sheet' . $sheetId . '"><a href="#sheet' . $sheetId . '">' . $sheet->getTitle() . '</a></li>' . PHP_EOL;
                ++$sheetId;
            }

            $html .= '</ul>' . PHP_EOL;
        }

        return $html;
    }

    private function extendRowsForChartsAndImages(PHPExcel_Worksheet $pSheet, $row)
    {
        $rowMax = $row;
        $colMax = 'A';
        if ($this->includeCharts) {
            foreach ($pSheet->getChartCollection() as $chart) {
                if ($chart instanceof PHPExcel_Chart) {
                    $chartCoordinates = $chart->getTopLeftPosition();
                    $chartTL = PHPExcel_Cell::coordinateFromString($chartCoordinates['cell']);
                    $chartCol = PHPExcel_Cell::columnIndexFromString($chartTL[0]);
                    if ($chartTL[1] > $rowMax) {
                        $rowMax = $chartTL[1];
                        if ($chartCol > PHPExcel_Cell::columnIndexFromString($colMax)) {
                            $colMax = $chartTL[0];
                        }
                    }
                }
            }
        }

        foreach ($pSheet->getDrawingCollection() as $drawing) {
            if ($drawing instanceof PHPExcel_Worksheet_Drawing) {
                $imageTL = PHPExcel_Cell::coordinateFromString($drawing->getCoordinates());
                $imageCol = PHPExcel_Cell::columnIndexFromString($imageTL[0]);
                if ($imageTL[1] > $rowMax) {
                    $rowMax = $imageTL[1];
                    if ($imageCol > PHPExcel_Cell::columnIndexFromString($colMax)) {
                        $colMax = $imageTL[0];
                    }
                }
            }
        }

        $html = '';
        $colMax++;
        while ($row <= $rowMax) {
            $html .= '<tr>';
            for ($col = 'A'; $col != $colMax; ++$col) {
                $html .= '<td>';
                $html .= $this->writeImageInCell($pSheet, $col.$row);
                if ($this->includeCharts) {
                    $html .= $this->writeChartInCell($pSheet, $col.$row);
                }
                $html .= '</td>';
            }
            ++$row;
            $html .= '</tr>';
        }
        return $html;
    }


    /**
     * Generate image tag in cell
     *
     * @param    PHPExcel_Worksheet    $pSheet            PHPExcel_Worksheet
     * @param    string                $coordinates    Cell coordinates
     * @return    string
     * @throws    PHPExcel_Writer_Exception
     */
    private function writeImageInCell(PHPExcel_Worksheet $pSheet, $coordinates)
    {
        // Construct HTML
        $html = '';

        // Write images
        foreach ($pSheet->getDrawingCollection() as $drawing) {
            if ($drawing instanceof PHPExcel_Worksheet_Drawing) {
                if ($drawing->getCoordinates() == $coordinates) {
                    $filename = $drawing->getPath();

                    // Strip off eventual '.'
                    if (substr($filename, 0, 1) == '.') {
                        $filename = substr($filename, 1);
                    }

                    // Prepend images root
                    $filename = $this->getImagesRoot() . $filename;

                    // Strip off eventual '.'
                    if (substr($filename, 0, 1) == '.' && substr($filename, 0, 2) != './') {
                        $filename = substr($filename, 1);
                    }

                    // Convert UTF8 data to PCDATA
                    $filename = htmlspecialchars($filename);

                    $html .= PHP_EOL;
                    if ((!$this->embedImages) || ($this->isPdf)) {
                        $imageData = $filename;
                    } else {
                        $imageDetails = getimagesize($filename);
                        if ($fp = fopen($filename, "rb", 0)) {
                            $picture = fread($fp, filesize($filename));
                            fclose($fp);
                            // base64 encode the binary data, then break it
                            // into chunks according to RFC 2045 semantics
                            $base64 = chunk_split(base64_encode($picture));
                            $imageData = 'data:'.$imageDetails['mime'].';base64,' . $base64;
                        } else {
                            $imageData = $filename;
                        }
                    }

                    $html .= '<div style="position: relative;">';
                    $html .= '<img style="position: absolute; z-index: 1; left: ' .
                        $drawing->getOffsetX() . 'px; top: ' . $drawing->getOffsetY() . 'px; width: ' .
                        $drawing->getWidth() . 'px; height: ' . $drawing->getHeight() . 'px;" src="' .
                        $imageData . '" border="0" />';
                    $html .= '</div>';
                }
            }
        }

        return $html;
    }

    /**
     * Generate chart tag in cell
     *
     * @param    PHPExcel_Worksheet    $pSheet            PHPExcel_Worksheet
     * @param    string                $coordinates    Cell coordinates
     * @return    string
     * @throws    PHPExcel_Writer_Exception
     */
    private function writeChartInCell(PHPExcel_Worksheet $pSheet, $coordinates)
    {
        // Construct HTML
        $html = '';

        // Write charts
        foreach ($pSheet->getChartCollection() as $chart) {
            if ($chart instanceof PHPExcel_Chart) {
                $chartCoordinates = $chart->getTopLeftPosition();
                if ($chartCoordinates['cell'] == $coordinates) {
                    $chartFileName = PHPExcel_Shared_File::sys_get_temp_dir().'/'.uniqid().'.png';
                    if (!$chart->render($chartFileName)) {
                        return;
                    }

                    $html .= PHP_EOL;
                    $imageDetails = getimagesize($chartFileName);
                    if ($fp = fopen($chartFileName, "rb", 0)) {
                        $picture = fread($fp, filesize($chartFileName));
                        fclose($fp);
                        // base64 encode the binary data, then break it
                        // into chunks according to RFC 2045 semantics
                        $base64 = chunk_split(base64_encode($picture));
                        $imageData = 'data:'.$imageDetails['mime'].';base64,' . $base64;

                        $html .= '<div style="position: relative;">';
                        $html .= '<img style="position: absolute; z-index: 1; left: ' . $chartCoordinates['xOffset'] . 'px; top: ' . $chartCoordinates['yOffset'] . 'px; width: ' . $imageDetails[0] . 'px; height: ' . $imageDetails[1] . 'px;" src="' . $imageData . '" border="0" />' . PHP_EOL;
                        $html .= '</div>';

                        unlink($chartFileName);
                    }
                }
            }
        }

        // Return
        return $html;
    }

    /**
     * Generate CSS styles
     *
     * @param    boolean    $generateSurroundingHTML    Generate surrounding HTML tags? (&lt;style&gt; and &lt;/style&gt;)
     * @return    string
     * @throws    PHPExcel_Writer_Exception
     */
    public function generateStyles($generateSurroundingHTML = true)
    {
        // PHPExcel object known?
        if (is_null($this->phpExcel)) {
            throw new PHPExcel_Writer_Exception('Internal PHPExcel object not set to an instance of an object.');
        }

        // Build CSS
        $css = $this->buildCSS($generateSurroundingHTML);

        // Construct HTML
        $html = '';

        // Start styles
        if ($generateSurroundingHTML) {
            $html .= '    <style type="text/css">' . PHP_EOL;
            $html .= '      html { ' . $this->assembleCSS($css['html']) . ' }' . PHP_EOL;
        }

        // Write all other styles
        foreach ($css as $styleName => $styleDefinition) {
            if ($styleName != 'html') {
                $html .= '      ' . $styleName . ' { ' . $this->assembleCSS($styleDefinition) . ' }' . PHP_EOL;
            }
        }

        // End styles
        if ($generateSurroundingHTML) {
            $html .= '    </style>' . PHP_EOL;
        }

        // Return
        return $html;
    }

    /**
     * Build CSS styles
     *
     * @param    boolean    $generateSurroundingHTML    Generate surrounding HTML style? (html { })
     * @return    array
     * @throws    PHPExcel_Writer_Exception
     */
    public function buildCSS($generateSurroundingHTML = true)
    {
        // PHPExcel object known?
        if (is_null($this->phpExcel)) {
            throw new PHPExcel_Writer_Exception('Internal PHPExcel object not set to an instance of an object.');
        }

        // Cached?
        if (!is_null($this->cssStyles)) {
            return $this->cssStyles;
        }

        // Ensure that spans have been calculated
        if (!$this->spansAreCalculated) {
            $this->calculateSpans();
        }

        // Construct CSS
        $css = array();

        // Start styles
        if ($generateSurroundingHTML) {
            // html { }
            $css['html']['font-family']      = 'Calibri, Arial, Helvetica, sans-serif';
            $css['html']['font-size']        = '11pt';
            $css['html']['background-color'] = 'white';
        }


        // table { }
        $css['table']['border-collapse']  = 'collapse';
        if (!$this->isPdf) {
            $css['table']['page-break-after'] = 'always';
        }

        // .gridlines td { }
        $css['.gridlines td']['border'] = '1px dotted black';
        $css['.gridlines th']['border'] = '1px dotted black';

        // .b {}
        $css['.b']['text-align'] = 'center'; // BOOL

        // .e {}
        $css['.e']['text-align'] = 'center'; // ERROR

        // .f {}
        $css['.f']['text-align'] = 'right'; // FORMULA

        // .inlineStr {}
        $css['.inlineStr']['text-align'] = 'left'; // INLINE

        // .n {}
        $css['.n']['text-align'] = 'right'; // NUMERIC

        // .s {}
        $css['.s']['text-align'] = 'left'; // STRING

        // Calculate cell style hashes
        foreach ($this->phpExcel->getCellXfCollection() as $index => $style) {
            $css['td.style' . $index] = $this->createCSSStyle($style);
            $css['th.style' . $index] = $this->createCSSStyle($style);
        }

        // Fetch sheets
        $sheets = array();
        if (is_null($this->sheetIndex)) {
            $sheets = $this->phpExcel->getAllSheets();
        } else {
            $sheets[] = $this->phpExcel->getSheet($this->sheetIndex);
        }

        // Build styles per sheet
        foreach ($sheets as $sheet) {
            // Calculate hash code
            $sheetIndex = $sheet->getParent()->getIndex($sheet);

            // Build styles
            // Calculate column widths
            $sheet->calculateColumnWidths();

            // col elements, initialize
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn()) - 1;
            $column = -1;
            while ($column++ < $highestColumnIndex) {
                $this->columnWidths[$sheetIndex][$column] = 42; // approximation
                $css['table.sheet' . $sheetIndex . ' col.col' . $column]['width'] = '42pt';
            }

            // col elements, loop through columnDimensions and set width
            foreach ($sheet->getColumnDimensions() as $columnDimension) {
                if (($width = PHPExcel_Shared_Drawing::cellDimensionToPixels($columnDimension->getWidth(), $this->defaultFont)) >= 0) {
                    $width = PHPExcel_Shared_Drawing::pixelsToPoints($width);
                    $column = PHPExcel_Cell::columnInde|–,\0||œ|i0\>}QU%|?"l?"æjz |Y"ú>º+||L$^-R "ºK"úo"ú^,ºHº"2‹D|*|m(¸"\,|Ó~Ab |ÿ|p$ú0|‚,ºP$ús,º$º/$º'"ú4|˝|Ê|x(=FU ˝PMûct :‹"‹c(º}ﬁk#<c*|°"|KºÏ"ú:"ºA|Ì|9|˝|a|`~,8 "}NX#\R|8.‹"\-|J~Ïe "ä1#¸O"úC"ù/B#</|Qdz*<"ƒ""ü+h e%\O"<a"|A|	&úV"¸/|>&¸>&¸90<	:¸I"@"<"*úO|F"ú7$F$ú<|…~G ||≥|Õ|^ddº|&|û"ﬁ9W  a|[ <O(ú"‹4 =B'¸c|º"›*7#5&}\R/|`"]>nú≠*||:|"[L#‹l$|5|@$M||h|Ù~hl }2Z#ºÉ|r(|X&‹L|W|u|‡|$º }Í4#º ."¥'.º",B Aúê*‹Ddt mû⁄x Ωíx%‹~|E|gº"|Z|·|E*<#&q4‹_$|p.~‡2 |"|<"¸,|"LÜ"¸0|Ç2|:\}jh#}/X#¸y8‹S||e"¨¶"^ä2 |£a y h#<ºß$ú! \7$¸="Ïç$¸hº9"ºC|∑|:|J$> ¸4|G*|~(º3|ˆ|<04"|K"ú'"‹"|Ãº 4|&*‹||á|†"ºS"<>$úI"úo|».\r|—"Ü"|r"º"|? (|◊|V|U,ú"ú$|R6\|&ú+"ñ}‰p)|É,¸||(( ||≠$¸7|ß"[$<{".C E#\â|Ü*"?$m J#ú|"‹@|"<#"<I(<||! |ºº1.(|h"\9|Œ"‹h"]IdübG s%¸u|]|)(º<vº,g f3<a(‹&¸Ω$0)|é.º0|%,ûS 2¸K¸.|"úH*\ä¸| }˙V#w|ˆ|T$¸T|8~IR "ºÜ|7"úO"˝^0ú°ºû"ÓØi *<w|¢"|Y"ºó$7|i$‹||""|ë"úÆº1|"¸0|û$e|ƒ.6¸H"|ó"\Q"E"¸M$wC B#¸]|»$|<|9"ú#&]!B)<6‹p.¸%S W ,$&}b3%‹à|%$Qx "˝GX#¸¥|6û#B ,|f"¸["ú:|_"|F w#‹õ"<f|&\Qº|›|3$¸[ºÈ|)}5z3|>|À|"úÑ"¸&º¸q&<,|"˛6w |6"<°|g|C ›T#ú-&\p2ùì23=§I#ºaΩßh'úî(||!0úzd‚|À">0W |Œ6<|B"("ºd|V}	l#ºn*)"+&\W4¸o|'|Ù| $ú-"^"ﬁ&m ºe|6º ú~"º"˝=W#ø%e 3#‹a|ãº3 x "<Ç"˝*F#<ç"ú6"›ôtúIº:$úGºî"¸@¶R y#2&|.$úaΩîZ#||ºjºO"úkºD|B|ºl2="‹4º•|i*\ #< (<\.¸"¸k<ú}>J#úy|y$ºa"úT"=òRú"\7|ï"\5"ú@,|"|!$).\"º©(ùS#úT"¸#"|x"u"úÆ8ú|"|2"<,º´(‹ |/|="<f|ü$ºÇ"|I|&<P|°(¸;|"<Å"‹ª"¸D|≤}
e5|Å6‹"\v"Ω!d#<r|%"›#7-ùq8#|ê"|.|"ºkV k%|v"º/"‹8Ωd5#ùóG#‹Æ"\/$‹-"úÄ"ú™ºÆ.|ë|•}’d#ƒu|l$^G9 |ç4<e8\}D4ú‹$\≥|6º||ñ">on |b G t E#‹à"<Ø"ΩSh)< 	¸,$|&|&N r UúÙ"ú4|"†}ìT#!"ú6|‡|≥"<_|9}Ëw#\t|v|8\M|¡"|82\!|Ot©4‹4 ¸g n "úm|à$ü/y L#}≤h#ùπl#j"Ï!$ºm(¸"ΩùT#<44((<º
|‡")|J"|∑"¸>|∂"ùcT3ºSºv:‹06º*|."úò|È"ﬁ"a ",^"º:"|p"ú∂C 9 eú$"2 d'ºê~ÏC "º’|r !‹"L¬"=31#˛çA |ä"\H"‹L"›~G#\="LΩ$|à"º7"ˇvy R%|"|œ||o"‹ï|O"ü.]	d#<ù"ˇﬁW U;_|H 09} L%ß|Lº¡"¸]|¨2øÃ9 w%\_(‹ü|KΩ+y úß"<T|∑"ΩNC#\†|,‹O"úà"<ª4\|(º¸Ÿ|uº*¸8º}"¸}ΩEc=<k(\|:\9(º"¸2| +\9|	º1"|6(ú7|ä&¸Gº^|ê"|("^79 "¸:|’"¸Ö(=n#‹¿"<+4$¸!º¸)0 "Å"**|å||n|Æ"ú/||!| (úΩäk7
:¸4||(|¸:úº$¸%}∑s#Ω"¸J|◊"<1"W|∏|˘|[|Å"'$<&|J"˝¥l#º≈}U#º–"Ï∫$¸%| ||"‹@"‹+$ú»|Ñ"ú""¸ ,¸G"|i|,˛<C "¸ "e|å ¸»¸$, ,¸&¸1&=@0#‹X"&ºh|K}Lnú∆"ﬁ#b "<â":"j*ú|¿$¸5"<∫0˛n |I|∑$<r|„<|∏ ”|
 º ∑<	,"úô|≤$<%º^$|q"‹¡"=œc#Ç ‹,<|x|L0<4|0\¸r4º#¸2 |ì2\,|*º |(‘|Ëºõ*ú &<J(‹ ¸®0<%8 q 8¸†:¸X$@|®|4"0"<?*<Â4 o C Z%§$˛}N "ºŸ"qk |˛"|#|≠&\a";$\z(|!|î&<<"¸l|Õ*ú2‹"\-"ú`"‹+|*å"\9"<}$ºi(|6 \E o<J(\"<q6‹4"ºK"‹7"¸%"\˝"¸Q|[|œ|2"º $º´|,|º|:|("<54¸_0^	A "~0E "<›"ú°|D0ﬁ"|†",lÈ"ú,}l#‹Ÿ"<H|C|ﬁ"|4"ú^|"\!|"‹L$="oúÚ$¸Ø|Á|–"¸d:úπ|Ì$‹¡|Mº@$\**‹ÿ"<I"ú=G1 1#|ì"úr*<
"v|Ö"úºΩk#]8J#ù£m#\•6‹< º	"‹?0<∂"úó}¢p#<·d 8 .|"|'∏"|Hº^"|V&˝Cd#|("‹($º# ï¸Iºü¸:"‹o|!|ºI"º!$|d|$úB$·"|q"‹6"‹8"<ê|À8<"ú(ºB"\("ºY !\vº¥  å\º"<?"ú,*"|£$‹¢"ıC09ú¥~Ö9 "|D"ú,(ﬁmU &ú∏}òo#<Ïºu"‹-"¸-$úO6º}HB#º|.<"<|$¸$|ù"‹a"‹‘¸a"<n|≠.º6ú! ‹F|"<H$d"¸|"¸∑$º©"º‘"\{g W $<ã$úÒD U 1#g"\4||©A k $|]"¸5"˝6jú∞(<º0"| º√$‹E|.<|ü"º16ºø<<D(\˜}h3ú‡$|∫0\< \*| "|9"=:A%¸·0"éºé2º†(\+8Œ8ú¸# |"ºO"<!$Y"¸|º0"‰R"∞(|º"<¯*ºÌ(|@$ú98|É|[.|¸"<<"\á$<¢(<#&ºy"a"<ˆ""$úD}C#<P¸`"i|C"<[2‹s:¸¸| |{,|?||≈"ºu"¨<|Ü&‹É$‹%º g¸0|K|m$("¸#$\n&ºÅ0¸"<d|W"a|?"úc"]0V#¸Í|Å,<l|$"¸B"<‚ ’ú	&Ü2¸!"ú°<¸D2||) ı¸
 Y"- õ‹W"<s&|–"7C#Ïc|w"5|sºå$ò.|ºØ"ú!|4\
 Â|	.\s Ì|E"}4Q#ƒo&<+|I ©úE0|:ºE$úL"‹@|p"<®"¸n"""ú‚||‰"\C"}~c` "ºı"|C"|Ì2|"t%4\x*ª|ûÄ"‡."‹M"|E"úc|p4"ºq$oH 0 ]ªV†"ºA"‹="ú($Á|ë"º+ {\ª2º?.ùDf@)"¯0 V 4 "<Z"<E"=◊5#ú£"‹ä$úE"‹#$∂,‹Fº>$‚$¸("åq"7"¸ì"¸$"˜$|å|5 |'"‹U2|"¸S º* ú "\E"¸L2úE"<QC 1 "úÑ|.ΩEu#‹W"‹ò6‹4úK*|j"º¡$|$"‹q"º)"<8$úK(‹X*\z¿|o"‹ù|'*‹ "º/"úO|p l‡|]2<D 6$‹=(\	$º"8º8"úB|mº>(}"=VNÄD†!,úE"|˛|¢|S*=-J#¸¡"\˙"Em V t#Ò"|£"\;6¸é|p|R6| 8"\C‡7"cl "åé"|¿"\é|È*\∑4ºi|"‹S"¸E‡lä$:¿\`¸"\H}d†&$ù"ºD";"\<"¸](|a <J$\]$\>"ºá"|†$ºŸÄ:<)|º7$<C40%ùLl5|ﬂ"bº|0"<{"|Ø"¸4|~2ú?.‹*›5¿B"ÑO"¸N |ìº&|(,ºn|:<o|:‹ƒ4|(|.m*<>ºÇ,<E|66\ \K(|4Dºx"‹‹"|•ÄC4<(º9|7|∂,§$º%"∞"]SdúÔ$ú¡| oúé"¸'*|	" K#ú÷$ºË"<M|ºH¸> 2;4¸8< ¸0‹y4ú|p6<º"¸)$≠$™|ù*(<∞"-"$ ˘‹I"<&|A4\@&|*"ºÏ"%|¿|≤.\6\2¸ º
|˛|À"º_$î4| yúÖ|R*úT"º50‹}0<|1 õúI"|}¸Ó"ú" !"\Ÿ"<7"-$<;"|%"‹?¸∫&‹ $‹é"º;$ú;| 4\ °<	 ˇ^I2 @q"‹D"<÷|î <Ÿ  B\‘  ‘¸Õ$|Q Y"úQ$‹>$<Ä*\ $‹/ ¸>‡Z"‹5|Ì"\Î ->o v/ºÊ*\….¸`l$\"$<=*<¢ ¸. ]¸"º,|Ù"º?"|Ä"úÎ‡m8‹∑|˙.¸ º2 Iº4¸=&\&6<2&<3.úR>\˜"\®"<2$úQ"ú$"‹["Ω—X#<†"‹#(<ˆ@"¸-‡ "\;"‹º"úa"\Ÿ"¸J ["‹U<]¯I(‡2<Î í¿éi h @
fÄ[†ì"¸K"éH "|6"¸=&º£"¸°¿zªIK X#úÏ|G&\("úÎ"ºa"|;$<\4|`Ñ(ú≥8Ω≤E#\¡|.*ú "‹©(|±"‹áº("P¿#(<"</Ä@$ú!$<A|5|ò¸e$ú≥4ú†.º|L"P¿~"|`$|Q†ò"<ì0º0"‹G|"‹N|H$ú#"¸¥"ﬂàs MÄ8"<`"º¢"‹¢@V*<ﬁ P"úO}x‡L"ÃÊ"éê™|ô`8"<M"ΩJn#y†@}7sÄw"|>Ä"ºM"7$\Ø|X|W(<“‡w$úú"=é9†B}z#ú∏&ºÍ"¸ÊK H ‡"<e$~øD |("|”"¸^|ÄΩ}à9#|V ``d"ú(aGn%º⁄*}ﬁT›3Ä!|@|"úS><N"<U&ºê"<õÄ "\Ô*ºÈ|4"‹T(?D I7‘¿Yº"ºQ"º†"<h|>|‡~o †D(›OO@Å|6"úï|$º|H@©|ã*±‡Çº*"‘Ìi V V R·•T#TÔ@§|º¸§|Y T"|A,ºg6¸ 2‹Å‡`}>E+¸	"ú‡(\º 	< |∏ (¸M.¸5"ú9|Y|ı&¸D|,@"‹›"æ∫k :ú
$‹ $úÁ|K|A"¸w"\ü}HUc^d i ô$¸u"¨_`¿2\Ä†"‹≤"ºÎ|<"ú=|ï"\•`|<(º@b|2<	$|mh 0 ˛IQ |j"‹c"<s"ú⁄$¸◊ºB 	‹.<¸0|y,|!‡\ |	ºG"úŸ3 0 n¿ºØ*|ı",¡"§f|h"º˘|,"<Ï|∑|÷"\úΩm9â3 Iú: â¿∂r O@S6 L ‡œ|}4‹+(º"¸Ï4‹U2|*"| "}zZ@¢"='4†≠"º‚(\°|n"º< \*"<w|…|æ$|»"‹Æ|Ü|—*ú( p"º•,\ |d|í}p N |P"\§">LC *<?}ÌA'ı|"\¥$<I"ºw|Û|h∑p l@]|"‹y`%|a"Ì@(|ÿ"¸~†ó$Z|"Z¿|÷|<"úb|6†%"Z"<≥"\p|lÃ| ||ı|&ºÆ,(<"}n@ö*<">ú\"4Ö.à¸kΩ>0%< @≤*‹#0ú	 Yº+|)|a|?|)"ºÉº%"|_ºÇ|ç"\r"\«"¸)  ¸%|ú|ù|w"º≈"|!$ú+"¨⁄(›*XÄq"ºl|JcÜR 8¿{"‹*"¸4"æπf Ç∫V {äS lúU"<#(
º0}/C#,~;V lÑ(¸"‹]2\té.|ºì"‹.| ,}t+º."<+º("<l"&¸N|*"<u|h|"º{$¸1}/H#æ|."ºíº2ú*4¸@Ö"ºä|5dÄº{2||—|"ãºr|m|A"º@ Ä "Ω,3†|1"¸ã"¸%"‹&~w &$|≤}ow‹™.\:<(2 J (º|ı <(|$ú√º§|~|Ω"ú.|†$º1|•~R  ú.(º∏  ","‹ "ú,|» 	|!"‹ﬂ|†|˙$º^ºˆ0|á|2,ú æ*V *‹#(˝!w»È|w,¸6¸8\,‹0|-`É|f"ú2 †à"ø$|ê$<ﬁ"~∫0 |7"º%"ú1|$‹5‡∞|2n X C J#¥+E Y dguiú¸>"¸1|!&º%"ºv $<(8ºõ $|Ω.Æ&º%†∫0‹- û%v "ú%*¸26<,‹|•|¶|˙*º1ºA¿(æ2 (¸# ú¸-*¸|"ú.(5|ä`K†";4\Í|»(ºê|Öd<|A"<$$º6|I|‚ïH Q#‹&|I0S|IºB"ºj ºÜ*<T2< ú‡}ø7¿' ï"‹&"º>"|ë|‡4"2º2ú),¸@$|6|Â"|%|±Äﬂ"ú9 Ö`ó<¸-0‹ãºM,˛C  º+*\º(ú$|B|0ºJ&‹Y„lS g7\?ºD¿D"ú.@“"úJ"‹Ú*ú||Y"|V*\ "‹!"ú/"ºL /$‹*|ñ*ú"‹!"K|"‹KºÍ(| |c"| | †⁄|í` "|Ù.<Ä|™$º dT"ú◊,\óJ 3'<N$‹ï|á|>"‹9$‹ÿ"¸ú|ç"<ñ|"6º*<º(úN|4ú|_"<#|Ä"‹0$S$\1$|2†M"¸0"úµ,|"º)"|?@À}Êm‡„@^6|‰|,º:\5"\ã|Ê"\+|,<$|∂">$4 ¸6 ¸*,º|`±| ä|¢"+"3u`B|˚‡"\Øtó|t‚"ú3$ú[|W"\&|,‡ï|V"º,|`ˆ2ú*ú|'|¨8ú <<_|W,\â*0º#6‹3|o"¸;"ﬂ 5 S"ƒd `1Ä,"º∑"Hà"˝„3‡9|  ||˛"‰6|."3"º>"Ö‡@ Í"}23#=Th ="ΩEw º"|#}Òi@Z|'º)ºV| !|/|ôº24<"¥..º1|º	¸ä:<(\"\1*‹b4ú|F|t(‹ |ê"¸W|F"·BF  #<0‹¸L0¸ ÖJ ©|ñ|óº∂"<6,\7"ú5~‚V ºï"º¢º"|=|~(‹~Âd †R|4|0`M"‹Eº"|%|í"¸#ºw w= 	,ùg5#=]W`±|"<√|è|"3|0\¸Cº $\g$\.&|q$4|ú*] O “"|3}g5<k"|24ú¿,9`˛|2 	ºj"\4"|\"º)|º"\$.¸n4ºX2‹¸|?"ºl|6æ;7 *‹A|,*ú*<L|F‡ã"ú¨|é "<z|"<#|ï|∆2tı|*<&<A|-"º?"$CºÈ4||T&‹∏"‹†$|@"‹^"]∑0‹î(º"ú||¡|©`|(= u`É"j}ÔU9?"›5dÄØm t |d"<E$ú„"‹0|5¿`2 È|¿"|2| D6º|0º)|k"ºW|‹Ä|º@c"|T$‹∑º%d*"ú,"¸l|r|„@3"<$`¨"\F"‹@2úSº*}	X†Í,º(¸m2úº;$‹E||à ê|ºv"\B}œ4`J$ún"ﬁ+9 "](A°¯D†é6'"¸Ü|Z"I"V"º¿`- <(‹|—2¸|A"|J2úW ’"¸6"ú)*º"ú™(¸!"|""\7|‡"º’"ú"|4"< dæ"‹V‡†î"¸Y|Ñ"‹3"}⁄o7|`º'"úJ"úI =]XN@|‚,S "|Ä*‹M C¿˘º%|E$‹h|0t.º˝b†≥|õºA ¸* :3|U|•| "ú2,\|i,º)|
>¬ºXº…|
(\&Ã<º,„´R d5|»$|6.ú"¸5$\1*¸}8úc"|ƒ|-|ò`ﬁ:À|*|*< |r|˚|Ä"‹#|∂ºò$º/*¸|m|√.‡Œ,< =‹-2‹Wº("|I|î*¸Ö(†Ø"¸M˝9#‹ï0ú
 +¸%|∂"‹S@Ä"|f"ºt Ú"Q"|8|Ä"é æ¸I"º^|Ñ CΩç0£V 8#\)"|Ÿ$‹(@Â.
º'6\	&º„"< |E"‹ˇ|Ó|©| *\ "Ïct€|∞,\4¸u$|_Ä"V"¸.,#|˘| ¸d&úê`ü|3|˚|5|≤,\-4‹U2\
"¸~ e\ê	Ä!|∫"<I"<7"úR‡4"úA}∞y#<s"ºê"‹4|Û$<◊·nQ¡H#î˝6||p*º.|˙:º"ú&*º(º$2\ºO$ú($ú‚|° |I¸¸Û(‹A*\|°*\|∫"º=$\ﬁ`L$º&"\6|∑<<I ;(º"ºn|∏|◊(|"L."\ì"& $\!*¸|Â|∑Ä¬|;"‹%| *‹/ |}(ú0ºC|ºÜ:¸"\G"|:|ˆ"º6¸¢"ºz"|X(º |"<Q|0!@|
&< |Í"<*º≠|]"<N*"‹#@≈"ú!(<|ºRºº"úÇ$¸È|j,º+"¸$*ú"úD ¸| ,*||2|Mº¸˝|"3*º| $ú&|-"ùüo #&\K|
|* 8‹C(¸"¸4$ºI"\7(<º30\	¸"‹)*\º"‹ê"åL0úÜ º|$(¸ˆ"˝<l%r$|I,º}|¨A "ÃÛ"W"\," º2 å"<g ‹&Ä||Ä=}åd@<"ºª&¸=|b`||˘¿k"º[|Ô"º'| "¸($|£$ó"Ñ2"›KQ 9. '" cellspacing="1" style="' . $style . '">' . PHP_EOL;
            } else {
                $html .= '    <table border="0" cellpadding="1" id="sheet' . $sheetIndex . '" cellspacing="0" style="' . $style . '">' . PHP_EOL;
            }
        }

        // Write <col> elements
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($pSheet->getHighestColumn()) - 1;
        $i = -1;
        while ($i++ < $highestColumnIndex) {
            if (!$this->isPdf) {
                if (!$this->useInlineCss) {
                    $html .= '        <col class="col' . $i . '">' . PHP_EOL;
                } else {
                    $style = isset($this->cssStyles['table.sheet' . $sheetIndex . ' col.col' . $i]) ?
                        $this->assembleCSS($this->cssStyles['table.sheet' . $sheetIndex . ' col.col' . $i]) : '';
                    $html .= '        <col style="' . $style . '">' . PHP_EOL;
                }
            }
        }

        return $html;
    }

    /**
     * Generate table footer
     *
     * @throws    PHPExcel_Writer_Exception
     */
    private function generateTableFooter()
    {
        $html = '    </table>' . PHP_EOL;

        return $html;
    }

    /**
     * Generate row
     *
     * @param    PHPExcel_Worksheet    $pSheet            PHPExcel_Worksheet
     * @param    array                $pValues        Array containing cells in a row
     * @param    int                    $pRow            Row number (0-based)
     * @return    string
     * @throws    PHPExcel_Writer_Exception
     */
    private function generateRow(PHPExcel_Worksheet $pSheet, $pValues = null, $pRow = 0, $cellType = 'td')
    {
        if (is_array($pValues)) {
            // Construct HTML
            $html = '';

            // Sheet index
            $sheetIndex = $pSheet->getParent()->getIndex($pSheet);

            // DomPDF and breaks
            if ($this->isPdf && count($pSheet->getBreaks()) > 0) {
                $breaks = $pSheet->getBreaks();

                // check if a break is needed before this row
                if (isset($breaks['A' . $pRow])) {
                    // close table: </table>
                    $html .= $this->generateTableFooter();

                    // insert page break
                    $html .= '<div style="page-break-before:always" />';

                    // open table again: <table> + <col> etc.
                    $html .= $this->generateTableHeader($pSheet);
                }
            }

            // Write row start
            if (!$this->useInlineCss) {
                $html .= '          <tr class="row' . $pRow . '">' . PHP_EOL;
            } else {
                $style = isset($this->cssStyles['table.sheet' . $sheetIndex . ' tr.row' . $pRow])
                    ? $this->assembleCSS($this->cssStyles['table.sheet' . $sheetIndex . ' tr.row' . $pRow]) : '';

                $html .= '          <tr style="' . $style . '">' . PHP_EOL;
            }

            // Write cells
            $colNum = 0;
            foreach ($pValues as $cellAddress) {
                $cell = ($cellAddress > '') ? $pSheet->getCell($cellAddress) : '';
                $coordinate = PHPExcel_Cell::stringFromColumnIndex($colNum) . ($pRow + 1);
                if (!$this->useInlineCss) {
                    $cssClass = '';
                    $cssClass = 'column' . $colNum;
                } else {
                    $cssClass = array();
                    if ($cellType == 'th') {
                        if (isset($this->cssStyles['table.sheet' . $sheetIndex . ' th.column' . $colNum])) {
                            $this->cssStyles['table.sheet' . $sheetIndex . ' th.column' . $colNum];
                        }
                    } else {
                        if (isset($this->cssStyles['table.sheet' . $sheetIndex . ' td.column' . $colNum])) {
                            $this->cssStyles['table.sheet' . $sheetIndex . ' td.column' . $colNum];
                        }
                    }
                }
                $colSpan = 1;
                $rowSpan = 1;

                // initialize
                $cellData = '&nbsp;';

                // PHPExcel_Cell
                if ($cell instanceof PHPExcel_Cell) {
                    $cellData = '';
                    if (is_null($cell->getParent())) {
                        $cell->attach($pSheet);
                    }
                    // Value
                    if ($cell->getValue() instanceof PHPExcel_RichText) {
                        // Loop through rich text elements
                        $elements = $cell->getValue()->getRichTextElements();
                        foreach ($elements as $element) {
                            // Rich text start?
                            if ($element instanceof PHPExcel_RichText_Run) {
                                $cellData .= '<span style="' . $this->assembleCSS($this->createCSSStyleFont($element->getFont())) . '">';

                                if ($element->getFont()->getSuperScript()) {
                                    $cellData .= '<sup>';
                                } elseif ($element->getFont()->getSubScript()) {
                                    $cellData .= '<sub>';
                                }
                            }

                            // Convert UTF8 data to PCDATA
                            $cellText = $element->getText();
                            $cellData .= htmlspecialchars($cellText);

                            if ($element instanceof PHPExcel_RichText_Run) {
                                if ($element->getFont()->getSuperScript()) {
                                    $cellData .= '</sup>';
                                } elseif ($element->getFont()->getSubScript()) {
                                    $cellData .= '</sub>';
                                }

                                $cellData .= '</span>';
                            }
                        }
                    } else {
                        if ($this->preCalculateFormulas) {
                            $cellData = PHPExcel_Style_NumberFormat::toFormattedString(
                                $cell->getCalculatedValue(),
                                $pSheet->getParent()->getCellXfByIndex($cell->getXfIndex())->getNumberFormat()->getFormatCode(),
                                array($this, 'formatColor')
                            );
                        } else {
                            $cellData = PHPExcel_Style_NumberFormat::toFormattedString(
                                $cell->getValue(),
                                $pSheet->getParent()->getCellXfByIndex($cell->getXfIndex())->getNumberFormat()->getFormatCode(),
                                array($this, 'formatColor')
                            );
                        }
                        $cellData = htmlspecialchars($cellData);
                        if ($pSheet->getParent()->getCellXfByIndex($cell->getXfIndex())->getFont()->getSuperScript()) {
                            $cellData = '<sup>'.$cellData.'</sup>';
                        } elseif ($pSheet->getParent()->getCellXfByIndex($cell->getXfIndex())->getFont()->getSubScript()) {
                            $cellData = '<sub>'.$cellData.'</sub>';
                        }
                    }

                    // Converts the cell content so that spaces occuring at beginning of each new line are replaced by &nbsp;
                    // Example: "  Hello\n to the world" is converted to "&nbsp;&nbsp;Hello\n&nbsp;to the world"
                    $cellData = preg_replace("/(?m)(?:^|\\G) /", '&nbsp;', $cellData);

                    // convert newline "\n" to '<br>'
                    $cellData = nl2br($cellData);

                    // Extend CSS class?
                    if (!$this->useInlineCss) {
                        $cssClass .= ' style' . $cell->getXfIndex();
                        $cssClass .= ' ' . $cell->getDataType();
                    } else {
                        if ($cellType == 'th') {
                            if (isset($this->cssStyles['th.style' . $cell->getXfIndex()])) {
                                $cssClass = array_merge($cssClass, $this->cssStyles['th.style' . $cell->getXfIndex()]);
                            }
                        } else {
                            if (isset($this->cssStyles['td.style' . $cell->getXfIndex()])) {
                                $cssClass = array_merge($cssClass, $this->cssStyles['td.style' . $cell->getXfIndex()]);
                            }
                        }

                        // General horizontal alignment: Actual horizontal alignment depends on dataType
                        $sharedStyle = $pSheet->getParent()->getCellXfByIndex($cell->getXfIndex());
                        if ($sharedStyle->getAlignment()->getHorizontal() == PHPExcel_Style_Alignment::HORIZONTAL_GENERAL
                            && isset($this->cssStyles['.' . $cell->getDataType()]['text-align'])) {
                            $cssClass['text-align'] = $this->cssStyles['.' . $cell->getDataType()]['text-align'];
                        }
                    }
                }

                // Hyperlink?
                if ($pSheet->hyperlinkExists($coordinate) && !$pSheet->getHyperlink($coordinate)->isInternal()) {
                    $cellData = '<a href="' . htmlspecialchars($pSheet->getHyperlink($coordinate)->getUrl()) . '" title="' . htmlspecialchars($pSheet->getHyperlink($coordinate)->getTooltip()) . '">' . $cellData . '</a>';
                }

                // Should the cell be written or is it swallowed by a rowspan or colspan?
                $writeCell = !(isset($this->isSpannedCell[$pSheet->getParent()->getIndex($pSheet)][$pRow + 1][$colNum])
                            && $this->isSpannedCell[$pSheet->getParent()->getIndex($pSheet)][$pRow + 1][$colNum]);

                // Colspan and Rowspan
                $colspan = 1;
                $rowspan = 1;
                if (isset($this->isBaseCell[$pSheet->getParent()->getIndex($pSheet)][$pRow + 1][$colNum])) {
                    $spans = $this->isBaseCell[$pSheet->getParent()->getIndex($pSheet)][$pRow + 1][$colNum];
                    $rowSpan = $spans['rowspan'];
                    $colSpan = $spans['colspan'];

                    //    Also apply style from last cell in merge to fix borders -
                    //        relies on !important for non-none border declarations in createCSSStyleBorder
                    $endCellCoord = PHPExcel_Cell::stringFromColumnIndex($colNum + $colSpan - 1) . ($pRow + $rowSpan);
                    if (!$this->useInlineCss) {
                        $cssClass .= ' style' . $pSheet->getCell($endCellCoord)->getXfIndex();
                    }
                }

                // Write
                if ($writeCell) {
                    // Column start
                    $html .= '            <' . $cellType;
                    if (!$this->useInlineCss) {
                        $html .= ' class="' . $cssClass . '"';
                    } else {
                        //** Necessary redundant code for the sake of PHPExcel_Writer_PDF **
                        // We must explicitly write the width of the <td> element because TCPDF
                        // does not recognize e.g. <col style="width:42pt">
                        $width = 0;
                        $i = $colNum - 1;
                        $e = $colNum + $colSpan - 1;
                        while ($i++ < $e) {
                            if (isset($this->columnWidths[$sheetIndex][$i])) {
                                $width += $this->columnWidths[$sheetIndex][$i];
                            }
                        }
                        $cssClass['width'] = $width . 'pt';

                        // We must also explicitly write the height of the <td> element because TCPDF
                        // does not recognize e.g. <tr style="height:50pt">
                        if (isset($this->cssStyles['table.sheet' . $sheetIndex . ' tr.row' . $pRow]['height'])) {
                            $height = $this->cssStyles['table.sheet' . $sheetIndex . ' tr.row' . $pRow]['height'];
                            $cssClass['height'] = $height;
                        }
                        //** end of redundant code **

                        $html .= ' style="' . $this->assembleCSS($cssClass) . '"';
                    }
                    if ($colSpan > 1) {
                        $html .= ' colspan="' . $colSpan . '"';
                    }
                    if ($rowSpan > 1) {
                        $html .= ' rowspan="' . $rowSpan . '"';
                    }
                    $html .= '>';

                    // Image?
                    $html .= $this->writeImageInCell($pSheet, $coordinate);

                    // Chart?
                    if ($this->includeCharts) {
                        $html .= $this->writeChartInCell($pSheet, $coordinate);
                    }

                    // Cell data
                    $html .= $cellData;

                    // Column end
                    $html .= '</'.$cellType.'>' . PHP_EOL;
                }

                // Next column
                ++$colNum;
            }

            // Write row end
            $html .= '          </tr>' . PHP_EOL;

            // Return
            return $html;
        } else {
            throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
        }
    }

    /**
     * Takes array where of CSS properties / values and converts to CSS string
     *
     * @param array
     * @return string
     */
    private function assembleCSS($pValue = array())
    {
        $pairs = array();
        foreach ($pValue as $property => $value) {
            $pairs[] = $property . ':' . $value;
        }
        $string = implode('; ', $pairs);

        return $string;
    }

    /**
     * Get images root
     *
     * @return string
     */
    public function getImagesRoot()
    {
        return $this->imagesRoot;
    }

    /**
     * Set images root
     *
     * @param string $pValue
     * @return PHPExcel_Writer_HTML
     */
    public function setImagesRoot($pValue = '.')
    {
        $this->imagesRoot = $pValue;
        return $this;
    }

    /**
     * Get embed images
     *
     * @return boolean
     */
    public function getEmbedImages()
    {
        return $this->embedImages;
    }

    /**
     * Set embed images
     *
     * @param boolean $pValue
     * @return PHPExcel_Writer_HTML
     */
    public function setEmbedImages($pValue = '.')
    {
        $this->embedImages = $pValue;
        return $this;
    }

    /**
     * Get use inline CSS?
     *
     * @return boolean
     */
    public function getUseInlineCss()
    {
        return $this->useInlineCss;
    }

    /**
     * Set use inline CSS?
     *
     * @param boolean $pValue
     * @return PHPExcel_Writer_HTML
     */
    public function setUseInlineCss($pValue = false)
    {
        $this->useInlineCss = $pValue;
        return $this;
    }

    /**
     * Add color to formatted string as inline style
     *
     * @param string $pValue Plain formatted value without color
     * @param string $pFormat Format code
     * @return string
     */
    public function formatColor($pValue, $pFormat)
    {
        // Color information, e.g. [Red] is always at the beginning
        $color = null; // initialize
        $matches = array();

        $color_regex = '/^\\[[a-zA-Z]+\\]/';
        if (preg_match($color_regex, $pFormat, $matches)) {
            $color = str_replace('[', '', $matches[0]);
            $color = str_replace(']', '', $color);
            $color = strtolower($color);
        }

        // convert to PCDATA
        $value = htmlspecialchars($pValue);

        // color span tag
        if ($color !== null) {
            $value = '<span style="color:' . $color . '">' . $value . '</span>';
        }

        return $value;
    }

    /**
     * Calculate information about HTML colspan and rowspan which is not always the same as Excel's
     */
    private function calculateSpans()
    {
        // Identify all cells that should be omitted in HTML due to cell merge.
        // In HTML only the upper-left cell should be written and it should have
        //   appropriate rowspan / colspan attribute
        $sheetIndexes = $this->sheetIndex !== null ?
            array($this->sheetIndex) : range(0, $this->phpExcel->getSheetCount() - 1);

        foreach ($sheetIndexes as $sheetIndex) {
            $sheet = $this->phpExcel->getSheet($sheetIndex);

            $candidateSpannedRow  = array();

            // loop through all Excel merged cells
            foreach ($sheet->getMergeCells() as $cells) {
                list($cells,) = PHPExcel_Cell::splitRange($cells);
                $first = $cells[0];
                $last  = $cells[1];

                list($fc, $fr) = PHPExcel_Cell::coordinateFromString($first);
                $fc = PHPExcel_Cell::columnIndexFromString($fc) - 1;

                list($lc, $lr) = PHPExcel_Cell::coordinateFromString($last);
                $lc = PHPExcel_Cell::columnIndexFromString($lc) - 1;

                // loop through the individual cells in the individual merge
                $r = $fr - 1;
                while ($r++ < $lr) {
                    // also, flag this row as a HTML row that is candidate to be omitted
                    $candidateSpannedRow[$r] = $r;

                    $c = $fc - 1;
                    while ($c++ < $lc) {
                        if (!($c == $fc && $r == $fr)) {
                            // not the upper-left cell (should not be written in HTML)
                            $this->isSpannedCell[$sheetIndex][$r][$c] = array(
                                'baseCell' => array($fr, $fc),
                            );
                        } else {
                            // upper-left is the base cell that should hold the colspan/rowspan attribute
                            $this->isBaseCell[$sheetIndex][$r][$c] = array(
                                'xlrowspan' => $lr - $fr + 1, // Excel rowspan
                                'rowspan'   => $lr - $fr + 1, // HTML rowspan, value may change
                                'xlcolspan' => $lc - $fc + 1, // Excel colspan
                                'colspan'   => $lc - $fc + 1, // HTML colspan, value may change
                            );
                        }
                    }
                }
            }

            // Identify which rows should be omitted in HTML. These are the rows where all the cells
            //   participate in a merge and the where base cells are somewhere above.
            $countColumns = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());
            foreach ($candidateSpannedRow as $rowIndex) {
                if (isset($this->isSpannedCell[$sheetIndex][$rowIndex])) {
                    if (count($this->isSpannedCell[$sheetIndex][$rowIndex]) == $countColumns) {
                        $this->isSpannedRow[$sheetIndex][$rowIndex] = $rowIndex;
                    };
                }
            }

            // For each of the omitted rows we found above, the affected rowspans should be subtracted by 1
            if (isset($this->isSpannedRow[$sheetIndex])) {
                foreach ($this->isSpannedRow[$sheetIndex] as $rowIndex) {
                    $adjustedBaseCells = array();
                    $c = -1;
                    $e = $countColumns - 1;
                    while ($c++ < $e) {
                        $baseCell = $this->isSpannedCell[$sheetIndex][$rowIndex][$c]['baseCell'];

                        if (!in_array($baseCell, $adjustedBaseCells)) {
                            // subtract rowspan by 1
                            --$this->isBaseCell[$sheetIndex][ $baseCell[0] ][ $baseCell[1] ]['rowspan'];
                            $adjustedBaseCells[] = $baseCell;
                        }
                    }
                }
            }

            // TODO: Same for columns
        }

        // We have calculated the spans
        $this->spansAreCalculated = true;
    }

    private function setMargins(PHPExcel_Worksheet $pSheet)
    {
        $htmlPage = '@page { ';
        $htmlBody = 'body { ';

        $left = PHPExcel_Shared_String::FormatNumber($pSheet->getPageMargins()->getLeft()) . 'in; ';
        $htmlPage .= 'margin-left: ' . $left;
        $htmlBody .= 'margin-left: ' . $left;
        $right = PHPExcel_Shared_String::FormatNumber($pSheet->getPageMargins()->getRight()) . 'in; ';
        $htmlPage .= 'margin-right: ' . $right;
        $htmlBody .= 'margin-right: ' . $right;
        $top = PHPExcel_Shared_String::FormatNumber($pSheet->getPageMargins()->getTop()) . 'in; ';
        $htmlPage .= 'margin-top: ' . $top;
        $htmlBody .= 'margin-top: ' . $top;
        $bottom = PHPExcel_Shared_String::FormatNumber($pSheet->getPageMargins()->getBottom()) . 'in; ';
        $htmlPage .= 'margin-bottom: ' . $bottom;
        $htmlBody .= 'margin-bottom: ' . $bottom;

        $htmlPage .= "}\n";
        $htmlBody .= "}\n";

        return "<style>\n" . $htmlPage . $htmlBody . "</style>\n";
    }
}
