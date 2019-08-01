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
				        <!-- left column -->
                <?php
                if($msg = get_msg()):
                    echo $msg;
                endif;
                ?>
				<div class="col-md-6">
				  <!-- general form elements -->

				<div class="box box-primary">
				  <div class="box-header with-border">
				    <h3 class="box-title">Dados Gerais</h3>
				  </div>
				  <!-- /.box-header -->
				<!-- form start -->
				        <form role="form" id="form1" action="#" method="post">
				          <div class="box-body">
			            <div class="form-group">
			              <label for="apelido">Nome completo <sup>*.</sup></label>
			              <input type="text" class="form-control" id="fnome" name="fnome" placeholder="Nome completo ...">
			            </div>

                  <div class="form-group">
                     <label>Categoria</label>
                    <select class="form-control" id="fcategoria" name="fcategoria" style="width: 100%;" tabindex="-1" aria-hidden="true">
                       <option selected="selected">Selecione ...</option>
                       <?php foreach($categorias as $tipo): ?>
                         <option value="<?php echo $tipo->id;?>"><?php echo $tipo->nome_funcao;?></option>
                       <?php endforeach; ?>
                     </select>
                   </div>
                   <div class="form-group">
                      <label>Projecto</label>
                     <select class="form-control" id="fprojecto" name="fprojecto" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected">Selecione ...</option>
                        <?php foreach($projectos as $tipo): ?>
                          <option value="<?php echo $tipo->id;?>"><?php echo $tipo->nome;?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                       <label>Distrito afecto</label>
                      <select class="form-control select2 select2-hidden-accessible" id="fdistrito" name="fdistrito" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         <option selected="selected">Selecione ...</option>
                         <?php foreach($distritos as $nome): ?>
                           <option value="<?php echo $nome->id_distrito;?>"><?php echo $nome->nome_distrito;?></option>
                         <?php endforeach; ?>
                       </select>
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
				<!-- form start -->
				        <div class="box-body">
                  <div class="form-group">
                     <label>Sexo</label>
                    <select class="form-control" id="fsexo" name="fsexo" style="width: 100%;" tabindex="-1" aria-hidden="true">
                       <option selected="selected">Selecione ...</option>
                       <option value="1">Masculino</option>
                       <option value="2">Feminino</option>
                     </select>
                   </div>
			           <div class="form-group">
      					<label>Data de Nascimento: <sup>*.</sup></label>
      					<div class="input-group date">
      					  <div class="input-group-addon">
      					    <i class="fa fa-calendar"></i>
      					  </div>
      					  <input type="text" class="form-control pull-right" name="fdata_nascimento" id="datepicker">
      					</div>
							</div>
              <div class="form-group">
                 <label>Unidade sanitaria</label>
                <select class="form-control" id="funidade" name="funidade_sanitaria" style="width: 100%;">
                   <option selected="selected" value="">Selecione ...</option>
                   <?php foreach($unid_sanitarias as $nome): ?>
                     <option value="<?php echo $nome->idunidade_sanitaria;?>"><?php echo $nome->nome_unidade_sanitaria;?></option>
                   <?php endforeach; ?>
                 </select>
               </div>
               <div class="form-group">
                  <label>Email <sup>*</sup></label>
                  <input type="text" class="form-control pull-right" name="unome">
                </div>
		          </div>
				      </div>
				      <!-- /.box -->
				</div>

				<!--/.col (right) -->

				</div>
        <div class="box-footer">

          <div class="form-group">
            <button type="submit" id="fguardar" class="btn btn-primary col-md-3"> <i class="fa fa-save"></i> Guardar</button>
          </div>
        </form>
          <div class="pull-right">
            <p class="box-title pull-right">Passo 1/1</p>
        </div>
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
