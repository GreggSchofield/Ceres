// NOTE THAT THIS DOES NOT HAVE TO BE USED BUT IT COULD BE PARTICULARLY USEFUL?
// This script checks what internet browser the client is using via the navigator
// object and loads the appropriate stylesheet.
// Created: 22/04/18
// Author: Gregg Schofield
<script>
if (navigator.appName == 'Netscape') {
  document.writeln('<link rel=stylesheet type="text/css" ’ + href="netscape.css">')
} else if (navigator.appName == 'Microsoft Internet Explorer') {
    document.writeln('<link rel=stylesheet type="text/css" ’ + href="microsoftIE.css">')
  } else {
    document.writeln('<link rel=stylesheet type="text/css" ’ + href="other.css">')
  }
</script>
