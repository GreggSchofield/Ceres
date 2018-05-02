function Checkpassword(pwd){
  console.log("CHECKING");
 var Weak,Medium,Strong,Display;
 var num=0;
 var passwordLv=0;
 for(i=0; i<pwd.length; i++){
  var charType=0;
  var t=pwd.charCodeAt(i);
  if(t>=48 && t <=57){charType=1;}
  else if(t>=65 && t <=90){charType=2;}
  else if(t>=97 && t <=122){charType=4;}
  else{charType=4;}
  passwordLv |= charType;
 }
 for(i=0;i<4;i++){
 if(passwordLv & 1){num++;}
   passwordLv>>>=1;
 }
 if(pwd.length<=4){num=1;}
 if(pwd.length<=0){num=0;}
 switch(num){
  case 1 :
   Weak="pwd pwd_Weak_c";
   Medium="pwd pwd_c";
   Strong="pwd pwd_c pwd_c_r";
   Display="Weak";
  break;
  case 2 :
   Weak="pwd pwd_Medium_c";
   Medium="pwd pwd_Medium_c";
   Strong="pwd pwd_c pwd_c_r";
   Display="Medium";
  break;
  case 3 :
   Weak="pwd pwd_Strong_c";
   Medium="pwd pwd_Strong_c";
   Strong="pwd pwd_Strong_c pwd_Strong_c_r";
   Display="Strong";
  break;
  default :
   Weak="pwd pwd_c";
   Medium="pwd pwd_c pwd_f";
   Strong="pwd pwd_c pwd_c_r";
   Display="";
  break;
 }
 document.getElementById('pwd_Weak').className=Weak;
 document.getElementById('pwd_Medium').className=Medium;
 document.getElementById('pwd_Strong').className=Strong;
 document.getElementById('pwd_Medium').innerHTML=Display;
}
