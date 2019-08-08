<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Funcionarios</h3>
        <a href="<?php echo base_url('funcionario/cadastrar');?>" class="pull-right"><button type="button" class="btn btn-block btn-success">Adicionar</button></a>
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
            <th>Nome</th>
            <th>Funcao</th>
            <th>Sexo</th>
            <th>Localiza&ccedil;&atilde;o</th>
            <th>Projecto</th>
            <th>Accoes</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach($listar as $func): ?>
              <tr>
                <td><?php echo $func->fnome; ?></td>
                <td><?php echo $func->nome_funcao; ?></td>
                <td><?php if($func->Sexo==1){echo "Masculino";}else{echo "Feminino";} ?></td>
                <td><?php if(isset($func->nome_distrito)){echo $func->nome_distrito;}else{echo "GCR-Sede";} ?></td>
                <td><?php echo $func->nome; ?></td>
                <td>
                  <div class="btn-group">
                    <a data-toggle="modal" data-target="#modal-edit-projecto<?php echo $func->id_funcionario;?>" class="btn btn-sm btn-info"><span class="fa fa-eye"></span></a>
                    <a href="<?php echo base_url('projecto/editar/').$func->id_funcionario;?>" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
                    <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-remove<?php echo $func->id_funcionario;?>"><span class="fa fa-remove"></span></a>
                  </div>
                </td>
              </tr>

              <div class="modal fade" id="modal-edit-projecto<?php echo $func->id_funcionario;?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Detalhes de Funcionario - <?php echo $func->fnome;?></h4>
                    </div>
                    <div class="modal-body">
                      <?php
                      if($msg = get_msg()):
                          echo $msg;
                      endif;
                      ?>
                        <div class="form-group " id="nome">
                          <label>Nome do funcionario</label>
                          <p><?php echo $func->fnome; ;?></p>
                        </div>
                        <!-- textarea -->
                        <div class="form-group" id="descricao">
                          <label>Fncao</label>
                          <p><?php echo $func->nome_funcao; ?></p>
                        </div>
                        <div class="form-group" id="descricao">
                          <label>Projecto</label>
                          <p><?php echo $func->nome; ?></p>
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

              <div class="modal modal-warning fade" id="modal-remove<?php echo $func->id_funcionario;?>">
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
              <th>Nome</th>
              <th>Funcao</th>
              <th>Sexo</th>
              <th>Localiza&ccedil;&atilde;o</th>
              <th>Projecto</th>
              <th>Accoes</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
