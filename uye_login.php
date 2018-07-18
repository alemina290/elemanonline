
<?php

include ("db.php");

session_start();

if(!isset($_SESSION["login"])){
    header("Location:uye_giris.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>UYE-LOGİN</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css.css">
</head>
<body>

<center>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="giris.php">ELEMAN-ONLİNE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">

            </div>
        </div>
    </nav>

    <?php


    $ka=$_POST["ka"];
    $sifre=$_POST["sifre"];

    $sql="SELECT * FROM uye WHERE mail='".$ka."' and parola='".$sifre."' ";
    $result=$conn->query($sql);


    if($result->num_rows>0){

        while($row=$result->fetch_assoc()) {

            $_SESSION["login"] = "true";
            $_SESSION["mail"] = $row["mail"];
            $_SESSION["parola"] = $row["parola"];
            $_SESSION["tel"] = $row["tel"];
            $_SESSION["isim"] = $row["isim"];
            $_SESSION["soyisim"] = $row["soyisim"];
            $_SESSION["sektor"] = $row["sektor"];
            header("Location:uye_duzenle.php");
        }
    }
    else{
        if($ka=="" or $sifre=="") {

            echo "<center><h3>TÜM ALANLAR DOLDURULMAK ZORUNDA !!!</h3><br><br>

           <a href=javascript:history.back(-1)>  <button type='button' class='btn btn-basic'>GERİ DÖN   </button> </a></center>";
        }

        else {
            echo "<center><h3>KULLANICI ADI YADA ŞİFRE HATALI !!!</h3><br><br>
            
            <a href=javascript:history.back(-1)> <button type='button' class='btn btn-basic'>GERİ DÖN   </button></a></center>";
        }
    }


    $conn->close();

    ?>



