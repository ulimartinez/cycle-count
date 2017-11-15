<?php
$username = $user->Uusername;
$email = $user->Uemail;
$password = $user->Upassword;
$firstName = $user->Ufirstname;
$lastName = $user->Ulastname;
$is_admin = $user->Uis_admin ? 'checked':'';
?>
<div class="container minHeight" id="start">
	<div class="row_editProfile" >
		<div class="col l2 ">
            <div class="card material-table display mainForm">
                <h4>Edit Profile</h4>
                <form role="form" method="post" id="editProfileForm" name="editProfileForm" onsubmit="editProfile('<?php echo base_url() ?>'); return false;"
                    class="mainForm">
                    <div class="section-content">
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="Input_firstName" type="text" class="validate" value="<?php echo $firstName; ?>">
                                <label for="Input_firstName">First Name</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="Input_lastName" type="text" class="validate" value="<?php echo $lastName ?>">
                                <label for="Input_lastName">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="Input_email" type="email" class="validate" value="<?php echo $email ?>">
                                <label for="Input_email" data-error="Wrong email format">Email Address</label>
                            </div>
                            <div class="input-field col s12 hide">
                                <input id="Input_currentEmail" type="email" class="validate" value="<?php echo $email ?>">
                                <label for="Input_currentEmail" data-error="Wrong email format">Email Address</label>
                            </div>
                        </div>
                        <?php if ($this->session->userdata('is_admin')) { ?>
                        <div class="row">
                            <div class="col s12">
                                <input type="checkbox" id="Chk_isAdmin" <?php echo $is_admin ?>/>
                                <label for="Chk_isAdmin">Administrator User</label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row right-align">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light"  type="submit" name="action">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col l2"></div>
</div>

