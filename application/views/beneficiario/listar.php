<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Todos beneficiarios</h3>
        <a href="<?php echo base_url('beneficiario/cadastrar');?>" class="pull-right"><button type="button" class="btn btn-block btn-success">Adicionar</button></a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Distrito</th>
            <th>Idade</th>
            <th>Bairro</th>
            <th>Sexo</th>
            <th>Estado</th>
            <th>Op&ccedil;&atilde;o</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($beneficiarios as $ben): ?>
            <tr>
              <td><a href="<?php echo base_url('beneficiario/definicao/').$ben->id?>"><?php echo $ben->codigo_beneficiario;?></a></td>
              <td><?php echo $ben->nome;?></td>
              <td><?php echo $ben->nome_distrito;?></td>
              <td><?php echo ano_actual() - (int)$ben->data_nascimento;?></td>
              <td><?php echo $ben->bairro;?></td>
              <td><?php if($ben->sexo==1){echo "Masculino";}else{echo "Feminino";} ?></td>
              <?php if($ben->referido == "1"): ?>
                <td><span class="label label-success"><?php echo "Referido"; ?></span></td>
              <?php else: ?>
                <td><span class="label label-warning"><?php echo "Nao referido";?></span></td>
              <?php endif;?>
              <td>
                <div class="btn-group">
                  <a data-toggle="modal" data-target="#modal-edit-projecto" class="btn btn-sm btn-info"><span class="fa fa-eye"></span></a>
                  <a href="" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
                  <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-remove"><span class="fa fa-remove"></span></a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Codigo</th>
              <th>Nome</th>
              <th>Distrito</th>
              <th>Idade</th>
              <th>Bairro</th>
              <th>Sexo</th>
              <th>Estado</th>
              <th>Op&ccedil;&atilde;o</th>
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
