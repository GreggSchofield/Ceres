// Return the resutl of a PHP request
function callPHP(filename){
  console.log("Calling " + filename);
  var xmlhttp;
  if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }else{// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    var returnVal = -1;
    xmlhttp.open("GET",filename,false);
    xmlhttp.onload = function(evt) {
      returnVal = xmlhttp.responseText;
    }
    xmlhttp.onerror = function(evt) {
      returnVal = -1;
    }
    xmlhttp.send();
    return returnVal;
}

// Output the result of a PHP request to an alert message
function alertPHP(filename){
  var str = callPHP(filename);
  alert(str);
}
