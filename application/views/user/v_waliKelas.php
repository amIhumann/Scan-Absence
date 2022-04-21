<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data <?php echo $title; ?>
                <button class="btn btn-primary float-right " data-toggle="modal" data-target="#Modaltambah"><i class="fa fa-plus"></i> Tambah <?php echo $title; ?></button>
            </h4>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">EMAIL</th>
                            <th style="text-align: center;">LEVEL</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $us) : ?>
                            <?php if ($us->level_user == "Wali Kelas") : ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no++ ?></td>
                                    <td style="text-align: center;"><?php echo $us->email_user ?></td>
                                    <td style="text-align: center;"><?php echo $us->level_user ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo base_url('walikelas/edit_user/' . $us->id_user); ?>"><button style="margin:5px;" title="Edit" class="btn-success btn"><i class="fa fa-edit"></i></button>
                                            <a href="<?php echo base_url('walikelas/hapus_user/' . $us->id_user); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
                                                <a href="<?php echo base_url('walikelas/detail_user/' . $us->id_user); ?>"><button style="margin:5px;" class="btn-info btn"><strong>Detail</strong></button>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="Modaltambah" tabindex="-1" aria-labelledby="ModaltambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModaltambahLabel">Tambah <?php echo $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('walikelas/tambah_user'); ?>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="hidden" name="id_user" class="form-control">
                        <input type="email" name="email_user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pwd_user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama_user" class="form-control">
                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01 ">Jurusan</label>
                        </div>
                        <select class="custom-select" name="id_jurusan" id="inputGroupSelect01">
                            <?php foreach ($jurusan as $jur) : ?>
								<option value="<?php echo $jur->id_jurusan; ?>"><?php echo $jur->nama_jurusan; ?></option>
							<?php endforeach ;?>
                        </select>
                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect02">Sekolah</label>
                        </div>
                        <select class="custom-select" name="id_sekolah" id="inputGroupSelect02">
                            <?php foreach ($sekolah as $sch) : ?>
								<option value="<?php echo $sch->id_sekolah; ?>"><?php echo $sch->nama_sekolah; ?></option>
							<?php endforeach ;?>
                        </select>
                    </div><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect03">Perusahaan</label>
                        </div>
                        <select class="custom-select" name="id_perusahaan" id="inputGroupSelect03">
                            <?php foreach ($perusahaan as $per) : ?>
								<option value="<?php echo $per->id_perusahaan; ?>"><?php echo $per->nama_perusahaan; ?></option>
							<?php endforeach ;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
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