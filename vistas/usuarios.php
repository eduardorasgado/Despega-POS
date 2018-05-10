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
                             <th>Nombres</th>
                             <th>Apellido</th>
                             <th>Cédula</th>
                             <th>Teléfono</th>
                             <th>Correo</th>
                             <th>Dirección</th>
                             <th>Cargo</th>
                             <th>Usuario</th>
                             <th>Fecha Ingreso</th>
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

<!--/* FORMULARIO VENTANA MODAL */ -->

<div id="usuarioModal" class="modal fade">
  <div class="modal-dialog">
    <form action="" method="POST" id="usuario_form">
      <div  class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>
        </div>
        
        <div class="modal-body">
          
          <label>Nombres</label>
          <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombre o nombres" required pattern="[a-zA-Z]{0,20}">
          
          <label>Apellidos</label>
          <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Primero y segundo apellido">
          
          <label for="cedula">Cédula</label>
          <input name="cedula" id="cedula" class="form-control" placeholder="Cédula/ no es requerida" required pattern="[0-9]{0,15}">
          
          <label>Telefono</label>
          <input id="telefono" type="text" name="telefono" class="form-control" placeholder="Teléfono">
          
          <label>Correo</label>
          <input id="correo" type="text" name="correo" class="form-control" placeholder="Correo Electrónico válido">
          
          <label>Dirección</label>
          <input id="direccion" type="text" name="direccion" class="form-control">
          
          <label>Cargo</label>
          <input id="cargo" type="text" name="cargo" class="form-control">
          
          <label>Usuario</label>
          <input id="usuario" type="text" name="usuario" class="form-control">
          
          <label>Contraseña</label>
          <input id="password" type="password" name="password" class="form-control">
          
          <label>Repita contraseña</label>
          <input id="password2" type="password" name="password2" class="form-control">
          
          <label>Estado</label>
          <input id="estado" type="estado" name="estado" class="form-control">
        </div>
       
        <div class="modal-footer">
          
        </div>
      
      </div>
    </form>
  </div>
</div>

<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/usuarios.js"></script>