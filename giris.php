<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>ELEMAN-ONLİNE</title>
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
        <h4>ANASAYFA</h4>

    </div>
    <div class="jumbotron">



         <a href="firma_giris.php" >  <button type="button" class="btn btn-primary" >FİRMA ÜYE GİRİŞİ</button> </a>
        <a href="uye_giris.php" <button type="button" class="btn btn-danger">GİRİŞ YAP</button>  </a>
        <a href="uye_giris.php" <button type="button" class="btn btn-info">İŞ BAŞVURUSU</button>  </a>

    </div>


    <?php

   include("db.php");

echo "<div class='container'>";
        echo "<table class='table table-striped'>";

            echo " <tr> ";

                echo "<th> FİRMA İSMİ </th>";
                echo " <th> SEKTÖR </th> ";
                echo " <th> E-MAİL </th> ";
                echo " <th> TELEFON </th> ";



                echo "</tr>";




            $sql = "SELECT * FROM firma_uye";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {




            echo "<tr>";
                echo "<td> ".$row["fisim"]." </td>";
                echo "<td> ".$row["fsektor"]." </td>";
                echo "<td> ".$row["fmail"]." </td>";
                echo "<td> ".$row["ftel"]." </td>";


            echo "</tr>";


            }

            }
    echo "</table>";

            echo "<br><br>";

            echo "*** FİRMALARIN İLANLARINI GÖREBİLMEK VE İŞ BAŞVURUSU YAPABİLMEK İÇİN GİRİŞ YAPMANIZ GEREKMEKTEDİR ***";

            echo "<br><br><br><br><br><br><br>";

            echo "Copyright © 2018 Tüm Hakları Saklıdır";

            echo "</div>"

            ?>

</center>



</body>
</html>
