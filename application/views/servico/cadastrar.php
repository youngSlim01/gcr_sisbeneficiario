<div class="row">
  <div class="col-xs-12">
    <!-- general form elements disabled -->
    <div class="box box-info box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Registar serviço</h3>
        <a href="<?php echo base_url('servico');?>" class="pull-right"><button type="button" class="btn btn-sm btn-warning">Listar Serviços</button></a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php
        if($msg = get_msg()):
            echo $msg;
        endif;
        ?>
        <form role="form" action="<?php echo base_url('servico/cadastrar');?>" method="POST">
          <!-- text input -->
          <div class="form-group">
            <label>Nome do Serviço</label>
            <input type="text" class="form-control" name="servnome" placeholder="Serviço...">
          </div>
          <!-- textarea -->
          <div class="form-group">
            <label>Descricao</label>
            <textarea class="form-control" rows="3" name="servdescricao" placeholder="Descricao ..."></textarea>
          </div>
          <!-- select -->
          <div class="form-group">
            <label>Projecto</label>
            <select class="form-control" name="servprojecto">
              <?php foreach ($listarProjectos as $projecto): ?>
                <option value="<?php echo $projecto->id; ?>"><?php echo $projecto->nome; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-md-2">
            <button type="submit" class="btn btn-block btn-primary btn-flat">Guardar Serviço</button>
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
