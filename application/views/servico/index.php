<!-- Small boxes (Stat box) -->
      <div class="row">
        <?php foreach($listar_servicos as $servico): ?>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <?php if($servico->status_servico=="Pendente"): ?>
              <div class="small-box bg-aqua">
            <?php elseif($servico->status_servico=="Activo"):?>
              <div class="small-box bg-green">
            <?php elseif($servico->status_servico=="Terminado"):?>
              <div class="small-box bg-red">
            <?php elseif($servico->status_servico=="Desactivado"):?>
              <div class="small-box bg-yellow">
            <?php endif; ?>
              <div class="inner">
                <h3>150</h3>
                <p><?php echo $servico->nome_servico;?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('servico/definicao/').$servico->id;?>" class="small-box-footer"><?php echo $servico->nome?> | Mais info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- /.row -->
      <!-- Main row -->
