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
            <a class="navbar-brand" href="uye_duzenle.php">ELEMAN-ONLİNE</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">


            <ul class="nav navbar-nav navbar-right">
                <li><a href="giris.php"><span class="glyphicon glyphicon-log-out"></span> ÇIKIŞ</a></li>
            </ul>
        </div>
    </div>
    <h3 style="color: dimgray">ŞİFRE DEĞİŞTİR</h3><br>
    </nav>



    <div class="container" style="height: 50%; width: 40%; padding-top: 30px; margin:30px;">
        <form method="post" class="form-horizontal">

            <div class="form-group">

                <label class="control-label col-sm-2" for="eparola">ESKİ PAROLA:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="eparola">

                </div></div>

            <br><br>

            <div class="form-group">

                <label class="control-label col-sm-2" for="yparola">YENİ PAROLA:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="yparola" minlength="4">

                </div></div>


            <div class="form-group">

                <label class="control-label col-sm-2" for="y2parola">ONAYLA:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control"  name="y2parola" minlength="4">

                </div></div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">ONAYLA</button> <br><br>



                    <a href="uye_duzenle.php">    <button type="button" class="btn btn-basic">GİRİŞE DÖN</button>  </a>
                </div>
            </div>

        </form>



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



</center>

</body>
</html>
