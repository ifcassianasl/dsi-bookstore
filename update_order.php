<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Alterar pedido | The BookStore</title>
  </head>
  <body>
  <?php session_start(); ?> 

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Minhas compras</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">  
      <span class="navbar-text"> Bem vindx <?php echo $_SESSION['name'];?> </span>
    </div>
  </nav>

  <?php
    if(!empty($_POST["codeUpdating"])){
      $bookTitle = $_POST['bookTitle'];
      $bookWriter = $_POST['bookWriter'];
      $bookCompany = $_POST['bookCompany'];
      $amount = $_POST['amount'];
      $order_id = $_POST['codeUpdating'];
      $conexao = mysqli_connect("localhost","root","","BookStoreDB") or print (mysqli_error());
      
      $query = "UPDATE orders 
        SET title='$bookTitle', writer='$bookWriter', company='$bookCompany', amount='$amount'
        WHERE id=$order_id";
      
      if (mysqli_query($conexao, $query)) {
        header("Location:home.php");
        } else {
      ?>
        <div class="alert alert-danger" role="alert">
          <?php echo "<strong> Erro: <strong>" . $query . "<br>" . mysqli_error($conexao);?>
        </div>
  <?php
        }
    }
    if (!empty($_POST["dataForUpdating"])){
        $order_id = $_POST['dataForUpdating'];
        $conexao = mysqli_connect("localhost","root","","BookStoreDB") or print (mysqli_error());
        $query = "SELECT * FROM orders WHERE id=$order_id";
        $resultado = mysqli_query($conexao,$query);  
        $linha = mysqli_fetch_array($resultado);
      ?>
    
        <form action="update_order.php" method="post">
          <div class="form-group">
            <div class="col-md-4 mb-3">
              <label for="bookTitle">Titulo:</label>
              <input type="text" required class="form-control" id="bookTitle" name="bookTitle" value="<?php echo $linha['title'];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4 mb-3">
              <label for="bookWriter">Autor:</label>
              <input type="text" required class="form-control" id="bookWriter" name="bookWriter" value="<?php echo $linha['writer'];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4 mb-3">
              <label for="bookCompany">Editora:</label>
              <input type="text" required class="form-control" id="bookCompany" name="bookCompany" value="<?php echo $linha['company'];?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4 mb-3">
              <label for="emailInputLabel">Valor total:</label>
              <input type="number" required class="form-control" id="emailInputLabel" name = "amount" value="<?php echo $linha['amount'];?>">
            </div>
          </div>   
          <input type="hidden" id="inputHidden" name="codeUpdating" value="<?php echo $linha['id']; ?> ">
          <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
        </form>
      <?php
        }
      ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>