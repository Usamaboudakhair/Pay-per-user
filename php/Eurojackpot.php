

<html>
    <head>
        <title>EuroJackpot</title>
        
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
                
                <h2 id="check" hidden >Cochez <span id="numbers" style="color:red">5</span> numéros et <span id="numberball2" style="color:red">2</span> Némeros </h2>
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
                        echo "<h3><strong style='font-size:20px;color:#dcac03'></strong></h3>";
                        
                        while($j<=10){ 
                            
                            ?>
                                 <input type="button" style="border:1px solid #d28d10;color:#d28d10"  class="ball" id="ball2" value="<?=$j?>">
                            <?php
                            $j++;
                            if($j==5 or $j==9 ) echo "<br>";
                        }
                        
                    ?>
                </div>
                <br>
                <input  name="earn" type="submit" class="earn" id="earn" value="Valider">
                <input type="text" hidden name="ballsvalues" id="ballsvalues"  >
                <input type="text" hidden name="ball2values" id="ball2values" >
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
                    });  $(document).on('click','#ball2',function(){
                        var ball2value = this.value;
                        var ball2nb=$('#numberball2').text();
                        if(ball2nb>0 && jQuery.inArray(ball2value,Tballvalues2) === -1 ){
                            this.style="background:#e8d704;color:black";
                            ball2nb=ball2nb-1;
                            $('#numberball2').text(ball2nb);
                            Tballvalues2.push(ball2value);        
                        }else if(ball2nb>=0 && jQuery.inArray(ball2value,Tballvalues2) !== -1){
                            this.style="border:1px solid #d28d10;color:#d28d10";
                            ball2nb++;
                            $('#numberball2').text(ball2nb);
                            Tballvalues2 = $.grep(Tballvalues2, function(value) {
                                return value != ball2value;
                            });
                        }
                        
                    });
                    $("form").submit(function(e){      
                            $('#ballsvalues').val(Tballvalues);
                            $('#ball2values').val(Tballvalues2);
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
            $nbball2 = rand(1,12);
            array_push($tab,$nbball2);
        }
        
        return $tab;
    }  
    if(isset($_POST['earn'])){
        $nbballs=5;
        $nbball2=2;
        $randomballs = realise_tirage();
        $userballs = $_POST["ballsvalues"];
        $userball2s=$_POST["ball2values"];
        $userballs=explode(',',$userballs);
        $userball2s=explode(',',$userball2s);
        if($userballs[0]=='')$userballs=array();
        $nballleft = count($userballs)-$nbballs;
        if($userball2s[0]=='')$userball2s=array();
        $nbball2left = count($userball2s)-$nbball2;
        while($nballleft<0){
            if($nballleft==0) break;
            do {
                $newball = rand(1,50);
            }while(in_array($newball,$userballs));
            
            array_push($userballs,$newball);
            $nballleft++; 
        }while($nbball2left<0){
            if($nbball2left==0) break;
            do {
                $newball2 = rand(1,12);
            }while(in_array($newball2,$userballs) or in_array($newball2,$userball2s));
            array_push($userball2s,$newball2);
            $nbball2left++; 
        }
        $win=0;
        echo "<div style=''>";
        for($i=0;$i<$nbballs;$i++){
                    echo '<input type="button"  class="ball" style="background:grey;color:white" value="'.$userballs[$i].'">';
        }echo "<br>";   
        for($i=0;$i<count($userball2s);$i++){
                echo '<input type="button"  class="ball" style="color:White;background:rgb(220 172 3)" value="'.$userball2s[$i].'">';
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