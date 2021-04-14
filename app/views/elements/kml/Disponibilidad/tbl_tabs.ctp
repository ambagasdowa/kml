<div>

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

