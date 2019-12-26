<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Dosen - Elearning</title>
    <?php $this->load->view("_partials/head.php") ?>

</head>

<body id="page-top">
    <?php $this->load->view("_partials/navbar_dsn.php") ?>

    <div id="wrapper">

        <?php $this->load->view("_partials/sidebar_dsn.php") ?>
        <div id="content-wrapper">
            
            <div class="container-fluid">

                <div class="card mb-3 shadow">
                    <div class="card-header">
                        Perkuliahan Anda
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <?php
                                foreach($datas as $pkl):
                            ?>

                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-info o-hidden h-100 shadow">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                        <i class="fas fa-fw fa-book-reader"></i>
                                        </div>
                                        <div>
                                            <b><?= $pkl->matkul_nama ?></b><br />
                                            <?= $pkl->dosen_nama ?><br />
                                            <?= $pkl->pkl_hari ?> - <?= $pkl->pkl_ruang ?><br />
                                            <?= $pkl->pkl_mulai ?> - <?= $pkl->pkl_selesai ?><br />
                                        </div>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="<?= site_url('dosen/penjadwalan/'.$pkl->pkl_id) ?>">
                                        <span class="float-left">Jadwal</span>
                                        <span class="float-right">
                                          <i class="fas fa-angle-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            
                            <?php
                                endforeach;
                            ?>
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