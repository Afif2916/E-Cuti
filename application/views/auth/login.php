 <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7 row-cols-md-1">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-4">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                    <?= $this->session->flashdata('message') ?>
                                        <h1 class="h4 text-gray-900 mb-4">E-Cuti Hybrid</h1>
                                        <img src="<?= base_url(); ?>/assets/img/logo.jfif" align="middle" style="width: 300px; height:300px padding:auto ">
                                    </div>
                                    <br>
                                    <form class="user" method="post" action="<?= base_url('auth') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nip" name="username" 
                                                placeholder="Masukan NIP">
                                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                           
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-user btn-block">
                                            Login
                                        </button>
                                        <br>
                                        
                                        <div class="small" align="middle">Copyright By Afif & Alfandi</div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

