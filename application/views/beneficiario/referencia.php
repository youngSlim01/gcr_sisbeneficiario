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
              <form role="form" id="frm_referencia" action="<?php echo base_url('beneficiario/referir/').$last_inserted->id; ?>" method="post">
              <div class="box-body">
              <div class="form-group">
              <label for="apelido">Codigo Beneficiario</label>
              <input type="text" class="form-control" name="rcodigo_beneficiario" value="<?php echo $last_inserted->codigo_beneficiario; ?>" readonly>
              </div>
              <div class="form-group">
               <label>Contacto TB</label>
               <select class="form-control" name="rcontacto_tb" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected">Selecione ...</option>
                  <option id="1">Sim</option>
                  <option id="2">Nao</option>
                </select>
              </div>
              <div class="form-group">
                <label>Servico</label>
               <select class="form-control select2 select2-hidden-accessible" name="rservico" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected">Selecione ...</option>
                  <?php foreach($listar_servicos as $serv):?>
                    <option value="<?php echo $serv->id_servico; ?>"><?php echo $serv->nome_servico; ?></option>
                  <?php endforeach; ?>
                </select>
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
              <label>Nit de caso index</label>
              <input type="text" class="form-control" name="rnit_index" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label for="nome">Sinais e sintoma de TB</label>
              <input type="text" class="form-control" name="rss_tb" placeholder="FESTAL">
            </div>
            <div class="form-group">
              <label>Diagnosticado</label>
             <select class="form-control" name="rdiagnosticado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <option selected="selected">Selecione ...</option>
                <option id="1">Sim</option>
                <option id="2">Nao</option>
              </select>
            </div>
          </div>

          </form>
          <div class="pull-right">
          <p class="box-title pull-right">Passo 1/1</p>
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
