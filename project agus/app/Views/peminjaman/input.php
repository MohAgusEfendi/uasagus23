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

            <form action="<?php echo $action; ?>" method="post">
                <div class="card-body">
                    <?php if(validation_errors()) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            <?php echo validation_list_errors() ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if(session()->getFlashdata('error')) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-warning"></i> Error</h5>
                                <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php echo csrf_field() ?>
                    <?php
                    if(current_url(true)->getSegment(2) =='edit'){
                        ?>
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_peminjaman']; ?>">
                        <?php
                    }
                    ?>
                    <div class="form-group">
                            <label for="id_peminjaman">ID NAMA</label>
                            <input type="text" name="id_peminjaman" id="id_peminjaman" value="<?php echo empty(set_value('id_peminjaman')) ? (empty($edit_data['id_peminjaman']) ?"":$edit_data['id_peminjaman']) : set_value('id_peminjaman'); ?>" class ="form-control">
                    </div>
                    <div class="form-group">
                            <label for="nama_peminjam">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" id="nama_peminjam" value="<?php echo empty(set_value('nama_peminjam')) ? (empty($edit_data['nama_peminjam']) ?"":$edit_data['nama_peminjam']) : set_value('nama_peminjam'); ?>" class ="form-control">
                    </div>
                    <div class="form-group">
                            <label for="tgl_peminjaman">Tanggal Peminjaman</label>
                            <input type="text" name="tgl_peminjaman" id="tgl_peminjaman" value="<?php echo empty(set_value('tgl_peminjaman')) ? (empty($edit_data['tgl_peminjaman']) ? "":$edit_data['tgl_peminjaman']) : set_value('tgl_peminjaman') ; ?>"class ="form-control">
                    </div>
                    <div class="form-group">
                            <label for="tgl_kem">Tanggal Kembali</label>
                            <input type="text" name="tgl_kem" id="tgl_kem" value="<?php echo empty(set_value('tgl_kem')) ? (empty($edit_data['tgl_kem']) ? "":$edit_data['tgl_kem']) : set_value('tgl_kem') ; ?>"class ="form-control">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
echo $this->endSection();
