<?php
    $id = $_POST['id'];
    $konekt = mysqli_connect("localhost","id15386124_eider","%76Z>1fO97{-63]E","id15386124_sza"); 
    if (!$konekt) {
        die("Connection failed: " . mysqli_error());
    }
    
    $datuak = $konekt->query("DELETE FROM agenda WHERE ID='$id'");
    
    echo "Ondo ezabatu da!";
?>