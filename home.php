<?php
session_start();
?>
<html>
<head>
    <title>Clinica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="style.css"/>
  
    </head>
    <body oncontextmenu="return true;">
       <iframe name="myframe" style="display:none;"></iframe>
               <form autocomplete="off" name="myform" method="post" target="_self">
                          <img id="poster" src="images/bg.png"/>    
                     
                   <div id="container4">
                
                   <div id="header">
                   <a>Bienvenue</a>
                       
                   </div>
                   <div id="nav">
                   
                   </div>
                   <div id="content">
                       
                   <div id="dv1">
                       <div style="position:relative;left:5vw;display:flex;flex-direction:column;align--items:center;height:100%;justify-content:center">
                           <h1 style="font-size:4vw;width:40vw;">Total Health Care Solution</h1>
                           <button type="button" onclick="window.location.href='login.php'">Se connecter</button>
                       </div>
                       <div id="poster2"></div>
                       </div>
                       <div id="dv2"></div>
                   </div>
                       <img src="images/clinic.jpeg"/>
                   </div>
                   
                   
                   
                   <script type="text/javascript">
          document.getElementById("signup1").onclick=function(){
              document.getElementsByName("loginpanel")[0].style.display="none";
              document.getElementsByName("signuppanel")[0].style.display="flex";
          }
           document.getElementById("login2").onclick=function(){
              document.getElementsByName("loginpanel")[0].style.display="flex";
              document.getElementsByName("signuppanel")[0].style.display="none";
          }
</script>
        </form> 
    </body>
</html>