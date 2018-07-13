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

    <title>UYELİK-SİL</title>
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
        <h4>ÜYELİK SİL</h4><br>

    </div>


    <div class="jumbotron" style="height: 50%; width: 30%; padding-top: 30px; margin:30px;">


        <form method="post" class="form-group">

            PAROLA: <input type="password" name="parola"><br><br><br>
            ONAYLA: <input type="password" name="oparola"><br><br>


            <br><br>

            <button type="submit" class="btn btn-danger">SİL</button><br><br>


        </form>


        <br><br>

        <?php


        $parola=$oparola="";

        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $parola = $_POST["parola"];
            $oparola = $_POST["oparola"];


        }

        if($parola=="" || $oparola==""){

            echo "*** TÜM ALANLAR DOLDURULMAK ZORUNDA ***";


        }
        else {
            if ($parola == $_SESSION["fparola"]) {

                if ($parola == $oparola) {

                    $sql2 = "DELETE FROM firma_uye WHERE fparola='" . $_SESSION["fparola"] . "' ";

                    if (mysqli_query($conn, $sql2)) {
                        echo "UYELİĞİNİZ BAŞARIYLA SİLİNDİ";
                        header('refresh: 1; url=giris.php');
                    } else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    }
                }

                else {

                    echo "*** PAROLALAR UYUŞMUYOR ***";

                }

            } else {

                echo "*** PAROLANIZ HATALI ***";
            }

        }





        ?>
    </div>



</center>

</body>
</html>
