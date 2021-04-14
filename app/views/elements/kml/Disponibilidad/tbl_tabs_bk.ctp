<div>
        <ul class="nav nav-tabs" id="dispTabs" role="tablist">
     <!--  <li class="<?php // ($tipoUnidad == 1) ? print('active') : print ('') ; ?>"> -->
        <li class="active">
                <a href="#tab-table1<?php echo "_".$tipoUnidad ?>" data-toggle="tab">Detalle A</a>
            </li>
            <li>
                <a href="#tab-table2<?php echo "_".$tipoUnidad ?>" data-toggle="tab">Detalle B</a>
            </li>
        </ul>
        <div class="tab-content">
        <!-- <div class="tab-pane <?php // ($tipoUnidad == 1) ? print('active') : print('') ; ?>" id="tab-table1"> -->
        <div class="tab-pane active" id="tab-table1">
            <table id="a_table_<?php echo $tipoUnidad ?>" class="display order-table table table-bordered table-hover table-striped responstable">
              <thead>
              <th>Estatus</th>
                         <?php foreach ($bssus as $id_area => $area) { ?> 
                                         <th colspan="2"><?php echo $area;?></th>
                        <?php } ?>
              </thead>

              <tbody>
<?php
                  foreach ($groups as $group_name) {
                    echo "<tr>";  
                      // GO inner
                      echo "<td> $group_name </td>";
                    foreach ($bssus as $x_area => $xarea){
                      echo '<td>'.$disp[$tipoUnidad][$group_name][$xarea]."</td>";
                      echo "<td>".$percents[$tipoUnidad][$group_name][$xarea]."%</td>";
                    } 
                    echo "</tr>";
                  }
?>

              </tbody>
              <tfoot>
                  <td></td>
                  <td></td>
              </tfoot>
            </table>

            </div>

            <div class="tab-pane" id="tab-table2">

            <table id="b_table_<?php echo $tipoUnidad ?>" class="display order-table table table-bordered table-hover table-striped responstable">
              <thead>
                  <th><?php echo 'Unidades';?></th>
                  <th><?php echo 'Estatus';?></th>
              </thead>
              <tbody>
                <?php
                  foreach ($disponibilidadViewRptGroupGstIndicators as $key => $disponibilidadViewRptGroupGstIndicator) {
                ?>
                <tr>
                  <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['unidades']; ?></td>
                  <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['clasification_name']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                  <td></td>
                  <td></td>
              </tfoot>
            </table>

            </div>
        </div>
    </div>

