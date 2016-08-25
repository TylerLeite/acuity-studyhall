

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$query = "func=off";
if (isset($_GET['light'])) {
    $query = "func=on";
} else if (isset($_GET['dim'])) {
    $query = "func=dim&amt=" . $_GET['v'];
}
?>


<html>
<head>
    <style>
        .square {
            display: inline-block;
            height: 100px;
            width: 100px;
            background-color: green;        
        }    
        a:link, a:visited {
            color: white;        
        }
        .black {
            background-color: black !important;
            text-align: center;  
        }
    </style>
</head>
<body>
    <div class="row">
        <a href="?dark"><div class="square black">Off</div></a>
        <a href="?light"><div class="square black">On</div></a>
        <a href="?dim&v=20"><div class="square black">Dim</div></a>
    </div><br>

    <div class="row">
        <a href="http://localhost/acuity/sendreq.php?func=off&all=yes"><div class="square black">All Off</div></a>
        <a href="http://localhost/acuity/sendreq.php?func=on&all=yes"><div class="square black">All On</div></a>
        <a href="http://localhost/acuity/sendreq.php?func=dim&amt=20&all=yes"><div class="square black">All Dim</div></a>
    </div><br>

    <div class="row">
        <a href="http://localhost/acuity/sendreq.php?id=a&<?php echo $query; ?>"><div class="square"></div></a>
        <a href="http://localhost/acuity/sendreq.php?id=c&<?php echo $query; ?>"><div class="square"></div></a>
        <a href="http://localhost/acuity/sendreq.php?id=e&<?php echo $query; ?>"><div class="square"></div></a>
    </div><br>
    <div class="row">
        <a href="http://localhost/acuity/sendreq.php?id=f&<?php echo $query; ?>"><div class="square"></div></a>
        <a href="http://localhost/acuity/sendreq.php?id=g&<?php echo $query; ?>"><div class="square"></div></a>
        <a href="http://localhost/acuity/sendreq.php?id=h&<?php echo $query; ?>"><div class="square"></div></a>
    </div><br>
    <div class="row">
        <a href="http://localhost/acuity/sendreq.php?id=i&<?php echo $query; ?>"><div class="square"></div></a>
        <a href="http://localhost/acuity/sendreq.php?id=k&<?php echo $query; ?>"><div class="square"></div></a>
        <a href="http://localhost/acuity/sendreq.php?id=m&<?php echo $query; ?>"><div class="square"></div></a>
    </div><br>

</body>
</html>
