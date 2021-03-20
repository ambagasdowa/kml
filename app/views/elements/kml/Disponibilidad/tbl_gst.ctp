
<!-- Table -->

 <table class="dropdown dropdown-processed table">

    <tr>
        <td><a data-id="1" class="dropdown-link" href="#"><i id="_link_1" class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;</a><span>shus</span></td>
        <td id="header_dropdown_total_1"></td>
        <td id="header_dropdown_qty_1"></td>
        <td>&nbsp;</td>
    </tr>

    <tr class="dropdown-container_1" style="display: none;">
        <td>shoes</td>
        <td><input class="item_1" type="text" value="150"></td>
        <td><input class="quantity" type="text" value="12"></td>
        <td><input type="text"></td>
    </tr>


    <tr class="dropdown-container_1" style="display: none;">
        <td>shoes</td>
        <td><input class="item_1" type="text" value="50"></td>
        <td><input class="quantity" type="text" value="8"></td>
        <td><input type="text"></td>
    </tr>
<!-- Start another group -->

<!-- if x then  -->
    <tr>
        <td><a data-id="2" class="dropdown-link" href="#"><i id="_link_2" class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;</a><span>prais</span></td>
        <td id="header_dropdown_total_2"></td>
        <td id="header_dropdown_qty_2"></td>
        <td>&nbsp;</td>
    </tr>

    <tr class="dropdown-container_2" style="display: none;">
        <td>price</td>
        <td><input class="item_2" type="text" value="100"></td>
        <td><input class="quantity" type="text" value="2"></td>
        <td><input type="text"></td>
    </tr>

    <tr class="dropdown-container_2" style="display: none;">
        <td>price</td>
        <td><input class="item_2" type="text" value="100"></td>
        <td><input class="quantity" type="text" value="5"></td>
        <td><input type="text"></td>
    </tr>

    <tfoot>
      <tr class="summary">
        <td>Total:</td>
        <td id="total_price"></td>
        <td colspan='3' id="total_quantity"></td>
      </tr>
      <tr class="summary_shoes">
        <td>Total shoes:</td>
        <td  id="total_shoes"></td>
        <td colspan='3' id="total_shoes_qty"></td>
      </tr>
    </tfoot>
  </table>


<script type="text/javascript">

    $(document).ready(function() {
      // Get the sums
      // SUM TOTALS Done
        tot = [];
        qty = [];
      // start as hidden
      $('.dropdown').each(function() {
          var $dropdown = $(this);

          $("a.dropdown-link").each(function(){
            console.log($(this).attr('data-id'));
            the_id = $(this).attr('data-id');
            sum = 0;
            quantity = 0;
            $('.item_' + the_id ).each(function() {
                var price = $(this);
                var q = price.closest('tr').find('.quantity').val();
                sum += parseInt(price.val())
                quantity += parseInt(q);
            });
            console.log(sum);
            console.log(quantity);

            tot[the_id] = sum;
            qty[the_id] = quantity;

            $("#header_dropdown_total_" + the_id ).html(tot[the_id]);
            $("#header_dropdown_qty_" + the_id ).html(qty[the_id]);
          });

          $("a.dropdown-link", $dropdown).click(function(e) {
            e.preventDefault();
            data_id = $(this).attr('data-id');
            console.log(data_id);
            $div = $(".dropdown-container_" + data_id, $dropdown);

              if ($div.is(":visible")) {
                $div.hide('slow');
                $("#_link_" + data_id).attr('class', 'fa fa-plus-square-o');
                $('#header_dropdown_total_' + data_id).html(tot[data_id]);
                $('#header_dropdown_qty_' + data_id).html(qty[data_id]);
              } else {
                $div.show('slow');
                $("#_link_" + data_id).attr('class', 'fa fa-minus-square-o');
                $('#header_dropdown_total_' + data_id).html('');
                $('#header_dropdown_qty_' + data_id).html('');
              }
            // $(".dropdown-container").not($div).hide();  // if you want close the other divs
            // return false;
          });

      });

        // $('html').click(function(){
          // $(".dropdown-container").hide();
        // });

    });
</script>
