function object(){
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
    }
    http = object();
    function livesearch(data){
    if(data != ""){
    http.onreadystatechange = process;
    http.open('GET', 'db.php?data=' + data, true);
    http.send();
    }else{
    document.getElementById("result").innerHTML = "";
    }
    }
    
    function process(){
    if(http.readyState==4 && http.status==200){
    result = http.responseText;
    document.getElementById("result").innerHTML = result;
    }
    }