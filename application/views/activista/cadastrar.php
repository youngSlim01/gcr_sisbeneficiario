<div class="row">
  <!-- left column -->
<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Dados gerais</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Dados Laboratoriais</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
				<section class="content">
				      <div class="row">
				        <!-- left column -->
				<div class="col-md-6">
				  <!-- general form elements -->
				<div class="box box-primary">
				  <div class="box-header with-border">
				    <h3 class="box-title">Dados Demograficos</h3>
				  </div>
				  <!-- /.box-header -->
				<!-- form start -->
				        <form role="form" id="activista" action="#" method="post">
				          <div class="box-body">
			            <div class="form-group">
			              <label for="apelido">Nome completo</label>
			              <input type="text" class="form-control" name="nome" placeholder="Nome completo ...">
			            </div>
                  <div class="form-group">
		                  <label>Sexo</label>
 			             <select class="form-control" name="sexo" style="width: 100%;" tabindex="-1" aria-hidden="true">
 		                  <option selected="selected">Selecione ...</option>
 		                  <option id="1">Masculino</option>
 		                  <option id="2">Feminino</option>
 		                </select>
 	                </div>
									<div class="form-group">
			              <label>Celular</label>
			              <input type="text" class="form-control" name="celuar" placeholder="Celular">
			            </div>
                <div class="form-group">
                  <label>Contacto TB</label>
                 <select class="form-control" name="contacto_tb" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option selected="selected">Selecione ...</option>
                    <option id="1">Sim</option>
                    <option id="2">Nao</option>
                  </select>
                </div>
		            <div class="form-group">
		              <label for="nome">Distrito</label>
		              <input type="text" class="form-control" name="distrito" placeholder="Distrito">
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
			             <label>Nit de caso index</label>
			             <input type="text" class="form-control" name="nit_index" placeholder="Enter ...">
			           </div>
			           <div class="form-group">
      					<label>Data de Nascimento:</label>
      					<div class="input-group date">
      					  <div class="input-group-addon">
      					    <i class="fa fa-calendar"></i>
      					  </div>
      					  <input type="text" class="form-control pull-right" id="datepicker">
      					</div>
							<!-- /.input group -->
							</div>
	            <div class="form-group">
	              <label for="nome">Sinais e sintoma de TB</label>
	              <input type="text" class="form-control" name="ss_tb" placeholder="FESTAL">
	            </div>
              <div class="form-group">
                <label for="nome">Morada</label>
                <input type="text" class="form-control" name="morada" placeholder="Bairro">
              </div>
              <div class="form-group">
                <label>Referido</label>
               <select class="form-control" name="referido" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected">Selecione ...</option>
                  <option id="1">Sim</option>
                  <option id="2">Nao</option>
                </select>
              </div>
		          </div>

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

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">

					<section class="content">
				      <div class="row">
				        <!-- left column -->
				<div class="col-md-6">
				  <!-- general form elements -->
				<div class="box box-primary">
				  <div class="box-header with-border">
				    <h3 class="box-title">Dados clinicos</h3>
				  </div>
				  <!-- /.box-header -->
				          <div class="box-body">
                    <div class="form-group">
 		                  <label>Servico</label>
   			             <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
   		                  <option selected="selected">Selecione ...</option>
   		                  <option>Alaska</option>
   		                </select>
 	                </div>
                    <div class="form-group">
                      <label>Diagnosticado</label>
                     <select class="form-control" name="giagnosticado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected">Selecione ...</option>
                        <option id="1">Sim</option>
                        <option id="2">Nao</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Iniciou tratamento?</label>
                     <select class="form-control" name="tratamento" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected">Selecione ...</option>
                        <option id="1">Sim</option>
                        <option id="2">Nao</option>
                      </select>
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
                      <input type="text" class="form-control" name="usanitaria" placeholder="U sanitaria de registo">
                    </div>
                    <div class="form-group">
                      <button type="submit" id="guardar" class="btn btn-primary col-md-3"> <i class="fa fa-save"></i> Guardar</button>
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
				      <h3 class="box-title pull-right">....</h3>
				    </div>
				    <!-- /.box-header -->
				        <div class="box-body">

                  <div class="form-group">
                    <label for="nome">Resultado de tratamento</label>
                    <input type="text" class="form-control" name="rtratamento" placeholder="Resultado de tratamento ...">
                  </div>

                <div class="form-group">
                    <label>NIT de registo livro TB</label>
                    <input type="text" class="form-control" name="nit_livro_tb" placeholder="NIT ...">
                  </div>
		              <div class="form-group">
			                  <label>Observacoes</label>
			                  <textarea class="form-control" rows="4" name="obs" placeholder="Escreve....."></textarea>
			               </div>
				          </div>
                </form>
                  <div class="box-footer">
  	                <div class="pull-right">
  	             	 <p class="box-title pull-right">Passo 2/2</p>
  	            	</div>
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
