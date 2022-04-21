<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary"><?php echo $title;?>
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
                            <th style="text-align: center;">EMAIL</th>
                            <th style="text-align: center;">JURUSAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no=1;
                        foreach($sekolah as $sch):?>
                        <?php if($sch->level_user !="Wali Kelas"):?>
                        <tr>
                            <td style="text-align: center;"><?php echo $no++?></td>
                            <td style="text-align: center;"><?php echo $sch->nama_user?></td>
                            <td style="text-align: center;"><?php echo $sch->email_user?></td>
                            <td style="text-align: center;"><?php echo $sch->nama_jurusan?></td>
                        </tr>
                        <?php endif ;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>