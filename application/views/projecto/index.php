<!-- Small boxes (Stat box) -->
      <div class="row">
        <?php foreach($listar as $projecto): ?>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <?php if($projecto->status=="Pendente"): ?>
              <div class="small-box bg-aqua">
            <?php elseif($projecto->status=="Activo"):?>
              <div class="small-box bg-green">
            <?php elseif($projecto->status=="Terminado"):?>
              <div class="small-box bg-red">
            <?php elseif($projecto->status=="Desactivado"):?>
              <div class="small-box bg-yellow">
            <?php endif; ?>
              <div class="inner">
                <h3><?php echo $this->ben->contar_beneficiarios_por_projecto($projecto->id); ?></h3>
                <p><?php echo $projecto->nome;?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('projecto/definicao/').$projecto->id;?>" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- /.row -->
      <!-- Main row -->
