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

    <style></style>
</head>
<body>

<center>


    <div class="alert alert-success">

        <h3>ELEMAN - ONLİNE</h3><br>
        <h4>İLAN - KALDIR</h4><br>

    </div>

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
