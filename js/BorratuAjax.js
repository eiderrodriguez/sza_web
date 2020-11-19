//Ajax erantzun baten ostean zabor klasea ongi funtzionatzeko, document on
$(document).on("click", ".zabor", function(){
    var zenb = $(this).attr('id');
    $.ajax({
        method: "POST",
        cache: false,
        url: "../php/Ezabatu.php",
        data: {id: zenb},
        success: function (iruzkina){
            if(iruzkina=="Ondo ezabatu da!"){
                alert ("Ondo ezabatu da!");
                //Taula birkargatu, espazioa garrantzitsua
                $("#taula").load(" #taula");
            }
        }   
    });
});