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
                <a class="nav-link" href="<?= base_url(); ?>supervisor">
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
                        <a class="collapse-item active" href="<?= base_url(); ?>Supervisor/pengajuan_cuti">Pengajuan Cuti</a>
                        <a class="collapse-item" href="<?= base_url(); ?>Supervisor/list_pengajuan_cuti">List Pengajuan Cuti</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseApprCuti"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-calendar-check"></i>
                    <span>Approval Cuti</span>
                </a>
                <div id="collapseApprCuti" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url(); ?>Supervisor/appr_cuti">ApprovalCuti</a>
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
                    <a class="collapse-item" href="<?= base_url(); ?>Supervisor/data_pengajuan_cuti">Data Cuti</a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $pegawai['nama'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url(); ?>/assets/img/profile.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url(); ?>supervisor/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url(); ?>supervisor/changepassword">
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
                <div class="container  card shadow mb-4">

                    <!-- Page Heading -->
                    <br>
                    <div>
                        <h1 class="text-gray-800 text-center" >Ganti Password</h1>
                    </div>
                    <hr>
                    <?= $this->session->flashdata('message') ?>

                    

                    <!-- Content Row -->
                    <div class="row justify-content-center card-body">
                      <div class=" tab-content col-xxl-6 col-xl-8">
                          <form method="POST" action="<?= base_url('supervisor/changePassword');?>">
                              <div class="mb-3">
                                  <label class="small mb-1"> Password Saat Ini</label>
                                  <input class="form-control" id="cureent_password" type="password" placeholder="Password Saat Ini" aria-label="Default Select Sample" name="current_password">
                                </input>
                                <?= form_error('current_password','<small class="text-danger pl-3">','</small>' ); ?>
                              </div>

                              <div class="mb-3">
                                  <label class="small mb-1">Masukan Password Baru</label>
                                  <input class="form-control" id="new_password" type="password" placeholder="Password Baru" aria-label="Default Select Sample" name="new_password">
                                </input>
                              </div>
                              <?= form_error('new_password','<small class="text-danger pl-3">','</small>' ); ?>
                              <div class="mb-3">
                                  <label class="small mb-1"> Ulangi Password Baru</label>
                                  <input class="form-control" id="new_password2" type="password" placeholder="Ulangi Password Baru" aria-label="Default Select Sample" name="new_password2">
                                </input>
                                <?= form_error('new_password2','<small class="text-danger pl-3">','</small>' ); ?>
                              </div>
                              
                              <hr>
                              <div class="d-flex justify-content-end">
                                  <button class="btn btn-success" type="submit" >Update Password</button>
                              </div>
                                 
                              
                          </form>
                      </div>
                    </div>
                </div>
                
                    <!-- Content Row -->

              

                </div>
                
                <!-- End of Main Content -->

                 <!-- Footer -->
                <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Afif & Alfandi</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            
               
           
            

       

        </div>
        <!-- End of Content Wrapper -->

        

    
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

    <script>
            

        
    </script>