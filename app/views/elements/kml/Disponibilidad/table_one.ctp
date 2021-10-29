
<table id="table_xone" class="display order-table table table-bordered table-hover table-striped responstable" width="<?php echo $stripe ?>%" >

    <thead>
        <tr>
            <th>&nbsp;</th>
            <?php foreach ($bssus as $areas){ ?> 

            <th colspan="2" <?php echo in_array($areas,$xareas)?' style="background-color: #1a1334;" ':'style="display:none;"'; ?>>

            <?php
                if (in_array($areas,$xareas)){
                    echo '<span style="color: white;">'.$areas.'</span>';
                } else {
                   // echo $areas; 
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
            <?php
                if (in_array($areas,$xareas)){
                    echo '<th>U</th>';
                    echo '<th>%</th>';
                } else {
//                    echo $areas; 
                }
            ?>  
            <?php } ?>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($fleet as $OperationType) { ?>
        <tr>
            <td><?php echo $OperationType ?></td>
    <?php foreach ($bssus as $areas) { ?>

        <?php if (in_array($areas,$xareas)) { ?>
            <?php $ndays = round($dispCross[$OperationType][$areas]/$days,0,PHP_ROUND_HALF_UP); ?>
            <td><?php echo $ndays; ?></td>

            <td>
                <?php 
                    if(in_array($OperationType,$flotaFirst)){
                        $percentage = round(($dispCross[$OperationType][$areas]/$days)*100/($totalUnits/$days),0,PHP_ROUND_HALF_UP); 
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

        <?php }?>

    <?php } ?>
        </tr>
        <?php } ?>

    </tbody>
<!--
    <tfoot>
      <tr>
        <td>Total</td>
            <?php foreach ($bssus as $areas){ ?> 
            <?php
                if (in_array($areas,$xareas)){
                    echo '<th>U</th>';
                    echo '<th>%</th>';
                } else {
//                    echo $areas; 
                }
            ?>  
            <?php } ?>    
      </tr>
    </tfoot>
-->
</table>

