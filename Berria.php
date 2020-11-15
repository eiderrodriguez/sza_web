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
        $sql1 = "SELECT Izena FROM erabiltzaileak WHERE Eposta='$eposta'";
        $sql2 = "SELECT Eposta FROM erabiltzaileak WHERE Izena='$eposta'";
        
        $r1 = mysqli_query($konekt, $sql1);
        $r2 = mysqli_query($konekt, $sql2);
        
        $count1 = mysqli_num_rows($r1);
        $count2 = mysqli_num_rows($r2);
        if($count1 != 0){
            $row = $r1->fetch_assoc();
            $izen = $row['Izena'];
        }
        else if($count2 != 0){
            $izen = $eposta;
            $row = $r2->fetch_assoc();
            $eposta = $row['Eposta'];
        }
        
        $egun = $_POST['eguna'];
        $hil = $_POST['hil'];
        $urt = $_POST['urtea'];
        
        $d = "$urt-$hil-$egun";
        $z = test_input($_POST['zergatia']);
        
        $sql = "INSERT INTO agenda (Eposta, Izena, Data, Zeregina) VALUES ('$eposta', '$izen', '$d', '$z')";
        
        if(mysqli_query($konekt, $sql)){
            echo "<script type='text/javascript'>alert('Ondo gorde da!');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Errorea');</script>";
        }
    }
?>