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
                             <li class="nav-item ">
                                 <h4 class="text-center"><?php echo $kelola['nama_cafe'] ?></h4>
                             </li>
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
                                         <div class="row mb-4">
                                             <div class="col-md-6">
                                                 <img style="width: 100%; height: 200px"
                                                     src="<?= base_url('upload/cafe/') ?><?php echo $kelola['ktp'] ?>"
                                                     alt="User Image">
                                             </div>
                                             <hr>
                                         </div>
                                         <hr>
                                         <strong> Nama Sanggar</strong>

                                         <p class="text-muted">
                                             <?php echo $kelola['nama_cafe'] ?>
                                         </p>

                                         <hr>
                                         <strong> Jumlah Menu</strong>
                                         <p class="text-muted">

                                         </p>

                                         <hr>

                                         <strong>Alamat</strong>

                                         <p class="text-muted"><?php echo $kelola['nama_kelurahan'] ?>, rt
                                             <?php echo $kelola['rt'] ?>/ rw <?php echo $kelola['rw'] ?>,
                                             <?= $kelola['nama_kecamatan'] ?>, Kota Pekalongan , Jawa Tengah</p>

                                         <hr>

                                         <strong>Kategori</strong>


                                         <hr>

                                         <strong> Nama Ketua</strong>

                                         <p class="text-muted"><?php echo $kelola['nama_pemilik'] ?></p>
                                         <hr>

                                         <strong> Email</strong>

                                         <p class="text-muted"><?php echo $kelola['email_pemilik'] ?></p>
                                         <hr>
                                         <strong>Foto Ketua</strong></br>

                                         <img style="height: 100px; width: 100px" class="img-circle"
                                             src="<?= base_url('upload/cafe/') ?><?php echo $kelola['foto'] ?>"
                                             alt="User Image">
                                         <hr>

                                         <strong> Foto KTP dan Berkas Pengajuan</strong></br>
                                         <div class="row mt-3">
                                             <div class="col-md-6">
                                                 <img style="width: 100%; height: 200px"
                                                     src="<?= base_url('upload/cafe/') ?><?php echo $kelola['ktp'] ?>"
                                                     alt="User Image">
                                             </div>
                                             <div class="col-md-6">
                                                 <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                                     <li>
                                                         <span class="mailbox-attachment-icon"><i
                                                                 class="far fa-file-pdf"></i></span>

                                                         <div class="mailbox-attachment-info">

                                                             <span class="mailbox-attachment-size clearfix mt-1">
                                                                 <span>1,245 KB</span>
                                                                 <a href="#"
                                                                     class="btn btn-default btn-sm float-right"><i
                                                                         class="fas fa-cloud-download-alt"></i></a>
                                                             </span>
                                                         </div>
                                                     </li>
                                                 </ul>
                                             </div>
                                             <hr>
                                         </div>
                                     </div>
                                     <!-- /.card-body -->

                                     <div class="card-footer">
                                         <a href="<?php echo base_url('dashboard/hapuscafe/'.$kelola['id_cafe']) ?>"
                                             type="button" class="btn btn-danger">Hapus
                                             Sanggar</a>
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