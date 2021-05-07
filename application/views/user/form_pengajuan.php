<section class="ftco-section">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-80">
                    <h2>Input Form Pengajuan</h2>
                </div>
            </div>
        </div>
        <br>
        <section class="blog_area section-padding">
            <div class="card" style="background-color: #0F0F11; border-color: white">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="contact-title">Masukan Data Penngajuan</h2>
                            <div><?= $this->session->flashdata('message'); ?></div>
                        </div>
                        <div class="col-lg-8">
                            <br>
                            <form action="<?php echo base_url('user/insertPengajuan') ?>" method="POST"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="" value="<?php echo $kode ?>" class="form-control" id=""
                                        name="password">
                                </div>
                                <div class="form-group">
                                    <label>Nama Cafe</label>
                                    <input type="text" class="form-control" id="" name="nama_cafe">
                                </div>
                                <div class="form-group">
                                    <label>Nama Pemilik Cafe</label>
                                    <input value="" type="text" class="form-control" id="" name="nama_pemilik">
                                </div>
                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control" id="pilihKec">
                                        <option style="background-color: #000 !important;" value="">--Pilih Kecamatan--
                                        </option>
                                        <?php 
                                      $no=0;
                                      foreach ($kecamatan as $key => $value) {
                                        ?>
                                        <option style="background-color: #000 !important;"
                                            value="<?php echo $value->id_kecamatan ?>">
                                            <?php echo $value->nama_kecamatan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Desa</label>
                                    <select class="form-control" id="pilihKel" name="kelurahan">
                                        <option style="background-color: #000 !important; ">--Pilih Desa--</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" id="" name="nik">
                                </div>
                                <label>Email Pemilik Cafe</label>
                                <input type="text" class="form-control" id="" name="email">
                                <div class="mt-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Klik Pada Peta Untuk Titik Lokasi</p>
                                            <div id="map" style="height: 250px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group-icon mt-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Longitude</p>
                                            <input type="text" id="longitude" name="longitude"
                                                placeholder="Klik Pada Peta" onfocus="this.placeholder = ''" readonly
                                                onblur="this.placeholder = 'Tap pada Peta'" required
                                                class="single-input">
                                        </div>
                                        <div class="col-md-6">
                                            <P>Latitude</P>
                                            <input type="text" id="latitude" name="latitude"
                                                placeholder="Klik Pada Peta" onfocus="this.placeholder = ''" readonly
                                                onblur="this.placeholder = 'Klik Pada Peta'" required
                                                class="single-input">
                                        </div>
                                    </div>
                                    <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="false"></i></div>
                                </div>
                                <div class="form-group">
                                    <label>KTP</label>
                                    <input type="file" class="form-control" id="" name="ktp">
                                </div>
                                <div class="form-group">
                                    <label>Foto Cafe</label>
                                    <input type="file" class="form-control" id="" name="foto">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control" id="" name="deskripsi">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <div class="row mb-4" style="text-align: center; justify-content: center;">
                                <h5>Syarat & Ketentuan Pengajuan</h5>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="fa fa-clock"></i></span>
                                <div class="media-body">
                                    <p>Usaha Caffe milik sendiri</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="fas fa-home"></i></span>
                                <div class="media-body">
                                    <p>Berletak di area Batang</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="fas fa-user"></i></span>
                                <div class="media-body">
                                    <p>Konfirmasi ijin publish akan dikirim melalui email yang tertera.</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="fas fa-sign-out-alt"></i></span>
                                <div class="media-body">
                                    <p>Email konfirmasi persetujuan akan dikirim dengan jangka waktu 3-5 hari setelah
                                        mendaftar.</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="fab fa-btc"></i></span>
                                <div class="media-body">
                                    <p>Apabila sudah mendapat email konfirmasi pemilik caffe akan diberikan link untuk
                                        mengelola data caffenya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>