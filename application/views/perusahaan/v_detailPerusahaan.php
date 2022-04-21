<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary"><?php echo $title;?>
            <a href=" <?php echo base_url('perusahaan') ?>"><button style="margin:0px 5px;" class="btn btn-danger float-right" title="Kembali"><i class="fas fa-angle-double-left"></i></button></a></h4>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">NAMA</th>
                            <th style="text-align: center;">EMAIL</th>
                            <th style="text-align: center;">NIS</th>
                            <th style="text-align: center;">Sekolah</th>
                            <th style="text-align: center;">Jurusan</th>
                            <th style="text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no=1;
                        foreach($perusahaan as $per):?>
                        <?php if($per->level_user !="Wali Kelas"):?>
                        <tr>
                            <td style="text-align: center;"><?php echo $no++?></td>
                            <td style="text-align: center;"><?php echo $per->nama_user?></td>
                            <td style="text-align: center;"><?php echo $per->email_user?></td>
                            <td style="text-align: center;"><?php echo $per->nis?></td>
                            <td style="text-align: center;"><?php echo $per->nama_sekolah?></td>
                            <td style="text-align: center;"><?php echo $per->nama_jurusan?></td>
                            <td style="text-align: center;"><a class="btn btn-info" href="<?php echo base_url('perusahaan/riwayatSiswa/'.$per->id_user); ?>"><i class="fas fa-history"></i> Riwayat</a></td>
                        </tr>
                        <?php endif;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>