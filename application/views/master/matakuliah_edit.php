<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update - Master Matakuliah</title>
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
                    <li class="breadcrumb-item">Edit Matakuliah</li>
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
                            Edit Matakuliah
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <!-- begin row -->

                            <div class="col-lg-3 mb-3 px-1">
                                <div class="form-label-group">
                                    <input type="text" name="matkul_id" id="matkul_id" class="form-control shadow-sm" placeholder="" value="<?= $datas->matkul_id ?>" readonly>
                                    <label for="matkul_id">ID Matakuliah *</label>
                                    <div class="small text-danger">
                                        <?= form_error('matkul_id') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-6 mb-3 px-1">
                                <div class="form-label-group">
                                    <input type="text" name="matkul_nama" id="matkul_nama" class="inputtime form-control shadow-sm" placeholder="" value="<?= $datas->matkul_nama ?>">
                                    <label for="matkul_nama">Nama Matakuliah *</label>
                                    <div class="small text-danger">
                                        <?= form_error('matkul_nama') ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <input type="button" class="btn btn-primary btn-block" value="Simpan" data-toggle="modal" data-target="#simpanModal">
                            </div>

                            
                            <!-- Modal -->
                            <div class="modal fade" id="simpanModal">
                                <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Simpan Perubahan Matakuliah </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Apakah anda yakin akan merubah matakuliah ini?
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
                        <!-- end row -->
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
   </script>

</body>