<div class="container minHeight" id="start">
  <div class="row_createMember">
    <div class="col l2 "></div>
    <div class="col l8 white z-depth-1 section-content black-text mainForm">
      <h4>Create New Car</h4>
      <form role="form" method="post" id="createUserForm" name="createUserForm"
      onsubmit="createCar('<?php echo base_url() ?>'); return false;"
      class="mainForm">
      <div class="section-content">
        <div class="row">
          <div class="input-field col s12">
            <input id="Input_make" type="text" class="validate">
            <label for="Input_make">Car Make</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="Input_model" type="text" class="validate">
            <label for="Input_model">Car Model</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="Input_year" type="text" class="validate">
            <label for="Input_year">Car Year</label>
          </div>
        </div>
        <div class="row right-align">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
