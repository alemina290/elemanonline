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

    <title>İLAN-KALDIR</title>
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
                <a class="navbar-brand" href="firma_duzenle.php">ELEMAN-ONLİNE</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">


            </div>
        </div>

        <h3 style="color: dimgray">İLAN-SİL</h3><br>
    </nav>

    <?php

    $ifade="---";
        $sql = "UPDATE firma_uye  SET departman='$ifade' , tecrube='$ifade' , yabanci='$ifade' WHERE fparola='" . $_SESSION["fparola"] . "' ";

        if (mysqli_query($conn, $sql)) {
            echo "İLANINIZ KALDIRILDI";
            header('refresh: 1; url=firma_duzenle.php');
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            ?>




</center>

</body>
</html>
