<?php
session_start();

if(isset($_SESSION['user'])){
    if($_SESSION['user']=="1")
      echo "<script>window.location.href='Dashboard.php?page=stats'</script>";
}
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
                   <div style="display:flex;align-items:center;justify-content:center;widht:100%;height:100%;">
                   <div id="container3" name="loginpanel">
                   <img src="images/logo2.png"/>
                       <div style="margin-top:1.5vw;display:flex;width:90%">
                       <a >Nom d'utilisateur</a>
                       </div>
                       <input type="text" autocomplete="off" id="nom1" name="nom11"/>
                       <div style="margin-top:1.5vw;display:flex;width:90%">
                       <a >Mot de passe</a>
                       </div>
                       <input type="text" autocomplete="off" id="pass11" name="pass11"/>
                       <div style="display:flex">
                           
                       <button name="login">Login</button>
                       
                           <button type="button" id="signup1" style="width:14vw;margin-left:1vw;">Creer compte</button>
                       </div>
                            <?php
                           if(isset($_POST['login']))
                           {
                                if(file_exists("users.txt")){
                                    
                                    
                                     $json = json_decode(file_get_contents("users.txt"),TRUE);

            
             if(!empty($json)){
                 $c=0;
                 foreach($json as $item){
                     $nom = $item['nomutilisateur'];
                     $motdepasse = $item['motdepasse'];
                     
                     $nom1 = $_POST['nom11'];
                     $motdepasse1 = $_POST['pass11'];
                   
                     
                     if($nom==$nom1 && $motdepasse1==$motdepasse){
                         $c=1;
                         break;
                     }
                 }
                 
                 if($c==0){
                     echo "<br>Incorrect info";
                 }
                 else{
                     $_SESSION['user'] = "1";
                     echo "<script>window.location.href='Dashboard.php?page=stats'</script>";
                 }
                 
             }
                                }
                           }
                           ?>
                   </div>
                       <div id="container3" name="signuppanel" style="display:none">
                   <img src="images/logo2.png"/>
                       <div style="margin-top:1.5vw;display:flex;width:90%">
                       <a >Nom d'utilisateur</a>
                       </div>
                       <input type="text" autocomplete="off" id="nom1" name="nom1"/>
                       <div style="margin-top:1.5vw;display:flex;width:90%">
                       <a >Mot de passe</a>
                       </div>
                       <input type="text" autocomplete="off" id="pass1" name="pass1"/>
                             <div style="margin-top:1.5vw;display:flex;width:90%">
                       <a >Retaper Mot de passe</a>
                       </div>
                       <input type="text" autocomplete="off" id="pass1" name="pass1"/>
                       <div style="display:flex">
                       <button name="signupp">Creer compte</button>
                           <?php
                           if(isset($_POST['signupp'])){
                           
                    $nomutilisateur = $_POST['nom1'];
                    $motdepasse = $_POST['pass1'];
                    if(!file_exists("users.txt"))
                       file_put_contents("users.txt", "");
 $json = json_decode(file_get_contents("users.txt"),TRUE);
  if(!empty($json))
                            {
                               $json[count($json)+1] = array("nomutilisateur" => $nomutilisateur, "motdepasse" => $motdepasse); 
                            }
                           else{
                           $json[1] = array("nomutilisateur" => $nomutilisateur, "motdepasse" => $motdepasse); 
                           }
                           file_put_contents("users.txt", json_encode($json));
                        
                    
                    
                 $_SESSION['user'] = "1";
                     echo "<script>window.location.href='Dashboard.php?page=stats'</script>";
                }
                         
                           ?>
                           <button type="button" id="login2" style="width:14vw;margin-left:1vw;">Login</button>
                       </div>
                        
                   </div>
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