
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

    <style></style>
</head>
<body>

<center>

    <div class="alert alert-success">

        <h3>ELEMAN - ONLİNE</h3><br>
        <h4>UYE-LOGİN</h4>

    </div>

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

           <a href=javascript:history.back(-1)>  <button type='button' class='btn btn-danger'>GERİ DÖN   </button> </a></center>";
        }

        else {
            echo "<center><h3>KULLANICI ADI YADA ŞİFRE HATALI !!!</h3><br><br>
            
            <a href=javascript:history.back(-1)> <button type='button' class='btn btn-danger'>GERİ DÖN   </button></a></center>";
        }
    }


    $conn->close();

    ?>



