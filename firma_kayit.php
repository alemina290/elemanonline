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
        <h3 style="color: dimgray">FİRMA-KAYIT</h3><br>
    </nav>


    <div class="container" style="height: 50%; width: 40%; padding-top: 30px; margin:30px;">


        <form method="post" class="form-horizontal">

            <div class="form-group">

                <label class="control-label col-sm-2" for="fisim">FİRMA İSMİ:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fisim">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="fmail">E-MAİL:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="fmail" pattern=".+@.+.com" placeholder="example@example.com">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="ftel">TELEFON:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control"  name="ftel"   pattern="[0-9]{10}" placeholder="5369656874">

                </div></div>

            <div class="form-group">

                <label class="control-label col-sm-2" for="fparola">PAROLA:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="fparola"  minlength="4"> <br><br>

                </div>
            </div>

            <div class="form-group" >

                <label class="control-label col-sm-2" for="fsektor">SEKTOR:</label>
                <div class="col-sm-10" style="font-size: 1.3em">
                    <input type="radio"  class="r" name="fsektor" value="YAZILIM" >  YAZILIM
                    <input type="radio"  class="r" name="fsektor" value="ELEKTRONIK">  ELEKTRONİK
                    <input type="radio"  class="r" name="fsektor"  value="MAKINE">  MAKİNE

                </div></div>


            <br><br>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">KAYDOL</button> <br><br>



                    <a href="firma_giris.php">    <button type="button" class="btn btn-basic">GİRİŞE DÖN</button>  </a>
                </div>
            </div>
        </form>
    </div>

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

            echo "<h4> *** TÜM ALANLAR DOLDURULMAK ZORUNDA *** </h4>";


        }

        else {

            $sql2 = "SELECT * FROM firma_uye WHERE fparola='$fparola'  OR fmail='$fmail' ";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {

                echo "<h4> BU MAİL ADRESİ VEYA PAROLA ZATEN KULLANILMIŞ </h4>";
            }
            else {


                $sql = "INSERT INTO firma_uye (fisim,fsektor,fmail,fparola,ftel) VALUES ('$fisim','$fsektor','$fmail','$fparola','$ftel')";

                if (mysqli_query($conn, $sql)) {
                    echo "<h4> KAYIT BAŞARIYLA OLUŞTURULDU </h4>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }
        }

        ?>
</center>


</body>
</html>
