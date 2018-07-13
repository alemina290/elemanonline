
<?php

session_start();

include("db.php");

if(!isset($_SESSION["login"])){
    header("Location:uye_giris.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>UYE DUZENLE</title>

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
        <h4>UYE SAYFASI</h4><br>


        <?php

        $sql="SELECT * FROM uye WHERE parola='" . $_SESSION["parola"] . "' ";

        $result=$conn->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){

                $_SESSION["resim"]=$row["profil"];

                echo "<img src='upload/".$row["profil"]."' width='150' height='150'><br>";



            }
        }



        ?>

    </div>

    <div class="jumbotron">

        <a href="basvuru.php"> <button type="button" class="btn btn-success">İŞ BAŞVURUSU</button></a><br><br>
        <a href="uye_ayar.php"> <button type="button" class="btn btn-primary">PROFİL AYARLARI</button></a><br><br>
        <a href="giris.php"> <button type="button" class="btn btn-danger">ÇIKIŞ</button></a>


    </div>


</center>

</body>
</html>


