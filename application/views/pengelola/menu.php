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
                             <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Daftar
                                     Menu</a></li>
                             <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Deskripsi</a></li> -->
                             <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Tambah</a></li>
                         </ul>
                     </div><!-- /.card-header -->
                     <div class="card-body">
                         <div class="tab-content">
                             <div class="active tab-pane" id="activity">

                                 <!-- Post -->
                                 <div class="row">
                                     <?php foreach ($menu as $key => $value) {
                                            # code...
                                        ?>
                                     <div class="col-md-6">
                                         <!-- Box Comment -->
                                         <div class="card card-widget">
                                             <div class="card-header">
                                                 <div class="user-block">
                                                     <img class="img-circle"
                                                         src="<?= base_url('assets/') ?>dist/img/user1-128x128.jpg"
                                                         alt="User Image">
                                                     <span class="username"><a
                                                             href="<?php echo base_url('pengelola/detailmenu/' . $value->id_menu) ?>"><?php echo $value->nama_menu; ?></a></span>
                                                     <span class="description">Diposting pada tgl -
                                                         <?php echo $value->tanggal_posting ?></span>
                                                 </div>

                                             </div>
                                             <!-- /.card-header -->
                                             <div class="card-body">
                                                 <img style="height: 250px; width: 100%" class="img-fluid pad"
                                                     src="<?= base_url('upload/') ?>menu/<?php echo $value->foto_menu ?>"
                                                     alt="Photo">

                                                 <p><?php echo $value->detail ?></p>
                                                 <a href="<?php echo base_url('pengelola/detailmenu/' . $value->id_menu) ?>"
                                                     type="button" class="btn btn-primary btn-sm"><i
                                                         class="fas fa-edit"></i> Detail</a>
                                                 <a href="<?php echo base_url('pengelola/hapusmenu/' . $value->id_menu) ?>"
                                                     type="button" class="btn btn-danger btn-sm"><i
                                                         class="fas fa-trash"></i> Hapus</a>
                                             </div>
                                         </div>
                                         <!-- /.card -->
                                     </div>
                                     <?php } ?>
                                 </div>
                             </div>

                             <div class="tab-pane" id="settings">
                                 <form class="form-horizontal" method="POST"
                                     action="<?php echo base_url('pengelola/menu') ?>" enctype="multipart/form-data">
                                     <div class="form-group row">
                                         <label for="inputName" class="col-sm-2 col-form-label">Nama menu</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control" name="nama_menu" id="inputName"
                                                 placeholder="Name" value="">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="inputSkills" class="col-sm-2 col-form-label">Foto menu</label>
                                         <div class="col-sm-10">
                                             <input type="file" class="form-control" id="inputSkills" name="foto_menu"
                                                 placeholder="nama ketua" value="">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="inputExperience" class="col-sm-2 col-form-label">harga</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control" name="harga"
                                                 placeholder="Place some text here"></textarea>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="inputExperience" class="col-sm-2 col-form-label">Deskripsi</label>
                                         <div class="col-sm-10">
                                             <textarea class="textarea" name="detail" placeholder="Place some text here"
                                                 style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <div class="offset-sm-2 col-sm-10">
                                             <button type="submit" class="btn btn-danger"><i
                                                     class="far fa-plus mr-1"></i>Tambahkan</button>
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