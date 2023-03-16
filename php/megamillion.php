

<html>
    <head>
        <title>megamillion</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
                color: #3f0191;
                background: #fff;
                }
                .earn{
                border: none;
                background: none;
                background: #4275af;
                border-radius: 30px;
                color: #fff;
                display: inline-block;
                font-family: sans-serif;
                padding: 11px 17px 11px;
                cursor: pointer;
                font-size: medium;text-decoration: none;
                }.earn:hover{
                background: #436183;
                }

        </style>
        <center> 
                
            <form  method="post" id="myform" >
                 <div id="Result">
                </div>
                
                <h2 id="check" hidden>Cochez <span id="numbers" style="color:red">5</span> numéros et <span id="numberchance" style="color:red">1</span> numéro Mega </h2>
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
                        createballs(70);
                        $j=1;
                        echo "<h3><strong style='font-size:20px;color: rgb(255,100,80)'></strong></h3>";
                        while($j<=25){ 
                            
                            ?>
                                <input type="button" id="ball2" style="color: #b3a60e;border: 1px solid #b3a60e;" class="ball" value="<?=$j?>">
                            <?php
                            $j++;
                            if($j==6 or $j==11 or $j==16 or $j==21) echo "<br>";
                        }
                    ?>
                </div>
                <br>
                <input  name="earn" type="submit" class="earn" id="earn" value="Valider">
                <input type="text" hidden name="ballsvalues" id="ballsvalues"  >
                <input type="text" hidden name="ballchancevalues" id="ballvalue" >
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
                            this.style="color: #ffffff;background: #3f0191";
                            ballsnb=ballsnb-1;
                            $('#numbers').text(ballsnb);
                            Tballvalues.push(ballvalue);          
                        }else if(ballsnb>=0 &&  jQuery.inArray(ballvalue,Tballvalues) !== -1){
                            this.style="color: #3f0191 ;background: white";
                            ballsnb++;
                            $('#numbers').text(ballsnb);
                            Tballvalues = $.grep(Tballvalues, function(value) {
                                return value != ballvalue;
                            });
                        }
                    });  $(document).on('click','#ball2',function(){
                        var chanceballvalue = this.value;
                        var ballsnb=$('#numberchance').text();
                        if(ballsnb==1 && jQuery.inArray(chanceballvalue,Tballvalues2) === -1 ){
                            this.style="color: #ffffff;background:#b3a60e";
                            ballsnb=0;
                            $('#numberchance').text(ballsnb);
                            Tballvalues2.push(chanceballvalue);        
                        }else if(ballsnb==0 && jQuery.inArray(chanceballvalue,Tballvalues2) !== -1){
                            this.style="color: #b3a60e ;border: 1px solid #b3a60e;background: white";
                            ballsnb=1;
                            $('#numberchance').text(ballsnb);
                            Tballvalues2 = $.grep(Tballvalues2, function(value) {
                                return value != chanceballvalue;
                            });
                        }
                        
                    });
                    $("form").submit(function(e){      
                            $('#ballsvalues').val(Tballvalues);
                            $('#ballvalue').val(Tballvalues2);
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
              $nb = rand(1,49);
              foreach ($tab as $val) {
                 if ($busy = ($val == $nb))
                    break;
              }
           } while ($busy);
           $tab[] = $nb;
        }
        $nbchance = rand(1,10);
        array_push($tab,$nbchance);
        return $tab;
    }  
    if(isset($_POST['earn'])){
        $nbballs=5;
        $nbchanceball=1;
        $randomballs = realise_tirage();
        $userballs = $_POST["ballsvalues"];
        $userchanceball=$_POST["ballchancevalues"];
        $userballs=explode(',',$userballs);
        if($userballs[0]=='')$userballs=array();
        $nballleft = count($userballs)-$nbballs;
        if($userchanceball=='')$userchanceball=0;
        $nballchanceleft = $userchanceball-$nbchanceball;
        while($nballleft<0){
            if($nballleft==0) break;
            do {
                $newball = rand(1,49);
            }while(in_array($newball,$userballs));
            
            array_push($userballs,$newball);
            $nballleft++; 
        }while($nballchanceleft<0){
            if($nballchanceleft==0) break;
            do {
                $newball = rand(1,10);
            }while(in_array($newball,$userballs));
            
            $userchanceball=$newball;
            $nballchanceleft++; 
        }
        $win=0;
        $ch=0;
        echo "<div style='max-width: 500px;'>";
        for($i=0,$j=0;$i<$nbballs,$j<$nbballs;$i++,$j++){
                    echo '<input type="button"   class="ball" style="background:#5a5959;color:white" value="'.$userballs[$i].'">';
        }
            echo "<br>";
           
            echo '<input type="button"  class="ball" style="background:#e8d704;color:black" value="'.$userchanceball.'">';
          
           /*for($i=0;$i<($nbballs+1);$i++){
                if($i==$nbballs){
                    echo '<br><strong>n°Chance</strong><br><input type="button"   class="ball" style="background:red;color:white" value="'.$randomballs[$i].'">';
                }else{
                    echo '<input type="button"   class="ball" style="background:grey;color:white" value="'.$randomballs[$i].'">';
              }      
               } 
            echo "</div>";
            if($win==($nbballs+1)){
                echo '<h2 style="color:green"></h2>';
            }else{
                echo '<h2 style="color:Red"> <a href="LoTTO.PHP"></a></h2>';
            }
            */
    }   
?>