    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                            </div>
                            <form enctype="multipart/form-data" class="user" method="post" action="<?php echo base_url('auth/register');?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="nama_user"
                                        placeholder="Nama Lengkap" value="<?php echo set_value('nama_user');?>">
                                        <?php echo form_error('nama_user','<small class="text-danger pl-3">','</small>')?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email_user"
                                        placeholder="Alamat Email" value="<?php echo set_value('email_user');?>">
                                    <?php echo form_error('email_user','<small class="text-danger pl-3">','</small>')?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password1" name="password1" placeholder="Password">
                                        <?php echo form_error('password1','<small class="text-danger pl-3">','</small>')?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Ulangi Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="nis" name="nis"
                                        placeholder="Nomor Induk Sekolah" value="<?php echo set_value('nis');?>">
                                        <?php echo form_error('nis','<small class="text-danger pl-3">','</small>')?>
                                </div>
                                <div class="input-group mb-4 col-sm-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
                                    </div>
                                    <select class="custom-select" name="id_jurusan" id="inputGroupSelect01">
                                        <?php foreach ($jurusan as $jur) : ?>
                                            <option value="<?php echo $jur->id_jurusan; ?>"><?php echo $jur->nama_jurusan; ?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </div>
                                <div class="input-group mb-0 col-sm-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">Sekolah</label>
                                    </div>
                                    <select class="custom-select" name="id_sekolah" id="inputGroupSelect02">
                                        <?php foreach ($sekolah as $sch) : ?>
                                            <option value="<?php echo $sch->id_sekolah; ?>"><?php echo $sch->nama_sekolah; ?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </div>
                                <div class="input-group mb-0 col-sm-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect03">Perusahaann</label>
                                    </div>
                                    <select class="custom-select" name="id_perusahaan" id="inputGroupSelect03">
                                        <?php foreach ($perusahaan as $per) : ?>
                                            <option value="<?php echo $per->id_perusahaan; ?>"><?php echo $per->nama_perusahaan; ?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar Sekarang
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth'); ?>">Sudah Memiliki Akun? Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>