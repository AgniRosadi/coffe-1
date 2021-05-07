<!--================Blog Area =================-->
<section class="ftco-section">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-80">
                    <h2 class="contact-title">Informasi Form Pengajuan</h2>
                </div>
            </div>
        </div>
        <br>

        <section class="blog_area section-padding">
            <div class="card" style="background-color: #0F0F11; border-color: white">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>DETAIL PENGAJUAN</h2>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="col-lg-8">
                            <form method="POST" action="<?php echo base_url('user/insertPengajuan') ?>"
                                class="form-group" enctype="multipart/form-data">
                                <div class="mt-10">
                                    <input class="form-control" type="hidden" name="password" placeholder="Nama cafe"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama cafe'" required
                                        readonly class="single-input" value="<?php echo $pengajuan['id_otomatis'] ?>">
                                </div>
                                <div class="mt-10">
                                    <p>Nama cafe</p>
                                    <input class="form-control" type="text" name="nama_cafe" placeholder="Nama cafe"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama cafe'" required
                                        class="single-input" value="<?php echo $pengajuan['nama_cafe'] ?>" readonly>
                                </div>
                                <div class="mt-10">
                                    <p>Nama pemilik cafe</p>
                                    <input class="form-control" type="text" name="nama_pemilik"
                                        placeholder="Nama Ketua cafe" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Nama Ketua cafe'" required class="single-input"
                                        value="<?php echo $pengajuan['nama_pemilik'] ?>" readonly>
                                </div>
                                <div class="mt-10">
                                    <p>NIK</p>
                                    <input class="form-control" type="text" name="nik" placeholder="masukan NIK"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama pemilik cafe'"
                                        required class="single-input" value="<?php echo $pengajuan['nik'] ?>" readonly>
                                </div>
                                <div class="mt-10">
                                    <p>Email pemilik cafe</p>
                                    <input class="form-control" type="email" name="email" placeholder="Email address"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'alamat Email'"
                                        required class="single-input" value="<?php echo $pengajuan['email_pemilik'] ?>"
                                        readonly>
                                </div>
                                <div class="mt-10">
                                    <p>Kecamatan</p>
                                    <input class="form-control" type="email" name="email" placeholder="Email address"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'alamat Email'"
                                        required class="single-input" value="<?php echo $pengajuan['nama_kecamatan'] ?>"
                                        readonly>
                                </div>
                                <div class="mt-10">
                                    <p>Kelurahan</p>
                                    <input class="form-control" type="email" name="email" placeholder="Email address"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'alamat Email'"
                                        required class="single-input" value="<?php echo $pengajuan['nama_kelurahan'] ?>"
                                        readonly>
                                </div>
                                <div class="mt-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>RT</p>
                                            <input class="form-control" type="number" name="rt" placeholder="RT"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'RT'"
                                                required class="single-input" value="<?php echo $pengajuan['rt'] ?>"
                                                readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <P>RW</P>
                                            <input class="form-control" type="number" name="rw" placeholder="RW"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'RW'"
                                                required class="single-input" value="<?php echo $pengajuan['rw'] ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group-icon mt-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Longitude</p>
                                            <input class="form-control" type="text" id="longitude" name="longitude"
                                                placeholder="Klik Pada Peta" onfocus="this.placeholder = ''" readonly
                                                onblur="this.placeholder = 'Tap pada Peta'" required
                                                class="single-input" value="<?php echo $pengajuan['longitude'] ?>"
                                                readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <P>Latitude</P>
                                            <input class="form-control" type="text" id="latitude" name="latitude"
                                                placeholder="Klik Pada Peta" onfocus="this.placeholder = ''" readonly
                                                onblur="this.placeholder = 'Klik Pada Peta'" required
                                                class="single-input" value="<?php echo $pengajuan['latitude'] ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="false"></i></div>
                                </div>
                                <div class="form-group mt-3">
                                    <a href="<?php echo base_url('user/cetakBukti/'.$pengajuan['id_otomatis']) ?>"
                                        type="submit" class="btn btn-primary p-3 px-xl-4 py-xl-3">Cetak Bukti</a>
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
                                        mendaftar.
                                    </p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="fab fa-btc"></i></span>
                                <div class="media-body">
                                    <p>Apabila sudah mendapat email konfirmasi pemilik caffe akan diberikan link untuk
                                        mengelola
                                        data caffenya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<!--================Blog Area =================-->