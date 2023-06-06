<?php 
require_once "../app/init.php";

$proses = new User();
$registerStatus = "";

if(isset($_POST["register"])){
    $email = $_POST['email'];
    $password = $_POST["password"];
    $registerStatus = $proses->register($email, $password);
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
    <title>Halaman registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">    
	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="sign-in.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin w-100 m-auto">
      <form action="" method="post">
        <h1 class="h3 mb-3 fw-normal">Registrasi akun</h1>
        <?php if ($registerStatus !== true && $registerStatus !== ""): ?>
          <p class="text-danger"><?php echo $registerStatus; ?></p>
        <?php endif; ?>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@gmail.com" name="email">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Registrasi</button>
        <p>Sudah punya akun? <a href="login.php" class="text-decoration-none">login</a></p>
      </form>
    </main>
  </body>
</html>
