<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(<?= base_url('assets/')?>images/bg_3.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">List Caffe</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user')?>">Home</a></span>
                        <span>Blog</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <?php foreach ($cafe as $key => $value) {
          # code...
         ?>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="<?= base_url('user/menu/'.$value->id_cafe)?>" class="block-20"
                        style="width: 400px; background-image: url('<?= base_url('upload/cafe/'.$value->foto)?>');">
                    </a>
                    <div class="text py-4 d-block">
                        <div class="meta">
                            <div><a
                                    href="<?= base_url('user/menu/'.$value->id_cafe)?>"><?php echo $value->nama_pemilik ?></a>
                            </div>
                            <div><a href="<?= base_url('user/menu/'.$value->id_cafe)?>" class="meta-chat"><span
                                        class="icon-plate"></span>3 menu</a></div>
                        </div>
                        <h3 class="heading mt-2"><a
                                href="<?= base_url('user/menu/'.$value->id_cafe)?>"><?php echo $value->nama_cafe ?></a>
                        </h3>
                        <p>Alamat caffe : Kecamatan <?php echo $value->nama_kecamatan ?></p>
                        <p>Desa <?php echo $value->nama_kelurahan ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>