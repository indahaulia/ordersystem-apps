<!-- Tabel Input Data-->
<body>
<div id="wrapper">
		<div class="content-wrapper pt-3 px-1">

			<div class="container-fluid">

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('Dashboard/formshowdata') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

							<input type="hidden" name="dish_id" value="<?php echo $dishert->dish_id?>" />

							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="dish_name" placeholder="Product name" value="<?php echo $dishert->dish_name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Price</label>
								<input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="number" name="price" min="0" placeholder="Product price" value="<?php echo $dishert->price ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="price">Category</label>
								<input class="form-control <?php echo form_error('category') ? 'is-invalid':'' ?>"
								 type="number" name="category" min="0" placeholder="Product price" value="<?php echo $dishert->category ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('category') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="img" />
								<input type="hidden" name="old_img" value="<?php echo $dishert->img?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- /.content-wrapper -->

		</div>
</body>
