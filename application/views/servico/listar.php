<div class="row">
  <!-- left column -->
<div class="col-md-12">
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Serviços da Organização</h3>
              <a href="<?php echo base_url('servico/cadastrar');?>" class="pull-right"><button type="button" class="btn btn-block btn-success">Adicionar</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<?php
							if($msg = get_msg()):
									echo $msg;
							endif;
							?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nome</th>
                  <th>Projecto</th>
                  <th>Estado</th>
									<th>Ac&ccedil;&otilde;es</th>
                </tr>
                </thead>
                <tbody>
								<?php foreach($listar_servicos as $servico): ?>
									<tr>
	                  <td><a href="#" data-toggle="modal" data-target="#modal-edit-servico<?php echo $servico->id_servico;?>"><?php echo $servico->codigo_servico; ?></a></td>
	                  <td><?php echo $servico->nome_servico; ?></td>
	                  <td><?php echo $servico->nome;?></td>
										<?php if($servico->status_servico=="Activo"): ?>
	                  	<td><span class="label label-success"><?php echo $servico->status_servico;?></span></td>
										<?php elseif($servico->status_servico=="Pendente"): ?>
											<td><span class="label label-primary"><?php echo $servico->status_servico;?></span></td>
										<?php elseif($servico->status_servico=="Desactivado"): ?>
											<td><span class="label label-warning"><?php echo $servico->status_servico;?></span></td>
										<?php elseif($servico->status_servico=="Terminado"): ?>
											<td><span class="label label-danger"><?php echo $servico->status_servico;?></span></td>
										<?php endif;?>
										<td>
											<div class="btn-group">
												<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit-servico<?php echo $servico->id_servico;?>"><span class="fa fa-eye"></span></a>
												<a href="<?php echo base_url('servico/editar/').$servico->id_servico;?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
												<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-remove<?php echo $servico->id_servico;?>"><span class="fa fa-remove"></span></a>
											</div>
										</td>
	                </tr>

									<div class="modal fade" id="modal-edit-servico<?php echo $servico->id_servico;?>">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Detalhes de Servico - <?php echo $servico->codigo_servico;?></h4>
									      </div>
									      <div class="modal-body">
														<div class="form-group " id="nome">
															<label>Nome do Servico</label>
															<p><?php echo $servico->nome_servico;?></p>
														</div>
														<!-- textarea -->
														<div class="form-group" id="descricao">
															<label>Descricao</label>
															<p><?php echo $servico->descricao_servico;?></p>
														</div>
														<div class="form-group" id="descricao">
															<label>Projecto pertecente</label>
															<p><?php echo $servico->nome_servico;?></p>
														</div>
														<div class="form-group" id="descricao">
															<label>Estado do projecto</label>
															<p><?php echo $servico->status_servico;?></p>
														</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
									      </div>
									    </div>
									    <!-- /.modal-content -->
									  </div>
									  <!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->

							<div class="modal modal-warning fade" id="modal-remove<?php echo $servico->id_servico;?>">
			          <div class="modal-dialog">
			            <div class="modal-content">
			              <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                  <span aria-hidden="true">&times;</span></button>
			                <h3 class="modal-title"><span class="fa fa-question"> Confirma&ccedil&atilde;o</span></h3>
			              </div>
			              <div class="modal-body">
			                <h4>Tens certeza que desejas apagar o projecto '<?php echo $servico->nome_servico;?>' do sistema?</h4>
			              </div>
			              <div class="modal-footer">
			                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
			                <a type="button" class="btn btn-danger" href="<?php echo base_url('servico/remover/').$servico->id_servico;?>">Apagar</a>
			              </div>
			            </div>
			            <!-- /.modal-content -->
			          </div>
			          <!-- /.modal-dialog -->
			        </div>
	        <!-- /.modal -->
							<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th><a href=""><button type="button" class="btn btn-block btn-success">Gerar pdf </button></a></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
</div>
</div>
<!--/.col (right) -->
</div>
