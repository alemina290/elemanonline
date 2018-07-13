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

    <style></style>
</head>
<body>

<center>
    <div class="alert alert-success">

        <h3>ELEMAN - ONLİNE</h3><br>
        <h4>UYE KAYIT </h4>

    </div>


    <div class="jumbotron" style="height: 50%; width: 30%; padding-top: 30px; margin:30px;">

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


        <form method="post" class="form-group" enctype="multipart/form-data">

            PROFİL RESMİ: <input type="file" name="image" /> <hr/>
            İSİM:    <input type="text" name="isim" > <br><br>
            SOYİSİM  :        <input type="text" name="soyisim" > <br><br>
            E-MAİL : <input type="email" name="mail" pattern=".+@.+.com" placeholder="example@example.com" > <br><br>
            TELEFON :       <input type="tel" name="tel"  pattern="[0-9]{10}" placeholder="5369656874"> <br><br>
            PAROLA: <input type="password" name="parola" minlength="4"> <br><br>
            SEKTÖR : <br><br>      <input type="radio" name="sektor" value="YAZILIM"> YAZILIM
            <input type="radio" name="sektor" value="ELEKTRONIK"> ELEKTRONIK
            <input type="radio" name="sektor" value="MAKINE">  MAKINE

            <br><br>

            <button type="submit" class="btn btn-primary" name="submit" >KAYDOL</button><br><br>
            <a href="uye_giris.php">  <button type="button" class="btn btn-danger" >GİRİŞE DÖN</button> </a>

        </form>

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
    </div>


</center>



</body>
</html>
