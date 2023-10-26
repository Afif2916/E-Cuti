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
                <a class="nav-link" href="<?= base_url(); ?>admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="pengajuan_cuti.php" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-calendar-check"></i>
                    <span>Pengajuan Cuti</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url(); ?>Admin/pengajuan_cuti">Pengajuan Cuti</a>
                        <a class="collapse-item active" href="">List Pengajuan Cuti</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>Data Karyawan</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url(); ?>Admin/tambah_karyawan">Tambah Data Karyawan</a>
                        <a class="collapse-item" href="<?= base_url(); ?>Admin/list_data_karyawan">Data Karyawan</a>
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
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
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
                                <a class="dropdown-item" href="<?= base_url(); ?>admin/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url(); ?>admin/changepassword">
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
                  

                    

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-body text-center">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <h4>Daftar Karyawan</h4>
                                <hr>
                                <a href="<?= base_url(); ?>admin/laporan_karyawan_excel" class='btn btn-success btn-sm'  title='export'>Export To Excel</a>
                                <br><br>
                                <a href="<?= base_url(); ?>admin/updatejumlahcuti" class='btn btn-warning btn-sm'  title='export'>Update Jumlah Cuti</a>
                                <hr>
                                <?= $this->session->flashdata('message') ?>
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jabatan</th>
                                            <th>Jumlah Cuti</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    foreach($cuti as $p){ 
                                    
                                    ?>
                                        <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $p->nip ?></td>
                                        <td><?php echo $p->nama ?></td>
                                        <td><?php echo $p->email ?></td>
                                        <td><?php echo $p->tgl_lahir ?></td>
                                        <td><?php echo $p->jabatan ?></td>
                                        <td><?php echo $p->jumlah_cuti ?> Hari</td>
                                        <td><button class='btn btn-success btn-sm' data-popup='tooltip' data-toggle='modal' data-target='#updateModal<?= $p->id_pegawai ?>' data-placement='top' title='Update'>Update</button>
                                    <hr>
                                    <button class='btn btn-danger btn-sm' data-popup='tooltip' data-placement='top' title='Hapus'  data-toggle='modal' data-target='#deleteModal'  >Hapus</i></button></td>
                                        
                                        </tr>

                                        
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                                 
                                    foreach($cuti as $p){ ?>
                                <div class="modal fade bd-example-modal-lg" id="updateModal<?= $p->id_pegawai ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                    
                                    <form method="POST" action="<?= base_url('admin/list_data_karyawan');?>">
                                
                                <div class="row gx-3 input-group">
                                  
                                    
                                </div>
                                <div class="mb-3">
                                  <label class="small mb-1"> ID Pegawai</label>
                                  <input class="form-control" id="nip" type="text"  aria-label="Default Select Sample" name="id_pegawai" value="<?= $p->id_pegawai ?>" readonly>
                                    </input>
                                </div>
                                
                                <div class="mb-3">
                                  <label class="small mb-1"> Nip</label>
                                  <input class="form-control" id="nip" type="text"  aria-label="Default Select Sample" name="nip" value="<?= $p->nip ?>" readonly>
                                    </input>
                                </div>
                                <div class="mb-3">
                                  <label class="small mb-1"> Nama</label>
                                  <input class="form-control" id="nip" type="text"  aria-label="Default Select Sample" name="nama" value="<?= $p->nama ?>" >
                                    </input>
                                </div>
                              <div class="mb-3">
                                  <label class="small mb-1"> Email</label>
                                  <input class="form-control" id="alasan_cuti" type="text" placeholder="Masukan Email Baru" aria-label="Default Select Sample" name="email" value="<?= $p->email ?>">
                                    </input>
                                    <?= form_error('email','<small class="text-danger pl-3">','</small>' ); ?>
                              </div>
                              <div class="mb-3">
                                  <label class="small mb-1"> Tanggal Lahir</label>
                                  <input class="form-control" id="nip" type="text"  aria-label="Default Select Sample" name="tgl_lahir" value="<?= $p->tgl_lahir ?>" >
                                    </input>
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
            <?php } ?>

                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Karyawan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                    </div>
                                                        <div class="modal-body">
                                                             Apa anda yakin Menghapus Seluruh Data Karyawan seperti User Dan Data Cuti Pegawai ?
                                                         </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button href='deletepegawai/$p->id_pegawai' type="button"  class="btn btn-primary">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                


                            </div>
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