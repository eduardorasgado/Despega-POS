<?php
 
  require_once("header.php");

?>
  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">
                            <button class="btn btn-primary btn-lg" id="add_button" data-toggle="modal" data-target="#usuarioModal" onclick="limpiar()"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Usuario</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                       <table id="usuario_data" class="table table-bordered table-striped">
                         <thead>
                           <tr>
                             <th>Nombre</th>
                             <th>Apellido</th>
                             <th>Cédula</th>
                             <th>Teléfono</th>
                             <th>Correo</th>
                             <th>Dirección</th>
                             <th>Cargo</th>
                             <th>Usuario</th>
                             <th>Estado</th>
                             <th width="10%">Editar</th>
                             <th width="10%">Eliminar</th>
                           </tr>
                         </thead>
                         <tbody>
                     
                         </tbody>
                       </table>
                    </div>
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  

<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/usuarios.js"></script>