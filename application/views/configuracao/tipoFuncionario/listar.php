<div class="row">
  <!-- left column -->
<div class="col-md-12">
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">categorias da Organização</h3>
              <a href="<?php echo base_url('funcionario/CadastrarTiposFuncionarios');?>" class="pull-right"><button type="button" class="btn btn-block btn-success">Adicionar</button></a>
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
                  <th>Categoria</th>
									<th>Estado</th>
									<!--<th>Ac&ccedil;&otilde;es</th>-->
                </tr>
                </thead>
                <tbody id="showdata">
								<?php foreach ($listar as $projecto) :?>
                <tr>
                  <td><?php echo $projecto->id; ?></td>
                  <td><?php echo $projecto->nome_funcao;?></td>
									<?php if($projecto->status=="Activo"): ?>
                  	<td><span class="label label-success"><?php echo $projecto->status;?></span></td>
									<?php elseif($projecto->status=="Pendente"): ?>
										<td><span class="label label-primary"><?php echo $projecto->status;?></span></td>
									<?php elseif($projecto->status=="Desactivado"): ?>
										<td><span class="label label-warning"><?php echo $projecto->status;?></span></td>
									<?php elseif($projecto->status=="Terminado"): ?>
										<td><span class="label label-danger"><?php echo $projecto->status;?></span></td>
									<?php endif;?>
								<!--	<td>
										<div class="btn-group">
											<a href="<?php echo base_url('projecto/editar/').$projecto->id;?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
											<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-remove<?php echo $projecto->id;?>"><span class="fa fa-remove"></span></a>
										</div>
									</td>-->
                </tr>
						<!--
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
            <!-- /.modal-content
          </div>
          <!-- /.modal-dialog
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
