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
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">EMAIL</th>
                            <th style="text-align: center;">LEVEL</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $us) : ?>
                            <?php if ($us->level_user == "Admin") : ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no++ ?></td>
                                    <td style="text-align: center;"><?php echo $us->email_user ?></td>
                                    <td style="text-align: center;"><?php echo $us->level_user ?></td>
                                    
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
    

    <!-- <div class="modal fade" id="Modaldelete" tabindex="-1" aria-labelledby="ModaldeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModaldeleteLabel" >Apakah Anda Ingin Menghapus Data ini?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>                            -->


</div>
<script type="text/javascript">
    window.print();
</script>