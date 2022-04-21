<div class="container-fluid">
    <section class="cpntent">
        <!-- Page Heading -->
        <h2 class="sidebar-brand-text mx-3"><?php echo $title; ?></h2>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <img src="<?php echo base_url(); ?>src/img/<?php echo $detail->upload_foto ?>" width="200" height="170">
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <th>Keterangan Izin</th>
                            <td><?php echo $detail->keterangan_izin ?></td>
                        </tr>
                        <tr style="text-align: center;">
                            <th>Perkiraan Masuk</th>
                            <td><?php echo $detail->tgl_akhir ?></td>
                        </tr>
                    </table>
                    <a href="<?php echo base_url('user/riwayat')?>"><button class="btn btn-danger btn-lg" title="Kembali"><i class="fas fa-angle-double-left"></i></button></a>
                </div>
            </div>
        </div>
    </section>
</div>