<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Learning - Login</title>
    <?php $this->load->view("_partials/head.php") ?>

</head>

<body class="bg-dark">
    
  <div class="container">
  

    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
        
        <i class="fas fa-fw fa-book-reader"></i>
        Login to Elearning
      </div>
      <div class="card-body">

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        
        <form action="<?= site_url('login') ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="userName" class="form-control" placeholder="Username" name="user_name" required="required" autofocus="autofocus">
              <label for="userName">Username</label>
              <div class="small text-danger">
                  <?= form_error('user_name') ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="passWord" name="user_password" class="form-control" placeholder="Password" required="required">
              <label for="passWord">Password</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login" />
        </form>
      </div>
    </div>
  </div>
  
  <?php $this->load->view("_partials/endbody.php") ?>
</body>