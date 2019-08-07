<div class="row">
  <!-- left column -->
<div class="col-md-12">
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Projectos da Organização</h3>
              <a href="<?php echo base_url('projecto/cadastrar');?>" class="pull-right"><button type="button" class="btn btn-block btn-success">Adicionar</button></a>
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
                  <th>Descricao</th>
                  <th>Estado</th>
									<th>Ac&ccedil;&otilde;es</th>
                </tr>
                </thead>
                <tbody id="showdata">
								<?php foreach ($listar as $projecto) :?>
                <tr>
                  <td><a href="<?php echo base_url('projecto/definicao/').$projecto->id?>"><?php echo $projecto->codigo; ?></a></td>
                  <td><?php echo $projecto->nome; ?></td>
                  <td><?php echo $projecto->descricao;?></td>
									<?php if($projecto->status=="Activo"): ?>
                  	<td><span class="label label-success"><?php echo $projecto->status;?></span></td>
									<?php elseif($projecto->status=="Pendente"): ?>
										<td><span class="label label-primary"><?php echo $projecto->status;?></span></td>
									<?php elseif($projecto->status=="Desactivado"): ?>
										<td><span class="label label-warning"><?php echo $projecto->status;?></span></td>
									<?php elseif($projecto->status=="Terminado"): ?>
										<td><span class="label label-danger"><?php echo $projecto->status;?></span></td>
									<?php endif;?>
									<td>
										<div class="btn-group">
											<a data-toggle="modal" data-target="#modal-edit-projecto<?php echo $projecto->id;?>" class="btn btn-sm btn-info"><span class="fa fa-eye"></span></a>
											<a href="<?php echo base_url('projecto/editar/').$projecto->id;?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
											<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-remove<?php echo $projecto->id;?>"><span class="fa fa-remove"></span></a>
										</div>
									</td>
                </tr>

								<div class="modal fade" id="modal-edit-projecto<?php echo $projecto->id;?>">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title">Detalhes de Projecto - <?php echo $projecto->codigo;?></h4>
								      </div>
								      <div class="modal-body">
												<?php
												if($msg = get_msg()):
														echo $msg;
												endif;
												?>
													<div class="form-group " id="nome">
														<label>Nome do projecto</label>
														<p><?php echo $projecto->nome;?></p>
													</div>
													<!-- textarea -->
													<div class="form-group" id="descricao">
														<label>Descricao</label>
														<p><?php echo $projecto->descricao;?></p>
													</div>
													<div class="form-group" id="descricao">
														<label>Estado do projecto</label>
														<p><?php echo $projecto->status;?></p>
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

								<div class="modal modal-warning fade" id="modal-remove<?php echo $projecto->id;?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><span class="fa fa-question"> Confirma&ccedil&atilde;o</span></h3>
              </div>
              <div class="modal-body">
                <h4>Tens certeza que desejas apagar o projecto '<?php echo $projecto->nome;?>' do sistema?</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-danger" href="<?php echo base_url('projecto/remover/').$projecto->id;?>">Apagar</a>
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
                	<hr>
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
