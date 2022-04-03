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
        <div id="container4">
           <div style="width:90%;margin:0 auto;margin-top:10vw;margin-bottom:25vw;">
               <div onclick="window.location.href='dashboard.php'" style="display:flex;margin-bottom:5vw;align-items:center;">
               <img src="images/backarrow.png" style="width:4vw;height:4vw;"/>
                   <h2 style="margin:0;margin-left:3vw;">Dashboard</h2>
               </div>
             <h1>Ajouter une consultation</h1>
        <h2>Liste des patients</h2>
                          <select id="select1" onchange="In2()">
                              <option value="-1"></option>
                <?php
                if(file_exists("patiens.txt")){

$json = json_decode(file_get_contents("patiens.txt"),TRUE);

            
             if(!empty($json)){
$id=1;
foreach($json as $item){
    echo "<option>".$item['nom']." ".$item['prenom']."</option>";

    
    $id++;
}

}


}
                ?>
            </select>
 
                 <h2>Motif</h2>
                        <input type="text" id="motif" name="motif"/>
                         <h2>Antecedents</h2>
                        <input readonly style="color:red"  type="text" id="antecedents" name="antecedents"/>
               
                 <?php
                 
                           $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
 $url = $base_url . $_SERVER["REQUEST_URI"];
                             
                              $pos = strpos($url, "?id=");
                    
                              $url_components = parse_url($url);
                 
                if(!empty($pos) && $pos>0){
               parse_str($url_components['query'], $params);      
                 $diag="";
     if(file_exists("consultations.txt")){
         $json2 = json_decode(file_get_contents("consultations.txt"),TRUE);
         if(!empty($json2))
         {
             $i2 = "0";
             foreach($json2 as $item2){
                 $i2 = $item2['id'];
                 if($params['id']==$i2){
                     $diag = $diag . $item2['diagnostic']."%";
                 }
                 
                 $i2++;
             }
         }
     }
                    echo "<script>str='".$diag."';var ar = str.split(\"%\"); an =  document.getElementById(\"antecedents\");an.value=\"\";for(var i=0;i<ar.length;i++){if(ar[i]!=\"\" && ar[i].length>0){an.value+=ar[i]+\",\";}}</script>";
                }
            
             
                 
               if(isset($_SESSION['favcolor']))
{
    //echo $_SESSION['favcolor'];
}
               
                   if(isset($_POST['sv3_3'])){
                      //$_SESSION["favcolor"] = "yellow";
                       $idd = $_POST['id1'];
                       $nom1 = $_POST['nom1'];
                       echo "<script>   
                      window.location.href='add-new-cons.php?id=".$idd."&name=".$nom1."';</script>";
                   }
                   ?>
            <input type="text" hidden id="id1" name="id1"/>
               <input type="text" hidden id="nom1" name="nom1"/>
               
               
                 <h2>Diagnostique medicale</h2>
                        <input type="text"  name="diagnostic" id="diagnostic"/>
                         <h2>Resultat de l'examen clinique</h2>
                        <textarea name="result" id="result"></textarea>
                          <h2>Poids(Kg)</h2>
                        <input oninput="BMI()" type="text" id="poids" name="poids"/>
                    <h2>Taille(cm)</h2>
                        <input oninput="BMI()" type="text" id="taille" name="taille"/>
               <h2>Temperature(°C)</h2>
                        <input type="text" id="temperature" name="temperature"/>
                     <h2>Frequence cardiaque</h2>
                        <input type="text" id="frequencecardiaque" name="frequencecardiaque"/>
                      <h2>Pression arterielle</h2>
                        <input type="text" id="pressionarterielle" name="pressionarterielle"/>
                     <h2>Observation</h2>
                        <input type="text"  name="observation" id="observation"/>
               
                <button name="sv6" id="sv6" type="button" onclick="sub()" style="color:white;background:#5252ff;margin-top:5vw;">Sauvegarder</button>
               <button hidden name="sv6_s" id="sv6_s"></button>
               <?php
                     
                
                if(isset($_POST['sv6_s'])){
                                       if(!file_exists("consultations.txt"))
                       file_put_contents("consultations.txt", ""); 
                    $json = json_decode(file_get_contents("consultations.txt"),TRUE);
                    
                    $id =  $_POST['id1'];
                       $patient = $_POST['nom1'];
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
                    
                      echo "<script>window.location.href='add-new-cons.php'</script>";
                     
                }
          
               ?>
                <button name="sv3_3" id="sv3_3" type="submit" hidden></button>
                
                 <button type="button" style="color:white;background:#ff2424" onclick='javascript:Clear4()'>Effacer Tous</button>
            </div>
            
                   </div>
                   
  
                   <div id="error-mobile">
      <img src="images/mobile.gif"/>
      <h2>This page only works in mobile</h2>
                   </div>
                   
                    <div id="success">
        <img src="images/success.gif"/>
        </div>
                       <div id="loading">
        <img src="images/loading.gif"/>
        </div>
                   
        <script type="text/javascript">
            function Clear2(){ document.getElementById("richtextbox1").value="";
               document.getElementById("rtb").value="";
            }
            function sub(){
                document.getElementById("success").style.display="flex";
                setTimeout(function(){
                    document.getElementById("sv6_s").click();
                }, 3000);
            }
             function In(){
                document.getElementById("rtb").value = document.getElementById("richtextbox1").value;
            }
           
            
               var url = window.location.href;
             if(url.indexOf("?id=") != -1){
                 
                   var id = url.split("?")[1].split("=")[1].trim();
                 if(id.indexOf("&")!=-1)
                     id = id.split("&")[0].trim();
                  document.getElementById("select1").selectedIndex=Number(id);
                 document.getElementById("id1").value=Number(Number(id));
                   document.getElementById("nom1").value=document.getElementById("select1").value;
             }
            else{
                 document.getElementById("select1").selectedIndex=0;
                document.getElementById("id1").value=1;
                    document.getElementById("nom1").value=document.getElementById("select1").value;
                
            }
           
            
            
            
            
            
            function In2(){
                 document.getElementById("loading").style.display="flex";
                 var selectElement = document.getElementById("select1");
    var value = selectElement.value;
    document.getElementById("nom1").value=value;
                ID(selectElement.selectedIndex);
            }
            
             function ID(id){
             document.getElementById("id1").value=id;
                   setTimeout(function(){
                    document.getElementById("sv3_3").click();
                }, 1000);
         }  
            function diags(){
                alert();
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
                      function Clear4(){
                          document.getElementById("select1").selectedIndex=0;
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
</script>
        </form> 
    </body>
</html>