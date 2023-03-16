

<html>
    <head>
        <title>EuroMillions</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body>
        <style type="text/css">
            body {
                    height: 100%;
                    background-color: rgb(255, 255, 255);
                    font-family: Metropolis-Regular,sans-serif;
                    font-weight: 400;
                    font-size: 14px;
                    color: #1a1a1a;
                    padding: 0;
                    margin: 0;
                }
                body, html {
                    position: relative;
                    width: 100%;
                }
                .box_balls {
                    flex-wrap: wrap;
                    margin: 0px auto ;
                    max-width: 500px;
                    text-align: center;

                }
                .ball {
                    margin: 9px 9px;
                    -webkit-box-shadow: 0 5px 10px 0 hsl(0deg 0% 75% / 50%);
                    box-shadow: 0 5px 10px 0 hsl(0deg 0% 75% / 50%);position: relative;
                    -ms-flex-pack: center;
                    justify-content: center;
                    -ms-flex-align: center;
                    align-items: center;
                    padding: 0;
                    font-size: 14px;
                    font-weight: 600;
                    height: 30px;
                    width: 30px;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    outline: 0;
                    border: 0;
                    -webkit-tap-highlight-color: transparent;
                    border-radius: 50%;
                    cursor: pointer;
                    color: #001367;
                    background: #fff;
                }
                .earn{
                    border: none;
                    background: none;
                    background: #0628bf;
                    border-radius: 30px;
                    color: #fff;
                    display: inline-block;
                    font-family: sans-serif;
                    padding: 11px 17px 11px;
                    cursor: pointer;
                    font-size: medium;text-decoration: none;
                    }.earn:hover{
                    background: #041a7b;

                }
                .boxetoiles{
                    flex-wrap: wrap;
                    margin: -20px -4px ;
                    max-width: 500px;
                    text-align: center;
                    } 
                .etoil{
                    position: relative;
                    -ms-flex-pack: center;
                    justify-content: center;
                    -ms-flex-align: center;
                    align-items: center;
                    font-size: 13px;
                    font-weight: 600;
                    height: 50px;
                    width: 38px;
                    margin-left:10px;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    outline: 0;
                    border: 0;
                    -webkit-tap-highlight-color: transparent;
                    cursor: pointer;
                    color:rgb(220 172 3);
                    background: rgb(222 222 222 / 65%);
                    clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
                    
            }
             

        </style>
        <center> 
                
            <form  method="post" id="myform" >
                 <div id="Result">
                </div>
                
                <h2 id="check" hidden >Cochez <span id="numbers" style="color:red">5</span> numéros et <span id="numberetoile" style="color:red">2</span> Etoiles </h2>
                <div class="box_balls">
                    <?php 
                    //nb it's the numbers of balls
                        function createballs($nb){
                            $i=1;
                            while($i<=$nb){ 
                                ?>
                                    <input type="button" id="ball"  class="ball" value="<?=$i?>">
                                <?php
                                $i++;
                            }
                        }
                        createballs(50);
                        $j=1;
                        echo "<h3><strong style='font-size:20px;color:#dcac03'>Etoiles</strong></h3><br>";
                        echo '<div class="boxetoiles">';
                        while($j<=12){ 
                            
                            ?>
                                 <input type="button"  class="etoil" id="etoile" value="<?=$j?>">
                            <?php
                            $j++;
                            if($j==5 or $j==9 ) echo "<br>";
                        }
                        echo '</div>';
                    ?>
                </div>
                <br><br>
                <input  name="earn" type="submit" class="earn" id="earn" value="Valider">
                <input type="text" hidden name="ballsvalues" id="ballsvalues"  >
                <input type="text" hidden name="etoilevalues" id="etoilevalues" >
            </form>
        <center>
        <script>
                     var Tballvalues = [];
                     var Tballvalues2 = [];
                     var ballvalue;
                    $(document).on('click','#ball',function(){
                        ballvalue = this.value;
                        var ballsnb=$('#numbers').text();
                        if(ballsnb>0 && jQuery.inArray(ballvalue,Tballvalues) === -1){
                            this.style="color: #ffffff;background:#001367";
                            ballsnb=ballsnb-1;
                            $('#numbers').text(ballsnb);
                            Tballvalues.push(ballvalue);          
                        }else if(ballsnb>=0 &&  jQuery.inArray(ballvalue,Tballvalues) !== -1){
                            this.style="color: #001367 ;background: white";
                            ballsnb++;
                            $('#numbers').text(ballsnb);
                            Tballvalues = $.grep(Tballvalues, function(value) {
                                return value != ballvalue;
                            });
                        }
                    });  $(document).on('click','#etoile',function(){
                        var etoilevalue = this.value;
                        var etoilenb=$('#numberetoile').text();
                        if(etoilenb>0 && jQuery.inArray(etoilevalue,Tballvalues2) === -1 ){
                            this.style="color:White;background: rgb(247 192 0);";
                            etoilenb=etoilenb-1;
                            $('#numberetoile').text(etoilenb);
                            Tballvalues2.push(etoilevalue);        
                        }else if(etoilenb>=0 && jQuery.inArray(etoilevalue,Tballvalues2) !== -1){
                            this.style="color:rgb(220 172 3)d;background:rgb(222 222 222 / 65%);";
                            etoilenb++;
                            $('#numberetoile').text(etoilenb);
                            Tballvalues2 = $.grep(Tballvalues2, function(value) {
                                return value != etoilevalue;
                            });
                        }
                        
                    });
                    $("form").submit(function(e){      
                            $('#ballsvalues').val(Tballvalues);
                            $('#etoilevalues').val(Tballvalues2);
                    });
                    
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
        </script>
    </body>
</html>

<?php
    //connection
   //  $db=new mysqli('localhost','root','','lottodb');
                    
    function realise_tirage() {
        $tab = array();
        $busy = false; //numéro unique ?
        for ($i=0; $i<5; $i++) {
           do {
              $nb = rand(1,50);
              foreach ($tab as $val) {
                 if ($busy = ($val == $nb))
                    break;
              }
           } while ($busy);
           $tab[] = $nb;
        }
        for($i=0; $i<2; $i++) {
            $nbetoile = rand(1,12);
            array_push($tab,$nbetoile);
        }
        
        return $tab;
    }  
    if(isset($_POST['earn'])){
        $nbballs=5;
        $nbetoile=2;
        $randomballs = realise_tirage();
        $userballs = $_POST["ballsvalues"];
        $useretoiles=$_POST["etoilevalues"];
        $userballs=explode(',',$userballs);
        $useretoiles=explode(',',$useretoiles);
        if($userballs[0]=='')$userballs=array();
        $nballleft = count($userballs)-$nbballs;
        if($useretoiles[0]=='')$useretoiles=array();
        $nbetoileleft = count($useretoiles)-$nbetoile;
        while($nballleft<0){
            if($nballleft==0) break;
            do {
                $newball = rand(1,50);
            }while(in_array($newball,$userballs));
            
            array_push($userballs,$newball);
            $nballleft++; 
        }while($nbetoileleft<0){
            if($nbetoileleft==0) break;
            do {
                $newetoile = rand(1,12);
            }while(in_array($newetoile,$userballs) or in_array($newetoile,$useretoiles));
            array_push($useretoiles,$newetoile);
            $nbetoileleft++; 
        }
        $win=0;
        echo "<div style='max-width: 600px;'>";
        for($i=0;$i<$nbballs;$i++){
                    echo '<input type="button"  class="ball" style="background:grey;color:white" value="'.$userballs[$i].'">';
        }echo "<br>";   
        for($i=0;$i<count($useretoiles);$i++){
                echo '<input type="button"  class="etoil" style="color:White;background:rgb(220 172 3)" value="'.$useretoiles[$i].'">';
        }

           /*for($i=0;$i<($nbballs+1);$i++){
                if($i==$nbballs){
                    echo '<br><strong>n°Chance</strong><br><input type="button"   class="ball" style="background:red;color:white" value="'.$randomballs[$i].'">';
                }else{
                    echo '<input type="button"   class="ball" style="background:grey;color:white" value="'.$randomballs[$i].'">';
              }      
                
            echo "</div>";
            if($win==($nbballs+1)){
                echo '<h2 style="color:green"></h2>';
            }else{
                echo '<h2 style="color:Red"><a href="LoTTO.PHP"></a></h2>';
            }
            */
    }   
?>