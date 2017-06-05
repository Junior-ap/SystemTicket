<div class="container ">
    <div class="row">
        <div class="form-group col-sm-4">
            <h3><?= $ticket[0]->nome?></h3>
        </div>

        <div class="form-group col-sm-8">
           <p> <?= $ticket[0]->ticket?></p>
        </div>
        <?php if($ticket[0]->status == 'Aberto'):?>
            <a href="<?= base_url('status/').$ticket[0]->id.'/'. 'Andamento'?>">Iniciar</a>
        <?php endif;?>
        <?php if($ticket[0]->status == 'Andamento'):?>
            <a href="<?= base_url('status/').$ticket[0]->id.'/'. 'Finalizado'?>">Finalizar</a>
        <?php endif;?>
        <?php if($ticket[0]->status == 'Finalizado'):?>
            <a href="<?= base_url('status/').$ticket[0]->id.'/'. 'Andamento'?>">Reabrir</a>
        <?php endif;?>
        <?php foreach($comentario as $coment){?>
            <div class="form-group col-sm-4">
                <h3> <?= $coment->nome?></h3>
            </div>
            <div class="form-group col-sm-8">
               <p> <?= $coment->comentario?></p>
            </div>
        <?php } ?>
        <div class="form-group col-sm-8">
            <form role="form" method="post" action="<?= base_url('comentar/').$ticket[0]->id .'/'. $this->session->id ?>">
                <label for="problema">Comentar</label>
                <textarea class="form-control" rows="5" name="comentario"></textarea>
                <button type="submit" class="btn col-sm-8">Comentar</button>

            </form>
        </div>

    </div>
</div>