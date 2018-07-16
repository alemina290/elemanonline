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

    <style></style>
</head>
<body>

<center>


    <div class="alert alert-success">

        <h3>ELEMAN - ONLİNE</h3><br>
        <h4>PROFİL</h4><br>

    </div>


    <div class="jumbotron" style="height: 50%; width: 30%; padding-top: 30px; margin:30px;">


        <form method="post" class="form-group" enctype="multipart/form-data">

            PROFİL RESMİ:    <input type="file" name="image"  value="<?php echo $_SESSION['resim'];?>"> <br><br>
            İSİM:    <input type="text" name="isim"  value="<?php echo $_SESSION['isim'];?>"> <br><br>
            SOYİSİM:    <input type="text" name="soyisim"  value="<?php echo $_SESSION['soyisim'];?>"> <br><br>
            MAIL  :        <input type="email" name="mail" pattern=".+@.+.com" value="<?php echo $_SESSION['mail'];?>"> <br><br>
            CEP TELEFONU : <input type="tel" name="tel" pattern="[0-9]{10}"  value="<?php echo $_SESSION['tel'];?>"> <br><br>

            <br><br>

            <button type="submit" class="btn btn-success" name="submit" >ONAYLA</button> <br><br>
            <a href="uye_sil.php"> <button type="button" class="btn btn-primary">UYELİK SİL</button></a> <br><br>
            <a href="uye_sifre_degis.php"> <button type="button" class="btn btn-info">SİFRE DEGİSTİR</button></a><br><br>
            <a href="uye_duzenle.php">    <button type="button" class="btn btn-danger" >GİRİŞE DÖN</button> </a>




        </form>


        <br><br>

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
