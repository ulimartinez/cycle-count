<nav class="light-blue lighten-1" role="navigation">
	<div class="nav-wrapper container"><a id="logo-container" href="<?php echo base_url();?>" class="brand-logo">Logo</a>
		<ul class="right hide-on-med-and-down">
			<?php
			if ($this->session->userdata('is_logged_in')){
				echo '<li><a href="#" data-activates="slide-out" class="button-collapse waves-effect waves-light modal-trigger show-on-medium-and-up">Welcome ' . $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName') . '</a></li>';
			}
			else
				echo '<a class="waves-effect waves-light modal-trigger" href="#logInModal"><span>Log in</span></a>';
			?>
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
		</ul>

		<ul id="nav-mobile" class="side-nav ">
			<li>
				<a class="waves-effect waves-light modal-trigger" href="#logInModal"><span>Log in</span></a>
			</li>
		</ul>
		<?php $sideBarLink = $this->session->userdata('is_logged_in')? "slide-out" : "nav-mobile"; ?>
		<a href="#" data-activates="<?php echo $sideBarLink?>" class="button-collapse"><i class="material-icons">menu</i></a>
	</div>
</nav>

<div id="logInModal" class="modal">
	<form role="form" method="post" id="loginForm" name="loginForm"
	onsubmit="userLogin('<?php echo base_url() ?>'); return false">
	<div class="modal-content">
		<h4 >Sign in to continue to the Member's Area</h4>
	</a>
	<br>
	<div class="input-field col s6">
		<i class="material-icons prefix">account_circle</i>
		<input id="InputEmail" type="email" class="validate">
		<label for="InputEmail" data-error="Wrong email format">Email Address</label>
	</div>
	<div class="input-field col s6">
		<i class="material-icons prefix">vpn_key</i>
		<input id="InputPassword" type="password" class="validate">
		<label for="InputPassword">Password</label>
	</div>
</div>


<div class="modal-footer">
	<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Close</a>
	<!-- <a href="<?php echo base_url('member/resetPassword') ?>" class="waves-effect waves-light btn-flat"style="margin-right: 10px;">Reset Password</a> -->
	<button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
</div>
</form>
</div>