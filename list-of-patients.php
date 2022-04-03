<html>
<head>
    <title>Clinica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="style.css"/>
  
    </head>
    <body oncontextmenu="return true;">
       <iframe name="myframe" style="display:none;"></iframe>
               <form autocomplete="off" name="myform" method="post" target="_self">
        <div id="container2">
                   <?php
                       $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
 $url = $base_url . $_SERVER["REQUEST_URI"];
                              
                              $pos = strpos($url, "?str=");
                         
       if(file_exists("patiens.txt"))
{
 $json = json_decode(file_get_contents("patiens.txt"),TRUE);

            
             if(!empty($json)){
                 echo "<table id='table2'><tr><th>Nom</th><th>Prenom</th><th>Sexe</th><th >Annee de naissance</th><th>Mobile</th><th>Email</th><th>Etat Civil</th><th>Assurance</th><th>Adresse</th></tr>";
                 $cs=0;
                 $id=0;
                   foreach($json as $item) { 
                      
    $nom = $item['nom'];
                       if($nom!=""){
                           
                           
                           
                           
                       $prenom = $item['prenom']; 
                       $sexe = $item['sexe']; 
                       $anneedenaissance = $item['annedenaissance']; 
                           $mobile = $item['mobile']; 
                           $email = $item['email']; 
                         $etatcivil = $item['etatcivil']; 
                            $assurance = $item['assurance']; 
                              $adresse = $item['adresse'];
                           
                           
                           
                           if($pos > -1)
                              {
                               
                                $url_components = parse_url($url);
                              parse_str($url_components['query'], $params);   
                         
                               
                                $col="#eee";
                       if($cs==0){
                           $col="#fff";
                           $cs=1;
                       }
                       else {
                           $cs=0;
                           $col="#eee";
                       }
                         if( strpos(strtolower($nom." ".$prenom), strtolower($params['str'])) > -1)
                         {
                              echo "<tr style='background:$col'>";
                       echo "<td>$nom</td>";
                       echo "<td>$prenom</td>";
                         echo "<td>$sexe</td>";
                       echo "<td>$anneedenaissance</td>";
                            echo "<td>$mobile</td>";
                            echo "<td>$email</td>";
                       echo "<td>$etatcivil</td>";
                                  echo "<td>$assurance</td>";
                               echo "<td>$adresse</td>";
                    
                       echo "</tr>";
                           
                           
                         }
                                     
                              }
                           
                      else{
                           $col="#eee";
                       if($cs==0){
                           $col="#fff";
                           $cs=1;
                       }
                       else {
                           $cs=0;
                           $col="#eee";
                       }
                           echo "<tr style='background:$col'>";
                       echo "<td>$nom</td>";
                       echo "<td>$prenom</td>";
                         echo "<td>$sexe</td>";
                       echo "<td>$anneedenaissance</td>";
                            echo "<td>$mobile</td>";
                            echo "<td>$email</td>";
                       echo "<td>$etatcivil</td>";
                                  echo "<td>$assurance</td>";
                               echo "<td>$adresse</td>";
               
                       echo "</tr>";
                           
                           
                      }
                           
                           
                           
                       }
                       $id++;
}
                 
                 echo "</table>";
           
             }
           
           
}
     
            ?>
                   </div>
  <div id="error-mobile">
      <img src="images/mobile.gif"/>
      <h2>This page only works in mobile</h2>
                   </div>
        <script type="text/javascript">
            
</script>
        </form> 
    </body>
</html>