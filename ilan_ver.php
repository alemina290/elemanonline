
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

    <style></style>
</head>
<body>

<center>


    <div class="alert alert-success">

        <h3>ELEMAN - ONLİNE</h3><br>
        <h4>İLAN VER</h4>

    </div>




    <div class="jumbotron" style="height: 50%; width: 30%; padding-top: 30px; margin:30px;">


        <form method="post" class="form-group">

            DEPARTMAN:    <input type="text" name="departman" > <br><br>

            YABANCI DİL  :       <input type="radio" name="yabanci" value=yok> YOK

            <input type="radio" name="yabanci" value=ingilizce> İNGİLİZCE
            <input type="radio" name="yabanci" value=diger> DİĞER

            <br><br>
            TECRÜBE:    <input type="radio" name="tecrube" value=tecrubeli > TECRÜBELİ
            <input type="radio" name="tecrube" value=tecrubesiz> TECRÜBESİZ

            <br><br>




            <br><br>

            <button type="submit" class="btn btn-success" >ONAYLA</button> <br><br>
            <a href="ilan_sil.php">    <button type="button" class="btn btn-primary" >İLANIMI KALDIR</button> </a><br><br>
            <a href="firma_duzenle.php">    <button type="button" class="btn btn-danger" >GİRİŞE DÖN</button> </a>



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


