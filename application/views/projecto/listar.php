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
                </tr>
                </thead>
                <tbody id="showdata">
								<?php foreach ($listar as $projecto) :?>
                <tr>
                  <td><a href="#"><?php echo $projecto->codigo; ?></a></td>
                  <td><?php echo $projecto->nome; ?></td>
                  <td><?php echo $projecto->descricao;?></td>
                  <td><span class="label label-success"><?php echo $projecto->status;?></span></td>
                </tr>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registar projecto</h4>
      </div>
      <div class="modal-body">
				<?php
				if($msg = get_msg()):
						echo $msg;
				endif;
				?>
				<form role="form" id="project_form" action="<?php echo base_url('projecto/cadastrar');?>" method="post">
					<!-- text input -->
					<div class="form-group " id="nome">
						<label>Nome do projecto</label>
						<input type="text" class="form-control" id="pronome" name="projecto" placeholder="Projecto ...">
					</div>
					<!-- textarea -->
					<div class="form-group" id="descricao">
						<label>Descricao</label>
						<textarea class="form-control" rows="3" id="prodescricao" name="descricao" placeholder="Descricao ..."></textarea>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" id="btnPSalvar" class="btn btn-primary">Guardar</button>
			</form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
