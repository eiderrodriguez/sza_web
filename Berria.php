<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="Estiloak.css">
    <script src="Balioztatu_berri.js"></script>
</head>
<body>
    <div id="bannerimage"></div>
    <br>
    <section class="main" id="s1">
        <div class="formularioa">
            <form id="berriaF" name="berriaF" method="post" action="">
                <p>Zeregina: <input type="text" id="zergatia" name="zergatia" size="40" required/></p>
                <p>Eguna: <input type="number" id="eguna" name="eguna" min="1" max="31" required/></p>
                <p>Hilabetea:
                    <select id="hil" name="hil" required>
                        <option value="01">Urtarrila</option>
                        <option value="02">Otsaila</option>
                        <option value="03">Martxoa</option>
                        <option value="04">Apirila</option>
                        <option value="05">Maiatza</option>
                        <option value="06">Ekaina</option>
                        <option value="07">Uztaila</option>
                        <option value="08">Abuztua</option>
                        <option value="09">Iraila</option>
                        <option value="10">Urria</option>
                        <option value="11">Azaroa</option>
                        <option value="12">Abendua</option>
                    </select>
                </p>
                <p>Urtea:
                    <input type="radio" id="urtea" name="urtea" value="2020">2020
                    <input type="radio" id="urtea" name="urtea" value="2021" checked>2021
                    <input type="radio" id="urtea" name="urtea" value="2022">2022
                    <input type="radio" id="urtea" name="urtea" value="2023">2023
                </p>
                <br><br>
                <input type="submit" id="bidali" name="bidali" value="Gorde"/>
            </form>  
        </div>
        <div class="enlazeak">
            <br><br>
            <a href="Ikusi.php?aux=<?php echo $_GET['aux']?>">Agenda ikusi</a>
            <br><br>
            <a href="Proiektua.php">Irten</a>
        </div>
    </section>
</body>
</html>
<?php
    $konekt = mysqli_connect("localhost", "id15386124_eider", "%76Z>1fO97{-63]E", "id15386124_sza");
    if (!$konekt) {
        die("Connection failed: " . mysqli_error());
    }
    if(isset($_POST['bidali'])){
        function test_input($data){
            return trim($data);
        }
        $eposta = $_GET['aux'];
        
        $egun = $_POST['eguna'];
        $hil = $_POST['hil'];
        $urt = $_POST['urtea'];
        
        $d = "$urt-$hil-$egun";
        $z = test_input($_POST['zergatia']);
        
        $sql = "INSERT INTO agenda (Eposta, Data, Zeregina) VALUES ('$eposta', '$d', '$z')";
        
        if(mysqli_query($konekt, $sql)){
            echo "<script type='text/javascript'>alert('Ondo gorde da!');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Errorea');</script>";
        }
    }
?>