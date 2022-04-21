<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                    </div>
                                    <?php echo $this->session->flashdata('pesan'); ?>
                                    <form class="user" method="post" action="<?php echo base_url('auth');?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="email_user" name="email_user"
                                                placeholder="Enter Email Address..." value="<?php echo set_value('email_user');?>">
                                            <?php echo form_error('email_user','<small class="text-danger pl-3">','</small>')?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="pwd_user" name="pwd_user" placeholder="Password">
                                            <?php echo form_error('pwd_user','<small class="text-danger pl-3">','</small>')?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth/register');?>">Buat Akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    