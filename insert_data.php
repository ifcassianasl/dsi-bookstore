<?php
  $name = $_POST['name'];
  $email = $_POST['email'];

  $conexao = mysqli_connect("localhost","root","","BookStoreDB") or print (mysqli_error());

  $query = "INSERT INTO customers (name,email) VALUES ('$name','$email')";

  if (mysqli_query($conexao, $query)) {  
      header("Location: login.php?msg=OK");
  } else {
      header("Location: login.php?msg=ERRO");
  }
?>
