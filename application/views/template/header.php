


<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <div class="waktu" style="left:45%;">
                    <div id="jam">00</div>
                    <span>:</span>
                    <div id="menit">00</div>
                    <span>:</span>
                    <div id="detik">00</div>
                </div>
                <script>
                    var jam=document.getElementById('jam');
                    var menit=document.getElementById('menit');
                    var detik=document.getElementById('detik');
                    function waktu(){
                            var d=new Date();  
                            var h=d.getHours();
                            var m=d.getMinutes();
                            var s=d.getSeconds();
                            h = cekWaktu(h);
                            m = cekWaktu(m);
                            s = cekWaktu(s);
                            jam.textContent=h;
                            menit.textContent=m;
                            detik.textContent=s;
                        }
                        function cekWaktu(i){
                            if(i<10){
                                i="0"+i
                            }
                            return i;
                        }
                    var waktu = setInterval(waktu);
                </script>
        
                <!-- Nav Item - Alerts -->

                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-3 d-none d-lg-inline text-gray-900 small"><?php echo $users['nama_user'];?></span>
                        <img class="img-profile rounded-circle" src="<?php if (!empty($this->session->userdata('foto'))) {echo base_url('src/img/').$users['foto'];}else{echo base_url('src/img/user.png');} ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('user/profile');?>">
                            <i class="fas fa-user fa-lg fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-lg fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        