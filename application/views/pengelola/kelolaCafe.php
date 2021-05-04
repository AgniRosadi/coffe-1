 
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<?= $this->session->flashdata('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Deskripsi</a></li>
							<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<!-- /.tab-pane -->
							<div class="active tab-pane" id="timeline">
								<!-- The timeline -->
								<div class="card card-primary">
									<!-- /.card-header -->
									<div class="card-body">
										<strong><i class="fas fa-book mr-1"></i> Nama cafe</strong>

										<p class="text-muted">
											<?php echo $cafe['nama_cafe'] ?>
										</p>

										<hr>

										<strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

										<p class="text-muted"><?php echo $cafe['nama_kelurahan'] ?>, rt <?php echo $cafe['rt'] ?>/ rw <?php echo $cafe['rw'] ?>, <?= $cafe['nama_kecamatan'] ?>, Kota Pekalongan , Jawa Tengah</p>

										<hr>

										<strong><i class="far fa-user mr-1"></i> Nama pemilik</strong>

										<p class="text-muted"><?php echo $cafe['nama_pemilik'] ?></p>
										<hr>

										<strong><i class="far fa-file-alt mr-1"></i> Email</strong>

										<p class="text-muted"><?php echo $cafe['email_pemilik'] ?></p>
										<hr>
										<strong><i class="far fa-clock mr-1"></i> Jam Buka</strong>

										<p class="text-muted">09:00 am</p>
										<hr>
										<strong><i class="far fa-clock mr-1"></i> Jam Tutup</strong>

										<p class="text-muted">09:00 pm</p>
										<hr>
										<strong><i class="far fa-clock mr-1"></i> No Handphone</strong>

										<p class="text-muted">082220209043</p>
										<hr>
										<strong><i class="far fa-clock mr-1"></i> Hari</strong>

										<p class="text-muted">senin - jumat</p>
										<hr>
									</div>
									<!-- /.card-body -->
								</div>
							</div>
							<!-- /.tab-pane -->

							<div class="tab-pane" id="settings">
								<form class="form-horizontal" method="POST" action="<?php echo base_url('pengelola/editcafe') ?>">
									<div class="form-group row">
										<label for="inputName" class="col-sm-2 col-form-label">Nama cafe</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="nama_cafe" id="inputName" placeholder="Name" value="<?php echo $cafe['nama_cafe'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-10">
											<input readonly type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $cafe['email_pemilik'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputSkills" class="col-sm-2 col-form-label">Nama pemilik</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputSkills" name="nama_pemilik" placeholder="nama pemilik" value="<?php echo $cafe['nama_pemilik'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputSkills" class="col-sm-2 col-form-label">No Handphone</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputSkills" name="nama_pemilik" placeholder="nama pemilik" value="<?php echo $cafe['nama_pemilik'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputSkills" class="col-sm-2 col-form-label">Jam Buka</label>
										<div class="col-sm-10">
											<input type="text" class="form-control appointment_time" placeholder="Time">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputSkills" class="col-sm-2 col-form-label">Jam Tutup</label>
										<div class="col-sm-10">
											<input type="text" class="form-control appointment_time" placeholder="Time">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputSkills" class="col-sm-2 col-form-label">Hari</label>
										<div class="col-sm-10">
											<input type="text" class="form-control appointment_time" placeholder="Time">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputExperience" class="col-sm-2 col-form-label">Deskripsi</label>
										<div class="col-sm-10">
											<textarea class="form-control" id="inputExperience" placeholder="Experience" name="deskripsi"><?php echo $cafe['deskripsi'] ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="offset-sm-2 col-sm-10">
											<button type="submit" class="btn btn-danger"><i class="far fa-edit mr-1"></i>Edit</button>
										</div>
									</div>
								</form>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
	</div>
</section>