<html>
<head>
    <title>Clinica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="style.css"/>
  
    </head>
    <body oncontextmenu="return true;">
       <iframe name="myframe" style="display:none;"></iframe>
               <form autocomplete="off" name="myform" method="post" target="_self">
        <div id="container3">
           <div style="width:90%;margin:0 auto;margin-top:10vw;margin-bottom:25vw;">
               <div onclick="window.location.href='dashboard.php'" style="display:flex;margin-bottom:5vw;align-items:center;">
               <img src="images/backarrow.png" style="width:4vw;height:4vw;"/>
                   <h2 style="margin:0;margin-left:3vw;">Dashboard</h2>
               </div>
             <h1>Information du patient</h1>
                   <h2>Nom</h2>
            <input type="text" role="presentation" autocomplete="off"   name="nom" id="nom"/>
            <h2>Prenom</h2>
            <input type="text" role="presentation" autocomplete="off"   name="prenom" id="prenom"/>
            <h2>Sexe</h2>
               <input name="s1" hidden id="s1"/>
               <input name="s2" hidden id="s2"/>
               <input name="s3" hidden id="s3"/>
            <select id="select1" onchange="val()">
                <option value="Masculin">Masculin</option>
                <option value="Feminin">Feminin</option>
            </select>
            <h2>Annee de naissance</h2>
            <input type="text"  role="presentation" autocomplete="off"  name="anneedenaissance" id="anneedenaissance"/>
            <h2>Mobile</h2>
            <input type="text" role="presentation" autocomplete="off"   name="mobile" id="mobile"/>
            <h2>Email</h2>
            <input type="text" role="presentation" autocomplete="off"   name="email" id="email"/>
             <h2>Etat civil</h2>
            <select id="select2" onchange="val2()">
                <option value="Célibataire">Célibataire</option>
                <option value="Marié">Marié</option>
                  <option value="Divorcé">Divorcé</option>
                <option value="Veuf">Veuf</option>
                  <option value="Non marié">Non marié</option>
                <option value="Lié par un partenariat enregistré">Lié par un partenariat enregistré</option>
                <option value="Partenariat dissous judiciairement">Partenariat dissous judiciairement</option>
                <option value="Partenariat dissous par décès">Partenariat dissous par décès</option>
                  <option value="Partenariat dissous ensuite de déclaration d'absence">Partenariat dissous ensuite de déclaration d'absence</option>
            </select>
                <h2>Assurance</h2>
            <select id="select3"  onchange="val3()">
                <option value="le régime général pour les salariés">le régime général pour les salariés</option>
                <option value="la MSA (Mutualité Sociale Agricole)">la MSA (Mutualité Sociale Agricole)</option>
                               <option value="la sécurté sociale des indépendants pour les indépendants.">la sécurté sociale des indépendants pour les indépendants.</option>
            </select>
                <h2>Adresse</h2>
            <input type="text"  role="presentation" autocomplete="off"  name="adresse" id="adresse"/>
                <button name="sv3" id="sv3" type="button" onclick="sub()" style="color:white;background:#5252ff;margin-top:5vw;">Sauvegarder</button>
                <button name="sv3_3" id="sv3_3" type="submit" hidden></button>
               <?php
               if(isset($_POST['sv3_3'])){
                    $nom = $_POST['nom'];
                           $prenom = $_POST['prenom'];
                           $sexe = $_POST['s1'];
                           $annedenaissance = $_POST['anneedenaissance'];
                            $mobile = $_POST['mobile'];
                            $email = $_POST['email'];
                            $etatcivil = $_POST['s2'];
                           $assurance = $_POST['s3'];
                           $adresse = $_POST['adresse'];
                         
                   if(!file_exists("patiens.txt"))
                       file_put_contents("patiens.txt", "");
                           $json = json_decode(file_get_contents("patiens.txt"),TRUE);
                            if(!empty($json))
                            {
                               $json[count($json)+1] = array("nom" => $nom, "prenom" => $prenom,"sexe"=>$sexe,"annedenaissance"=>$annedenaissance, "mobile" =>$mobile, "email"=>$email,"etatcivil"=>$etatcivil,"assurance"=>$assurance,"adresse"=>$adresse); 
                            }
                           else{
                               $json[1] = array("nom" => $nom, "prenom" => $prenom,"sexe"=>$sexe,"annedenaissance"=>$annedenaissance, "mobile" =>$mobile, "email"=>$email,"etatcivil"=>$etatcivil,"assurance"=>$assurance,"adresse"=>$adresse);  
                           }
                           file_put_contents("patiens.txt", json_encode($json));
                        
                           
                   
               }
               ?>
                 <button type="button" style="color:white;background:#ff2424" onclick='javascript:Clear2()'>Effacer Tous</button>
            </div>
            
                   </div>
                   
  
                   <div id="error-mobile">
      <img src="images/mobile.gif"/>
      <h2>This page only works in mobile</h2>
                   </div>
                   
                    <div id="success">
        <img src="images/success.gif"/>
        </div>
                   
        <script type="text/javascript">
            function Clear2(){
                document.getElementById("nom").value="";
                document.getElementById("prenom").value="";
                document.getElementById("anneedenaissance").value="";
                document.getElementById("mobile").value="";
                document.getElementById("email").value="";
                document.getElementById("adresse").value="";
            }
            val();
              val2();
            val3();
          function val() {

    var selectElement = document.getElementById("select1");
    var value = selectElement.value;
    document.getElementById("s1").value=value;
}
            function val2() {

    var selectElement = document.getElementById("select2");
    var value = selectElement.value;
    document.getElementById("s2").value=value;
}
                function val3() {

    var selectElement = document.getElementById("select3");
    var value = selectElement.value;
    document.getElementById("s3").value=value;
}
            
            function sub(){
                document.getElementById("success").style.display="flex";
                setTimeout(function(){
                    document.getElementById("sv3_3").click();
                }, 3000);
            }
</script>
        </form> 
    </body>
</html>