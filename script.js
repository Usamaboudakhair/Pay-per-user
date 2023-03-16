var Curselected=$('#currency').find(":selected").text();
const slideValue = document.querySelector("span");
const inputSlider = document.querySelector("input");

var cur ={"gbp":1,"eur":1.15,"usd":1.38};
var curlogo ={"gbp":'£',"eur":"€","usd":"$"};
var maxuser=1001;
var discount=$("#discount");
var disoutput=0;
if(inputSlider.value<20){
  disoutput=0;
  discount.html('0');
  $('#messagediscount').css('opacity','0');
}
inputSlider.oninput = (()=>{
  let value = inputSlider.value;
  var valcurrency1= (value * cur[$('#hidecur').text()]).toFixed(2);
  var valcurrency2=((value * cur[$('#hidecur').text()])*2).toFixed(2);
  var valcurrency3=((value * cur[$('#hidecur').text()])*4).toFixed(2);
  if(value==maxuser){
      slideValue.textContent = 1000+"+";
      $('#cur1').html("");
      $('#cur2').html("");
      $('#cur3').html("");
      $('#currencylogo1').html('Contact US');
      $('#currencylogo2').html('Contact US');
      $('#currencylogo3').html('Contact US');
      $('#plan-type1').html('');
      $('#plan-type2').html('');
      $('#plan-type3').html('');
      $( "#plan1" ).css( "opacity", "0.6" );
      $( "#plan2" ).css( "opacity", "0.6" );
      $( "#plan3" ).css( "opacity", "0.6" );
      discount.html('0');
      $('#messagediscount').css('opacity','0');
  }else{
      slideValue.textContent = value;
      $('#currencylogo1').html(curlogo[$('#hidecur').text()]);
      $('#currencylogo2').html(curlogo[$('#hidecur').text()]);
      $('#currencylogo3').html(curlogo[$('#hidecur').text()]);
      $('#plan-type1').html('/Mo');
      $('#plan-type2').html('/Mo');
      $('#plan-type3').html('/Mo');
      $( "#plan1" ).css( "opacity", "1" );
      $( "#plan2" ).css( "opacity", "1" );
      $( "#plan3" ).css( "opacity", "1" );
        if(value>20 && value<=50){
          disoutput=3;
           discount.html(disoutput);
          $('#messagediscount').css('opacity','1');
          $('#cur1').html((valcurrency1-(valcurrency1*(disoutput/100))).toFixed(2));
          $('#cur2').html((valcurrency2-(valcurrency2*(disoutput/100))).toFixed(2));
          $('#cur3').html((valcurrency3-(valcurrency3*(disoutput/100))).toFixed(2));
        }else if(value>50 && value<=100){
          disoutput=6;
           discount.html(disoutput);
          $('#messagediscount').css('opacity','1');
          $('#cur1').html((valcurrency1-(valcurrency1*(disoutput/100))).toFixed(2));
          $('#cur2').html((valcurrency2-(valcurrency2*(disoutput/100))).toFixed(2));
          $('#cur3').html((valcurrency3-(valcurrency3*(disoutput/100))).toFixed(2));
        }else if(value>100 && value<=150){
          disoutput=9;
           discount.html(disoutput);
          $('#messagediscount').css('opacity','1');
          $('#cur1').html((valcurrency1-(valcurrency1*(disoutput/100))).toFixed(2));
          $('#cur2').html((valcurrency2-(valcurrency2*(disoutput/100))).toFixed(2));
          $('#cur3').html((valcurrency3-(valcurrency3*(disoutput/100))).toFixed(2));
        }else if(value>150 && value<=250){
          disoutput=12;
           discount.html(disoutput);
          $('#messagediscount').css('opacity','1');
          $('#cur1').html((valcurrency1-(valcurrency1*(disoutput/100))).toFixed(2));
          $('#cur2').html((valcurrency2-(valcurrency2*(disoutput/100))).toFixed(2));
          $('#cur3').html((valcurrency3-(valcurrency3*(disoutput/100))).toFixed(2));
        }else if(value>250 && value<=350){
          disoutput=15;
           discount.html(disoutput);
          $('#messagediscount').css('opacity','1');
          $('#cur1').html((valcurrency1-(valcurrency1*(disoutput/100))).toFixed(2));
          $('#cur2').html((valcurrency2-(valcurrency2*(disoutput/100))).toFixed(2));
          $('#cur3').html((valcurrency3-(valcurrency3*(disoutput/100))).toFixed(2));
        }else if(value>350 && value<=500){
          disoutput=25;
           discount.html(disoutput);
          $('#messagediscount').css('opacity','1');
          $('#cur1').html((valcurrency1-(valcurrency1*(disoutput/100))).toFixed(2));
          $('#cur2').html((valcurrency2-(valcurrency2*(disoutput/100))).toFixed(2));
          $('#cur3').html((valcurrency3-(valcurrency3*(disoutput/100))).toFixed(2));
        }else if(value>500 && value<=750){
          disoutput=30;
           discount.html(disoutput);
          $('#messagediscount').css('opacity','1');
          $('#cur1').html((valcurrency1-(valcurrency1*(disoutput/100))).toFixed(2));
          $('#cur2').html((valcurrency2-(valcurrency2*(disoutput/100))).toFixed(2));
          $('#cur3').html((valcurrency3-(valcurrency3*(disoutput/100))).toFixed(2));
        }else if(value>750 && value<=1000){
          disoutput=52;
           discount.html(disoutput);
          $('#messagediscount').css('opacity','1');
          $('#cur1').html((valcurrency1-(valcurrency1*(disoutput/100))).toFixed(2));
          $('#cur2').html((valcurrency2-(valcurrency2*(disoutput/100))).toFixed(2));
          $('#cur3').html((valcurrency3-(valcurrency3*(disoutput/100))).toFixed(2));
        }else{
          disoutput=0;
          discount.html(disoutput);
          $('#cur1').html((valcurrency1-(valcurrency1*(disoutput/100))).toFixed(2));
          $('#cur2').html((valcurrency2-(valcurrency2*(disoutput/100))).toFixed(2));
          $('#cur3').html((valcurrency3-(valcurrency3*(disoutput/100))).toFixed(2));
          $('#messagediscount').css('opacity','0');
        }
  }
  
 
  
});
/* $(document).on('click','#m',function(){
  $("#toggle").attr('class', 'fa fa-toggle-on fa-flip-horizontal');
  $('#cur1').html(moneysart);
  $('#cur2').html(moneyEssential);
  $('#cur3').html(moneypro);
});
$(document).on('click','#y',function(){
  $("#toggle").attr('class', 'fa fa-toggle-on');
  $('#cur1').html(moneysart-(moneysart*0.1));
  $('#cur2').html(moneyEssential-(moneysart*0.1));
  $('#cur3').html(moneypro-(moneysart*0.1));
  
});*/
$(document).ready(function(){
    $('#currency').on('change', function (e) {
      $('#hidecur').html(this.value);
     var valcur1= (cur[this.value] * inputSlider.value);
     var valcur2= (cur[this.value] * inputSlider.value)*2;
     var valcur3= (cur[this.value] * inputSlider.value)*4;
     $('#cur1').html((valcur1-(valcur1*(discount.text()/100))).toFixed(2));
     $('#cur2').html((valcur2-(valcur2*(discount.text()/100))).toFixed(2));
     $('#cur3').html((valcur3-(valcur3*(discount.text()/100))).toFixed(2));
     
     if(this.value=="usd"){
      $('#currencylogo1').html('$');
      $('#currencylogo2').html('$');
      $('#currencylogo3').html('$');
     }else if(this.value=="eur"){
      $('#currencylogo1').html('€');
      $('#currencylogo2').html('€');
      $('#currencylogo3').html('€');
     }else{
      $('#currencylogo1').html('£');
      $('#currencylogo2').html('£');
      $('#currencylogo3').html('£');
     }
  });
});

