

<html>
    <head>
        <title>Keno</title>
        
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
                color: #ff8e23;
                background: #fff;
                }
                .earn{
                border: none;
                background: none;
                background: #ff8e23;
                border-radius: 30px;
                color: #ffff;
                display: inline-block;
                font-family: sans-serif;
                padding: 11px 17px 11px;
                cursor: pointer;
                font-size: medium;text-decoration: none;
                }.earn:hover{
                background: #cc711c;

                }

        </style>
        <center> 
                
            <form  method="post" id="myform" >
                 <div id="Result">
                </div>
                
                <h2 id="check" hidden>Cochez <span id="numbers" style="color:red">10</span></h2>
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
                    ?>
                </div>
                <br>
                <input  name="earn" type="submit" class="earn" id="earn" value="Valider">
                <input type="text" hidden name="ballsvalues" id="ballsvalues">
            </form>
        <center>
        <script>
                     var Tballvalues = [];
                     var ballvalue;
                    $(document).on('click','#ball',function(){
                        ballvalue = this.value;
                        var ballsnb=$('#numbers').text();
                        if(ballsnb>0 && jQuery.inArray(ballvalue,Tballvalues) === -1){
                            this.style="color: #ffffff;background:#ff8e23";
                            ballsnb=ballsnb-1;
                            $('#numbers').text(ballsnb);
                            Tballvalues.push(ballvalue);          
                        }else if(ballsnb>=0 &&  jQuery.inArray(ballvalue,Tballvalues) !== -1){
                            this.style="color:#ff8e23;background: white";
                            ballsnb++;
                            $('#numbers').text(ballsnb);
                            Tballvalues = $.grep(Tballvalues, function(value) {
                                return value != ballvalue;
                            });
                        }
                    });
                    $("form").submit(function(e){      
                            $('#ballsvalues').val(Tballvalues);
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
        for ($i=0; $i<10; $i++) {
           do {
              $nb = rand(1,70);
              foreach ($tab as $val) {
                 if ($busy = ($val == $nb))
                    break;
              }
           } while ($busy);
           $tab[] = $nb;
        }
        return $tab;
    }  
    if(isset($_POST['earn'])){
        $nbballs=10;
        $randomballs = realise_tirage();
        $userballs = $_POST["ballsvalues"];
        $userballs=explode(',',$userballs);
        if($userballs[0]=='')$userballs=array();
        $nballleft = count($userballs)-$nbballs;
        while($nballleft<0){
            if($nballleft==0) break;
            do {
                $newball = rand(1,49);
            }while(in_array($newball,$userballs));
            
            array_push($userballs,$newball);
            $nballleft++; 
        }
        $win=0;
        echo "<div style='max-width:280px;'>";
        for($i=0,$j=0;$i<$nbballs,$j<$nbballs;$i++,$j++){
                if($userballs[$i]==$randomballs[$j]){
                    echo '<input type="button"   class="ball" style="background:#9c7b7b;color:white" value="'.$userballs[$i].'">';
                    $win++;
                 }else{
                    echo '<input type="button"   class="ball" style="background:#9c7b7b;color:white" value="'.$userballs[$i].'">';
                 } 
        }
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
            }*/
    }   
?>