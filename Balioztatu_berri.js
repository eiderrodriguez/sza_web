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
        var data = u + "-" + h +"-" + e;
        
        var date = new Date();
        var y = date.getFullYear();
        var m = date.getMonth()+1;
        var d = date.getDate();
        var compare = y + "-" + m +"-" + d;

        if(data<compare){
            alert("Data pasa da jadanik!");
            return false;
        }
    })
});