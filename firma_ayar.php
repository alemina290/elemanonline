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

    <style></style>
</head>
<body>

<center>


    <div class="alert alert-success">

        <h3>ELEMAN - ONLİNE</h3><br>
        <h4>PROFİL</h4><br>

    </div>


    <div class="jumbotron" style="height: 50%; width: 30%; padding-top: 30px; margin:30px;">


                <form method="post" class="form-group">

                    FİRMA İSMİ:    <input type="text" name="fisim"  value="<?php echo $_SESSION['fisim'];?>"> <br><br>
                    MAIL  :        <input type="email" name="fmail"  pattern=".+@.+.com" value="<?php echo $_SESSION['fmail'];?>"> <br><br>
                    CEP TELEFONU : <input type="number" name="ftel"  pattern="[0-9]{10}" value="<?php echo $_SESSION['ftel'];?>"> <br><br>

                    <br><br>

                    <button type="submit" class="btn btn-success" >ONAYLA</button> <br><br>
                    <a href="firma_sil.php"> <button type="button" class="btn btn-primary">UYELİK SİL</button></a> <br><br>
                    <a href="firma_sifre_degis.php"> <button type="button" class="btn btn-info">SİFRE DEGİSTİR</button></a><br><br>
                    <a href="firma_duzenle.php">    <button type="button" class="btn btn-danger" >GİRİŞE DÖN</button> </a><br><br>



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
    </div>


</center>

</body>
</html>
