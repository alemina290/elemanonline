<?php

include ("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>UYE GİRİŞ</title>

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
        <h4>UYE GİRİS</h4>


    </div>
    <div class="jumbotron" style="height: 50%; width: 20%; padding-top: 30px; margin:30px;">


        <form method="post" class="form-group" name="myForm" action="uye_login.php">

            E-MAİL :  <input type="email" name="ka" pattern=".+@.+.com" placeholder="example@example.com"> <br><br>
            PAROLA         :  <input type="password" name="sifre"> <br><br>

             <button type="submit"  class="btn btn-success"  >GİRİŞ</button>

            <p>YADA</p>

            <a href="uye_ol.php">   <button type="button" class="btn btn-danger" >KAYDOL</button> </a><br><br>



            <label>*İŞ BAŞVURUSU YAPABİLMEK İÇİN ÜYE GİRİŞİ YAPMANIZ GEREKMEKTEDİR</label>

        </form>

    </div>


</center>

</body>
</html>


