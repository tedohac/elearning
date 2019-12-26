<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Isi Forum - Penjadwalan</title>
    <?php $this->load->view("_partials/head.php") ?>

    <!-- Jodit -->
    <link href="<?= base_url('css/jodit.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">
    <?php $this->load->view("_partials/navbar_dsn.php") ?>

    <div id="wrapper">
        <?php $this->load->view("_partials/sidebar_dsn.php") ?>

        <div id="content-wrapper">


            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Perkuliahan</li>
                    <li class="breadcrumb-item">Jadwal</li>
                    <li class="breadcrumb-item"><?= $detail->matkul_nama ?>, <?= $detail->dosen_nama ?>, <?= $detail->pkl_hari ?> - <?= $detail->pkl_ruang ?>, <?= substr($detail->pkl_mulai,0,5) ?> - <?= substr($detail->pkl_selesai,0,5) ?></li>
                    <li class="breadcrumb-item">Pertemuan ke-<?= $detail->pjd_pertemuan ?></li>
                    <li class="breadcrumb-item">Isi Forum</li>
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
                            Forum Pertemuan ke-<?= $detail->pjd_pertemuan ?>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <!-- begin row -->
                                <div class="row">
                                    
                                    <div class="col-12 mb-3">
                                        <textarea id="inputFollowUp" name="pjd_forumcontent"><?= htmlspecialchars_decode($detail->pjd_forumcontent) ?></textarea>
                                        <div class="small text-danger">
                                            <?= form_error('pjd_forumcontent') ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <input type="button" class="btn btn-primary btn-block" value="Simpan" data-toggle="modal" data-target="#emailModal">
                                    </div>
                                    
                                </div>

                                <div class="modal fade" id="emailModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Simpan Forum</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Apakah anda yakin akan menambahkan forum baru?
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                <input type="submit" class="btn btn-primary" value="Ya">
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

        <!-- Jodit-->
        <script src="<?= base_url('js/jodit.min.js'); ?>"></script>
        <script>
            var editor = new Jodit("#inputFollowUp", {
                "buttons": "undo,redo,|,bold,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,align,fontsize,|,image,link,|",
                "buttonsMD": "undo,redo,|,bold,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,align,fontsize,|,image,link,|",
                "buttonsSM": "undo,redo,|,bold,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,align,fontsize,|,image,link,|",
                "buttonsXS": "undo,redo,|,bold,underline,italic,|,superscript,subscript,|,ul,ol,|,outdent,indent,align,fontsize,|,image,link,|",
            })
        </script>

    </body> 