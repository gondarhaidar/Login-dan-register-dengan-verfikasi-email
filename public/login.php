<?php
session_start();
if(isset($_SESSION['login'])){
	header("location: index.php");
	exit;
}
require_once "../app/init.php";
$proses = new User; 
if(isset($_POST['login'])){
	if($proses->login($_POST['email'], $_POST['password']) > 0){
		echo "login berhasil";
	}else{
		echo "login gagal";
	}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">    
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="sign-in.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="" method="post">
    <h1 class="h3 mb-3 fw-normal">Login akun</h1>
    <div class="form-floating">
	     <input type="email" class="form-control" id="floatingInput" placeholder="name@gmail.com" name="email">
	     <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
    <p>Belum punya akun? <a href="register.php" class="text-decoration-none">registrasi</a></p>
  </form>
</main>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>