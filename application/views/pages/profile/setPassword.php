<div class="container minHeight" id="start">
	<div class="row">
		<div class="col l2 "></div>
		<div class="card display mainForm">
			<h4>Update Password</h4>
			<form role="form" method="post" id="editProfileForm" name="editProfileForm"
			onsubmit="setPassword('<?php echo base_url() ?>'); return false;">
			<div class="section-content">
				<div class="row">
					<div class="input-field col s12">
						<input id="Input_oldPassword" type="password" class="validate">
						<label for="Input_oldpassword">Old Password</label>
					</div>
					<div class="input-field col s12">
						<input id="Input_password" type="password" class="validate">
						<label for="Input_password">New Password</label>
					</div>
					<div class="input-field col s12">
						<input id="Input_passwordConfirmation" type="password" class="validate">
						<label for="Input_passwordConfirmation">Password Confirmation</label>
					</div>
				</div>
			</div>
			<div class="row right-align">
				<div class="input-field col s12">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col l2"></div>
</div>
</div>
