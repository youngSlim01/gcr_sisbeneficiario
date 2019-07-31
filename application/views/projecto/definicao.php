<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Informa&ccedil;&atilde; do projecto | <?php echo $projecto->codigo.' - '.$projecto->nome?></h3>
            </div>
            <div class="box-body col-lg-3 col-xs-12">
              <a class="btn btn-block btn-social btn-twitter">
                <i class="fa fa-user"></i> Beneficiarios <span class="badge bg-green pull-right"><?php echo $contar_beneficiarios_do_projecto; ?></span>
              </a>
              <a class="btn btn-block btn-social btn-facebook">
                <i class="fa fa-flickr"></i> Activistas <span class="badge bg-blue pull-right"><?php echo $contar_activistas_do_projecto; ?></span>
              </a>
              <a href="<?php echo base_url('projecto/pservico/').$projecto->id?>" class="btn btn-block btn-social btn-github">
                <i class="fa fa-github"></i> Servicos <span class="badge bg-orange pull-right"><?php echo $contar_servico_do_projecto; ?></span>
              </a>
            </div>
          </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
