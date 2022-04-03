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
                             
                              $pos = strpos($url, "&str=");
                        
                              $url_components = parse_url($url);
                        
                        
                        
                        if(file_exists("consultations.txt"))
                {
                            $ar = array();
                   $json =  json_decode(file_get_contents("consultations.txt"),TRUE);
                    
                    echo "<table id=\"table2\"><th>Id Patient</th><th>Patient</th><th>Motif</th><th>Diagnostique medical</th><th>Resultat de l'examen</th><th>Observation</th>";
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
                             parse_str($url_components['query'], $params);   
                        
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
            
</script>
        </form> 
    </body>
</html>