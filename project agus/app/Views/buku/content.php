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
                  <?php
                  if(session()->getFlashdata('success')) {
                  ?>
                      <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success</h5>
                            <?php echo session()->getFlashdata('success'); ?>
                      </div>
                  <?php
                  }
                  ?>

                  <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>/buku/tambah"><i class="fa-solid fa-plus"></i> Tambah buku</a>
                  <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Id Buku</th>
                      <th>Nama Buku</th>
                      <th>Judul buku</th>
                      <th>Pengarang</th>
                      <th>Penerbit</th>
                      <th>Tahun</th>
                      <th>Aksi</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($data_databuku as $r) {

                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>                             
                        <td><?php echo $r['id_buku']; ?></td>
                        <td><?php echo $r['nama_buku']; ?></td>
                        <td><?php echo $r['judul_buku']; ?></td>
                        <td><?php echo $r['pengarang']; ?></td>
                        <td><?php echo $r['penerbit']; ?></td>
                        <td><?php echo $r['tahun']; ?></td>
                        <td>
                          <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/buku/edit/<?php echo $r['id_buku']; ?>"><i class="fa-solid fa-edit"></i></a>
                          <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['id_buku'];?>);"><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php
                      $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>  
              <!-- /.card-body -->
            </div>
        <!-- /.card -->
    </div>
</div>

<script>
  function hapusConfig(id){
    Swal.fire({
        title: 'Anda yakin akan menghapus data ini?',
        text: "Data akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?php echo base_url(); ?>/buku/hapus/' +id;
        }
    })
  }
</script>
<?php 
echo $this->endSection();