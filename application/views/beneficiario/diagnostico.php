<div class="row">
  <!-- left column -->
<div class="col-md-12">
  <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Dados gerais</a></li>
      <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
      <section class="content">
        <div class="row">
          <?php
          if($msg = get_msg()):
              echo $msg;
          endif;
          ?>
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Dados Demograficos</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="frm_estudante" action="<?php echo base_url('beneficiario/cadastrar')?>" method="post">
              <div class="box-body">
              <div class="form-group">
              <label for="apelido">Resultado de Diagnosticado</label>
              <input type="text" class="form-control" name="bnome">
              </div>
              <div class="form-group">
                <label>local de tratamento</label>
               <select class="form-control" name="ltratamento" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected">Selecione ...</option>
                  <option id="1">Unidade sanitaria</option>
                  <option id="2">Comunidade</option>
                </select>
              </div>
              <div class="form-group">
              <label for="apelido">Unidade sanitaria</label>
              <input type="text" class="form-control" name="unid">
              </div>
              </div>

              <!-- /.box-body -->
            </div>
            <div class="form-group">
            <button type="submit" id="guardar" class="btn btn-primary col-md-3"> <i class="fa fa-save"></i> Guardar</button>
            </div>
            <!-- /.box -->
          </div>

          <!-- .col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          <div class="box box-primary">
          <div class="box-header with-border">
          <h3 class="box-title pull-right">...</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label>Iniciou tratamento?</label>
             <select class="form-control" name="tratamento" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <option selected="selected">Selecione ...</option>
                <option id="1">Sim</option>
                <option id="2">Nao</option>
              </select>
            </div>
              <div class="form-group">
                <label>Observacoes</label>
                <input type="text" class="form-control" name="obs" placeholder="Escreve ...">
              </div>
              <div class="form-group">
                <label>Nit de caso index</label>
                <input type="text" class="form-control" name="nit_index" placeholder="Enter ...">
              </div>
          </div>

          </form>
          <div class="pull-right">
          <p class="box-title pull-right">Passo 1/3</p>
          </div>
          </div>
          <!-- /.box -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>

    </div>
    <!-- /.tab-pane -->
  </div>
  <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
</div>
</div>
</div>
<!-- /.row -->
