<div class="container col-sm-8 col-lg-6">

	<div class="row pt-3">
		<div class="col-8">
			<h3><i class="fas fa-address-book"></i> Simple Phonebook</h3>
		</div>
		<div class="col-4 text-right">
			<a href="javascript:void(0);" class="btn btn-primary" data-type="add" data-toggle="modal" data-target="#modal-contact"><i class="fas fa-plus"></i></a>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-12">
			<div class="p-2 px-3">
				<div class="row mt-0">
					<div class="col-9">
						<h6>Contacts List</h6>
					</div>
					<div class="col-3 text-right">
						<span class="m-2">
							<i class="fas"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="mt-2">
				<table class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>Name / Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="contactData">
						<?php if (!empty($phonebook)) {
							foreach ($phonebook as $d) { ?>
								<tr>
									<td class="col-10">
										<div><?php echo $d->name; ?></div>
										<div class="text-muted ml-2"><?= $d->phone ?></div>
									</td>
									<td class="col-2 align-middle">
										<div class="m-2">
											<a href="javascript:void(0);" class="" rowID="<?php echo $d->id; ?>" data-type="edit" data-toggle="modal" data-target="#modal-contact"><i class="fas fa-edit text-primary p-2"></i></a>
											<a href="javascript:void(0);" class="" onclick="return confirm('Are you sure to delete data?')?userAction('hapus', '<?php echo $d->id; ?>'):false;"><i class="fas fa-trash-alt text-danger p-2"></i></a>
										</div>
									</td>
								</tr>
							<?php }
						} else { ?>
							<tr>
								<td colspan="7">No contact(s) found...</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>




<!-- Modal Contact -->
<div class="modal fade" id="modal-contact" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><span id="hlabel">Add New</span> Member</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<div class="statusMsg"></div>
				<form role="form">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number">
					</div>
					<input type="hidden" class="form-control" name="id" id="id" />
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-simpan">SAVE</button>
			</div>
		</div>
	</div>
</div>