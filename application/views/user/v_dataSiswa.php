<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data <?php echo $title; ?></h4>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">NAMA</th>
                            <th style="text-align: center;">NAMA PERUSAHAAN</th>
                            <th style="text-align: center;">NIS</th>
                            <th style="text-align: center;">EMAIl</th>
                            <th style="text-align: center;">CEK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($riwayat as $us) : ?>
                            <?php if ($us->level_user == "Siswa") : ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $us->nama_user ?></td>
                                    <td style="text-align: center;"><?php echo $us->nama_perusahaan ?></td>
                                    <td style="text-align: center;"><?php echo $us->nis ?></td>
                                    <td style="text-align: center;"><?php echo $us->email_user ?></td>
                                    <td style="text-align: center;">
                                    <a href="<?php echo base_url('walikelas/riwayat_siswa/' . $us->id_user); ?>"><button style="margin:5px;" class="btn-danger btn"><strong><i class="fas fa-history"> Riwayat</i></strong></button>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>