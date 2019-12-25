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
            <form action="" method="get">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Master Mahasiswa</li>
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
                                Data Mahasiswa

                                <a class="btn btn-info float-right" href="<?= site_url('mastermahasiswa/add') ?>"><i class="fas fa-plus"></i> Tambah Mahasiswa</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th width="20">No</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>No. Hp</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $nomor = 1;
                                            foreach ($datas as $data):
                                                ?>
                                                <tr>
                                                    <td><?= $nomor ?></td>
                                                    <td><?= $data->mhs_nim ?></td>
                                                    <td><?= $data->mhs_nama ?></td>
                                                    <td><?= $data->mhs_jenis_kelamin ?></td>
                                                    <td><?= $data->mhs_alamat ?></td>
                                                    <td><?= $data->mhs_no_hp ?></td>
                                                    <td>
                                                    <a class="trash-button btn btn-danger p-1 float-right ml-1" data-toggle="modal" data-target="#hapusModal" href="#" onclick="$('#delid').val('<?= $data->mhs_nim ?>');"><i class="fas fa-trash-alt"></i></a>
                                                    <a class="btn btn-info p-1 float-right" href="<?= site_url('mastermahasiswa/edit/'.$data->mhs_nim) ?>"><i class="fas fa-file-signature"></i></a>
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

                    <!-- Modal -->
            <div class="modal fade" id="hapusModal">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Hapus Perkuliahan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Apakah anda yakin akan menghapus perkuliahan terpilih?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                        <form action="<?= site_url('mastermahasiswa/delete/') ?>" method="post">
                            <input type="hidden" name="delid" id="delid">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Ya">
                        </form>
                    </div>

                </div>
                </div>
            </div>

                </form>
            </div>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <?php $this->load->view("_partials/endbody.php") ?>

        <!-- scripts for datatable-->
        <script src="<?= base_url('js/demo/datatables-demo.js') ?>"></script>

    </body>