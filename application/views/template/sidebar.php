<ul id="slide-out" class="side-nav">
	<li>
		<div class="userView card-panel">
			<span class="white-text name">
				<?php echo "{$this->session->userdata('firstName')} {$this->session->userdata('lastName')}"; ?>
			</span>
			<a href="#!email"><span class="white-text email"><?php echo $this->session->userdata('email'); ?></span></a>
		</div>
	</li>

	<li class="no-padding">
		<ul class="collapsible collapsible-accordion">
			<li>
				<a href="#!" class="waves-effect collapsible-header"><i class="material-icons">settings</i>Account
					Settings
				</a>
				<div class="collapsible-body">
					<ul>
						<li><a href="<?php echo base_url('user/setPassword') ?>" class="waves-effect">Update Password</a></li>
						<li><a
							href="<?php echo base_url('user/editProfile/' . $this->session->userdata('username')) . '' ?>"
							class="waves-effect">Edit Profile Information</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</li>

	<li>
		<div class="divider"></div>
	</li>

	<?php if ($this->session->userdata('is_admin')) {?>
	<li class="no-padding">
		<ul class="collapsible collapsible-accordion">
			<li>
				<a href="#!" class="waves-effect collapsible-header"><i class="material-icons">person_pin</i>Admin Actions
				</a>
				<div class="collapsible-body">
					<ul>
						<li>
							<a href="<?php echo base_url('userAdmin/createUser') ?>" class="waves-effect">Create User</a>
						</li>
						<li>
							<a href="<?php echo base_url('userAdmin/editUsers') ?>" class="waves-effect">Manage Users</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</li>

	<li>
		<div class="divider"></div>
	</li>
	<?php }	?>

	<li class="no-padding">
		<a class="waves-effect waves-light collapsible-header" href="<?php echo base_url("session/logout") ?>">Log Out<i
			class="material-icons">power_settings_new</i>
		</a>
	</li>
</ul>