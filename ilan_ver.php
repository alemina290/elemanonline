
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

                    <li><a href="ilan_sil.php"><span class="glyphicon glyphicon-erase"></span> İLAN SİL</a></li>
                    <li><a href="giris.php"><span class="glyphicon glyphicon-log-out"></span> ÇIKIŞ</a></li>
                </ul>
            </div>
        </div>

        <h3 style="color: dimgray">İLAN-VER</h3><br>
    </nav>


    <div class="container" style="height: 50%; width: 40%; padding-top: 30px; margin:30px;">

        <form method="post" class="form-horizontal">



    <div class="form-group">

        <label class="control-label col-sm-2" for="departman">DEPARTMAN:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="departman">

        </div></div>

            <br><br>

            <div class="form-group" >

                <label class="control-label col-sm-2" for="yabanci">YABANCI DİL:</label>
                <div class="col-sm-10" style="font-size: 1.3em">
                    <input type="radio"  class="r" name="yabanci" value="ingilizce" >  İNGİLİZCE
                    <input type="radio"  class="r" name="yabanci" value="diger">  DİĞER


                </div></div>

            <div class="form-group" >

                <label class="control-label col-sm-2" for="tecrube">TECRUBE:</label>
                <div class="col-sm-10" style="font-size: 1.3em">
                    <input type="radio"  class="r" name="tecrube" value="tecrubeli" >  TECRUBELİ
                    <input type="radio"  class="r" name="tecrube" value="tecrubesiz">  TECRUBESİZ


                </div></div>

            <br>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">ONAYLA</button> <br><br>



                    <a href="firma_duzenle.php">    <button type="button" class="btn btn-basic">GİRİŞE DÖN</button>  </a>
                </div>
            </div>

        </form>



        <br><br>

        <?php

        $departman=$tecrube=$yabanci="";

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $departman = $_POST["departman"];
            $tecrube = $_POST["tecrube"];
            $yabanci=$_POST["yabanci"];
        }

        if($departman=="" || $tecrube=="" || $yabanci==""){

            echo "*** TÜM ALANLAR DOLDURULMAK ZORUNDA ***";
            echo "<br><br>";
            echo "*** BİRDEN FAZLA İLAN VERMEK İÇİN PREMİUM UYELİK GEREKLİDİR ***";


        }
        else {

            $sql = "UPDATE firma_uye SET  departman='$departman'  ,  tecrube='$tecrube' , yabanci='$yabanci' WHERE fparola='" . $_SESSION["fparola"] . "' ";


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


