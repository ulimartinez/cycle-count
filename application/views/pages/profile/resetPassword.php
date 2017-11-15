<div class="container-fluid minHeight" id="start">
	<div class="row">
		<div class="col l2 "></div>
		<div class="col l8 white z-depth-1 section-content black-text">
			<h4>Forgot Password</h4>
			<p>So, you've gone and forgotten your password. Just enter your account's email address here and your password will be reset and emailed to you shortly.</p>
			<form role="form" method="post" id="editProfileForm" name="editProfileForm"
			      onsubmit="resetPassword('<?php echo base_url() ?>'); return false;">
				<div class="section-content">
					<div class="row">
						<div class="input-field col s12">
							<input id="Input_email" type="email" class="validate">
							<label for="Input_email">Email Address</label>
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