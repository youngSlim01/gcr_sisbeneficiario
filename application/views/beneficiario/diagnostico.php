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
                <h3 class="box-title" style="">Contra Referir - beneficiario <?php echo $ben->beneficiario_codigo;?></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="frm_estudante" action="<?php echo base_url('beneficiario/diagnostico/').$idref;?>" method="post">
              <input type="hidden" name="codigo_beneficiario" value="<?php echo $ben->beneficiario_codigo;?>"/>
              <div class="box-body">
                <div class="form-group">
                <label for="apelido">Nome do Clinico</label>
                <input type="text" class="form-control" name="clinico_nome" placeholder="Escreve ...">
                </div>
                <div class="form-group">
                <label for="apelido">NIT</label>
                <input type="text" class="form-control" name="nit" value="<?php  ?>" placeholder="Escreve ...">
                </div>
                <div class="form-group">
                <label for="apelido">NID</label>
                <input type="text" class="form-control" name="nid" placeholder="Escreve ..." value="<?php  ?>">
                </div>
              </div>

              <!-- /.box-body -->
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
             <label>Exame</label>
             <select class="form-control" name="exame" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="TB">Tuberculose</option>
                  <option value="HIV">HIV</option>
                  <option value="ITS">ITS</option>
              </select>
            </div>

            <div class="form-group">
              <label>Resultado de exame</label>
             <select class="form-control" name="tratamento" style="width: 100%;" tabindex="-1" aria-hidden="true">
                <option value="Negativo">Negativo</option>
                <option value="Posetivo">Posetivo</option>
              </select>
            </div>
              <div class="form-group">
                <label>Observacoes</label>
                <input type="text" class="form-control" name="obs" placeholder="Escreve ...">
              </div>
          </div>

          <div class="form-group">
          <button type="submit" id="guardar" class="btn btn-primary col-md-3"> <i class="fa fa-save"></i> Guardar</button>
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
