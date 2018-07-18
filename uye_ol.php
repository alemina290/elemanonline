<?php


include ("db.php");

require 'class.upload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>UYE KAYIT</title>
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
                <a class="navbar-brand" href="giris.php">ELEMAN-ONLİNE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">


            </div>
        </div>
        <h3 style="color: dimgray">UYE-KAYIT</h3><br>
    </nav>


    <div class="container" style="height: 50%; width: 40%; padding-top: 30px; margin:30px;">

        <?php

        echo "<img src='upload/profil.jpg' width='100' height='100'> <br><br>";

        if(isset($_POST["submit"])){



            $image = new Upload( $_FILES["image"] );


            if ($image->uploaded ) {

                $image->Process( 'upload/' );

                $image_yukle=$image->file_dst_name;

                $image->image_convert = 'jpg';

                }

                }

        ?>




        <form method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">

                <input type="file" name="image">

                    <br><br>

                </div>


            <div class="form-group">

                <label class="control-label col-sm-2" for="isim">İSİM:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="isim">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="soyisim">SOYİSİM:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="soyisim">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="mail">E-MAİL:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="mail" pattern=".+@.+.com" placeholder="example@example.com">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="tel">TELEFON:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control"  name="tel"   pattern="[0-9]{10}" placeholder="5369656874">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="parola">PAROLA:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="parola"  minlength="4"> <br><br>

                </div>
            </div>

            <div class="form-group" >

                <label class="control-label col-sm-2" for="sektor">SEKTOR:</label>
                <div class="col-sm-10" style="font-size: 1.3em">
                    <input type="radio"  class="r" name="sektor" value="YAZILIM" >  YAZILIM
                    <input type="radio"  class="r" name="sektor" value="ELEKTRONIK">  ELEKTRONİK
                    <input type="radio"  class="r" name="sektor"  value="MAKINE">  MAKİNE

                </div></div>


            <br><br>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="submit">KAYDOL</button> <br><br>



                    <a href="uye_giris.php">    <button type="button" class="btn btn-basic">GİRİŞE DÖN</button>  </a>
                </div>
            </div>
        </form>
    </div>

        <?php


        if(isset($_POST["submit"])) {





            $isim = $soyisim = $mail = $sektor = $parola = $tel = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $isim = $_POST["isim"];
                $soyisim = $_POST["soyisim"];
                $sektor = $_POST["sektor"];
                $mail = $_POST["mail"];
                $parola = $_POST["parola"];
                $tel = $_POST["tel"];
            }


            if ($isim == "" || $soyisim == "" || $sektor == "" || $mail == "" || $parola == "" || $tel == "") {

                echo "*** TÜM ALANLAR DOLDURULMAK ZORUNDA ***";


            }

            else {


                $sql2 = "SELECT * FROM uye WHERE parola='$parola'  OR mail='$mail' ";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {

                    echo "BU MAİL ADRESİ VEYA PAROLA ZATEN KULLANILMIŞ";
                }

                else{




                $sql = "INSERT INTO uye (isim,soyisim,sektor,mail,parola,tel,profil) VALUES ('$isim','$soyisim','$sektor','$mail','$parola','$tel','$image_yukle')";

                if (mysqli_query($conn, $sql)) {
                    echo "KAYIT BAŞARIYLA OLUŞTURULDU";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }}

        }

        ?>



</center>



</body>
</html>
