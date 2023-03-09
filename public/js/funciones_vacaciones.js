//alert('holaaaaa');

function validar_dias(e){
   var dias_adisfrutar= e.value ;
   if(dias_adisfrutar=="1"){
   document.getElementById('diasadisfrutar').required = false;
   document.getElementById('diasadisfrutar').disabled = true;
   document.getElementById('diasadisfrutar').value = '';
   }
   if(dias_adisfrutar=="2"){
   
    document.getElementById('diasadisfrutar').required = true;
    document.getElementById('diasadisfrutar').disabled = false;
    }
} 
function validar_dias_completos(e,event){
    document.getElementById('diasadisfrutar').style.border ="";
    if ((event.keyCode === 13 || event.keyCode === 9)  && !event.shiftKey){
        event.preventDefault();
        var dias_adisfrutar= parseInt(e.value) ;
        var total_dias_disfrute = parseInt(document.getElementById('total_dias_disfrute').value);
      //  if(dias_adisfrutar=="2"){     

    
        if(dias_adisfrutar > total_dias_disfrute){
            document.getElementById('diasadisfrutar').style.border = "1px solid red";
            alert('Los días a disfrutar son mayores a los solicitados. Por favor Verificar...');
         
        }
       // }
    }
 }	

	
function sumar_dias(e,valor){
    var dias_pendientes= parseInt(valor) ;
 
    dias_pendientes = (dias_pendientes == null || dias_pendientes == undefined || dias_pendientes == "") ? 0 : parseInt(dias_pendientes);
    total_dias= document.getElementById('total_dias_disfrute').value;
    total_dias = (total_dias == null || total_dias == undefined || total_dias == "") ? 0 : parseInt(total_dias);
    if(e.checked){  
       
        document.getElementById('total_dias_disfrute').value= dias_pendientes+  total_dias;
    }else{
        resta= (total_dias - dias_pendientes   );
        resta = (resta == null || resta == undefined || resta == "") ? 0 : parseInt(resta);
        document.getElementById('total_dias_disfrute').value=resta;
    }
 } 