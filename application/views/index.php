<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>App Center</title>
    <?php $this->load->view("_partials/head.php") ?>

</head>

<body id="page-top">
    <?php $this->load->view("_partials/navbar.php") ?>

    <div id="wrapper">

        <?php $this->load->view("_partials/sidebar.php") ?>

        <div id="content-wrapper">
            
            <div class="container-fluid">

                <div class="mb-3">
                    <span class="badge badge-secondary">Last machine list updates: <?= Date('Y M d',strtotime($lastupdate)) ?></span>
                    <span class="badge badge-secondary">Ask admin for updates</span>
                </div>

                <!-- KOMTRAX -->
                <div class="card mb-3 shadow">
                    <div class="card-header">
                        KOMTRAX
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <?php
                                foreach($appkomtrax as $app):
                            ?>

                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-primary o-hidden h-100 shadow">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-<?= $app->appfa ?>"></i>
                                        </div>
                                        <div><?= $app->appname ?></div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="<?= site_url($app->appurl) ?>">
                                        <span class="float-left">Go to App</span>
                                        <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>
                <!-- KOMTRAX -->

                <!-- QA -->
                <div class="card mb-3 shadow">
                    <div class="card-header">
                        QA
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <?php
                                foreach($appqa as $app):
                            ?>

                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-info o-hidden h-100 shadow">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-<?= $app->appfa ?>"></i>
                                        </div>
                                        <div><?= $app->appname ?></div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="<?= site_url($app->appurl) ?>">
                                        <span class="float-left">Go to App</span>
                                        <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>
                <!-- QA -->

                <!-- SOK -->
                <div class="card mb-3 shadow">
                    <div class="card-header">
                        SOK
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <?php
                                foreach($appsok as $app):
                            ?>

                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-success o-hidden h-100 shadow">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-<?= $app->appfa ?>"></i>
                                        </div>
                                        <div><?= $app->appname ?></div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="<?= site_url($app->appurl) ?>">
                                        <span class="float-left">Go to App</span>
                                        <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>
                <!-- SOK -->

            </div>
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php $this->load->view("_partials/endbody.php") ?>
</body>