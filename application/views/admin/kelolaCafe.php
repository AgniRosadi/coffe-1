<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Caffe</h1>
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
          $status = 'Aktif';
          foreach ($kelola as $key => $value) {
            $id_cafe = $value->id_cafe;
          # code...
          $queryMenu = $this->db->query("SELECT COUNT(id_menu) as totalmenu from menu where id_cafe = $id_cafe")->row_array();
          ?>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                <?= $value->nama_cafe ?>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b> <?= $value->nama_pemilik ?></b></h2>
                                        <p class="text-muted text-sm"><b>Jumlah Menu </b>
                                        <p><?php echo $queryMenu['totalmenu']; ?></p>
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Alamat:
                                                <?= $value->nama_kelurahan ?>, <?= $value->nama_kecamatan ?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-email"></i></span> Email :
                                                <?php echo $value->email_pemilik ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img style="height: 100%; width:  100%;"
                                            src="<?php echo base_url('upload/cafe/'.$value->foto) ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="<?php echo base_url('dashboard/detailCafe/'.$value->id_cafe) ?>"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Lihat Detail
                                    </a>
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