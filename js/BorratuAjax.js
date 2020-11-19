$(document).ready(function(){
    $("[name='zabor']").click(function(){
        var zenb = $(this).attr('id');
        $.ajax({
            method: "POST",
            cache: false,
            url: "../php/Ezabatu.php",
            data: {id: zenb},
            success: function (iruzkina){
                if(iruzkina=="Ondo ezabatu da!"){
                    alert ("Ondo ezabatu da!");
                    $("#taula").load(" #taula");
                }
            }   
        });
    });
});