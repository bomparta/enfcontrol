//alert('holaaaaa');
function isNumberKey(evt){
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57) )
	 return false;
	 return true;
}  		

function isNumberKey_monto(evt){
	
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode != 44 && (charCode > 31 && (charCode < 48 || charCode > 57)) )
	 return false;
	 return true;
 
}	
function mayusculas(e) {
  e.value = e.value.toUpperCase();
}
function permite(elEvento, permitidos) {
  var numeros ="0123456789";
  var caracteres = " abcdefghijklmn�opqrstuvwxyzABCDEFGHIJKLMN�OPQRSTUVWXYZ";
  var numeros_caracteres = numeros + caracteres;
  var hora = "01,02,03,04,05,06,07,08,09,10,11,12";
  var teclas_especiales = [8, 9, 37, 39, 46,  164, 165];
  // 8 = BackSpace, 9=Tab, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha, �=164, �=165
  //EQUIVALENTE DECIMAL
 
  // Seleccionar los caracteres a partir del par�metro de la funci�n
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
    case 'car':
      permitidos = caracteres;
      break;
    case 'num_car':
      permitidos = numeros_caracteres;
      break;
	case 'hora':
      permitidos = hora;
      break;
  }
 
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
 
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }
 
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}

function ValidaHora( formulario )  
{  
        var er_fh = /^(1|01|2|02|3|03|4|04|5|05|6|06|7|07|8|08|9|09|10|11|12)\:([0-5]0|[0-5][1-9])\ (AM|PM)$/  
        if( formulario.hora.value == "" )  
        {  
                alert("Introduzca la hora.")  
                return false  
        }  
        if ( !(er_fh.test( formulario.hora.value )) )   
        {   
                alert("El dato en el campo hora no es válido.")  
                return false  
        }  
          
        alert("�Campo de hora correcto!")  
        return true  
}
