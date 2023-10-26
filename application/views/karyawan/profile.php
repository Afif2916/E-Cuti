<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-Cuti</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url(); ?>user">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-calendar"></i>
                    <span>Pengajuan Cuti</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url(); ?>user/pengajuan_cuti">Pengajuan Cuti</a>
                        <a class="collapse-item" href="<?= base_url(); ?>user/list_pengajuan_cuti">List Pengajuan Cuti</a>
                    </div>
                </div>
            </li>
            

            

         

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-database"></i>
                    <span>Data Pengajuan Cuti</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url(); ?>user/data_pengajuan_cuti">Data Cuti</a>
                        
                    </div>
                </div>
            </li>

            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url(); ?>/assets/img/profile.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url(); ?>user/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url(); ?>user/changepassword">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
                        
                    </div>
                   
                    <div class="card shadow mb-4 row justify-content-center card-body">
                        <div class="card-body text-center ">
                        <img src="<?= base_url(); ?>/assets/img/profile.jpg" class="img-profile rounded-circle"  style="width: 100px; height:300px padding:auto ">
                        <hr>
                        <h3>Profil Anda</h3>
                        <?= $this->session->flashdata('message') ?>
                        </div>
                        <hr>
                        <div class="col-12 mt-xl-auto">
                            <h3 class="h4">NIP : <?= $user['nip'] ?> </h3>
                            <h3 class="h4">Nama : <?= $user['nama'] ?> </h3>
                            <h3 class="h4">Email : <?= $user['email'] ?> </h3>
                            <h3 class="h4">tanggal Lahir : <?= $user['tgl_lahir'] ?> </h3>
                            <h3 class="h4">Jabatan : <?= $user['jabatan'] ?> </h3>
                            <h3 class="h4">Jumlah Cuti : <?= $user['jumlah_cuti'] ?> </h3>
                        </div>
                        <div class="d-flex justify-content-end">
                        <button class="btn btn-success" data-toggle="modal" data-target="#updateModal">Update Profil</button>
                        </div>
                    </div>


                    <div class="modal fade bd-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Update Profil</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                                 </div>
                                    <div class="modal-body">
                                    <form method="POST" action="<?= base_url('user/profile');?>">
                                
                                <div class="row gx-3 input-group">
                                  
                                    
                                </div>
                                <div class="mb-3">
                                  <label class="small mb-1"> Nip</label>
                                  <input class="form-control" id="nip" type="text"  aria-label="Default Select Sample" name="nip" value="<?= $user['nip'] ?>" readonly>
                                    </input>
                                    
                              </div>
                              <div class="mb-3">
                                  <label class="small mb-1"> Email</label>
                                  <input class="form-control" id="alasan_cuti" type="text" placeholder="Masukan Email Baru" aria-label="Default Select Sample" name="email">
                                    </input>
                                    <?= form_error('email','<small class="text-danger pl-3">','</small>' ); ?>
                              </div>
                              
                              <div class="mb-3">
                                  <label class="small mb-1"> Jabatan</label>
                                  <select class="form-control" id="" type="text" placeholder="Masukan Jabatan Baru" aria-label="Default Select Sample" name="jabatan">
                                      <option selected disabled> Jabatan :</option>
                                      <option value="HRD">HRD</option>
                                      <option value="Head Supervisor & OEM CPE">Head Supervisor & OEM CPE </option>
                                      <option value="Head Engineer">Head Engineer</option>
                                      <option value="Head Admin">Head Admin</option>
                                      <option value="Engineer">Engineer</option>
                                      <option value="Admin">Admin</option>
                                    </select>
                              </div>
                              <hr>
                              <div class="d-flex justify-content-end">
                                  <button class="btn btn-success" type="submit" >Update</button>
                              </div>
                                 
                              
                          </form>
                        </div>
                    </div>
                </div>
            </div>
                    



















                </div>

            </div>
                <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Afif & Alfandi</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url(); ?>auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>