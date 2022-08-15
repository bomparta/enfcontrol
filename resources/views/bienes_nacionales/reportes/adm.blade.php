<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVENTARIO DE BIENES NACIONALES UBICACIÓN ADMINISTRATIVA</title>
    <style>
    body {
  font-family: 'Times New Roman';

  font-size: 50%;

}
    table{
       
        border-collapse: collapse;
        width: 100%;
       
        
    }
    td {
        border: 1px solid ;
        text-align: left;
        padding: 8px;
    }
   tr.tr_encabezado,td.td_encabezado,th.th_encabezado{
        border:hidden; 
        background-color: white;
        text-align: center;
        font-size: 100%;
   }
    th{
        border: 1px solid ;
       
        padding: 8px; 
        background-color: #dddddd;
    }
</style>
  </head>

  <body>
<style>
@page { margin-left: 0.31527777777778in; margin-right: 0.31527777777778in; margin-top: 0.58055555555556in; margin-bottom: 0.58055555555556in; }
body { margin-left: 0.31527777777778in; margin-right: 0.31527777777778in; margin-top: 0.58055555555556in; margin-bottom: 0.58055555555556in; }
</style>
<table border="0" cellpadding="0" cellspacing="5" >
<tr class="tr_encabezado" >
               <td class="td_encabezado"  colspan="2">                
                   <img src="{{public_path('/img/logo1.png')}}" 
                    style="width: 15mm; height: 15mm; margin: 0;" />               
              </td>         
              <th class="th_encabezado"  colspan="8" >
                 <div>ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO <br>
              INVENTARIO DE BIENES PÚBLICOS </div>
              </th> 
             <td class="td_encabezado"  colspan="2" align="center" >               
               <img  src="{{public_path('/img/logo2.png')}}"   style="width: 15mm; height: 15mm; " />
             </td>
         </tr>


        <tbody>
        @foreach($bienes as $bienes)

          <tr>
            <th colspan="4">1.-UNIDAD ADMINISTRATIVA:</th>
            <th colspan="6">2.- RESPONSABLE DE ÁREA:                          </th>
            <th colspan="2">3.- FECHA:                   </th>
          </tr>
          <tr>
            <td colspan="4">{{$bienes->ubic_adm}}</td>
            <td colspan="6"></td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <th  colspan="10">4.- UBICACIÓN ADMINISTRATIVA:  </th>                                                           </td>
            <th colspan="2">5. UBICACIÓN GEOGRÁFICA:</th>
          </tr>
          <tr >
            <td colspan="10"></td>
            <td colspan="2"></td>
          </tr>
          <tr >
            <th colspan="12" ali  aling="center">6.- CARACTERÍSTICAS DE LOS  BIENES MUEBLES</th>
          </tr>
          <tr >
            <th >CODIGO DE LA SUDEBIP</th>
            <th >TIPO DE BIEN</th>
            <th >Nro. BIEN </th>
            <th >&nbsp;DESCRIPCIÓN DE LOS BIENES</th>
            <th >SERIAL</th>
            <th >MARCA</th>
            <th >MODELO</th>
            <th >COLOR</th>
            <th >ESTADO DEL BIEN</th>
            <th >FUENTE DE FINANCIAMIENTO</th>
            <th >SITUACIÓN CONTABLE</th>
            <th >OBSERVACIONES</th>
          </tr>
          <tr id="lista">
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
          </tr>
          <tr >
            <th colspan="6">7.- POR LA DIVISIÓN DE BIENES NACIONALES</th>
            <th colspan="2">8.- RESPONSABLE ADMINISTRATIVO</th>
            <th colspan="2" >9.- VERIFICADO POR:</th>
            <th colspan="2">10.- RESPONSABLE DEL ÁREA:</th>
          </tr>         
          <tr >
            <th>REVISADO</th>
            <td colspan="2" ></td>
            <th colspan="3" rowspan="4">JEFE(A) DIVISIÓN DE BIENES NACIONALES</th>
            <th colspan="2" rowspan="4">{{$bienes->ubic_adm}} <br> DIRECTOR</th>
            <th colspan="2"rowspan="4">SUPERVISOR(A)</th>
            <th colspan="2" rowspan="4">DIRECTOR(A) DE ADMINISTRADOR</th>         
            
          </tr>
          <tr >
            <th>ELABORADO</th>
            <td colspan="2" ></td>
         
           
          </tr>
          <tr>
            <th >TRANSCRITO</th>
            <td colspan="2" ></td>
       
            
          </tr>
          <tr >
            <th >ETIQUETADO</th>
            <td colspan="2" ></td>
           
           
          </tr>
          @endforeach
        </tbody>
    </table>

</body>
</html>