<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forum Pertemuan ke-<?= $detail->pjd_pertemuan ?></title>
    <?php $this->load->view("_partials/head.php") ?>
    

</head>

<body id="page-top">
    <?php $this->load->view("_partials/navbar_mhs.php") ?>

    <div id="wrapper">
        <?php $this->load->view("_partials/sidebar_mhs.php") ?>

        <div id="content-wrapper">


            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Kelas</li>
                    <li class="breadcrumb-item">Jadwal</li>
                    <li class="breadcrumb-item"><?= $detail->matkul_nama ?>, <?= $detail->dosen_nama ?>, <?= $detail->pkl_hari ?> - <?= $detail->pkl_ruang ?>, <?= substr($detail->pkl_mulai,0,5) ?> - <?= substr($detail->pkl_selesai,0,5) ?></li>
                    <li class="breadcrumb-item">Forum Pertemuan ke-<?= $detail->pjd_pertemuan ?></li>
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

                    <div class="card mb-3 shadow">
                        <div class="card-header">
                            <i class="fas fa-comments"></i>
                            Forum Pertemuan ke-<?= $detail->pjd_pertemuan ?>

                            <small class="float-right"><b><?= $detail->dosen_nama ?></b> - <?= $detail->pjd_forumcreated ?></small>
                        </div>
                        <div class="card-body">
                            <?= htmlspecialchars_decode($detail->pjd_forumcontent) ?>

                            <div>
                                <a href="<?= site_url('mahasiswa/replyparent/'.$detail->pjd_id) ?>" class="float-right">Reply</a>
                            </div>
                        </div>
                    </div>

                    <?php foreach($forums as $forum): ?>
                    
                        <div class="card mb-3 ml-3 shadow">
                            <div class="card-header">
                                <?= $forum->nama ?> <b>(<?= $forum->reply_user_name ?>)</b> replied on <?= $forum->reply_created ?>
                            </div>
                            <div class="card-body">
                                <?= htmlspecialchars_decode($forum->reply_content) ?>

                                <div>
                                    <a href="<?= site_url('mahasiswa/replychild/'.$detail->pjd_id.'?parent='.$forum->reply_id) ?>" class="float-right">Reply</a>
                                </div>
                            </div>
                        </div>

                        <?php foreach($forum->child as $child): ?>

                            <div class="card mb-3 ml-5 shadow">
                                <div class="card-header">
                                    <?= $child->nama ?> <b>(<?= $child->reply_user_name ?>)</b> replied on <?= $child->reply_created ?>
                                </div>
                                <div class="card-body">
                                    <?= htmlspecialchars_decode($child->reply_content) ?>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endforeach; ?>

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