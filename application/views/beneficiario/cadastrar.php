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
              <label for="apelido">Nome completo <sup style="color:red;">*</sup></label>
              <input type="text" class="form-control" name="bnome" placeholder="Nome completo ...">
              </div>
              <div class="form-group">
              <label>Sexo <sup style="color:red;">*</sup></label>
              <select class="form-control" name="bsexo" style="width: 100%;" tabindex="-1" aria-hidden="true">
              <option value="1">Masculino</option>
              <option value="2">Feminino</option>
              </select>
              </div>
              <div class="form-group">
              <label>Celular</label>
              <input type="text" class="form-control" name="bceluar" placeholder="Celular">
              </div>
              <div class="form-group">
              <label>Vulnerabilidade</label>
              <select class="form-control" name="bvulnerabilidade" style="width: 100%;" tabindex="-1" aria-hidden="true">
              <option value="1">Nemhum</option>
              <option value="2">Orfao de Pai</option>
              <option value="3">Orfao de Mae</option>
              <option value="4">Ambos</option>
              </select>
              </div>
              <div class="form-group">
                 <label>Distrito</label>
                <select class="form-control select2 select2-hidden-accessible" id="bdistrito" name="bdistrito" style="width: 100%;" tabindex="-1" aria-hidden="true">
                   <option selected="selected">Selecione ...</option>
                   <?php foreach($distritos as $nome): ?>
                     <option value="<?php echo $nome->id_distrito;?>"><?php echo $nome->nome_distrito;?></option>
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
          <label>Data de Nascimento: <sup style="color:red;">*</sup></label>
          <div class="input-group date">
          <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="datepicker" name="bdata_nasc">
          </div>
          <!-- /.input group -->
          </div>
          <div class="form-group">
          <label for="nome">Deficiencia</label>
          <select class="form-control" name="bdeficiencia" style="width: 100%;" tabindex="-1" aria-hidden="true">
          <option selected="selected">Nenhuma...</option>
          <option value="Fisica">Fisica</option>
          <option value="Visual">Visual</option>
          <option value="Mental">Mental</option>
          <option value="Auditiva">Auditiva</option>
          </select>
          </div>
          <div class="form-group">
          <label for="nome">Morada <sup style="color:red;">*</sup></label>
          <input type="text" class="form-control" name="bmorada" placeholder="Bairro">
          </div>
          <div class="form-group">
          <label>Referido</label>
          <select class="form-control" name="breferido" style="width: 100%;" tabindex="-1" aria-hidden="true">
          <option selected="selected">Selecione ...</option>
          <option value="1">Sim</option>
          <option value="2">Nao</option>
          </select>
          </div>
          <div class="form-group">
          <label>Obs</label>
          <textarea class="form-control" row="3" name="bobs" style="width: 100%;" tabindex="-1" aria-hidden="true"></textarea>
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
