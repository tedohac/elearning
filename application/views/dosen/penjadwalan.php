<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penjadwalan</title>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">
    <?php $this->load->view("_partials/navbar_dsn.php") ?>

    <div id="wrapper">
    
        <?php $this->load->view("_partials/sidebar_dsn.php") ?>

        <div id="content-wrapper">
        <form method="get">

            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Perkuliahan</li>
                    <li class="breadcrumb-item">Jadwal</li>
                    <li class="breadcrumb-item"><?= $detail->matkul_nama ?>, <?= $detail->dosen_nama ?>, <?= $detail->pkl_hari ?> - <?= $detail->pkl_ruang ?>, <?= substr($detail->pkl_mulai,0,5) ?> - <?= substr($detail->pkl_selesai,0,5) ?></li>
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
                        <i class="fas fa-calendar-alt"></i>
                        Jadwal <b><?= $detail->matkul_nama ?>, <?= $detail->dosen_nama ?>, <?= $detail->pkl_hari ?> - <?= $detail->pkl_ruang ?>, <?= substr($detail->pkl_mulai,0,5) ?> - <?= substr($detail->pkl_selesai,0,5) ?></b>
                        
                    </div>
                    <div class="card-body">
                    
                        <?php 
                            $nomor = 1;
                            foreach ($datas as $data):
                        ?>
                        <tr>
                        <div class="card mb-3 shadow-sm">
                            <div class="card-header">
                                <i class="fas fa-book-reader"></i>
                                <b>Pertemuan ke-<?= $data->pjd_pertemuan ?></b> (<?= date('Y M d', strtotime($data->pjd_tglmulai)) ?> - <?= date('Y M d', strtotime($data->pjd_tglselesai)) ?>)
                                
                            </div>
                            <?php
                                $now = Date('Y-m-d');
                                $DateBegin = date('Y-m-d', strtotime($data->pjd_tglmulai));
                                $DateEnd = date('Y-m-d', strtotime($data->pjd_tglselesai));
                                
                                if (($now >= $DateBegin) && ($now <= $DateEnd)) $bgcard = "alert-warning";
                                else $bgcard = "";
                            ?>
                            <div class="card-body <?= $bgcard ?>">
                                <div>
                                    <a href="<?= site_url('dosen/editforum/'.$data->pjd_id) ?>">
                                        <i class="fas fa-comments"></i>
                                        <small><?= ($data->pjd_forumcreated==null)? "Forum kosong" : "Terakhir diisi ".$data->pjd_forumcreated; ?></small>
                                    </a>
                                </div>
                                
                                <div>
                                    <a href="<?= site_url('dosen/editforum/'.$data->pjd_id) ?>">
                                        <i class="fas fa-file-pdf"></i>
                                        <small><?= ($data->pjd_forumcreated==null)? "Modul kosong" : "Terakhir diisi ".$data->pjd_modulcreated; ?></small>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <?php
                            $nomor++;
                            endforeach;
                        ?>

                    </div>
                </div>
                

            </div>
            
        </form>
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="hapusModal">
                <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Hapus Dosen</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Apakah anda yakin akan menghapus dosen terpilih?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                        <form action="<?= site_url('masterdosen/delete/') ?>" method="post">
                            <input type="hidden" name="delid" id="delid">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Ya">
                        </form>
                    </div>

                </div>
                </div>
            </div>

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