
<?php

include("db.php");

session_start();

if(!isset($_SESSION["login"])){
    header("Location:firma_giris.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style></style>
</head>
<body>

<center>


    <div class="alert alert-success">

        <h3>ELEMAN - ONLİNE</h3><br>
        <h4>FİRMA SAYFASI</h4>

    </div>

    <div class="jumbotron">

        <a href="basvuru_incele.php"> <button type="button" class="btn btn-success">BAŞVURULAR</button></a><br><br>
        <a href="firma_ayar.php"> <button type="button" class="btn btn-primary">PROFİL AYARLARI</button></a><br><br>
        <a href="ilan_ver.php"> <button type="button" class="btn btn-warning">İLAN VER</button></a><br><br>
        <a href="giris.php"> <button type="button" class="btn btn-danger">ÇIKIŞ</button></a>


    </div>






</center>

</body>
</html>


