<style media="screen">
  .input-group-addon {
    color: unset;
    background-color: unset;
    border-top: none;

  }
  .center-block{
    float: none;
    margin: 0 auto;
    width:40%;
    /*text-align: center;*/
}

.label-box {
  display:block;
}
</style>


<div style="page-break-after: always;">&nbsp;</div>


<?php
      // NOTE add the new checkboxes

        foreach ($modeldata as $key => $value) {
          # code...
?>
<div class="row">
  <div class="center-block">
    <div class="input-group">
      <span class="input-group-addon">
        <div class="checkbox" >
          <label class="label-box">
            <input
                  type="checkbox"
                  name="data[ModuleUserCredentialsControl][value][<?php e(current($value))?>]"
                  aria-label="Checkbox for following text input"
                  <?php key($value) ? e('checked'):''; ?>
            >
            <i class="fa fa-square-o"></i>
            <?php e(current($value))?>
          </label>
        </div>
      </span>

    </div>
  </div>
</div>

<?php
        }
?>
