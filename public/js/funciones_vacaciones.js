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
 	
function dias_disfrute_lapso(e,fecha_ingreso,tipo_trabajador, annos_adm){
    //if ((event.keyCode === 165 || event.keyCode === 9)  && !event.shiftKey){
    var anno_ingreso=  new Date(fecha_ingreso.value).getFullYear() ; 
    var anno_servicio=parseInt(annos_adm.value);
    var lapso_disfrute = parseInt(e.value) - parseInt(anno_ingreso);
    // alert(lapso_disfrute);
     
       if(tipo_trabajador!=3){

       if(anno_servicio<lapso_disfrute){
            if(lapso_disfrute<=5){          
            //   alert("tiene menos 5 años");  
                document.getElementById('dias_adisfrutar').value=30;      
            }
            if(lapso_disfrute>=6 && lapso_disfrute<=10){          
            // alert("tiene entre 6 y 10 años");  
                document.getElementById('dias_adisfrutar').value=40;       
            }
            if(lapso_disfrute>=11){
            // alert("tiene mas de  11 años");
                document.getElementById('dias_adisfrutar').value=45; 
            }
        }else{
            if(anno_servicio<=5){          
                //   alert("tiene menos 5 años");  
                document.getElementById('dias_adisfrutar').value=30;      
            }
            if(anno_servicio>=6 && anno_servicio<=10){          
                // alert("tiene entre 6 y 10 años");  
                document.getElementById('dias_adisfrutar').value=40;       
            }
            if(anno_servicio>=11){
                // alert("tiene mas de  11 años");
                document.getElementById('dias_adisfrutar').value=45; 
            }
        }
    }else{
        document.getElementById('dias_adisfrutar').value=30; 
    }
   // } 
    return  document.getElementById('dias_adisfrutar').value;
}