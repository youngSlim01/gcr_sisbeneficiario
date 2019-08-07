<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $contar_beneficiarios; ?></h3>
              <p>Benefici&aacute;rios</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('beneficiario/dashboard');?>" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $contar_projecto; ?><sup style="font-size: 20px"></sup></h3>

              <p>Projectos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('welcome/projecto');?>" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $contar_servico; ?></h3>

              <p>Servi&ccedil;os</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('welcome/servico');?>" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $contar_activista;?></h3>

              <p>Activistas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url('funcionario');?>" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
         <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Projectos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-condesed">
                  <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listar as $projecto): ?>
                      <tr>
                        <td><a href="<?php echo base_url('projecto/definicao/').$projecto->id?>"><?php echo $projecto->codigo; ?></a></td>
                        <td><?php echo $projecto->nome; ?></td>
                        <?php if($projecto->status=="Activo"): ?>
                        	<td><span class="label label-success"><?php echo $projecto->status;?></span></td>
      									<?php elseif($projecto->status=="Pendente"): ?>
      										<td><span class="label label-primary"><?php echo $projecto->status;?></span></td>
      									<?php elseif($projecto->status=="Desactivado"): ?>
      										<td><span class="label label-warning"><?php echo $projecto->status;?></span></td>
      									<?php elseif($projecto->status=="Terminado"): ?>
      										<td><span class="label label-danger"><?php echo $projecto->status;?></span></td>
      									<?php endif;?>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calend&aacute;rio</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->

                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
        </section>
        <!-- right col -->
