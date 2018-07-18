<?php

session_start();
include ("db.php");

require 'class.upload.php';

if(!isset($_SESSION["login"])){
    header("Location:uye_giris.php");
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
                <a class="navbar-brand" href="uye_duzenle.php">ELEMAN-ONLİNE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="uye_sil.php"><span class="glyphicon glyphicon-erase"></span> UYELİK SİL</a></li>
                    <li><a href="uye_sifre_degis.php"><span class="glyphicon glyphicon-refresh"></span> SİFRE DEĞİŞTİR</a></li>
                    <li><a href="giris.php"><span class="glyphicon glyphicon-log-out"></span> ÇIKIŞ</a></li>
                </ul>
            </div>
        </div>
        <h3 style="color: dimgray">ÜYE-AYAR</h3><br>
    </nav>


    <div class="container" style="height: 50%; width: 40%; padding-top: 30px; margin:30px;">
        <form method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">

                <label class="control-label col-sm-2" for="image">PROFİL RESMİ:</label>

                <input type="file" name="image" value="<?php echo $_SESSION['resim'];?>">

                <br><br>

            </div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="isim">İSİM:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="isim" value="<?php echo $_SESSION['isim'];?>">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="soyisim">SOYİSİM:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="soyisim" value="<?php echo $_SESSION['soyisim'];?>">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="mail">E-MAİL:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="mail" pattern=".+@.+.com" value="<?php echo $_SESSION['mail'];?>">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="tel">TELEFON:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control"  name="tel"   pattern="[0-9]{10}" value="<?php echo $_SESSION['tel'];?>">

                </div></div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="submit">ONAYLA</button> <br><br>


                    <a href="uye_duzenle.php">    <button type="button" class="btn btn-basic">GİRİŞE DÖN</button>  </a>
                </div>
            </div>

        </form>



        <?php

        if(isset($_POST["submit"])) {

            $image = new Upload($_FILES["image"]);


            if ($image->uploaded) {

                $image->Process('upload/');

                $image_yukle = $image->file_dst_name;

                $image->image_convert = 'jpg';

            }


            $isim = $mail = $tel = $soyisim = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $isim = $_POST["isim"];
                $soyisim = $_POST["soyisim"];
                $mail = $_POST["mail"];
                $tel = $_POST["tel"];

            }

            if ($isim == "" || $mail == "" || $tel == "" || $soyisim == "") {

                echo "*** TÜM ALANLAR DOLDURULMAK ZORUNDA ***";


            } else {

                $sql = "UPDATE uye SET   soyisim='$soyisim' , isim='$isim'    ,  mail='$mail' , tel='$tel' , profil='$image_yukle' WHERE parola='" . $_SESSION["parola"] . "' ";


                if (mysqli_query($conn, $sql)) {
                    echo "BİLGİLER GÜNCELLENDİ";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }

        }






        ?>
    </div>


</center>

</body>
</html>
