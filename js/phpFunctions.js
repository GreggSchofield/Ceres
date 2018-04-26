// Return the resutl of a PHP request

var $_GET = {};
function loadGet() {
  if(document.location.toString().indexOf('?') !== -1) {
      var query = document.location
                     .toString()
                     // get the query string
                     .replace(/^.*?\?/, '')
                     // and remove any existing hash string (thanks, @vrijdenker)
                     .replace(/#.*$/, '')
                     .split('&');

      for(var i=0, l=query.length; i<l; i++) {
         var aux = decodeURIComponent(query[i]).split('=');
         $_GET[aux[0]] = aux[1];
      }
  }
}

function callGet(filename){
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

function callPost(filename, variables) {
  console.log("Calling " + filename);
  var xmlhttp=new XMLHttpRequest();
  var returnVal = -1;
  xmlhttp.open("POST",filename,false);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.onload = function(evt) {
    returnVal = xmlhttp.responseText;
  }
  xmlhttp.onerror = function(evt) {
    returnVal = -2;
  }
  xmlhttp.send(variables);
  return returnVal;
}

function uploadImageToServer(file, filename) {

}

// Output the result of a PHP request to an alert message
function alertPHP(filename){
  var str = callPHP(filename);
  alert(str);
}
