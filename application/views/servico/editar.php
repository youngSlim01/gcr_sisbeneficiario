<div class="row">
  <!-- right column -->
  <div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-warning box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Editar Serviço</h3>
        <a href="<?php echo base_url('servico');?>" class="pull-right"><button type="button" class="btn btn-sm btn-warning">Listar Serviços</button></a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php
        if($msg = get_msg()):
            echo $msg;
        endif;
        ?>
        <form action="<?php echo base_url('servico/editar');?>" method="POST">
          <!-- text input -->
          <input type="hidden" class="form-control"  id="servid" name="servid" value="<?php echo $servico->id_servico ?>">
          <div class="form-group " id="nome">
            <label>Codigo do projecto</label>
            <input type="text" class="form-control" disabled id="servcodigo" name="servcodigo" value="<?php echo $servico->codigo_servico ?>">
          </div>
          <div class="form-group " id="nome">
            <label>Nome do projecto</label>
            <input type="text" class="form-control" id="servnome"  name="servnome" value="<?php echo $servico->nome_servico ?>">
          </div>
          <!-- textarea -->
          <div class="form-group" id="descricao">
            <label>Descricao</label>
            <input class="form-control" rows="4" id="servdescricao" name="servdescricao" value="<?php echo $servico->descricao_servico ?>"></input>
          </div>
          <div class="form-group">
              <label>Projecto Pertencente</label>
           <select class="form-control" name="idprojecto" style="width: 100%;" tabindex="-1" aria-hidden="true">
              <option value="<?php echo $servico->projecto_id ?>"><?php echo $servico->nome ?></option>
              <?php foreach($projectos as $projecto): ?>
              <option value="<?php echo $projecto->id?>"><?php echo $projecto->nome;?> </option>
            <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
              <label>Estado</label>
           <select class="form-control" name="status" style="width: 100%;" tabindex="-1" aria-hidden="true">
              <option id="<?php echo $servico->status_servico ?>"><?php echo $servico->status_servico ?></option>
              <option value="Activo">Activo</option>
              <option value="Pendente">Pendente</option>
              <option value="Terminado">Terminado</option>
              <option value="Desactivado">Desactivado</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <input type="submit" class="btn btn-block btn-primary btn-flat" value="Guardar Alteracao" id="btnPSalvar"/>
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
