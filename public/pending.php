<?php
session_start();
require_once "../app/init.php";
$user = new User;
if(!isset($_SESSION['email'])){
    header("location: login.php");
    exit;
}
$user->cekStatus($_SESSION['email']);
if (isset($_POST['kode'])) {
  $user->getKode($_SESSION['email']);
  $expiryTime = time() + 20;
  setcookie('kodeButtonClicked', $expiryTime, $expiryTime, '/');
}
if(isset($_POST['verifikasi'])){
    if( $user->verifikasi($_SESSION['email'], $_POST['kodeUser']) > 0){
        header("location: index.php");
        exit;
    }else{
        $pesanError = 'kode verifikasi salah';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Verifikasi email</title>
  <script>
    // Mengecek apakah cookie dengan nama 'kodeButtonClicked' ada atau tidak
    function checkCookie() {
      var button = document.getElementById("kodeButton");
      var expiryTime = getCookieExpiration("kodeButtonClicked");
      var remainingSeconds = Math.floor((expiryTime - Date.now() / 1000));
      if (remainingSeconds > 0) {
        button.disabled = true;
        startCountdown(remainingSeconds);
      } else {
        button.disabled = false;
      }
    }

    // Menghitung mundur waktu berapa detik lagi cookie akan berakhir
    function startCountdown(remainingSeconds) {
      var countdown = document.getElementById("countdown");
      countdown.innerHTML = remainingSeconds + " detik";
      remainingSeconds--;
      if (remainingSeconds >= 0) {
        setTimeout(function() {
          startCountdown(remainingSeconds);
        }, 1000); // Update setiap detik
      } else {
        var button = document.getElementById("kodeButton");
        button.disabled = false;
        countdown.innerHTML = "";
      }
    }

    // Mendapatkan waktu kedaluwarsa cookie dengan nama tertentu
    function getCookieExpiration(cookieName) {
      var cookies = document.cookie.split(';');
      for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(cookieName + '=') === 0) {
          var cookieValue = cookie.substring(cookieName.length + 1);
          return parseInt(cookieValue);
        }
      }
      return 0;
    }
  </script>
</head>
<body onload="checkCookie()">
    <div class="container-sm">
        <main class="w-100 m-auto mt-3">
            <p style="color: red; font-style: italic;"><?= (isset($pesanError))?$pesanError : '' ?></p>
            <div class="form-floating mb-2">
                <form action="" method="post">
                <input type="number" name="kodeUser" class="form-control mb-2">
                <button class="btn w-100 btn-primary" type="submit" name="verifikasi">Verifikasi</button>
                </form>
            </div>
            <div class="form-floating">
                <form action="" method="post">
                <button type="submit" name="kode" id="kodeButton" class="btn btn-sm btn-primary">Dapatkan kode verifikasi melalui email</button>
                </form>
            <p id="countdown"></p>
            </div>
        </main>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>


