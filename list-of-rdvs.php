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
            
                   function f2(){
                               $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
 $url = $base_url . $_SERVER["REQUEST_URI"];
                              
                              $pos = strpos($url, "&str=");
                        
                              $url_components = parse_url($url);
                              
                         

                              
       if(file_exists("rdvs.txt"))
{
 $json = json_decode(file_get_contents("rdvs.txt"),TRUE);
$json2 = json_decode(file_get_contents("patiens.txt"),TRUE);
            
             if(!empty($json)){
               
               $id2=1;
                   $col2="#eee";
                       
                 echo "<table id='table2'><tr><th>Nom du patient</th><th>Date</th><th>Temps</th><th>Description</th></tr>";
                 $cs2=0;
                 
                 
foreach($json as $item){
    
  
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
                 echo "</table>";
           
             }
           
           
}
                                }
                        f2();
                            
                                
            
            
            ?>
                   </div>
  <div id="error-mobile">
      <img src="images/mobile.gif"/>
      <h2>This page only works in mobile</h2>
                   </div>
        <script type="text/javascript">
               var infos = "";
            
         function OPEN1(id){
             if(infos!="")
             document.getElementById(infos).hidden=true;     
             infos = "tr"+id;
             document.getElementById("tr"+id).hidden=false; 
         }   
            
</script>
        </form> 
    </body>
</html>