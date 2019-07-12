<div class="row">
  <!-- right column -->
  <div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-warning box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Editar projecto</h3>
        <a href="<?php echo base_url('projecto');?>" class="pull-right"><button type="button" class="btn btn-sm btn-warning">Listar Projectos</button></a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php
        if($msg = get_msg()):
            echo $msg;
        endif;
        ?>
        <form action="<?php echo base_url('projecto/editar');?>" method="POST">
          <!-- text input -->
          <input type="hidden" class="form-control"  id="idproj" name="proid" value="<?php echo $projecto->id ?>">
          <div class="form-group " id="nome">
            <label>Codigo do projecto</label>
            <input type="text" class="form-control" disabled id="codigo" name="procodigo" value="<?php echo $projecto->codigo ?>">
          </div>
          <div class="form-group " id="nome">
            <label>Nome do projecto</label>
            <input type="text" class="form-control" id="pronome"  name="pronome" value="<?php echo $projecto->nome ?>">
          </div>
          <!-- textarea -->
          <div class="form-group" id="descricao">
            <label>Descricao</label>
            <input class="form-control" rows="3" id="prodescricao" name="prodescricao" value="<?php echo $projecto->descricao ?>"></input>
          </div>
          <div class="form-group">
              <label>Estado</label>
           <select class="form-control" name="status" style="width: 100%;" tabindex="-1" aria-hidden="true">
              <option id="<?php echo $projecto->status ?>"><?php echo $projecto->status ?></option>
              <option id="Activo">Activo</option>
              <option id="Pendente">Pendente</option>
              <option id="Terminado">Terminado</option>
              <option id="Desactivado">Desactivado</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <input type="submit" class="btn btn-block btn-primary btn-flat" value="Guardar projecto" id="btnPSalvar"/>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!--/.col (right) -->
</div>
<!-- /.row -->
<!-- <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-warning"></i> Alert!</h4>
      Warning alert preview. This alert is dismissable.
    </div> -->
