<!DOCTYPE html>
<?php
ob_start();
session_start();
error_reporting(0);
?>
<html>

<head>
<?php require 'head.php';?>
</head>

<body>

    <body background="style/img/back01.png">
        <div id="header">
            <img src="style/img/banner_rahmad.jpg" class="banner">
        </div>
        <div id='cssmenu'>
            <?php require 'menubar1.php';?>
        </div>

             <div id="isi" style="padding: 0 !important">
            <img src="style/img/isi.png" style="width: 129.2%; height: 100%">

        </div>
        <div id="footer">
            <center>
                <p>Copyright &copy; UNINDRA 2019</p>
            </center>
        </div>
    </body>

</html>