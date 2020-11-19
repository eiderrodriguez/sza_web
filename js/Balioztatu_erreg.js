function erregistratu(){
    var e = document.getElementById("eposta").value;
    var p1 = document.getElementById("pass").value;
    var p2 = document.getElementById("pass2").value;
    
    //Eposta ehu izan ziurtatu
    var ep = /^[A-Za-z0-9_-]+(@ehu\.)((eus)|(es))$/g;
    var epzuz = ep.test(e);
    if(!epzuz){
        alert("Helbide formatua ez da zuzena!");
        return false;
    }
    
    //Pasahitzak berdinak izan behar
    if(p1!=p2){
        alert("Pasahitzak ez dira berdinak!");
        return false;
    }
}