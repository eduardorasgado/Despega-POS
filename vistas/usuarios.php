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
          
          <label for="nombres">Nombres</label>
          <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombre o nombres" required pattern="^[a-zA-Z_áéíóú\s]{0,80}" title="Por favor no ingresar signos extraños o ajenos a letras del abecedario" minlength="3" maxlength="80">
          
          <label for="apellidos">Apellidos</label>
          <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Primero y segundo apellido" pattern="^[a-zA-Z_áéíóú\s]{0,100}" title="Por favor no ingresar signos extraños o ajenos a letras del abecedario" minlength="4" maxlength="100" required>
          
          <label for="cedula">Cédula</label>
          <input name="cedula" id="cedula" class="form-control" placeholder="Cédula/ no es requerida" pattern="[0-9]{0,15}" title="Por favor ingresa una cédula válida">
          
          <label for="telefono">Telefono</label>
          <input id="telefono" type="text" name="telefono" class="form-control" placeholder="Teléfono celular o de casa" pattern="[0-9 ]{0,20}" title="Por favor ingresar valores numéricos" minlength="10" maxlength="80">
          
          <label for="correo">Correo</label>
          <input id="correo" type="email" name="correo" class="form-control" placeholder="Correo Electrónico válido" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
          
          <label for="direccion">Dirección</label>
          <input id="direccion" type="text" name="direccion" class="form-control" placeholder="Número interno/externo, colonia o delegación, ciudad o municipio." maxlength="110" pattern="^[a-zA-Z_áéíóú\s]{0,110}" title="Por favor no ingresar signos extraños o ajenos a letras del abecedario">
          
          <label for="cargo">Cargo</label>
          <select class="form-control" id="cargo" name="cargo" required>
            <option value="">----Selecciona cargo----</option>
            <option value="1">Administrador</option>
            <option value="0">Empleado(a)</option>            
          </select><br>

          <label for="usuario">Usuario</label>
          <input id="usuario" type="text" name="usuario" class="form-control" placeholder="Nombre en el sistema" pattern="^[a-zA-Z_áéíóú\s]{0,80}" minlength="3" maxlength="25" title="Por favor no ingresar signos extraños o ajenos a letras del abecedario" required>
          
          <label for="password">Contraseña</label>
          <input id="password" type="password" name="password" class="form-control" required>
          
          <label for="password2">Repita contraseña</label>
          <input id="password2" type="password" name="password2" class="form-control" required>
          
          <label for="estado">Estado</label>
          <select class="form-control" id="estado" name="estado" required>
            <option value="">-----Selecciona Estado------</option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
          </select>

        </div>
       
        <div class="modal-footer">
          <input type="submit" value="Registrar" class="modal-title">
        </div>
      
      </div>
    </form>
  </div>
</div>

<?php

  require_once("footer.php");
?>

<script type="text/javascript" src="js/usuarios.js"></script>