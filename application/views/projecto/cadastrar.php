  <div class="row">
    <!-- right column -->
    <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="box box-warning box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Registar projecto</h3>
          <a href="<?php echo base_url('projecto');?>" class="pull-right"><button type="button" class="btn btn-sm btn-warning">Listar Projectos</button></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form">
            <!-- text input -->
            <div class="form-group">
              <label>Nome do projecto</label>
              <input type="text" class="form-control" name="projecto" placeholder="Projecto ...">
            </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Descricao</label>
              <textarea class="form-control" rows="3" name="descricao" placeholder="Descricao ..."></textarea>
            </div>

            <div class="form-group col-md-2">
              <button type="submit" class="btn btn-block btn-primary btn-flat">Guardar projecto</button>
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
