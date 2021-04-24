
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Daftar Pengajuan</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">

  <div class="container">
    <?= $this->session->flashdata('message'); ?>
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">

          <?php
          $status = '';
          foreach ($pengajuan as $key => $value) {
          # code...

            if($value->status == 1){
              $status = 'Belum Dikonfirmasi';
            }else if($value->status == 3){
              $status = 'Menunggu Aktifasi';
            }else{ 
             $status = 'Ditolak';
           }
           ?>
           <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
             </div>
             <div class="card-body pt-0">
              <div class="row">
                 <div class="col-12 text-center">
                  <img style="height: 100%; width:  100%;" src="<?php echo base_url('upload/cafe/'.$value->foto) ?>" alt="" >
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h2 class="lead"><b> <?= $value->nama_cafe ?></b></h2>
                  <p class="text-muted text-sm"><b>Status: </b> <p><?php echo $status ?></p></p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat:  <?= $value->nama_kelurahan ?>,  <?= $value->nama_kecamatan ?></li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email : <?php echo $value->email_pemilik ?></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <?php if($value->status == 4){ ?>
                  <a href="<?php echo base_url('dashboard/hapusPengajuan/'.$value->id_cafe) ?>" class="btn btn-sm bg-danger">
                    <i class="fas fa-trash"></i>
                  </a>
                   <a href="<?php echo base_url('dashboard/pengajuanDetail/'.$value->id_cafe) ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> Lihat Detail
                </a>
                <?php }else if($value->status == 3){ ?>
                  <button class="btn btn-sm btn-warning">
                    <i class="fas fa-user"></i> Menunggu Aktifasi Pengguna
                  </button>
                <?php }else{ ?>
                 <a href="<?php echo base_url('dashboard/pengajuanDetail/'.$value->id_cafe) ?>" class="btn btn-sm btn-success">
                  <i class="fas fa-user"></i> Lihat Detail Pengajuan
                </a>
              <?php } ?>
          
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</div>
</div>

</section>