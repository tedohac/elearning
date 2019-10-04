<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit - Master Perkuliahan</title>
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
                    <li class="breadcrumb-item">Master Perkuliahan</li>
                    <li class="breadcrumb-item">Edit Perkuliahan</li>
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
                        <i class="fas fa-edit"></i>
                        Edit Perkuliahan
                    </div>
                    <div class="card-body">
                    <form method="post">
                        <!-- begin row -->
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-6 mb-3 px-1">
                                <small>Matkul *</small>
                                <select class="matkulAutocom form-control shadow-sm" name="pkl_matkul_id">
                                <?php if (isset($datas->pkl_matkul_id)): ?>
                                    <option value="<?= $datas->pkl_matkul_id ?>" selected><?= $datas->matkul_nama ?></option>
                                <?php endif; ?>
                                </select>
                                <div class="small text-danger">
                                    <?= form_error('pkl_matkul_id') ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-6 mb-3 px-1">
                                <small>Dosen *</small>
                                <select class="dosenAutocom form-control shadow-sm" name="pkl_dosen_nik">
                                <?php if (isset($datas->pkl_dosen_nik)): ?>
                                    <option value="<?= $datas->pkl_dosen_nik ?>" selected><?= $datas->dosen_nama ?></option>
                                <?php endif; ?>
                                </select>
                                <div class="small text-danger">
                                    <?= form_error('pkl_dosen_nik') ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-6 mb-3 px-1">
                                <small>Hari *</small>
                                <select class="form-control shadow-sm" name="pkl_hari" style="height: 30;font-size: 12px;">
                                    <option disabled value>-- Select Hari --</option>
                                    <option value="senin" <?php if($datas->pkl_hari=="senin") echo "selected"; ?>>Senin</option>
                                    <option value="selasa" <?php if($datas->pkl_hari=="selasa") echo "selected"; ?>>Selasa</option>
                                    <option value="rabu" <?php if($datas->pkl_hari=="rabu") echo "selected"; ?>>Rabu</option>
                                    <option value="kamis" <?php if($datas->pkl_hari=="kamis") echo "selected"; ?>>Kamis</option>
                                    <option value="jumat" <?php if($datas->pkl_hari=="jumat") echo "selected"; ?>>Jumat</option>
                                    <option value="sabtu" <?php if($datas->pkl_hari=="sabtu") echo "selected"; ?>>Sabtu</option>
                                    <option value="minggu" <?php if($datas->pkl_hari=="minggu") echo "selected"; ?>>Minggu</option>
                                </select>
                                <div class="small text-danger">
                                    <?= form_error('pkl_hari') ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 mb-3 px-1">
                                <div class="form-label-group">
                                    <input type="text" name="pkl_ruang" id="inputruang" class="form-control shadow-sm" placeholder="" value="<?= $datas->pkl_ruang ?>">
                                    <label for="inputruang">Ruang *</label>
                                    <div class="small text-danger">
                                        <?= form_error('pkl_ruang') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6 mb-3 px-1">
                                <div class="form-label-group">
                                    <input type="text" name="pkl_mulai" id="inputmulai" class="inputtime form-control shadow-sm" placeholder="" value="<?= substr($datas->pkl_mulai,0,5) ?>">
                                    <label for="inputmulai">Jam Mulai *</label>
                                    <div class="small text-danger">
                                        <?= form_error('pkl_mulai') ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-2 col-md-6 mb-3 px-1">
                                <div class="form-label-group">
                                    <input type="text" name="pkl_selesai" id="inputselesai" class="inputtime form-control shadow-sm" placeholder="" value="<?= substr($datas->pkl_selesai,0,5) ?>">
                                    <label for="inputselesai">Jam Selesai *</label>
                                    <div class="small text-danger">
                                        <?= form_error('pkl_selesai') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="button" class="btn btn-primary btn-block h-100" value="Simpan" data-toggle="modal" data-target="#simpanModal">
                            </div>

                            
                            <!-- Modal -->
                            <div class="modal fade" id="simpanModal">
                                <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Simpan Perubahan Perkuliahan</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Apakah anda yakin akan mengubah perkuliahan ini?
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
    <script type="text/javascript">
        $('.matkulAutocom').select2({
            placeholder: '-- Select Matkul --',
            ajax: {
            url: '<?= site_url() ?>mastermatkul/autocom',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results: data
                };
            },
            cache: true
            }
        });
        
        $('.dosenAutocom').select2({
            placeholder: '-- Select Dosen --',
            ajax: {
            url: '<?= site_url() ?>masterdosen/autocom',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                results: data
                };
            },
            cache: true
            }
        });
    </script>
    
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