  <div class="row">
    <!-- right column -->
    <div class="col-md-12">
      <!-- general form elements disabled -->
      <div class="box box-warning box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Tipo de funcionario</h3>
          <a href="<?php echo base_url('funcionario/listarTiposFuncionarios');?>" class="pull-right"><button type="button" class="btn btn-sm btn-warning">Listar Categorias</button></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php
  				if($msg = get_msg()):
  						echo $msg;
  				endif;
  				?>
          <form action="<?php echo base_url('funcionario/CadastrarTiposFuncionarios');?>" method="POST">
            <!-- text input -->
            <div class="form-group " id="nome">
              <label>Categoria</label>
              <input type="text" class="form-control" id="tiponome" name="tiponome" placeholder="Categoria...">
            </div>
            <div class="form-group col-md-2">
              <input type="submit" class="btn btn-block btn-primary btn-flat" value="Guardar Categoria" id="btnPSalvar"/>
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
