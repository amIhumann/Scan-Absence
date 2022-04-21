<div class="container-fluid">
    <section class="cpntent">
        <!-- Page Heading -->
        <h2 class="sidebar-brand-text mx-3"><?php echo $title; ?></h2>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <img src="<?php echo base_url(); ?>src/img/<?php echo $detail->foto ?>" width="200" height="170">
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <th>Nama</th>
                            <td><?php echo $detail->nama_user ?></td>
                        </tr>
                        <?php if($detail->level_user !="Admin"):?>
                        <?php if($detail->level_user !="Wali Kelas"):?>
                        <tr style="text-align: center;">
                            <th>NIS</th>
                            <td><?php echo $detail->nis ?></td>
                        </tr>
                        <?php endif ;?>
                        <tr style="text-align: center;">
                            <th>Sekolah</th>
                            <td><?php echo $detail->nama_sekolah; ?></td>
                        </tr>
                        <tr style="text-align: center;">
                            <th>Jurusan</th>
                            <td><?php echo $detail->nama_jurusan ?></td>
                        </tr>
                        <tr style="text-align: center;">
                            <th>Perusahaan</th>
                            <td><?php echo $detail->nama_perusahaan; ?></td>
                        </tr>
                        <?php endif ;?>
                    </table>
                    <a href=" <?php if ($detail->level_user == "Admin") {
                                    echo base_url('user/admin');
                                } else if ($detail->level_user == "Wali Kelas") {
                                    echo base_url('walikelas/index');
                                } else {
                                    echo base_url('siswa/index');
                                } ?>"><button class="btn btn-danger btn-lg" title="Kembali"><i class="fas fa-angle-double-left"></i></button></a>
                </div>
            </div>
        </div>
    </section>
</div>