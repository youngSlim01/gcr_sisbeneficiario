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
                <h3 class="box-title">Detalhes da referencia</h3>
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
                <label for="apelido">Codigo do Projecto</label>
                <input type="text" class="form-control" name="rcodigo_projecto" value="<?php echo $projecto->codigo; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Servico</label>
               <select class="form-control" name="rservico" style="width: 100%;" tabindex="-1" aria-hidden="true">
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
              <button type="submit" id="guardar" class="btn btn-success col-md-3"> <i class="fa fa-save"></i> Guardar</button>
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
            <label for="apelido">Codigo de Supervisor</label>
            <input type="text" class="form-control" name="rcodigo_supervisor" value="<?php echo $projecto->id_funcionario; ?>" readonly>
            </div>
            <div class="form-group">
             <label>Activista Responsavel</label>
             <select class="form-control select2" name="rcod_activista" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <?php foreach($activistas as $nome): ?>
                  <option value="<?php echo $nome->id_funcionario;?>"><?php echo $nome->fnome;?></option>
              <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
               <label>Unidade sanitaria</label>
              <select class="form-control" id="funidade" name="runidade_sanitaria" style="width: 100%;">
                 <option selected="selected" value="">Selecione ...</option>
                 <?php foreach($unid_sanitarias as $nome): ?>
                   <option value="<?php echo $nome->idunidade_sanitaria;?>"><?php echo $nome->nome_unidade_sanitaria;?></option>
                 <?php endforeach; ?>
               </select>
             </div>
          </div>

          </form>
          <div class="pull-right">
          <p class="box-title pull-right">Passo 1/1</p>
          </div>
          <div>

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
