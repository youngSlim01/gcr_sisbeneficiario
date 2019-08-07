<!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $this->ben->contar_tb_posetivo();?></h3>

              <p>TB <sup>+</sup></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('beneficiario/tbp');?>" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $this->ben->contar_hiv_posetivo();?></h3>

              <p>HIV <sup>+</sup></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('beneficiario/hivp');?>" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $this->ben->contar_hiv_negativo();?></h3>

              <p>HIV <sup>-</sup></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('beneficiario/hivn');?>" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $this->ben->contar_tb_negativo();?></h3>

              <p>TB <sup>-</sup></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('beneficiario/tbn');?>" class="small-box-footer">Mais info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
