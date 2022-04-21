<div class="container-fluid">
    <section class="cpntent">
        <!-- Page Heading -->
        <h2 class="sidebar-brand-text mx-3"><?php echo $title; ?></h2>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0">
                    <?php foreach ($detail as $us) : ?>
                            
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <img src="<?php echo base_url(); ?>src/img/<?php echo $us->upload_foto ?>" width="200" height="170">
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <th>Keterangan Izin</th>
                            <td><?php echo $us->keterangan_izin ?></td>
                        </tr>
                        <tr style="text-align: center;">
                            <th>Perkiraan Masuk</th>
                            <td><?php echo $us->tgl_akhir ?></td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>