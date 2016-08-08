
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if(window.XMLHttpRequest){
            var xmlhttp = new XMLHttpRequest();
        }
        else{
            var xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "gethint.php?search=" + str, true);
        xmlhttp.send();
    }
}
function clear(){
    document.getElementById("txtHint").innerHTML = "";
}