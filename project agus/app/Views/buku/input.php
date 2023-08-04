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
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_buku']; ?>">
                        <?php
                    }
                    ?>
                    <div class="form-group">
                            <label for="id_buku">ID BUKU</label>
                            <input type="text" name="id_buku" id="id_buku" value="<?php echo empty(set_value('id_buku')) ? (empty($edit_data['id_buku']) ?"":$edit_data['id_buku']) : set_value('id_buku'); ?>" class ="form-control">
                    </div>
                    <div class="form-group">
                            <label for="nama_buku">Nama Buku</label>
                            <input type="text" name="nama_buku" id="nama_buku" value="<?php echo empty(set_value('nama_buku')) ? (empty($edit_data['nama_buku']) ?"":$edit_data['nama_buku']) : set_value('nama_buku'); ?>" class ="form-control">
                    </div>
                    <div class="form-group">
                            <label for="judul_buku">Judul Buku</label>
                            <input type="text" name="judul_buku" id="judul_buku" value="<?php echo empty(set_value('judul_buku')) ? (empty($edit_data['judul_buku']) ? "":$edit_data['judul_buku']) : set_value('judul_buku') ; ?>"class ="form-control">
                    </div>
                    <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" name="pengarang" id="pengarang" value="<?php echo empty(set_value('pengarang')) ? (empty($edit_data['pengarang']) ? "":$edit_data['pengarang']) : set_value('pengarang') ; ?>"class ="form-control">
                    </div>
                    <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" name="penerbit" id="penerbit" value="<?php echo empty(set_value('penerbit')) ? (empty($edit_data['penerbit']) ? "":$edit_data['penerbit']) : set_value('penerbit') ; ?>"class ="form-control">
                    </div>
                    <div class="form-group">
                            <label for="tahun">tahun</label>
                            <input type="text" name="tahun" id="tahun" value="<?php echo empty(set_value('tahun')) ? (empty($edit_data['tahun']) ? "":$edit_data['tahun']) : set_value('tahun') ; ?>"class ="form-control">
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
