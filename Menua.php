<!DOCTYPE html>
<html>
<head>
    <title>Proiektua Eider</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Estiloak.css">
</head>
<body>
    <div id="bannerimage"></div>
    <?php
        $eposta = $_GET['aux'];
    ?>
    <div class="enlazeak">
        <br><br>
        <a href="Berria.php?aux=<?php echo $eposta?>">Berria agendatu</a>
        <br><br>
        <a href="Ikusi.php?aux=<?php echo $eposta?>">Agenda ikusi</a>
        <br><br>
        <a href="Proiektua.php">Irten</a>
    </div>
</body>
</html>