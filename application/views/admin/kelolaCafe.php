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
                    <th>Hapus</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                    <td>delete</i></td>
                  </tr>
            
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              </div>
          </div>
        </div>