
<!-- Table -->
<div id="first-datatable-output" class="table-responsive">
<table width="100%">
    <th>


            <table id="table_<?php echo $tipoUnidad ?>" class="display order-table table table-bordered table-hover table-striped responstable">
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
    </th>



    <th>
            <table id="table_grp" class="display order-table table table-bordered table-hover table-striped responstable">
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
    </th>

</table>
</div>
