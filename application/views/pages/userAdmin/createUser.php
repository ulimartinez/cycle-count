<div class="container minHeight" id="start">
	<div class="row_createMember">
		<div class="col l2 "></div>
		<div class="col l8 card mainForm">
			<h4>Create New User</h4>
			<form role="form" method="post" id="createUserForm" name="createUserForm"
			onsubmit="createUser('<?php echo base_url() ?>'); return false;"
			class="mainForm">
			<div class="section-content">
				<div class="row">
					<div class="input-field col s12">
						<input id="Input_firstName" type="text" class="validate">
						<label for="Input_firstName">First Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="Input_lastName" type="text" class="validate">
						<label for="Input_lastName">Last Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="Input_email" type="email" class="validate">
						<label for="Input_email" data-error="Wrong email format">Email Address</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<input type="checkbox" id="Chk_isAdmin" class="" />
						<label for="Chk_isAdmin">Administrator User</label>
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
