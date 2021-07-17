<!-- Tabel Input Data-->
<body>
<div class="content-wrapper pt-3 px-1">
<div class="container-fluid">
<!-- DataTables -->
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('Dashboard/formshowdata')?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('Dashboard/add')?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="dish_name">Dish Name*</label>
								<input class="form-control <?php echo form_error('dish_name') ? 'is-invalid':'' ?>"
								 type="text" name="dish_name" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="category">Category*</label>
								<input class="form-control <?php echo form_error('category') ? 'is-invalid':'' ?>"
								 type="number" name="category" min="0" placeholder="Product category" />
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="price">Price*</label>
								<input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="number" name="price" min="0" placeholder="Product price" />
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="image">Image</label>
								<input class="form-control" type="file" name="img" />
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>
        </div>
</div>
</div>
</body>
