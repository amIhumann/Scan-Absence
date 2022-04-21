<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>
    <br>
    <section class="content">
        <?php foreach ($user as $us) { ?>
            <form enctype="multipart/form-data" action="<?php if($us->level_user == "Admin"){
                echo base_url('user/update_user');
            }else if($us->level_user == "Wali Kelas"){
                echo base_url('walikelas/update_user');
            }else{
                echo base_url('siswa/update_user');
            } ?>" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="hidden" name="id_user" class="form-control" value="<?php echo $us->id_user ?>">
                    <input type="text" name="email_user" class="form-control" value="<?php echo $us->email_user ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="pwd_user" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama_user" class="form-control" value="<?php echo $us->nama_user ?>">
                </div>
                <?php if($us->level_user != "Admin"):?>
                <?php if($us->level_user != "Wali Kelas"):?>
                <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" value="<?php echo $us->nis ?>">
                </div>
                <?php endif;?>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
                    </div>
                    <select class="custom-select" name="id_jurusan" class="form-control" id="inputGroupSelect01" value="<?php echo $us->id_jurusan ?>">
                    <?php foreach($jurusan as $jur){?>
                        <option value="<?php echo $jur->id_jurusan?>" <?php if ($jur->id_jurusan == $us->id_jurusan ) echo "selected" ?>><?php echo $jur->nama_jurusan?></option>
                    <?php }?>
                    </select>
                </div><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect02">Sekolah</label>
                    </div>
                    <select class="custom-select" name="id_sekolah" class="form-control" id="inputGroupSelect02" value="<?php echo $us->id_sekolah ?>">
                    <?php foreach($sekolah as $sch){?>
                        <option value="<?php echo $sch->id_sekolah?>" <?php if ($sch->id_sekolah == $us->id_sekolah ) echo "selected" ?>><?php echo $sch->nama_sekolah?></option>
                    <?php }?>
                    </select>
                </div><br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect03">Perusahaan</label>
                    </div>
                    <select class="custom-select" name="id_perusahaan" class="form-control" id="inputGroupSelect03" value="<?php echo $us->id_perusahaan ?>">
                    <?php foreach($perusahaan as $per){?>
                        <option value="<?php echo $per->id_perusahaan?>" <?php if ($per->id_perusahaan == $us->id_perusahaan ) echo "selected" ?>><?php echo $per->nama_perusahaan?></option>
                    <?php }?>
                    </select>
                </div>
                <?php endif;?>
                <br>
                <img src="<?php echo base_url(); ?>src/img/<?php echo $us->foto ?>" width="250px"><br><br>
                <div class="form-group">
                    <input type="file" name="foto" class="form-control" value="<?php echo $us->foto ?>">
                </div>
                <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-primary float-right btn-lg"><i class="far fa-paper-plane"> Simpan</i></button></a>
                <a href="<?php if ($us->level_user == "Admin") {
                                echo base_url('user/admin');
                            } else if ($us->level_user == "Wali Kelas") {
                                echo base_url('walikelas/index');
                            } else {
                                echo base_url('siswa/index');
                            } ?>" style="margin:10px;" class="btn btn-danger float-right btn-lg"><i class="fas fa-angle-double-left"></i></a>

            </form>
        <?php } ?>
    </section>
</div>