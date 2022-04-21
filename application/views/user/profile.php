<div class="card mb-5" style="max-width: 540px; margin:auto; ">
  <div class="row no-gutters">
    
    <div class="col-md-12">
      <div class="card-body">
      <form enctype="multipart/form-data" method="post" action="<?php if($users['level_user']=="Admin"){
        echo base_url('user/update_user');}
        else if($users['level_user']=="Wali Kelas"){
          echo base_url('walikelas/update_user');}
          else{
             echo base_url('siswa/update_user');
          }
        ?>">
      <center><img src="<?php echo base_url('src/img/').$users['foto']; ?>" style="width:200px;"></center>
      <div class="form-group">
            <h5 class="card-title"><b>Nama</b></h5>
            <input type="hidden" name="id_user" class="form-control" value="<?php echo $users['id_user']; ?>">
            <input type="hidden" name="id_jurusan" class="form-control" value="<?php echo $users['id_jurusan']; ?>">
            <input type="hidden" name="id_sekolah" class="form-control" value="<?php echo $users['id_sekolah']; ?>">
            <input type="hidden" name="id_perusahaan" class="form-control" value="<?php echo $users['id_perusahaan']; ?>">
            <input type="hidden" name="pwd_user" class="form-control" value="<?php echo $users['pwd_user']; ?>">
            <input type="hidden" name="nis" class="form-control" value="<?php echo $users['nis']; ?>">
            <input type="text" name="nama_user" class="form-control" value="<?php echo $users['nama_user'];?>">
      </div>
      <div class="form-group" style="margin-bottom: 20px;">
            <h5 class="card-title"><b>Email</b></h5>
            <input type="text" name="email_user" class="form-control" value="<?php echo $users['email_user'];?>">
      </div>
      <div class="form-group">
            <h5 class="card-title"><b>Foto</b></h5>
            <input type="file" name="foto" class="form-control" value="">
      </div>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
      <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-success float-right btn-lg"><i class="far fa-save"> Simpan</i></button></a>
      </form>
    </div>
  </div>
</div>