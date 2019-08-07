
<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Beneficiarios referidos e nao-referidos</h3>
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
                  <?php if($ben->referido == "1"):?>
                    <a href="<?php echo base_url('beneficiario/diagnostico/').$ben->id;?>" class="btn btn-sm btn-info"><span class="fa fa-legal"></span></a>
                  <?php else: ?>
                    <a href="<?php echo base_url('beneficiario/referir/').$ben->id;?>" class="btn btn-sm btn-success"><span class="fa fa-plus"></span></a>
                <?php endif;?>
                  <a href="" class="btn btn-sm btn-warning"><span class="fa fa-pencil"></span></a>
                  <!--<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-remove"><span class="fa fa-remove"></span></a>-->
                </div>
              </td>
            </tr>

            <div class="modal fade" id="modal-edit-beneficiario<?php echo $ben->id;?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Contra Referir - BEN N<sup>o</sup> <?php echo $ben->codigo_beneficiario;?> | <?php echo  $ben->nome;?></h4>
                  </div>
                  <div class="modal-body">
                    <?php
                    if($msg = get_msg()):
                        echo $msg;
                    endif;
                    ?>
                      <form>
                        <div class="form-group">
                        <label for="apelido">Nome do Clinico</label>
                        <input type="text" class="form-control" name="clinico_nome">
                        </div>
                        <div class="form-group">
                        <label for="apelido">NIT</label>
                        <input type="text" class="form-control" name="nit" value="<?php  ?>">
                        </div>
                        <div class="form-group">
                        <label for="apelido">NID</label>
                        <input type="text" class="form-control" name="nid" value="<?php  ?>">
                        </div>
                        <div class="form-group">
                         <label>Exame</label>
                         <select class="form-control" name="exame" style="width: 100%;" tabindex="-1" aria-hidden="true">
                              <option>Tuberculose</option>
                              <option >HIV</option>
                              <option >ITS</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Resultado de exame</label>
                         <select class="form-control" name="tratamento" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value="Negativo">Negativo</option>
                            <option value="Posetivo">Posetivo</option>
                          </select>
                        </div>

                  </div>
                  <div class="modal-footer">
                    <a type="button" class="btn btn-success pull-left" href="<?php echo base_url('beneficiario/diagnostico/').$ben->id;?>">Guardar</a>
                  </div>
                  </form>
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

<?php
if(isset($_POST['login']))
{
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $sql ="SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> bindParam(':password', $password, PDO::PARAM_STR);
  $query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    $_SESSION['login']=$_POST['email'];
    $_SESSION['fname']=$results->FullName;
    $currentpage=$_SERVER['REQUEST_URI'];
    echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
  } else{

    echo "<script>alert('Dados invalidos');</script>";

  }

}

?>
