<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah - Master Matakuliah</title>
    <?php $this->load->view("_partials/head.php") ?>

    <!-- Auto complete -->
    <link href="<?= base_url('css/select2.min.css'); ?>" rel="stylesheet" />
    <!-- Datepicker -->
    <link href="<?= base_url('css/jquery.timepicker.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">
    <?php $this->load->view("_partials/navbar_adm.php") ?>

    <div id="wrapper">
        <?php $this->load->view("_partials/sidebar_adm.php") ?>

        <div id="content-wrapper">


            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Matakuliah</li>
                    <li class="breadcrumb-item">Tambah Matakuliah</li>
                </ol>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                    <?php elseif ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>


                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-plus"></i>
                            Tambah Matakuliah
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <!-- begin row -->

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-6 px-1 my-2">
                                        <small>ID Matakuliah</small>
                                        <input type="text" name="matkul_id" id="matkul_id" class="form-control shadow-sm">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-6 px-1 my-2">
                                        <small>Nama Matakuliah</small>
                                        <input type="text" name="matkul_nama" id="matkul_nama" class="form-control shadow-sm">
                                    </div>
                                </div>
                         <div class="row">
                                    <div class="col-12">
                                        <input type="button" class="btn btn-primary btn-block" value="Simpan" data-toggle="modal" data-target="#emailModal">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="modal fade" id="emailModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Simpan</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah anda yakin akan menambahkan matakuliah baru?
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                    <input type="submit" class="btn btn-primary" value="Ya">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>


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

        <!-- Auto Complete-->
        <script src="<?= base_url('js/select2.min.js'); ?>"></script>
        <!-- Timepicker -->
        <script src="<?= base_url('js/jquery.timepicker.min.js'); ?>"></script>
        <script>
            $('.inputtime').timepicker({
                timeFormat: 'HH:mm',
                interval: 30,
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        </script>

    </body> 