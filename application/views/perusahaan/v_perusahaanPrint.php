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
                            <th style="text-align: center;">MASUK</th>
                            <th style="text-align: center;">TANGGAL</th>
                            <th style="text-align: center;">KETERANGAN</th>
                            <th style="text-align: center;">PERKIRAAN MASUK</th>
                            <th style="text-align: center;">KETERANGAN IZIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($perusahaan as $us) : ?>
                            <?php if ($us->level_user == "Siswa") : ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $us->jam_masuk ?></td>
                                    <td style="text-align: center;"><?php echo $us->tgl ?></td>
                                    <td style="text-align: center;"><?php echo $us->keterangan ?></td>
                                    <td style="text-align: center;"><?php echo $us->tgl_akhir ?></td>
                                    <td style="text-align: center;"><?php echo $us->keterangan_izin ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>