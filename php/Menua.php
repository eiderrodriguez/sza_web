<!DOCTYPE html>
<html>
<head>
    <title>Proiektua Eider</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Estiloak.css">
</head>
<body>
    <div id="bannerimage"></div>
    <?php
        //eposta lortu
        $eposta = $_GET['aux'];
    ?>
    <div class="enlazeak">
        <br><br>
        <a href="../php/Berria.php?aux=<?php echo $eposta?>">Berria agendatu</a>
        <br><br>
        <a href="../php/Ikusi.php?aux=<?php echo $eposta?>">Agenda ikusi</a>
        <br><br>
        <a href="../php/Proiektua.php" onclick="alert('Agur!');">Irten</a>
    </div>
</body>
</html>