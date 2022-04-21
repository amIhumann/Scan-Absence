<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>src/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href=" <?php echo base_url(); ?>src/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link href="<?php echo base_url(); ?>src/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?> https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=" <?php echo base_url(); ?>src/css/sb-admin-2.min.css" rel="stylesheet">
    <link href=" <?php echo base_url(); ?>src/css/style.css" rel="stylesheet">
    <link href=" <?php echo base_url(); ?>src/css/wadah.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>src/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <?php echo $map['js']; ?>
</head>

<body>
    <?php echo $map['html']; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>Form Jalan</h3>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo base_url('jalan/add') ?>" method="POST">
                            <div class="form-group">
                                <label for="nama_jalan">Nama Jalan</label>
                                <input type="text" name="nama_jalan" class="form-control" id="nama_jalan" placeholder="Jalan...">
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="latitude" placeholder="Latitude...">
                            </div>
                            <div class="form-group">
                                <label for="longtitude">Longtitude</label>
                                <input type="text" name="longtitude" class="form-control" id="longtitude" placeholder="Longtitude...">
                            </div>
                            <div class="form-group">
                                <label for="keterangan_jalan">Keterangan</label>
                                <textarea name="keterangan_jalan" class="form-control" id="keterangan_jalan"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpanJalan" class="btn btn-primary">Simpan</button>
                                <button type="reset" name="resetJalan" class="btn btn-warning">Reset</button>
                                <button type="button" name="updateJalan" class="btn btn-info" disabled="true">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>Daftar Jalan</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <th>NO</th>
                            <th>NAMA JALAN</th>
                            <th>LATITUDE</th>
                            <th>LONGTITUDE</th>
                            <th>AKSI</th>
                            <tbody id="daftarJalan">
                                <?php
                                $no = 1;
                                foreach ($itemJalan->result() as $jln) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $jln->nama_jalan; ?></td>
                                        <td><?php echo $jln->latitude; ?></td>
                                        <td><?php echo $jln->longtitude; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('jalan/edit/' . $jln->id_jalan); ?>"><button style="margin:5px;" title="Edit" class="btn-success btn"><i class="fa fa-edit"></i></button>
                                                <a href="<?php echo base_url('jalan/hapus/' . $jln->id_jalan); ?>" onclick="return confirm('Yakin untuk menghapus?');"><button style="margin:5px;" title="Hapus" class="btn-danger btn"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!DOCTYPE html>

</body>
<script>
    // $(document).on('click', '#simpanJalan', simpanJalan)
    //     .on('click', '#resetJalan', resetJalan)
    //     .on('click', '#updateJalan', updateJalan)
    //     .on('click', '#editJalan', editJalan)
    //     .on('click', '#hapusJalan', hapusJalan);

    // function simpanJalan() {
    //     var dataJalan = {
    //         'nama_jalan': $('#nama_jalan').val(),
    //         'keterangan_jalan': $('#keterangan_jalan').val(),
    //     };
    //     console.log(dataJalan);
    //     $.ajax({
    //         url: <?php echo site_url("jalan/add"); ?>,
    //         data: dataJalan,
    //         dataType: 'json',
    //         type: 'POST',
    //         success: (data, status) => {
    //             if (data.status != 'error') {
    //                 $('#daftarJalan').load('<?php echo current_url() . "#daftarJalan > *"; ?>');
    //             } else {
    //                 alert(data.msg);
    //             }
    //         },
    //         error: (x, t, m) => {
    //             alert(x.responseText);
    //         }
    //     })
    // }

    // function resetJalan() {

    // }

    // function updateJalan() {

    // }

    // function editJalan() {

    // }

    // function hapusJalan() {

    // }
</script>
<script src="<?php echo base_url() ?>src/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>src/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>src/js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url() ?>src/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>src/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>src/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>src/js/demo/chart-pie-demo.js"></script>
<script src="<?php echo base_url() ?>src/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>src/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>src/js/demo/datatables-demo.js"></script>

</html>