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
          <?php
  				if($msg = get_msg()):
  						echo $msg;
  				endif;
  				?>
          <form action="<?php echo base_url('projecto/cadastrar');?>" method="POST">
            <!-- text input -->
            <div class="form-group " id="nome">
              <label>Nome do projecto</label>
              <input type="text" class="form-control" id="pronome" name="pronome" placeholder="Projecto ...">
            </div>
            <!-- textarea -->
            <div class="form-group" id="descricao">
              <label>Descricao</label>
              <textarea class="form-control" rows="3" id="prodescricao" name="prodescricao" placeholder="Descricao ..."></textarea>
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
