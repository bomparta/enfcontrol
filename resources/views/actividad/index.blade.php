@extends('layouts.app')

@section('content')

<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-strided" id="example" width="100%">
                        <thead>
                            <tr>
                                <th>C&oacute;digo</th>
                                <th>Nombre</th>
                                <th>Clasificaci&oacute;n</th>
                                <th>Tem&aacute;tica</th>
                                <th>Alcance</th>
                                <th>Tipo de Actividad</th>
                            
                                <th>Actuacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?Php //foreach ($actividad as $activ) { ?>
                            <tr>
                                <?php echo "<td>"; ?>
                                    <a target='_blank' title='Editar Actividad' href=''>
                                        <span class='btn-info badge'><? //= $activ->codigo."-".$activ->anio; ?></span>
                                    </a>
                                <?php echo "</td>"; ?>  
                                <?php echo "<td>"; ?><?php echo "</td>"; ?>  
                                <?php echo "<td align='center'>"; ?><?php echo "</td>"; ?> 
                                <?php echo "<td align='center'>"; ?><?php echo "</td>"; ?>
                                <?php echo "<td align='center'>"; ?><?php echo "</td>"; ?>
                                <?php echo "<td align='center'>"; ?><?php echo "</td>"; ?>
                                
                                <?php echo "<td align='center'>"; ?>
                                <?php 
                                //$variable = $this->actuacion_model->contador($activ->codigo);
                                    // echo $variable;				
                                ?>
                                    <a target='_blank' title='Actuaciones' href=''>
                                        <span class='btn-info badge'>< //?= $variable ?></span>
                                    </a>
                                <?php echo "</td>"; ?>
                                <?Php ?>
                                <td align='center'>
                                    <?Php //$var_3 = "actividad/borrar/".$activ->id;?>
                                    <?Php //$var_4 = "reportes/capacitados_actividad_global/".$activ->id;?>
                                    <?php //echo anchor($var_4, $text_5);//borrar ?>
                                </td>
                            </tr>
                            <?php //} ?>
                        </tbody>   
                    </table>
                    <button class='btn-info'>Regresar</button>
                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

@endsection