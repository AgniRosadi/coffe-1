<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(<?= base_url('assets/') ?>images/bg_3.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">
                        Info Lanjut
                    </h1>
                    <h3>
                        Informasi mengenai pengajuan anda dapat dilihat disini!
                    </h3>
                </div>

            </div>
        </div>
    </div>
</section>
<br>
<section class="blog_area">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-md-12">

                    <form action="<?php echo base_url('user/pengajuanDetail/') ?>" class="form-group" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-10">
                                    <h4>Nomor Pengajuan</h4>
                                    <input type="text" class="form-control" id="nomor" name="id_otomatis" placeholder=""
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Coffe'"
                                        required class="single-input" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-10">
                                    <h4>NIK</h4>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder=""
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Pemilik Caffe'"
                                        required class="single-input" value="">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <a id="cari" class="btn btn-primary p-3 px-xl-4 py-xl-3">
                                    <h5>Cari Data Pengajuan</h5>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>