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
                    <br>
                    <a class='btn btn-info' href="{{URL::route('actividad')}}">Regresar</a>
                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>
</div> <!-- page-content-wrapper -->
</div> <!-- wrapper -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

@endsection