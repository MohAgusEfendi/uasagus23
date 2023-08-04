<?php 
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <?php echo $selamat_datang?>
              </div> 
              <!-- /.card-body -->
              <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>25</h3>

                <p>BERANDA</p>
              </div>
              <div class="icon">
                <i class="fa fa-house"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>35<sup style="font-size: 20px">%</sup></h3>

                <p>PETUGAS</p>
              </div>
              <div class="icon">
                <i class="fa-regular fa-address-card"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>150<sup style="font-size: 20px">%</sup></h3>

                <p>PEMINJAMAN</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-hand-holding-dollar"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>500<sup style="font-size: 20px">%</sup></h3>

                <p>BUKU</p>
              </div>
              <div class="icon">
                <i class="pa-solid fa-users-line"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
            </div>
        <!-- /.card -->
    </div>
    
</div>
<?php 
echo $this->endSection();