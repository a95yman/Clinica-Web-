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
             <h1>Ajouter un RDV</h1>
                   <h2>Liste des patients*</h2>
            <input type="text" id="in1"  name="in1" hidden />
            <select id="select1" onchange="In2()">
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
            <h2>Choisissez une date*</h2>
                       <input name="date1" id="date1" onclick="" type="date"/>
               <h2>Choisissez un temps*</h2>
                       <input name="time1" id="time1" onclick="" type="time"/>
                 <h2>Description*</h2>
               <textarea oninput="In()" id="richtextbox1" placeholder="Descritpion"></textarea>
                    <input type="text" id="rtb" name="rtb" hidden/>
               <input type="text" id="nom3" name="nom3" hidden/>
                <button name="sv3" id="sv3" type="button" onclick="sub()" style="color:white;background:#5252ff;margin-top:5vw;">Sauvegarder</button>
                <button name="sv3_3" id="sv3_3" type="submit" hidden></button>
               <?php
               if(isset($_POST['sv3_3'])){
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
            function Clear2(){ document.getElementById("richtextbox1").value="";
               document.getElementById("rtb").value="";
            }
            function sub(){
                document.getElementById("success").style.display="flex";
                setTimeout(function(){
                    document.getElementById("sv3_3").click();
                }, 3000);
            }
             function In(){
                document.getElementById("rtb").value = document.getElementById("richtextbox1").value;
            }
            In2();
            function In2(){
                 var selectElement = document.getElementById("select1");
    var value = selectElement.value;
    document.getElementById("nom3").value=value;
                ID(selectElement.selectedIndex);
            }
            
             function ID(id){
             document.getElementById("in1").value=id+1;
         }   
</script>
        </form> 
    </body>
</html>