<script src="<?= base_url() ?>src/js/sweetalert2.all.min.js"></script>
<div class="col-md-12">
  <video id="preview" width="100%"></video>
</div>
<form enctype="multipart/form-data" method="post" action="<?php echo base_url('absensi/absen'); ?>" id="forms">
  <input type="hidden" name="id_user" class="form-control" value="<?php echo $users['id_user']; ?>">
  <input type="hidden" name="id_sekolah" class="form-control" value="<?php echo $users['id_sekolah']; ?>">
  <input type="hidden" name="id_perusahaan" class="form-control" value="<?php echo $users['id_perusahaan']; ?>">
  <input type="hidden" name="jam_masuk" class="form-control" value="<?php echo date('H:i:s'); ?>">
  <input type="hidden" name="tgl" class="form-control" value="<?php echo date('d-m-Y'); ?>">
  <input type="hidden" name="keterangan" class="form-control" value="<?php
                                                                      if (date('H:i:s') > date('07:30:00')) {
                                                                        echo "Terlambat";
                                                                      } else {
                                                                        echo "Masuk";
                                                                      } ?>">
</form>
<?php foreach ($cek as $c) : ?>
  <input type="hidden" name="qr_code" id="qr_code" value="<?php echo $c->qr_code; ?>">
<?php endforeach; ?>
<script src="<?= base_url('src/js/') ?>instascan.min.js"></script>
<script type="text/javascript">
  let scanner = new Instascan.Scanner({
    video: document.getElementById('preview')
  });
  scanner.addListener('scan', function(content) {
    if (content == document.getElementById('qr_code').value) {
      for (let i = 0; i < document.forms.length; i++) {
        document.forms[i].submit()
      }
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'QR code tidak sama!',
        footer: '<a href="<?= base_url('user') ?>">Kembali?</a>'
      })
    }
  });
  Instascan.Camera.getCameras().then(function(cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      alert('No cameras found');
    }
  }).catch(function(e) {
    console.error(e);
  });
</script>