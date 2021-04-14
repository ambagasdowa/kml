
<table id="table_xone" class="display order-table table table-bordered table-hover table-striped responstable" >

    <thead>
        <tr>
            <th>&nbsp;</th>
            <?php foreach ($bssus as $areas){ ?> 

            <th colspan="2" <?php echo in_array($areas,$xareas)?' style="background-color: #1a1334;" ':''; ?>>

            <?php
                if (in_array($areas,$xareas)){
                    echo '<span style="color: white;">'.$areas.'</span>';
                } else {
                    echo $areas; 
                }
            ?> 

            </th>
            <?php } ?>
        </tr>
<!-- NOTE This fix a bug in Datatables -->
<!--https://stackoverflow.com/questions/19426972/datatables-not-working-when-added-colspan-for-the-last-column-->
        <tr>
            <th>&nbsp;</th>
            <?php foreach ($bssus as $areas){ ?> 
                <th>U</th>
                <th>%</th>
            <?php } ?>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($fleet as $OperationType) { ?>
        <tr>
            <td><?php echo $OperationType ?></td>
                <?php foreach ($bssus as $xareas) { ?>
            <td><?php echo $dispCross[$OperationType][$xareas]; ?></td>

            <td>
                <?php 
                    if(in_array($OperationType,$flotaFirst)){
                        $percentage = round(($dispCross[$OperationType][$xareas])*100/$totalUnits,2); 
                        if ($OperationType == 'Taller' && $percentage > 10.0) {
                            echo '<span style="color:red">' . $percentage . '%</span>'; 
                        } else {
                            echo '<span>' . $percentage . '%</span>'; 
                        }

                    } else {
                        echo '&nbsp;';                   
                    }
                ?>
            </td>

            <?php } ?>
        </tr>
        <?php } ?>

    </tbody>

<!--    <tfoot>
      <tr>
        <td>Total</td>
        <td>&nbsp;</td>
        <td colspan="17"></td>
      </tr>
    </tfoot>
-->
</table>

