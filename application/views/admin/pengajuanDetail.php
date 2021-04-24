 
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
							<li class="nav-item "><h4 class="text-center"><?php echo $cafe['nama_cafe'] ?></h4></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">							<!-- /.tab-pane -->
							<div class="active tab-pane" id="timeline">
								<!-- The timeline -->
								<div class="card card-primary">
									<!-- /.card-header -->
									<div class="card-body">
										<div class="row mb-4">
											<div class="col-md-6">
												<img style="width: 300px; height: 200px" src="<?= base_url('upload/cafe/') ?><?php echo $cafe['ktp'] ?>" alt="User Image">
											</div>
											<hr>
										</div>
										<hr>
										<strong> Nama cafe</strong>

										<p class="text-muted">
											<?php echo $cafe['nama_cafe'] ?>
										</p>

										<hr>

										<strong>Alamat</strong>

										<p class="text-muted"><?php echo $cafe['nama_kelurahan'] ?>, rt <?php echo $cafe['rt'] ?>/ rw <?php echo $cafe['rw'] ?>, <?= $cafe['nama_kecamatan'] ?>, Kota Pekalongan , Jawa Tengah</p>

										<hr>

										<strong> Nama Ketua</strong>

										<p class="text-muted"><?php echo $cafe['nama_pemilik'] ?></p>
										<hr>

										<strong> Email</strong>

										<p class="text-muted"><?php echo $cafe['email_pemilik'] ?></p>
										<hr>
										<strong > Foto KTP</strong></br>
										<div class="row mt-3">
											<div class="col-md-6">
												<img style="width: 300px; height: 200px" src="<?= base_url('upload/cafe/') ?><?php echo $cafe['ktp'] ?>" alt="User Image">
											</div>
										<!-- 	<div class="col-md-6">
												<ul class="mailbox-attachments d-flex align-items-stretch clearfix">
													<li>
														<span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

														<div class="mailbox-attachment-info">
															<a href="<?php echo base_url('upload/cafe/'.$cafe['berkas']) ?>" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> berkas.pdf</a>
															<span class="mailbox-attachment-size clearfix mt-1">
																<span>1,245 KB</span>
																<a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
															</span>
														</div>
													</li>
												</ul>
											</div> -->
											<hr>
										</div>
									</div>
									<!-- /.card-body -->

									<div class="card-footer">
										<?php if($cafe['status'] == 4){ ?>
											<a href="<?php echo base_url('dashboard/sendEmail/'.$cafe['id_cafe'].'/terima') ?>" type="button" class="btn btn-primary">Terima Pengajuan Kembali</a>
											<a href="<?php echo base_url('dashboard/hapusPengajuan/'.$cafe['id_cafe']) ?>" type="button" class="btn btn-danger">Hapus Pengajuan</a>
										<?php }else if($cafe['status'] == 1){

											?>
											<a href="<?php echo base_url('dashboard/sendEmail/'.$cafe['id_cafe'].'/terima') ?>" type="button" class="btn btn-primary">Terima Pengajuan</a>
											<a href="<?php echo base_url('dashboard/sendEmail/'.$cafe['id_cafe'].'/tolak') ?>" type="button" class="btn btn-warning">TolaK Pengajuan</a>
											<a href="<?php echo base_url('dashboard/hapusPengajuan/'.$cafe['id_cafe']) ?>" type="button" class="btn btn-danger">Hapus Pengajuan</a>
										<?php }else{ ?>
											<a href="<?php echo base_url('dashboard/hapusPengajuan/'.$cafe['id_cafe']) ?>" type="button" class="btn btn-danger">Hapus cafe</a>
										<?php } ?>
									</div>
								</div>
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