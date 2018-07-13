<?php

include ("db.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FİRMA KAYIT</title>

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
        <h4>FİRMA KAYIT </h4>

    </div>
    <div class="jumbotron" style="height: 50%; width: 30%; padding-top: 30px; margin:30px;">


        <form method="post" class="form-group">

            FİRMA İSMİ:    <input type="text" name="fisim" > <br><br>
            MAIL  :        <input type="email" name="fmail" pattern=".+@.+.com" placeholder="example@example.com" > <br><br>
            CEP TELEFONU : <input type="tel" name="ftel"   pattern="[0-9]{10}" placeholder="5369656874"> <br><br>
            PAROLA :       <input type="password" name="fparola"  minlength="4"> <br><br>
            SEKTÖR :    <br><br>   <input type="radio" name="fsektor" value="YAZILIM"> YAZILIM
             <input type="radio" name="fsektor" value="ELEKTRONIK"> ELEKTRONİK
             <input type="radio" name="fsektor" value="MAKINE">  MAKİNE

            <br><br>

            <button type="submit" class="btn btn-primary" >KAYDOL</button><br><br>
            <a href="firma_giris.php">  <button type="button" class="btn btn-danger" >GİRİŞE DÖN</button> </a>

        </form>

        <?php



        $fsektor=$fisim=$fmail=$fparola=$ftel="";

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $fisim = $_POST["fisim"];
            $fsektor = $_POST["fsektor"];
            $fmail = $_POST["fmail"];
            $fparola = $_POST["fparola"];
            $ftel=$_POST["ftel"];
        }




        if($fisim=="" || $fsektor=="" || $fmail=="" || $fparola=="" || $ftel==""){

            echo "*** TÜM ALANLAR DOLDURULMAK ZORUNDA ***";


        }

        else {

            $sql2 = "SELECT * FROM firma_uye WHERE fparola='$fparola'  OR fmail='$fmail' ";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {

                echo "BU MAİL ADRESİ VEYA PAROLA ZATEN KULLANILMIŞ";
            }
            else {


                $sql = "INSERT INTO firma_uye (fisim,fsektor,fmail,fparola,ftel) VALUES ('$fisim','$fsektor','$fmail','$fparola','$ftel')";

                if (mysqli_query($conn, $sql)) {
                    echo "KAYIT BAŞARIYLA OLUŞTURULDU";
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
