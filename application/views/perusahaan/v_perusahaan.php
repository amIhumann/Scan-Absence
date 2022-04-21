<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Perusahaan
                <a href="<?php echo base_url('perusahaan/tambah_perusahaan/'); ?>"><button title="Tambah" class="btn btn-primary float-right"><i class="fa fa-plus"> Tambah Perusahaan</i></button></a>
            </h4>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">NAMA</th>
                            <th style="text-align: center;">ALAMAT</th>
                            <th style="text-align: center;">LOGO</th>
                            <th style="text-align: center;">QR CODE</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($unit as $un) : ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $no++ ?></td>
                                <td style="text-align: center;"><?php echo $un->nama_perusahaan ?></td>
                                <td style="text-align: center;"><?php echo $un->alamat_perusahaan ?></td>
                                <td style="text-align: center;"><img src="<?php echo base_url(); ?>src/img/<?php echo $un->logo_perusahaan ?>" width="100px"></td>
                                <td style="text-align: center;"><img src="<?php echo base_url(); ?>src/img/company/<?php echo $un->qr_code ?>" width="100px"></td>
                                <td style="text-align: center;">
                                    <a href="<?php echo base_url('perusahaan/edit_perusahaan/' . $un->id_perusahaan); ?>"><button style="margin:5px;" title="Edit" class="btn-success btn"><i class="fa fa-edit"></i></button>
                                        <a href="<?php echo base_url('perusahaan/hapus_perusahaan/' . $un->id_perusahaan); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
                                            <a href="<?php echo base_url('perusahaan/detail_perusahaan/' . $un->id_perusahaan); ?>"><button style="margin:5px;" class="btn-info btn"><strong>Data</strong></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modaltambah" tabindex="-1" aria-labelledby="ModaltambahLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 80%;">
            <div class=" modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModaltambahLabel">Tambah Perusahaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('perusahaan/tambah_perusahaan'); ?>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nama Perusahaan</label>
                            <input type="hidden" name="id_perusahaan" class="form-control">
                            <input type="text" name="nama_perusahaan" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>Logo</label>
                            <input type="file" name="logo_perusahaan" class="form-control">
                        </div>
                    </div>
                    <!-- <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect02">Level</label>
                        </div>
                        <select class="custom-select" name="level_user" id="inputGroupSelect02">
                            <option selected>Admin</option>
                        </select>
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