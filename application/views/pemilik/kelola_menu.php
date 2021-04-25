 
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
							<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Daftar Menu</a></li>
							<!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Deskripsi</a></li> -->
							<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Tambah Menu</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="activity">         

								<!-- Post -->
								<div class="row">
									<table id="example2" class="table table-responsive table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Menu</th>
												<th>Harga</th>
												<th>Foto</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
											foreach ($menu as $key => $value) {
										# code...
												$no++;
												?>
												<tr>
													<td><?php echo $no ?></td>
													<td><?= $value->nama_menu ?></td>
													<td><?= $value->harga?></td>
													<td><img style="height:40px;width:20px" src="<?php echo base_url('upload/'.$value->foto) ?>" class="img-fluid mb-2" alt="white sample"/></td>
													<td>
														<a href="<?php echo base_url('pengelola/hapus_menu/'.$value->id_menu) ?>" type="button" class="btn btn-danger btn-sm hapus" title="Hapus">
															<i class="fas fa-trash"></i>
														</a>
														<button type="button" id="edit_menu" class="btn btn-primary btn-sm hapus" title="Edit"
														data-toggle="modal"
														data-target="#modalUbah"
														data-id="<?= $value->id_menu ?>"
														data-nama="<?= $value->nama_menu ?>"
														data-deskripsi="<?= $value->harga ?>"
														data-icon="<?= $value->foto ?>"
														>
														<i class="fas fa-edit"></i>
													</button>
												</td>
											</tr>
										<?php  } ?>
									</tbody>
								</table>
							</div>
						</div>

						<div class="tab-pane" id="settings">
							<form class="form-horizontal" method="POST" action="<?php echo base_url('pengelola/tambah_menu') ?>" enctype="multipart/form-data">
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label">Nama Kategori</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Name" value="">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputHarga" class="col-sm-2 col-form-label">Input Harga</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="harga" id="inputHarga" placeholder="Input Harga" value="">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputFoto" class="col-sm-2 col-form-label">Input Foto</label>
									<div class="col-sm-10">
										<input type="file" class="form-control" name="foto" placeholder="Input Foto" value="">
									</div>
								</div>
								
								<div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
										<button type="submit" class="btn btn-danger"><i class="far fa-plus mr-1"></i>Tambahkan</button>
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

<div class="modal fade" id="modalUbah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="<?php echo base_url('pengelola/edit_menu') ?>">
			<div class="modal-header">
				<h4 class="modal-title">Edit Menu</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Kategori</label>
					<input type="text" name="nama_menu" id="nama_kategori" class="form-control" placeholder="Nama Menh" required>
				</div>
				<div class="form-group">
					<label>Harga</label>
					<input type="text" name="harga" id="harga" class="form-control" placeholder="harga" required>
				</div>
				<div class="form-group">
					<label></label>
					<input type="file" name="foto" id="foto" class="form-control" placeholder="foto" required>
				</div>
				
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Edit</button>
			</div>
		</form>
	</div>
</div>
