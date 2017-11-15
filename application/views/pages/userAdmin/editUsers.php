<div class="container minHeight" id="start">
	<div class="row">
		<div class="col s12">
			<div class="card material-table display dataTableForm">
				<div class="table-header">
					<span class="table-title">Users Listing</span>
					<div class="actions">
						<!--                        <a href="#add_users" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>-->
						<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
					</div>
				</div>
				<form role="form" method="post" id="deleteUser" name="deleteUser"
				onsubmit="deleteUsers('<?php echo base_url() ?>'); return false;">
				<table class="datatable" id="usersDataTable">
					<thead>
						<tr>
							<th data-field="username">Username</th>
							<th data-field="firstName" class="hide-on-small-and-down">First Name</th>
							<th data-field="lastName" class="hide-on-small-and-down">Last Name</th>
							<th data-field="visibility" class="hide-on-small-and-down">Admin</th>
							<th class="center" data-field="delete">Delete</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($users as $user) {
							?>
							<tr>
								<td><a
									href="<?php echo base_url("user/editProfile/" . $user->Uusername); ?>"><?php echo $user->Uusername ?></a>
								</td>
								<td class="hide-on-small-and-down"><a
									href="<?php echo base_url("user/editProfile/" . $user->Uusername); ?>"><?php echo $user->Ufirstname ?></a>
								</td>
								<td class="hide-on-small-and-down"><a
									href="<?php echo base_url("user/editProfile/" . $user->Uusername); ?>"><?php echo $user->Ulastname ?></a>
								</td>
								<td class="hide-on-small-and-down">
									<a href="<?php echo base_url("user/editProfile/" . $user->Uusername); ?>">
										<?php echo $user->Uis_admin ? "<span class='green-text text-darken-1'>yes</span>" : "<span class='red-text text-darken-2'>no</span>";
										?>
									</a>
								</td>
								<td class="center">
									<input type="checkbox" name="usersToDelete[]" id="<?php echo $user->Uemail ?>"
									value="<?php echo $user->Uemail ?>"/>
									<label for="<?php echo $user->Uemail ?>"></label>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
					<div class="row right-align">
						<div class="input-field col s12 dataTableButtonCol">
							<button class="btn waves-effect waves-light dataTableButton" type="submit" name="action">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

