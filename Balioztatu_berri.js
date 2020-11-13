$(document).ready(function(){
    $("#berriaF").submit(function(){
        var e = $("#eguna").val();
        var h = $("#hil").val();
        var u = document.getElementsByName('urtea');

        for (var i = 0, length = u.length; i < length; i++) {
            if (u[i].checked) {
                u = u[i].value;
                break;
            }
        }
        if(h=="04" || h=="06" || h=="09" || h=="11"){
            if(e=="31"){
                alert("Hilabeteak ez ditu 31 egun!");
                return false;
            }
        }
        else if(h=="02"){
            if(e=="29" || e=="30" || e=="31"){
                alert("Hilabeteak 28 egun baino gutxigo ditu!");
                return false;
            }
        }
    })
});