<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Master Perkuliahan</title>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">
    <?php $this->load->view("_partials/navbar_adm.php") ?>

    <div id="wrapper">
    
        <?php $this->load->view("_partials/sidebar_adm.php") ?>

        <div id="content-wrapper">
        <form method="get">

            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Perkuliahan</li>
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
                        <i class="fas fa-table"></i>
                        Data Perkuliahan
                        
                        <a class="btn btn-info float-right" href="<?= site_url('masterperkuliahan/add') ?>"><i class="fas fa-plus"></i> Tambah Perkuliahan</a>
                    </div>
                    <div class="card-body">
                    
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th width="20">#</th>
                                    <th>Matkul</th>
                                    <th>Dosen</th>
                                    <th>Ruang</th>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $nomor = 1;
                                        foreach ($datas as $data):
                                    ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $data->matkul_nama ?></td>
                                        <td><?= $data->dosen_nama ?></td>
                                        <td><?= $data->pkl_ruang ?></td>
                                        <td><?= $data->pkl_hari ?></td>
                                        <td><?= $data->pkl_mulai ?></td>
                                        <td><?= $data->pkl_selesai ?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                        $nomor++;
                                        endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                

            </div>
            
        </form>
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php $this->load->view("_partials/endbody.php") ?>

    <!-- scripts for datatable-->
    <script src="<?= base_url('js/demo/datatables-demo.js') ?>"></script>
    
</body>