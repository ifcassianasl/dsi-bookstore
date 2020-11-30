<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
  <?php
    if(!empty($_GET['msg'])){
      if ($_GET['msg'] == "OK"){
      ?>
      <div class="alert alert-info" role="alert">
        <?php echo "<strong> Registered Successfull. Please, login.</strong>"; ?>
      </div>
    <?php
      } else if($_GET['msg'] == "LOGIN_ERROR"){
      ?>
        <div class="alert alert-danger" role="alert">
          <?php echo "<strong>Incorrect username (your e-mail) or password.</strong>"; ?>
        </div>
    <?php
      } else {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo "<strong> It is not possible to connect the database server. <strong><br>";?>
        </div>
    <?php
      }
      unset($_GET['msg']);
    }
  ?>

  <div id="login">
    <h3 class="text-center text-white pt-5">Acessar conta</h3>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="customersession.php" method="post">
              <div class="form-group">
                <label for="username" class="text-info">E-mail:</label>
                <br>
                <input type="text" name="email" id="email" class="form-control">
              </div>
              <div id="register-link" class="text-right">
                <a href="register.html" class="text-info">Cadastre-se aqui</a>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-info btn-md" value="Entrar">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
