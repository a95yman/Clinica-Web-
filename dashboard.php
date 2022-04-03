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
               <form onkeydown="return event.key != 'Enter';" autocomplete="off" name="myform" method="post" target="_self">
        
       <div id="container">
           <div id="left-panel">
               <div id="logo-panel">
               <img src="images/logo.png"/>
                   <h3>Clinica</h3>
               </div>
               <div id="dashboard" onclick="Stats()">
               <img src="images/dashboard.png"/>    
                   <a>Dashboard</a>
               </div>
               <button hidden type="submit" id="dashboard1" name="dashboard1"></button>
               <?php
               if(isset($_POST['dashboard1'])){
                   echo "<script>window.location.href='dashboard.php?page=stats'</script>";
               }
               ?>
               <div class="item">
                   <div class="item-main">
                       <img src="images/patient.png" class="icon"/>
                       <a>Les patients</a>
                   </div>
                   <div class="item-subs">
                      
                    <div onclick="Show('list-of-patients');" class="item-main">
                       <img src="images/list.png" class="icon"/>
                       <a>Liste des patients</a>
                   </div>
                        <div onclick="Show('add-new-patient');" class="item-main">
                       <img src="images/add.png" class="icon"/>
                       <a>Ajouter un patient</a>
                   </div>
                   </div>
               </div>
               <div class="item">
                   <div class="item-main">
                       <img src="images/rdv.png" class="icon"/>
                       <a>Les rendez-vous</a>
                   </div>
                   <div class="item-subs">
                    <div class="item-main" onclick="Show('list-of-rdvs');">
                       <img src="images/list.png" class="icon"/>
                       <a>Liste des RDV</a>
                   </div>
                        <div class="item-main" onclick="Show('add-new-rdv');">
                       <img src="images/add.png" class="icon"/>
                       <a>Ajouter un RDV</a>
                   </div>
                   </div>
               </div>
               <div class="item">
                   <div class="item-main">
                       <img src="images/consulting.png" class="icon"/>
                       <a>Les consultations</a>
                   </div>
                   <div class="item-subs">
                    <div class="item-main" onclick="Show('list-of-consultings')">
                       <img src="images/list.png" class="icon"/>
                       <a>Liste des consultations</a>
                   </div>
                        <div onclick="Show('add-new-consulting')" class="item-main">
                       <img src="images/add.png" class="icon"/>
                       <a>Ajouter une consultation</a>
                   </div>
                   </div>
               </div>
               <div class="item">
                   <div class="item-main">
                       <img src="images/settings.png" class="icon"/>
                       <a>Parametres</a>
                   </div>
                   <div class="item-subs">
                    <div onclick="Show('informations-generales')" class="item-main">
                       <img src="images/info.png" class="icon"/>
                       <a>Informations generales</a>
                   </div>
                        <div class="item-main">
                       <img src="images/consulting.png" class="icon"/>
                       <a>Consulation</a>
                   </div>
                       <div class="item-main">
                       <img src="images/authentication.png" class="icon"/>
                       <a>Authentification</a>
                   </div>
                       <div class="item-main">
                       <img src="images/database.png" class="icon"/>
                       <a>Fichier de donnees</a>
                   </div>
                       <div class="item-main">
                       <img src="images/delete.png" class="icon"/>
                       <a>Suppression de donnees</a>
                   </div>
                   </div>
               </div>
               <div class="item">
                   <div class="item-main">
                       <img src="images/statistic.png" class="icon"/>
                       <a>Les statistiques</a>
                   </div>
               </div>
                <div class="item">
                   <div class="item-main">
                       <img src="images/help.png" class="icon"/>
                       <a>Aide</a>
                   </div>
               </div>
           </div>
           <div id="right-panel">
               
                    
                
               <div class="main" id="list-of-patients">
                <div id="inner">
                  <h2>Liste des patients</h2>
                    <div id="search-bar">
                        <input type="text" name="rechercher0" placeholder="Rechercher..."/>
                        <button type="submit" id="rechercher1" name="rechercher1">Chercher</button>
                        <input type="radio"/>
                        <h3 hidden style="margin-left:1vw">Nom et Prenom</h3>
                          <input type="radio"/>
                        <h3 hidden style="margin-left:1vw">Age</h3>
                           <input type="radio"/>
                        <h3 hidden style="margin-left:1vw">Sexe</h3>
                    </div>
                    <div id="gridview" >
                        <button type="submit" hidden id="cl" name="cl">Click me</button>
                         <button name="cl3" id="cl3" type="submit" hidden></button>
                        <input type="text" id="id333" name="id333" hidden/>
                    <?php
                        
                        
                        
                          function f(){
                               $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
 $url = $base_url . $_SERVER["REQUEST_URI"];
                              
                              $pos = strpos($url, "&str=");
                        
                              $url_components = parse_url($url);
                              
                             parse_str($url_components['query'], $params);

                              
       if(file_exists("patiens.txt"))
{
 $json = json_decode(file_get_contents("patiens.txt"),TRUE);

            
             if(!empty($json)){
                 echo "<table id='table1'><tr><th>Nom</th><th>Prenom</th><th>Sexe</th><th>Annee de naissance</th><th>Mobile</th><th>Email</th><th>Etat Civil</th><th>Assurance</th><th>Adresse</th><th></th><th></th></tr>";
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
                       
                       echo "<td id='modify$id' onclick='Modify(\"".$id ."\",\"".$nom."\",\"".$prenom."\",\"".$sexe."\",\"".$anneedenaissance."\",\"".$mobile."\",\"".$email."\",\"".$etatcivil."\",\"".$assurance."\",\"".$adresse."\")'><img class='small_icon' src='images/modify_icon.png'/></td>";
                       
                       
                       
                       echo "<td id='delete$id' onclick='Delete(\"".$id."\")'><img class='small_icon' src='images/delete_icon.png'/></td>";
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
                       
                       echo "<td id='modify$id' onclick='Modify(\"".$id ."\",\"".$nom."\",\"".$prenom."\",\"".$sexe."\",\"".$anneedenaissance."\",\"".$mobile."\",\"".$email."\",\"".$etatcivil."\",\"".$assurance."\",\"".$adresse."\")'><img class='small_icon' src='images/modify_icon.png'/></td>";
                       
                       
                       
                       echo "<td id='delete$id' onclick='Delete(\"".$id."\")'><img class='small_icon' src='images/delete_icon.png'/></td>";
                       echo "</tr>";
                           
                           
                      }
                           
                           
                           
                       }
                       $id++;
}
                 
                 echo "</table>";
           
             }
           
           
}
                                }
                        f();
                             if(isset($_POST['cl'])){
  echo "<script>window.location.href='dashboard.php?page=0'</script>";
                             }
                                  
                      if(isset($_POST['cl3'])){
                          
                          $json = json_decode(file_get_contents("patiens.txt"),TRUE);

            
             if(!empty($json)){
                $id = $_POST['id333'];
                               $json[$id] = array("nom" => "");  
                      
                           file_put_contents("patiens.txt", json_encode($json));
                 
                  echo "<script>window.location.href='dashboard.php?page=0'</script>";
                        
                 
             }
                          
                          
  echo "<script>window.location.href='dashboard.php?page=0'</script>";
                             }
                        
                           if(isset($_POST['rechercher1'])){
                               $str = strtolower($_POST['rechercher0']);
                         if(strlen($str)<=0){
                                 echo "<script>window.location.href='dashboard.php?page=0'</script>";
                         }
                             else    echo "<script>window.location.href='dashboard.php?page=0&str=$str'</script>";
                              
                           }
                        ?>
                    </div>
                   </div>
               </div>
               <div class="main" id="add-new-patient">
                   
               <div id="inner">
                 <h2>Information du patient</h2>
                   <div id="bar">
                   <div id="dv1">
                       <h3>Nom*</h3>
                       <input role="presentation" autocomplete="off"   name="nom" id="nom" type="text"/>
                       </div>
                       <div id="dv2">
                            <h3>Prenom*</h3>
                       <input role="presentation" autocomplete="off"  id="prenom" name="prenom" type="text"/>
                       </div>
                   </div>
                    <div id="bar">
                   <div id="dv1">
                       <h3>Sexe*</h3>
                       <input role="presentation" autocomplete="off"  id="sexe"  name="sexe" readonly onclick="Popup('sexe')" type="text"/>
                       </div>
                       <div id="dv2">
                            <h3>Annee de naissance*</h3>
                       <input role="presentation" autocomplete="off"   id="anneedenaissance"  name="anneedenaissance" type="text"/>
                       </div>
                   </div>
                     <div id="bar">
                   <div id="dv1">
                       <h3>Mobile*</h3>
                       <input role="presentation" autocomplete="off"   name="mobile"  id="mobile" type="text"/>
                       </div>
                       <div id="dv2">
                            <h3>Email*</h3>
                       <input role="presentation" autocomplete="off"   name="email"   id="email" type="text"/>
                       </div>
                   </div>
                     <div id="bar">
                   <div id="dv1">
                       <h3>Etat Civil*</h3>
                       <input role="presentation" autocomplete="off"  id="etatcivil"  name="etatcivil" onclick="Popup('etat_civil')" type="text"/>
                       </div>
                       <div id="dv2">
                            <h3>Assurance*</h3>
                       <input role="presentation" autocomplete="off"  onclick="Popup('assurance')"  id="assurance" name="assurance" readonly onclick="Popup('assurance')" type="text"/>
                       </div>
                   </div>
                     <div id="bar">
                   <div id="dv1">
                       <h3>Adresse*</h3>
                       <input role="presentation" autocomplete="off"  name="adresse" id="adresse" type="text"/>
                       </div>
                          <div id="dv2">
                       </div>
                   </div>
                     <div id="bar">
                   <div id="dv1">
                       <button name="sv" id="sv" type="submit" onclick="" style="color:white;background:#5252ff;">Sauvegarder</button>
                        <button type="submit" hidden id="cl1" name="cl1">Click me</button>
                       <?php
                      if(isset($_POST['cl1'])){
  echo "<script>window.location.href='dashboard.php?page=1'</script>";
                             }
                       if(isset($_POST['sv'])){
                           $nom = $_POST['nom'];
                           $prenom = $_POST['prenom'];
                           $sexe = $_POST['sexe'];
                           $annedenaissance = $_POST['anneedenaissance'];
                            $mobile = $_POST['mobile'];
                            $email = $_POST['email'];
                            $etatcivil = $_POST['etatcivil'];
                           $assurance = $_POST['assurance'];
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
                        
                           
                           
                      echo "<script>window.location.href='dashboard.php?page=1_1'</script>";
                           
                       }
                       
                        
                       ?>
                
                       </div>
                          <div id="dv2">
                              <button type="button" style="color:white;background:#ff2424" onclick='javascript:Clear1()'>Effacer Tous</button>
                       </div>
                   </div>
                   </div>
               </div>
               
        <div class="main" id="list-of-rdvs">
            <div id="inner">
                 <h2>Liste des RDV</h2>
                    <div id="search-bar">
                        <input type="text" name="rechercher3" placeholder="Rechercher..."/>
                        <button type="submit" id="rechercher2" name="rechercher2">Chercher</button>
                        <input type="radio"/>
                        <h3 hidden style="margin-left:1vw">Nom et Prenom</h3>
                          <input type="radio"/>
                        <h3 hidden style="margin-left:1vw">Age</h3>
                           <input type="radio"/>
                        <h3 hidden style="margin-left:1vw">Sexe</h3>
                    </div>
                    <div id="gridview" >
                     
                       
                        <input type="text" id="id3" name="id3" hidden/>
                        
                    <?php
                        
                        if(isset($_POST['rechercher2'])){
                            
                             $str = strtolower($_POST['rechercher3']);
                         if(strlen($str)<=0){
                                 echo "<script>window.location.href='dashboard.php?page=2'</script>";
                         }
                             else    echo "<script>window.location.href='dashboard.php?page=2&str=$str'</script>";
                            
                        }
                        
                          function f2(){
                               $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
 $url = $base_url . $_SERVER["REQUEST_URI"];
                              
                              $pos = strpos($url, "&str=");
                        
                              $url_components = parse_url($url);
                              
                             parse_str($url_components['query'], $params);

                              
       if(file_exists("rdvs.txt"))
{
 $json = json_decode(file_get_contents("rdvs.txt"),TRUE);
$json2 = json_decode(file_get_contents("patiens.txt"),TRUE);
            
             if(!empty($json)){
               
               $id2=1;
                   $col2="#eee";
                       
                 echo "<table id='table1'><tr><th>Nom du patient</th><th>Date</th><th>Temps</th><th>Description</th></tr>";
                 $cs2=0;
                 
                 
foreach($json as $item){
    
    if($pos >-1){
        
         $tmp = $id2;
         $pos2 = strpos(strtolower( $item['nom']), strtolower($params['str']));
        if($pos2>-1){
    if($cs2==0){
                           $col2="#fff";
                           $cs2=1;
                       }
                       else {
                           $cs2=0;
                           $col2="#eee";
                       }
    echo "<tr onclick=\"OPEN1('".$id2."')\" style='background:".$col2."'>";
    echo "<td>".$item['nom']."</td>";
    echo "<td>".$item['date']."</td>";
    echo "<td>".$item['time']."</td>";
    echo "<td>".$item['desc']."</td>";
    echo "</tr>";
    echo "<tr id=\"tr".$tmp."\" hidden><td colspan='4' >
    <div  style=\";width:100%;\">
    <div style=\"width:90%;margin:1vw auto;margin-bottom:1vw;border:1px solid #aaa;text-align:left;padding:2vw\"><br>
    Nom Complet: ".$json2[$item['id']]['nom']." ".$json2[$item['id']]['prenom']."<br>
    Sexe: ".$json2[$item['id']]['sexe']."<br>
    Anne de naissance: ".$json2[$item['id']]['annedenaissance']."<br>
    Email: ".$json2[$item['id']]['email']."<br>
    Mobile: ".$json2[$item['id']]['mobile']."<br>
    Etat Civil: ".$json2[$item['id']]['etatcivil']."<br>
    Assurance: ".$json2[$item['id']]['assurance']."<br>
    Adresse: ".$json2[$item['id']]['adresse']."<br>
    
    <br>
    </div>
    </div>
    </td></tr>";
        }
    $id2++;
        
    }
    else{
        $tmp = $id2;
    if($cs2==0){
                           $col2="#fff";
                           $cs2=1;
                       }
                       else {
                           $cs2=0;
                           $col2="#eee";
                       }
    echo "<tr onclick=\"OPEN1('".$id2."')\" style='background:".$col2."'>";
    echo "<td>".$item['nom']."</td>";
    echo "<td>".$item['date']."</td>";
    echo "<td>".$item['time']."</td>";
    echo "<td>".$item['desc']."</td>";
    echo "</tr>";
    echo "<tr id=\"tr".$tmp."\" hidden><td colspan='4' >
    <div  style=\";width:100%;\">
    <div style=\"width:90%;margin:1vw auto;margin-bottom:1vw;border:1px solid #aaa;text-align:left;padding:2vw\"><br>
    Nom Complet: ".$json2[$item['id']]['nom']." ".$json2[$item['id']]['prenom']."<br>
    Sexe: ".$json2[$item['id']]['sexe']."<br>
    Anne de naissance: ".$json2[$item['id']]['annedenaissance']."<br>
    Email: ".$json2[$item['id']]['email']."<br>
    Mobile: ".$json2[$item['id']]['mobile']."<br>
    Etat Civil: ".$json2[$item['id']]['etatcivil']."<br>
    Assurance: ".$json2[$item['id']]['assurance']."<br>
    Adresse: ".$json2[$item['id']]['adresse']."<br>
    
    <br>
    </div>
    </div>
    </td></tr>";
    
    $id2++;
    }
      
}
                 echo "</table>";
           
             }
           
           
}
                                }
                        f2();
                            
                                  
                   
                        
                       
                        ?>
                    </div>
                
                <button type="submit" hidden id="cl4" name="cl4">Click me</button>
                 <button type="submit" hidden id="cl5" name="cl5">Click me</button>
                <?php
                if(isset($_POST['cl4'])){
                     echo "<script>window.location.href='dashboard.php?page=2'</script>";
                }
                if(isset($_POST['cl5'])){
                     echo "<script>window.location.href='dashboard.php?page=3'</script>";
                }
                if(isset($_POST['sv5'])){
                    $tmp = $_POST['in1'];
                    $nom = $_POST['nom3'];
                    $date= $_POST['date1'];
                    $time = $_POST['time1'];
                    $desc = $_POST['rtb'];
                    if(!file_exists("rdvs.txt"))
                       file_put_contents("rdvs.txt", "");
 $json = json_decode(file_get_contents("rdvs.txt"),TRUE);
  if(!empty($json))
                            {
                               $json[count($json)+1] = array("nom" => $nom, "date" => $date,"time"=>$time,"desc"=>$desc, "id"=>$tmp); 
                            }
                           else{
                            $json[1] = array("nom" => $nom, "date" => $date,"time"=>$time,"desc"=>$desc, "id"=>$tmp);  
                           }
                           file_put_contents("rdvs.txt", json_encode($json));
                        
                    
                    
                     echo "<script>window.location.href='dashboard.php?page=3_1'</script>";
                }
                ?>
            </div>
               </div>
               
                 <div class="main" id="add-new-rdv">
            <div id="inner">
                 <h2>Ajouter un RDV</h2>
                <div id="bar">
                   <div id="dv1">
                       <input role="presentation" autocomplete="off" hidden name="idrdv1" id="idrdv1" type="text"/>
                       <h3>Liste des patients*</h3>
                       <input role="presentation" autocomplete="off" readonly name="nom3" id="nom3" onclick="document.getElementById('panel4').style.display='flex'" type="text"/>
                       
                    </div>
                     <div id="dv2">
                     
                    </div>
                    
                </div>
                 <div id="bar">
                         <div id="dv1">
                             <input type="text" id="in1" name="in1" hidden/>
                          <h3>Choisissez une date*</h3>
                       <input name="date1" id="date1" onclick="" type="date"/>
                         </div>
                         <div id="dv2">
                         <h3>Choisissez un temps*</h3>
                       <input name="time1" id="time1" onclick="" type="time"/>
                         </div>
                    </div>
                <div id="bar" style="height:8vw;">
                <div id="dv1" >
                    <h3>Description*</h3>
                    <textarea oninput="In()" id="richtextbox1" placeholder="Descritpion"></textarea>
                    <input type="text" id="rtb" name="rtb" hidden/>
                    </div>
                    <div id="dv2"></div>
                </div>
                 <div id="bar" style="margin-top:2vw">
                <div id="dv1" >
                    <button name="sv5" id="sv5" type="submit" onclick="" style="color:white;background:#5252ff;">Sauvegarder</button>
                    </div>
                    <div id="dv2">
                     <button type="button" style="color:white;background:#ff2424" onclick='javascript:Clear3()'>Effacer Tous</button>
                     </div>
                </div>
            </div>
               </div>
               
               
                 <div class="main" id="list-of-consultings">
            <div id="inner">
                 <h2>Liste des consultations</h2>
                <div id="search-bar">
                        <input type="text" name="rechercher5" placeholder="Rechercher..."/>
                        <button type="submit" id="rechercher4" name="rechercher4">Chercher</button>
                        <input type="radio"/>
                        <h3 hidden style="margin-left:1vw">Nom et Prenom</h3>
                          <input type="radio"/>
                        <h3 hidden style="margin-left:1vw">Age</h3>
                           <input type="radio"/>
                        <h3 hidden style="margin-left:1vw">Sexe</h3>
                    </div>
                    <div id="gridview" >
                        
                        <?php
                        if(isset($_POST['rechercher4'])){
                             $str = strtolower($_POST['rechercher5']);
                         if(strlen($str)<=0){
                                 echo "<script>window.location.href='dashboard.php?page=4'</script>";
                         }
                             else    echo "<script>window.location.href='dashboard.php?page=4&str=$str'</script>";
                              
                           }
                            
                        
                        
                           $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
 $url = $base_url . $_SERVER["REQUEST_URI"];
                             
                              $pos = strpos($url, "&str=");
                        
                              $url_components = parse_url($url);
                        
                           parse_str($url_components['query'], $params);   
                        
                        
                        if(file_exists("consultations.txt"))
                {
                            $ar = array();
                   $json =  json_decode(file_get_contents("consultations.txt"),TRUE);
                    
                    echo "<table id=\"table1\"><th>Id Patient</th><th>Patient</th><th>Motif</th><th>Diagnostique medical</th><th>Resultat de l'examen</th><th>Observation</th>";
                            $cs=0;
                            $col;
                            $iii=0;
                 foreach($json as $item){
                     $t = $iii;
                     //if(!in_array($item['id'], $ar))
                     //{
                       //  array_push($ar, $item['id']);
                         
                     //}
                     if(!empty($pos) && $pos>-1){
                          
                    if (strpos(strtolower($item['patient']), strtolower($params['str'])) > -1){
                        if($cs==0)
                     {
                         $cs = 1;
                         $col ="white";
                     }
                     else{
                         $cs=0;
                         $col="#eee";
                     }
                         echo "<tr onclick=\"Hide2('trhide".$t."')\"  style=\"background:".$col."\">";
                     echo "<td>".$item['id']."</td>";
                         echo "<td>".$item['patient']."</td>";
                         echo "<td>".$item['motif']."</td>";
                     echo "<td>".$item['diagnostic']."</td>";
                     echo "<td>".$item['result']."</td>";
                         echo "<td>".$item['observation']."</td>";
                     
                     echo "</tr>";
                           echo "<tr hidden id='trhide".$t."'>";
                        echo "<td  colspan=\"6\">";
                        
                        echo "<div id='info2'>";
                        
                        echo "<a>Poids: ".$item['poids']." kg</a>";
                         echo "<a>Taille: ".$item['taille']." cm</a>";
                          echo "<a>Frequence cardiaque: ".$item['frequencecardiaque']." </a>";
                          echo "<a>Pression arterielle: ".$item['pressionarterielle']." </a>";
                         
                        echo "</div>";
                        
                        echo "</td>";
                        echo "</tr>";
                    }
                     }
                     else{
                          if($cs==0)
                     {
                         $cs = 1;
                         $col ="white";
                     }
                     else{
                         $cs=0;
                         $col="#eee";
                     }
                        
                          echo "<tr onclick=\"Hide2('trhide".$t."')\" style=\"background:".$col."\">";
                     echo "<td>".$item['id']."</td>";
                         echo "<td>".$item['patient']."</td>";
                         echo "<td>".$item['motif']."</td>";
                     echo "<td>".$item['diagnostic']."</td>";
                     echo "<td>".$item['result']."</td>";
                         echo "<td>".$item['observation']."</td>";
                     
                     echo "</tr>";
                         echo "<tr hidden id='trhide".$t."'>";
                        echo "<td  colspan=\"6\">";
                        
                        echo "<div id='info2'>";
                        
                        echo "<a>Poids: ".$item['poids']." kg</a>";
                         echo "<a>Taille: ".$item['taille']." cm</a>";
                          echo "<a>Frequence cardiaque: ".$item['frequencecardiaque']." </a>";
                          echo "<a>Pression arterielle: ".$item['pressionarterielle']." </a>";
                         
                        echo "</div>";
                        
                        echo "</td>";
                        echo "</tr>";
                     }
                     $iii++;
                 }   
                            echo "</table>";
                }
                        ?>
                </div>
                
                <button type="submit" name="cons3" id="cons3" hidden/>
                <?php
                if(isset($_POST['cons2'])){
                      echo "<script>window.location.href='dashboard.php?page=5'</script>";
                }
                  if(isset($_POST['cons3'])){
                      echo "<script>window.location.href='dashboard.php?page=4'</script>";
                }
                
                ?>
            </div>
               </div>
               
               
                 <div class="main" id="add-new-consulting">
            <div id="inner">
                 <h2>Ajouter une consultation</h2>
                
                <div style="margin:0 auto;width:90%;height:90%;display:flex;">
                    <div style="width:50%;height:100%;" id="dv1">
                 <h4 class="title">General</h4>
                        <h3>Patient</h3>
                        <input readonly onclick="opennames()" type="text" id="patient" name="patient"/>
                        <input readonly hidden  type="text" id="in2" name="in2"/>
                        <h3>Motif</h3>
                        <input type="text" id="motif" name="motif"/>
                         <h3>Antecedents</h3>
                        <input readonly style="color:red"  type="text" id="antecedents" name="antecedents"/>
                           <h3>Diagnostique medicale</h3>
                        <input type="text" style="height:3vw" name="diagnostic" id="diagnostic"/>
                         <h3>Resultat de l'examen clinique</h3>
                        <textarea name="result" id="result"></textarea>
                          <h3>Poids(Kg)</h3>
                        <input oninput="BMI()" type="text" id="poids" name="poids"/>
                    <h3>Taille(cm)</h3>
                        <input oninput="BMI()" type="text" id="taille" name="taille"/>
                        <div id="bar">
                            <div id="dv1"></div>
                        </div>
                       
                </div>
                <div  style="width:50%;height:100%;" id="dv2">
                 <h4 class="title">Constantes vitales</h4>
                    
                     <h3>Temperature(°C)</h3>
                        <input type="text" id="temperature" name="temperature"/>
                     <h3>Frequence cardiaque</h3>
                        <input type="text" id="frequencecardiaque" name="frequencecardiaque"/>
                      <h3>Pression arterielle</h3>
                        <input type="text" id="pressionarterielle" name="pressionarterielle"/>
                     <h3>Observation</h3>
                        <input type="text" style="height:3vw" name="observation" id="observation"/>
                     <button name="svcons" id="svcons" type="submit" onclick="" style="color:white;background:#5252ff;">Sauvegarder</button>
                         <button  type="button" onclick="Clear4()" style="color:white;background:#ff2424;">Annuler</button>
                </div>
                </div>
               
                <button type="submit" name="cons2" id="cons2" hidden/>
                <?php
               
                
                
                
                if(isset($_POST['svcons'])){
                                       if(!file_exists("consultations.txt"))
                       file_put_contents("consultations.txt", ""); 
                    $json = json_decode(file_get_contents("consultations.txt"),TRUE);
                    
                    $id =  $_POST['in2'];
                       $patient = $_POST['patient'];
                    $motif = $_POST['motif'];
                    $antecedents =  $_POST['antecedents'];
                    $diagnostic =  $_POST['diagnostic'];
                      $result =  $_POST['result'];
                         $poids =  $_POST['poids'];
                            $taille =  $_POST['taille'];
                       $temperature =  $_POST['temperature'];
                             $frequencecardiaque =  $_POST['frequencecardiaque'];
                     $pressionarterielle =  $_POST['pressionarterielle']; 
                            $observation =  $_POST['observation'];  
                    if(!empty($json))
                            {
                               $json[count($json)+1] = array("id"=>$id,"motif" => $motif, "antecedents" => $antecedents,"diagnostic"=>$diagnostic,"result"=>$result, "poids"=>$poids,"taille"=>$taille,"temperature"=>$temperature,"frequencecardiaque"=>$frequencecardiaque,"pressionarterielle"=>$pressionarterielle,"observation"=>$observation,"patient"=>$patient); 
                            }
                           else{
                                $json[1] = array("id"=>$id,"motif" => $motif, "antecedents" => $antecedents,"diagnostic"=>$diagnostic,"result"=>$result, "poids"=>$poids,"taille"=>$taille,"temperature"=>$temperature,"frequencecardiaque"=>$frequencecardiaque,"pressionarterielle"=>$pressionarterielle,"observation"=>$observation,"patient"=>$patient); 
                           }
                           file_put_contents("consultations.txt", json_encode($json));
                    
                    
                     echo "<script>window.location.href='dashboard.php?page=5_1'</script>";
                }
                if(isset($_POST['cons2'])){
                      echo "<script>window.location.href='dashboard.php?page=5'</script>";
                }
                ?>
            </div>
               </div>
               
               <div class="main"  id="informations-generales">
               <div id="inner" style="overflow-x: hidden;" >
                  
                  <table id="table3">
                      
                      
                      <tr style="height:100%;">
                      
                   <td id="td0">
                      <h2>Informations sur la clinique</h2>
                   <div id="dash">
                   <div class="card">
                       <div id="dv1">
                       <h3>Gestion des resources humaines</h3>
                            <h3 style="margin-top:0.5vw;margin-bottom:1vw;color:#ff5252">Les docteurs</h3>
                           <button type="button" onclick="Slide1(1)">Ajouter nouveau</button>
                           <button>Voir liste</button>
                       </div>
                       <div id="dv2">
                       <img src="images/doctors.png"/>
                       </div>
                       </div>
                        <div class="card">
                       <div id="dv1">
                       <h3>Gestion des resources humaines</h3>
                            <h3 style="margin-top:0.5vw;margin-bottom:1vw;color:#ff5252">Les utilisateurs</h3>
                            <button type="button" onclick="Slide1(2)">Ajouter nouveau</button>
                           <button>Voir liste</button>
                       </div>
                       <div id="dv2">
                       <img src="images/users.png"/>
                       </div>
                       </div>
                       <div class="card">
                       <div id="dv1">
                       <h3>Gestion des resources de la clinique</h3>
                            <h3 style="margin-top:0.5vw;margin-bottom:1vw;color:#ff5252">Les medicaments</h3>
                            <button type="button" onclick="Slide1(3)">Ajouter nouveau</button>
                           <button>Voir liste</button>
                       </div>
                       <div id="dv2">
                       <img src="images/medications.png"/>
                       </div>
                       </div>
                   </div>
                   <button type="submit" id="inf" name="inf" hidden/>
                   <?php
                   if(isset($_POST['inf'])){
                        echo "<script>   
                      window.location.href='Dashboard.php?page=6';</script>";
                   }
                   ?>
                   
                   
                      </td>
                      <td id="td1" style="height:100%">
                     
                          
                          <div id="tddiv0" >
                             <div onclick="Slide1(0)" style="display:flex;align-items:center;">
               <img src="images/backarrow.png" style="width:1.8vw;height:1.8vw;margin-left:2vw;"/>
                   <h2 style="margin:2vw;margin-left:0.8vw;">Ajouter un docteur</h2>
                                 
               </div>
                         
                          <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <h3 style="margin-left:0">Nom*</h3>
                                  <input type="text" id="nomdoc" name="nomdoc"/>
                              </div>
                              <div id="dv2">
                              <h3  style="margin-left:0">Prenom*</h3>
                                  <input type="text" id="prenomdoc" name="prenomdoc"/>
                              </div>
                              </div>  
                              <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <h3 style="margin-left:0">Annee de naissance*</h3>
                                  <input type="text" id="anneedenaissancedoc" name="anneedenaissancedoc"/>
                              </div>
                              <div id="dv2">
                              <h3  style="margin-left:0">Email*</h3>
                                  <input type="text" id="emaildoc" name="emaildoc"/>
                              </div>
                              </div>  
                              
                               <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <h3 style="margin-left:0">Mobile*</h3>
                                  <input type="text" id="mobiledoc" name="mobiledoc"/>
                              </div>
                              <div id="dv2">
                              <h3  style="margin-left:0">Adresse*</h3>
                                  <input type="text" id="adressedoc" name="adressedoc"/>
                              </div>
                              </div>  
                                 <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <button type="button" style="color:white;background:#5252ff;margin-top:1vw" onclick=''>Sauvegarder</button>
                              </div>
                              <div id="dv2">
                              <button type="button" style="color:white;background:#ff2424;margin-top:1vw" onclick=''>Annuler</button>
                              </div>
                              </div>  
                            
                              
                          </div>
                           <div id="tddiv1">
                             <div onclick="Slide1(0)" style="display:flex;margin-bottom:0vw;align-items:center;">
               <img src="images/backarrow.png" style="width:1.8vw;height:1.8vw;margin-left:2vw;"/>
                   <h2 style="margin:2vw;margin-left:0.8vw;">Ajouter un utilisateur</h2>
               </div>
                  
                               
                                         
                               <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <h3 style="margin-left:0">Nom utilisateur*</h3>
                                  <input type="text" id="nomutilisateur" name="nomutilisateur"/>
                              </div>
                              <div id="dv2">
                              <h3  style="margin-left:0">Mot de passe*</h3>
                                  <input type="password" id="motdepasse" name="motdepasse"/>
                              </div>
                              </div>  
                                 <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <h3 style="margin-left:0">Retaper le mot de passe*</h3>
                                  <input type="password" id="motdepasse2" name="motdepasse2"/>
                              </div>
                              <div id="dv2">
                              </div>
                              </div>  
                                 <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <button type="button" style="color:white;background:#5252ff;margin-top:1vw" onclick=''>Sauvegarder</button>
                              </div>
                              <div id="dv2">
                              <button type="button" style="color:white;background:#ff2424;margin-top:1vw" onclick=''>Annuler</button>
                              </div>
                              </div>  
                            
                    
                               
                               
                               
                          </div>
                   
                    <div id="tddiv2">
                             <div onclick="Slide1(0)" style="display:flex;margin-bottom:0vw;align-items:center;">
               <img src="images/backarrow.png" style="width:1.8vw;height:1.8vw;margin-left:2vw;"/>
                   <h2 style="margin:2vw;margin-left:0.8vw;">Ajouter un medicament</h2>
               </div>
                  
                               <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <h3 style="margin-left:0">Nom medicament*</h3>
                                  <input type="text" id="nommed" name="nommed"/>
                              </div>
                              <div id="dv2">
                                  
                              <h3 style="margin-left:0">Type medicament*</h3>
                                  <input type="text" id="nommed" name="nommed"/>
                              </div>
                              </div>  
                         <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <h3 style="margin-left:0">Date expiration*</h3>
                                  <input type="date" id="datexp" name="datexp"/>
                              </div>
                              <div id="dv2">
                                  
                              <h3 style="margin-left:0">Observation*</h3>
                                  <input type="text" id="observationmed" name="observationmed"/>
                              </div>
                              </div>  
                                 <div id="bar" style="margin:0;width:50%">
                              <div id="dv1">
                              <button type="button" style="color:white;background:#5252ff;margin-top:1vw" onclick=''>Sauvegarder</button>
                              </div>
                              <div id="dv2">
                              <button type="button" style="color:white;background:#ff2424;margin-top:1vw" onclick=''>Annuler</button>
                              </div>
                              </div>  
                            
                    
                        
                        
                        
                        
                        
                          </div>
                     
                      </td>
                      
                      
                      </tr>
                      
                      
                      
                      
                      
                   </table>
                
                   
                   
                   </div>
                               
               </div>
               
               
                         
               <div class="main"  id="stats">
                
               <div id="inner" style="overflow-x: hidden;" >
       <div style="display:flex;;overflow-y:auto;position:relative;flex-direction:column;;justify-content:center"        >
                      <h2>Dashboard</h2>
                   <div id="dash">
                   
                   
                    <div class="card">
                       <div id="dv1">
                       <h3 style="font-size:1.5vw">Patients</h3>
                            <h3 style="margin-top:0.5vw;margin-bottom:1vw;color:#ff5252">
                                <?php
                                 if(file_exists("patiens.txt")){

$json = json_decode(file_get_contents("patiens.txt"),TRUE);

            
             if(!empty($json))
                 echo count($json)." ";
                                     else echo "0 ";
                 
                                 }
                                ?>patient(s)</h3>
                           <button type="button" onclick="window.location.href='dashboard.php?page=1'">Ajouter nouveau</button>
                           <button type="button" onclick="window.location.href='dashboard.php?page=0'">Voir liste</button>
                       </div>
                       <div id="dv2">
                       <img src="images/patient.png"/>
                       </div>
                       </div>
                 
                   
                    <div class="card">
                       <div id="dv1">
                       <h3 style="font-size:1.5vw">Rendez-vous</h3>
                            <h3 style="margin-top:0.5vw;margin-bottom:1vw;color:#ff5252">
                                <?php
                                 if(file_exists("rdvs.txt")){

$json = json_decode(file_get_contents("rdvs.txt"),TRUE);

            
             if(!empty($json))
                 echo count($json)." ";
                                     else echo "0 ";
                 
                                 }
                                ?>rendez-vous</h3>
                           <button type="button" onclick="window.location.href='dashboard.php?page=3'">Ajouter nouveau</button>
                           <button type="button" onclick="window.location.href='dashboard.php?page=2'">Voir liste</button>
                       </div>
                       <div id="dv2">
                       <img src="images/patient.png"/>
                       </div>
                       </div>
               
                               
                   
                    <div class="card">
                       <div id="dv1">
                       <h3 style="font-size:1.5vw">Consultations</h3>
                            <h3 style="margin-top:0.5vw;margin-bottom:1vw;color:#ff5252">
                                <?php
                                 if(file_exists("consultations.txt")){

$json = json_decode(file_get_contents("consultations.txt"),TRUE);

            
             if(!empty($json))
                 echo count($json)." ";
                                     else echo "0 ";
                 
                                 }
                                ?>consultation(s)</h3>
                           <button type="button" onclick="window.location.href='dashboard.php?page=5'">Ajouter nouveau</button>
                           <button type="button" onclick="window.location.href='dashboard.php?page=4'">Voir liste</button>
                       </div>
                       <div id="dv2">
                       <img src="images/patient.png"/>
                       </div>
                       </div>
               
           
                       
           
                   </div>
                  
                   </div>
                   
                   </div>
                               
               </div>
     
               
               
               </div>
        </div>
        <div id="popup">
            <div id="dv1">
                <button type="button"  onclick="SetStr('sexe','Masculin')">Masculin</button>
            <button  type="button" onclick="SetStr('sexe','Feminin')">Feminin</button>
            </div>
            <div id="dv2">
             <button  type="button" onclick="SetStr('etatcivil','Célibataire')">Célibataire</button>
                  <button  type="button" onclick="SetStr('etatcivil','Marié')">Marié</button>
                  <button  type="button" onclick="SetStr('etatcivil','Divorcé')">Divorcé</button>
                 <button  type="button" onclick="SetStr('etatcivil','Veuf')">Veuf</button>
                <button type="button"  onclick="SetStr('etatcivil','Non marié')">Non marié</button>
                 <button type="button"  onclick="SetStr('etatcivil','Lié par un partenariat enregistré')">Lié par un partenariat enregistré</button>
                 <button  type="button" onclick="SetStr('etatcivil','Partenariat dissous judiciairement')">Partenariat dissous judiciairement</button>
                 <button  type="button" onclick="SetStr('etatcivil','Partenariat dissous par décès')">Partenariat dissous par décès</button>
                 <button  type="button" onclick="SetStr('etatcivil','Partenariat dissous ensuite de déclaration d absence')">Partenariat dissous ensuite de déclaration d'absence</button>
            </div>
             <div id="dv3">
                <button  type="button" onclick="SetStr('assurance','le régime général pour les salariés')">le régime général pour les salariés</button>
            <button  type="button" onclick="SetStr('assurance','la MSA (Mutualité Sociale Agricole)')">la MSA (Mutualité Sociale Agricole)</button>
                   <button  type="button" onclick="SetStr('assurance','la sécurté sociale des indépendants pour les indépendants.')">la sécurté sociale des indépendants pour les indépendants.
</button>
            </div>
        </div>
            <div id="success">
        <img src="images/success.gif"/>
        </div>
         <div id="loading">
        <img src="images/loading.gif"/>
        </div>
        <div id="ModifyPatient">
        
               <div id="inner" style="width:100%;height:auto;align-items:center;justify-content:center;">
              <div class="title"></div>
                   <div id="bar">
                   <div id="dv1">
                       <input role="presentation" autocomplete="off" hidden name="id2" id="id2" type="text"/>
                       <h3>Nom*</h3>
                       <input role="presentation" autocomplete="off"   name="nom2" id="nom2" type="text"/>
                       </div>
                       <div id="dv2">
                            <h3>Prenom*</h3>
                       <input role="presentation" autocomplete="off"  id="prenom2" name="prenom2" type="text"/>
                       </div>
                   </div>
                    <div id="bar">
                   <div id="dv1">
                       <h3>Sexe*</h3>
                       <input role="presentation" autocomplete="off"  id="sexe2"  name="sexe2" readonly onclick="Popup('sexe2')" type="text"/>
                       </div>
                       <div id="dv2">
                            <h3>Annee de naissance*</h3>
                       <input role="presentation" autocomplete="off"   id="anneedenaissance2"  name="anneedenaissance2" type="text"/>
                       </div>
                   </div>
                     <div id="bar">
                   <div id="dv1">
                       <h3>Mobile*</h3>
                       <input role="presentation" autocomplete="off"   name="mobile2"  id="mobile2" type="text"/>
                       </div>
                       <div id="dv2">
                            <h3>Email*</h3>
                       <input role="presentation" autocomplete="off"   name="email2"   id="email2" type="text"/>
                       </div>
                   </div>
                     <div id="bar">
                   <div id="dv1">
                       <h3>Etat Civil*</h3>
                       <input role="presentation" autocomplete="off"  id="etatcivil2"  name="etatcivil2" onclick="Popup('etat_civil2')" type="text"/>
                       </div>
                       <div id="dv2">
                            <h3>Assurance*</h3>
                       <input role="presentation" autocomplete="off"  id="assurance2" name="assurance2" readonly onclick="Popup('assurance2')" type="text"/>
                       </div>
                   </div>
                     <div id="bar">
                   <div id="dv1">
                       <h3>Adresse*</h3>
                       <input role="presentation" autocomplete="off"  name="adresse2" id="adresse2" type="text"/>
                       </div>
                          <div id="dv2">
                       </div>
                   </div>
                     <div id="bar">
                   <div id="dv1">
                       <button name="sv2" id="sv2" type="submit" onclick="" style="color:white;background:#5252ff">Modifier</button>
                        <button type="submit" hidden id="cl2" name="cl2">Click me</button>
                       <?php
                         
                        if(isset($_POST['sv2'])){
                          
                        
                             $json = json_decode(file_get_contents("patiens.txt"),TRUE);
  $nom = $_POST['nom2'];
                           $prenom = $_POST['prenom2'];
                           $sexe = $_POST['sexe2'];
                           $annedenaissance = $_POST['anneedenaissance2'];
                            $mobile = $_POST['mobile2'];
                            $email = $_POST['email2'];
                            $etatcivil = $_POST['etatcivil2'];
                           $assurance = $_POST['assurance2'];
                           $adresse = $_POST['adresse2'];
                            $id = $_POST['id2'];
 $json[$id] = array("nom" => $nom, "prenom" => $prenom,"sexe"=>$sexe,"annedenaissance"=>$annedenaissance, "mobile" =>$mobile, "email"=>$email,"etatcivil"=>$etatcivil,"assurance"=>$assurance,"adresse"=>$adresse);  
                            
                              file_put_contents("patiens.txt", json_encode($json));        
                      echo "<script>window.location.href='dashboard.php?page=0'</script>";
                        }
                          
                       ?>
                
                       </div>
                          <div id="dv2">
                              <button type="button" style="color:white;background:#ff2424" onclick="document.getElementById('ModifyPatient').style.display='none';">Annuler</button>
                       </div>
                   </div>
                   </div>
        </div>
                   <div id ="panel4">
                       
                  <div style="display:block;width:44vw;height:80%;overflow-y:auto;overflow-x:hidden;">
                        <?php
                       if(file_exists("patiens.txt")){

$json = json_decode(file_get_contents("patiens.txt"),TRUE);

            
             if(!empty($json)){
$id=1;
foreach($json as $item){
    $tmp = $id;
    if(!empty($item['nom'])){
    echo "<button  type='button' onclick=\"lst('".$item['nom']." ".$item['prenom']."','".$tmp."')\"; '>".$item['nom']." ".$item['prenom']."</button>";
    }
    
    $id++;
}

}


}
                       
                       ?>
                       
                       </div>
                   </div>
                   <div id="names">
                                 
                       
                  <div style="display:block;width:44vw;height:80%;overflow-y:auto;overflow-x:hidden;">
                        <?php
                       if(file_exists("patiens.txt")){

$json = json_decode(file_get_contents("patiens.txt"),TRUE);

            
             if(!empty($json)){
$i=1;
foreach($json as $item){
    $tmp = $i;
    $diag="";
     if(file_exists("consultations.txt")){
         $json2 = json_decode(file_get_contents("consultations.txt"),TRUE);
         if(!empty($json2))
         {
             $i2 = "0";
             foreach($json2 as $item2){
                 $i2 = $item2['id'];
                 if($i==$i2){
                     $diag = $diag . $item2['diagnostic']."%";
                 }
                 
                 $i2++;
             }
         }
     }
    
    echo "<button  type='button' onclick=\"nameandantecedents('".$item['nom']." ".$item['prenom']."','".$tmp."','".$diag."')\"; '>".$item['nom']." ".$item['prenom']."</button>";

    
    $i++;
}

}


}
                       
                       ?>
                       
                       </div>
    
                   </div>
                   <div id="antec">
                   
                   </div>
        <script type="text/javascript">
            var popup_trigger="0";
                function createCookie(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}
       
              var loading = document.getElementById("loading");
          
            function Loading(){
                 
             loading.style.display="flex";
                setTimeout(function(){
                    loading.style.display="none";
               
                
                }, 1000);
            }
             var items = document.getElementsByClassName("item");
           
            setTimeout(function(){
                document.getElementById("container").style.display="flex";
                 var url = window.location.href;
             if(url.indexOf("?page=") != -1){
                    
             var page = url.split("?")[1].split("=")[1].trim();
                 if(page.indexOf("&")!=-1)
                     page = page.split("&")[0].trim();
                 if(page=="stats"){
                     document.getElementById("stats").style.display="block";
                 }
            else if(page=="0"){
                Loading();
                document.getElementById("list-of-patients").style.display="block";
                
                  var main = items[0].getElementsByClassName("item-main")[0];
             var subs = items[0].getElementsByClassName("item-subs")[0];
                
                subs.style.display="block";
            }
                else if(page=="1"){
                      Loading();
             var main = items[0].getElementsByClassName("item-main")[0];
             var subs = items[0].getElementsByClassName("item-subs")[0];
                
                subs.style.display="block";
                
                document.getElementById("add-new-patient").style.display="block";
            }
                 else if(page=="1_1"){
                      
                  Success();
                       var main = items[0].getElementsByClassName("item-main")[0];
             var subs = items[0].getElementsByClassName("item-subs")[0];
                
                subs.style.display="block";
                document.getElementById("add-new-patient").style.display="block";
            }
                 
                  if(page=="2"){
                Loading();
                document.getElementById("list-of-rdvs").style.display="block";
                
                  var main = items[1].getElementsByClassName("item-main")[0];
             var subs = items[1].getElementsByClassName("item-subs")[0];
                
                subs.style.display="block";
            }
                  if(page=="3"){
                Loading();
                document.getElementById("add-new-rdv").style.display="block";
                
                  var main = items[1].getElementsByClassName("item-main")[0];
             var subs = items[1].getElementsByClassName("item-subs")[0];
                
                subs.style.display="block";
            }
                 
                   if(page=="3_1"){
                      
                  Success();
                      document.getElementById("add-new-rdv").style.display="block";
                
                  var main = items[1].getElementsByClassName("item-main")[0];
             var subs = items[1].getElementsByClassName("item-subs")[0];
                
            }
                 
                  if(page=="5"){
                Loading();
                document.getElementById("add-new-consulting").style.display="block";
                
                  var main = items[2].getElementsByClassName("item-main")[0];
             var subs = items[2].getElementsByClassName("item-subs")[0];
                
                subs.style.display="block";
            }
                  if(page=="5_1"){
                Success();
                document.getElementById("add-new-consulting").style.display="block";
                
                  var main = items[2].getElementsByClassName("item-main")[0];
             var subs = items[2].getElementsByClassName("item-subs")[0];
                
                subs.style.display="block";
            } 
                 if(page=="4"){
                Loading();
                document.getElementById("list-of-consultings").style.display="block";
                
                  var main = items[2].getElementsByClassName("item-main")[0];
             var subs = items[2].getElementsByClassName("item-subs")[0];
                
                subs.style.display="block";
            } 
                
                   if(page=="6"){
                Loading();
                document.getElementById("informations-generales").style.display="block";
                
                  var main = items[3].getElementsByClassName("item-main")[0];
             var subs = items[3].getElementsByClassName("item-subs")[0];
                
                subs.style.display="block";
            } 
                 
                 
            }
            }, 100);
           
     
            for(var i=0;i<items.length;i++){
                var main = items[i].getElementsByClassName("item-main")[0];
                expand(main, i);
            }
            function expand(main, i){
                var finalI = i;
                var cs=0;
                var subs = items[finalI].getElementsByClassName("item-subs")[0];
                main.onclick = function(){
                    if(cs==0){
                        cs=1;
                    subs.style.display="block";
                    }
                    else {
                        cs=0;
                    subs.style.display="none";
                    }
                }
            }

         
            function Show(id){     
                 var width  = window.innerWidth || document.documentElement.clientWidth || 
document.body.clientWidth;
                
                if(Number(width)>800)
               { 
                   
                   document.getElementById("container").style.display="none";
       
             setTimeout(function(){
                 
                     if(id==="list-of-patients")
                {
                document.getElementById("cl").click();
                }
                else if(id==="add-new-patient"){
                    document.getElementById("cl1").click();
                }
                 else if(id==="list-of-rdvs"){
                         document.getElementById("cl4").click();
                 }
                 else if(id==="add-new-rdv"){
                     
                     document.getElementById("cl5").click();
                 }
                  else if(id==="list-of-consultings"){
                     
                     document.getElementById("cons3").click();
                 }
                  else if(id==="add-new-consulting"){
                     
                     document.getElementById("cons2").click();
                 }
                 else if(id==="informations-generales"){
                     document.getElementById("inf").click();
                 }
             }, 100);
               }
                
                else{
                     if(id==="list-of-patients"){
                         window.location.href='list-of-patients.php';
                     }
                    if(id==="add-new-patient"){
                         window.location.href='add-new-patient.php';
                     }
                     if(id==="add-new-rdv"){
                     
                       window.location.href='add-new-rdv.php';
                 }
                    if(id==="list-of-rdvs"){
                         
                       window.location.href='list-of-rdvs.php';
                    }
                    if(id==="list-of-consultings"){
                     
                     window.location.href='list-of-cons.php';
                 }
                    if(id==="add-new-consulting"){
                     
                      window.location.href='add-new-cons.php';
                 }
                    if(id==="informations-generales"){
                     alert("Only working in desktop version!");
                 }
                }
            }
            var popup = document.getElementById("popup");
            popup.onclick=function(){
                popup.style.display="none";
            }
            function Popup(str){
                
                popup.style.display="flex";
                popup.style.zIndex=10;
                var list = popup.getElementsByTagName("div");
                for(var i=0;i<list.length;i++){
                    list[i].style.display="none";
                }
                if(str==="sexe"){
                    list[0].style.display="flex";
                    popup_trigger="1_0";
                }
                else if(str==="etat_civil"){
                    list[1].style.display="flex";
                    popup_trigger="1_1";
                }
                else if(str==="assurance"){
                    list[2].style.display="flex";
                    popup_trigger="1_2";
                }
                if(str==="sexe2"){
                    list[0].style.display="flex";
                    popup_trigger="0_0";
                }
                else if(str==="etat_civil2"){
                    list[1].style.display="flex";
                    popup_trigger="0_1";
                }
                else if(str==="assurance2"){
                    list[2].style.display="flex";
                    popup_trigger="0_2";
                }
            }
            function SetStr(id, str){
                if(popup_trigger=="0_0"){
                  document.getElementById("sexe2").value=str;
                } 
                else if(popup_trigger=="0_1"){
                  document.getElementById("etatcivil2").value=str;
                } 
                else if(popup_trigger=="0_2"){
                  document.getElementById("assurance2").value=str;
                } 
                 else if(popup_trigger=="1_0"){
                  document.getElementById("sexe").value=str;
                } 
                else if(popup_trigger=="1_1"){
                  document.getElementById("etatcivil").value=str;
                } 
                else if(popup_trigger=="1_2"){
                  document.getElementById("assurance").value=str;
                } 
            }
            function Clear1(){
                document.getElementById("nom").value="";
                document.getElementById("prenom").value="";
                document.getElementById("sexe").value="";
                document.getElementById("anneedenaissance").value="";
                document.getElementById("mobile").value="";
                document.getElementById("email").value="";
                document.getElementById("etatcivil").value="";
                document.getElementById("assurance").value="";
                document.getElementById("adresse").value="";
            }
var success = document.getElementById("success");
            success.onclick=function(){
                success.style.display="none";
            }
            function Success(){
                 
             success.style.display="flex";
                setTimeout(function(){
                    success.style.display="none";
               
                
                }, 3000);
            }
            var modifierpatient = document.getElementById("ModifyPatient");

            function Modify(id, nom,prenom,sexe,anneedenaissance,mobile,email,etatcivil,assurance,adresse){
                
               id++; modifierpatient.getElementsByClassName("title")[0].innerHTML="<h2>Modifier le patient <a style='font-size:2vw;color:#ff5252;'>"+nom+" "+prenom +"</a></h2>";
                 document.getElementById("id2").value=id;
                document.getElementById("nom2").value=nom;
                document.getElementById("prenom2").value=prenom;
                 document.getElementById("sexe2").value=sexe;
                document.getElementById("anneedenaissance2").value=anneedenaissance;
                
                 document.getElementById("mobile2").value=mobile;
                 document.getElementById("email2").value=email;
                document.getElementById("etatcivil2").value=etatcivil;
                document.getElementById("assurance2").value=assurance;
                document.getElementById("adresse2").value=adresse;
                modifierpatient.style.display="flex";
            }
           function Delete(id){
               id++;
               document.getElementById("id333").value=id;
               document.getElementById("cl3").click();
           }
            
            function nameandantecedents(name, id, str){
               
document.getElementById("patient").value=name;
                document.getElementById("names").style.display="none";
                 document.getElementById("in2").value=id;
                var ar = str.split("%");
                var an =  document.getElementById("antecedents");
                an.value="";
                for(var i=0;i<ar.length;i++){
                    if(ar[i]!="" && ar[i].length>0){
                        an.value+=ar[i]+",";
                    }
                }
            }
            function f(str){
                document.getElementById("antecedents").value=str;
            }
            
            function lst(name, id){
    
                document.getElementById("nom3").value=name;
                document.getElementById("panel4").style.display="none";
                 document.getElementById("in1").value=id;
            }
             document.getElementById("panel4").onclick=function(){
                  document.getElementById("panel4").style.display="none";
             }
             
              function Clear3(){
                document.getElementById("nom3").value="";
                document.getElementById("richtextbox1").value="";
              }
            function Clear4(){
                document.getElementById("patient").value="";
                document.getElementById("motif").value="";
                document.getElementById("antecedents").value="";
                document.getElementById("diagnostic").value="";
                
                document.getElementById("result").value="";
                   document.getElementById("poids").value="";
                   document.getElementById("taille").value="";
                document.getElementById("temperature").value="";
                document.getElementById("frequencecardiaque").value="";
                document.getElementById("pressionarterielle").value="";
                document.getElementById("observation").value="";
                
              }
            
            function In(){
                document.getElementById("rtb").value = document.getElementById("richtextbox1").value;
            }
            var infos = "";
            
         function OPEN1(id){
             if(infos!="")
             document.getElementById(infos).hidden=true;     
             infos = "tr"+id;
             document.getElementById("tr"+id).hidden=false; 
         }   
            document.getElementById("names").onclick=function(){
                 document.getElementById("names").style.display="none";
            }
             document.getElementById("antec").onclick=function(){
                 document.getElementById("antec").style.display="none";
            }
            function opennames(){
                document.getElementById("names").style.display="flex";
            }
            function openantecedents(){
                document.getElementById("antec").style.display="flex";
            }
            function BMI(){
                var p = document.getElementById("poids").value;
                var h = document.getElementById("taille").value;
                
                if(p.length<=0 || h.length<=0){
                     document.getElementById("poids").style.background="rgba(0,0,0,0.03)";
                             document.getElementById("poids").style.color="black";
                             
                             document.getElementById("taille").style.background="rgba(0,0,0,0.03)";
                             document.getElementById("taille").style.color="black";
                }
                
                
                if(h!="" && h.length>0 && !isNaN(h)){
                    if(p!="" && p.length>0 && !isNaN(p)){
                    let bmi = (p / ((h * h) 
                            / 10000)).toFixed(2);
                         if (bmi < 18.6) {
                         document.getElementById("poids").style.background="#ff5252";
                             document.getElementById("poids").style.color="white";
                             
                             document.getElementById("taille").style.background="#ff5252";
                             document.getElementById("taille").style.color="white";
                         }
                          else if (bmi >= 18.6 && bmi < 24.9) {
                           document.getElementById("poids").style.background="#00d600";
                             document.getElementById("poids").style.color="white";
                             
                             document.getElementById("taille").style.background="#00d600";
                             document.getElementById("taille").style.color="white";
                          }
                          else{
                            document.getElementById("poids").style.background="#ff5252";
                             document.getElementById("poids").style.color="white";
                             
                             document.getElementById("taille").style.background="#ff5252";
                             document.getElementById("taille").style.color="white";
                          }
                    }
                }
            }
            
            var ar2 = [];
            function Hide2(id){
                
               if(ar2.length==0)
                   ar2.push(id);
                
                else{
                    document.getElementById(ar2[0]).hidden=true;
                    ar2 = [];
                    ar2.push(id);
                }
                document.getElementById(id).hidden=false;
              
            }
            
            var td0 = document.getElementById("td0");
            var td1 = document.getElementById("td1");
            function Slide1(id){
                if(id=="0"){
                        td0.style.width="50%";
                td0.style.opacity="1"; 
                }
                else if(id=="1"){
                    document.getElementById("tddiv0").style.display="block";
                    document.getElementById("tddiv1").style.display="none";
                    document.getElementById("tddiv2").style.display="none";
                    
                td0.style.width="0";
                td0.style.opacity="0";
                }
                  else if(id=="2"){
                    document.getElementById("tddiv0").style.display="none";
                    document.getElementById("tddiv1").style.display="block";
                    document.getElementById("tddiv2").style.display="none";
                    
                td0.style.width="0";
                td0.style.opacity="0";
                }
                 else if(id=="3"){
                    document.getElementById("tddiv0").style.display="none";
                    document.getElementById("tddiv1").style.display="none";
                    document.getElementById("tddiv2").style.display="block";
                    
                td0.style.width="0";
                td0.style.opacity="0";
                }
            }
            function Stats(){
                document.getElementById("dashboard1").click();
            }
</script>
        </form> 
    </body>
</html>