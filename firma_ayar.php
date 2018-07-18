<?php

session_start();
include ("db.php");

if(!isset($_SESSION["login"])){
    header("Location:firma_giris.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>PROFİL</title>
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
                <a class="navbar-brand" href="firma_duzenle.php">ELEMAN-ONLİNE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="firma_sil.php"><span class="glyphicon glyphicon-erase"></span> UYELİK SİL</a></li>
                    <li><a href="firma_sifre_degis.php"><span class="glyphicon glyphicon-refresh"></span> SİFRE DEĞİŞTİR</a></li>
                    <li><a href="giris.php"><span class="glyphicon glyphicon-log-out"></span> ÇIKIŞ</a></li>
                </ul>
            </div>
        </div>
        <h3 style="color: dimgray">FİRMA-AYAR</h3><br>
    </nav>


    <div class="container" style="height: 50%; width: 40%; padding-top: 30px; margin:30px;">
    <form method="post" class="form-horizontal">

        <div class="form-group">

            <label class="control-label col-sm-2" for="fisim">FİRMA İSMİ:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="fisim" value="<?php echo $_SESSION['fisim'];?>">

            </div></div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="fmail">E-MAİL:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="fmail" pattern=".+@.+.com" value="<?php echo $_SESSION['fmail'];?>">

            </div></div>

        <div class="form-group">

            <label class="control-label col-sm-2" for="ftel">TELEFON:</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control"  name="ftel"   pattern="[0-9]{10}" value="<?php echo $_SESSION['ftel'];?>">

            </div></div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">ONAYLA</button> <br><br>



                <a href="firma_duzenle.php">    <button type="button" class="btn btn-basic">GİRİŞE DÖN</button>  </a>
            </div>
        </div>

                </form>


            <br><br>

        <?php


        $fisim=$fmail=$ftel="";

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $fisim = $_POST["fisim"];
            $fmail = $_POST["fmail"];
            $ftel=$_POST["ftel"];
        }

        if($fisim=="" || $fmail=="" || $ftel==""){

            echo "*** TÜM ALANLAR DOLDURULMAK ZORUNDA ***";


        }
        else {

            $sql = "UPDATE firma_uye SET  fisim='$fisim'  ,  fmail='$fmail' , ftel='$ftel' WHERE fparola='" . $_SESSION["fparola"] . "' ";


            if (mysqli_query($conn, $sql)) {
                echo "BİLGİLER GÜNCELLENDİ";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

        }


        ?>



</center>

</body>
</html>
