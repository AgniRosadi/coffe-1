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
        <div class="row mr-2">
            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Caffe yang terdaftar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Coffe</th>
                                <th>Nama Coffe</th>
                                <th>Nama Pemilik</th>
                                <th>Email</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kelola as $k) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $k->id_otomatis ?></td>
                                <td><?= $k->nama_cafe ?></td>
                                <td><?= $k->nama_pemilik ?></td>
                                <td><?= $k->email_pemilik ?></td>
                                <td><?= $k->longitude ?></td>
                                <td><?= $k->latitude ?></td>
                                <td><a href="<?= base_url('') . $k->id_cafe  ?>" class="badge badge-danger">Hapus
                                        data</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            <?php endforeach ?>
                        </tbody>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    </div>