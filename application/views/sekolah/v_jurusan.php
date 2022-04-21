<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Jurusan
                <button class="btn btn-primary float-right " data-toggle="modal" data-target="#Modaltambah"><i class="fa fa-plus"></i> Tambah Jurusan</button>
            </h4>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">NAMA JURUSAN</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($unit as $un) : ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no++ ?></td>
                                    <td style="text-align: center;"><?php echo $un->nama_jurusan ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo base_url('jurusan/edit_jurusan/' . $un->id_jurusan); ?>"><button style="margin:5px;" title="Edit" class="btn-success btn"><i class="fa fa-edit"></i></button>
                                        <a href="<?php echo base_url('jurusan/hapus_jurusan/' . $un->id_jurusan); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modaltambah" tabindex="-1" aria-labelledby="ModaltambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModaltambahLabel">Tambah Jurusan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('jurusan/tambah_jurusan'); ?>
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <input type="hidden" name="id_jurusan" class="form-control">
                        <input type="text" name="nama_jurusan" class="form-control">
                    </div>
                    <!-- <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat_perusahaan" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect02">Level</label>
                        </div>
                        <select class="custom-select" name="level_user" id="inputGroupSelect02">
                            <option selected>Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo_perusahaan" class="form-control">
                    </div> -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>