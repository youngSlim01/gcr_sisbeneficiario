<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Todos Activistas</h3>
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
                <td><?php echo $func->fnome; ?></td>
                <td><?php echo $func->nome; ?></td>
                <td>X</td>
              </tr>
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
