<div class="container minHeight" id="start">
	<div class="row">
		<div class="col s12">
			<div class="card material-table display dataTableForm">
				<div class="table-header">
					<span class="table-title">products Listing</span>
					<div class="actions">
						<!--                        <a href="#add_products" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>-->
						<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
					</div>
				</div>
				<form role="form" method="post" id="deleteproduct" name="deleteproduct"
				onsubmit="deleteproducts('<?php echo base_url() ?>'); return false;">
				<table class="datatable" id="productsDataTable">
					<thead>
						<tr>
							<th data-field="productId">Product Id</th>
							<th data-field="firstName" class="hide-on-small-and-down">Product Name</th>
							<th data-field="lastName" class="hide-on-small-and-down">Quantity</th>
							<th data-field="visibility" class="hide-on-small-and-down">Box Size</th>
							<th class="center" data-field="delete">Delete</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($products as $product) {
							?>
							<tr>
								<td><a
									href="<?php echo base_url("product/editProfile/" . $product->Pid); ?>"><?php echo $product->Pid ?></a>
								</td>
								<td class="hide-on-small-and-down"><a
									href="<?php echo base_url("product/editProfile/" . $product->Pid); ?>"><?php echo $product->Pname ?></a>
								</td>
								<td class="hide-on-small-and-down"><a
									href="<?php echo base_url("product/editProfile/" . $product->Pid); ?>"><?php echo $product->Pquantity ?></a>
								</td>
								<<td class="hide-on-small-and-down"><a
											href="<?php echo base_url("product/editProfile/" . $product->Pid); ?>"><?php echo $product->Pboxsize ?></a>
								</td>
								<td class="center">
									<input type="checkbox" name="productsToDelete[]" id="<?php echo $product->Pid ?>"
									value="<?php echo $product->Pid ?>"/>
									<label for="<?php echo $product->Pid ?>"></label>
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

