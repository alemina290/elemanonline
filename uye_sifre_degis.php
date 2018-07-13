<?php

session_start();
include ("db.php");

if(!isset($_SESSION["login"])){
    header("Location:uye_giris.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


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
        <h4>SİFRE DEĞİŞTİR</h4><br>

    </div>


    <div class="jumbotron" style="height: 50%; width: 30%; padding-top: 30px; margin:30px;">


        <form method="post" class="form-group">

            ESKİ PAROLA: <input type="password" name="eparola"><br><br><br>
            YENİ PAROLA: <input type="password" name="yparola" minlength="4"><br><br>
            ONAYLA: <input type="password" name="y2parola" minlength="4"><br><br>

            <br><br>

            <button type="submit" class="btn btn-primary" >ONAYLA</button><br><br>
            <a href="uye_duzenle.php">    <button type="button" class="btn btn-danger" >GİRİŞE DÖN</button> </a>

        </form>


        <br><br>

        <?php


        $eparola=$yparola=$y2parola="";

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $eparola = $_POST["eparola"];
            $yparola = $_POST["yparola"];
            $y2parola = $_POST["y2parola"];

        }

        if($eparola=="" || $yparola=="" || $y2parola==""){

            echo "*** TÜM ALANLAR DOLDURULMAK ZORUNDA ***";


        }
        else {
            if ($eparola == $_SESSION["parola"]) {

                if ($yparola == $y2parola) {

                    $sql2 = "UPDATE uye SET parola='$yparola' WHERE parola='" . $_SESSION["parola"] . "' ";

                    if (mysqli_query($conn, $sql2)) {
                        echo "BİLGİLER GÜNCELLENDİ";
                    } else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    }
                }

                else {

                    echo "*** YENİ PAROLALAR UYUŞMUYOR ***";

                }

            } else {

                echo "*** ESKİ PAROLANIZ HATALI ***";
            }

        }


        ?>
    </div>


</center>

</body>
</html>
