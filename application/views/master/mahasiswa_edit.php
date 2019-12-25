<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit - Master Mahasiswa</title>
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
                    <li class="breadcrumb-item">Master Mahasiswa</li>
                    <li class="breadcrumb-item">Edit Mahasiswa</li>
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
                        Edit Mahasiswa
                    </div>
                    <div class="card-body">
                    <form method="post">
                        <!-- begin row -->
                        <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-6 px-1 my-2">
                                        <small>NIM</small>
                                        <input type="text" name="mhs_nim" id="mhs_nim" class="form-control shadow-sm" placeholder="" value="<?= $datas->mhs_nim ?>" >
                                        <div class="small text-danger">
                                        <?= form_error('mhs_nim') ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-6 px-1 my-2">
                                        <small>Nama Mahasiswa</small>
                                        <input type="text" name="mhs_nama" id="mhs_nama" class="form-control shadow-sm"  placeholder="" value="<?= $datas->mhs_nama ?>">
                                        <div class="small text-danger">
                                        <?= form_error('mhs_nama') ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-6 px-1 my-2">
                                        <small>Tempat Lahir</small>
                                        <input type="text" name="mhs_tempat_lahir" id="mhs_tempat_lahir" class="form-control shadow-sm"  placeholder="" value="<?= $datas->mhs_tempat_lahir ?>">
                                        <div class="small text-danger">
                                        <?= form_error('mhs_tempat_lahir') ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-6 px-1 my-2">
                                        <small>Tanggal Lahir</small>
                                        <input type="date" name="mhs_tanggal_lahir" id="mhs_tanggal_lahir" class="form-control shadow-sm"  placeholder="" value="<?= $datas->mhs_tanggal_lahir ?>">
                                        <div class="small text-danger">
                                        <?= form_error('mhs_tanggal_lahir') ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-6 px-1 my-2">
                                        <small>No HP</small>
                                        <input type="text" name="mhs_no_hp" id="mhs_no_hp" class="form-control shadow-sm"  placeholder="" value="<?= $datas->mhs_no_hp ?>">
                                        <div class="small text-danger">
                                        <?= form_error('mhs_no_hp') ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-6 px-1 my-2">
                                        <small>Jenis Kelamin</small>
                                        <select class="jenisKelaminAutocom form-control shadow-sm" name="mhs_jenis_kelamin" >
                                        <option disabled value>-- Select Jenis Kelamin --</option>
                                    <option value="Laki-Laki" <?php if($datas->mhs_jenis_kelamin=="Laki-Laki") echo "selected"; ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if($datas->mhs_jenis_kelamin=="Perempuan") echo "selected"; ?>>Perempuan</option>
                                    
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 mb-6 px-1 my-2">
                                        <small>Alamat</small>
                                        <input type="text" name="mhs_alamat" id="mhs_alamat" class="form-control shadow-sm"  placeholder="" value="<?= $datas->mhs_alamat ?>">
                                        <div class="small text-danger">
                                        <?= form_error('mhs_alamat') ?>
                                    </div>
                                    </div>
                                </div>
                            <div class="col-12">
                                <input type="button" class="btn btn-primary btn-block h-100" value="Simpan" data-toggle="modal" data-target="#simpanModal" >
                            </div>

                            
                            <!-- Modal -->
                            <div class="modal fade" id="simpanModal">
                                <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Simpan Perubahan Mahasiswa</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Apakah anda yakin akan mengubah mahasiswa ini?
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