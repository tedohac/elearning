<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Admin - Elearning</title>
    <?php $this->load->view("_partials/head.php") ?>

</head>

<body id="page-top">
    <?php $this->load->view("_partials/navbar_adm.php") ?>

    <div id="wrapper">

        <?php $this->load->view("_partials/sidebar_adm.php") ?>

        <div id="content-wrapper">
            
            <div class="container-fluid">

                <div class="card mb-3 shadow">
                    <div class="card-header">
                        Administrator Menu
                    </div>
                    <div class="card-body">

                        <div class="row">


                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-primary o-hidden h-100 shadow">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-chalkboard-teacher"></i>
                                        </div>
                                        <div>Master Dosen</div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="#">
                                        <span class="float-left">Go to Page</span>
                                        <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-success o-hidden h-100 shadow">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-graduation-cap"></i>
                                        </div>
                                        <div>Master Mahasiswa</div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="#">
                                        <span class="float-left">Go to Page</span>
                                        <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-info o-hidden h-100 shadow">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-file-archive"></i>
                                        </div>
                                        <div>Master Perkuliahan</div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="<?= site_url('masterperkuliahan') ?>">
                                        <span class="float-left">Go to Page</span>
                                        <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- end of card -->

            </div>
        </div>
        <!-- end of content-wrapper -->

    </div>
    <!-- end of wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php $this->load->view("_partials/endbody.php") ?>
</body>