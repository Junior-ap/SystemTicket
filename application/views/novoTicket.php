﻿<div class="container ">
    <div class="row">
        <form role="form" method="post" action="<?= base_url('novoTicket/'.$this->session->id)?>">
            <div class="col-sm-2">
            <label for="prioridade">Prioridade</label>
                <select class="form-control " id="sel1" name="prioridade">
                    <option>Baixa</option>
                    <option>Media</option>
                    <option>Alta</option>
                    <option>Muito Alta</option>
                </select>
            </div>
            <div class="col-sm-4 offiset">
            <label for="assunto">Assunto</label>
            <select class="form-control " id="sel1" name="assunto">
                <?php foreach($assunto as $assu){?>
                    <tr>
                        <option><?= $assu->assunto?></option>
                    </tr>
                <?php } ?>
            </select>
            </div>
            <div class="form-group col-sm-8">
                <label for="problema">Problema</label>
                <textarea class="form-control" rows="5" id="comment" name="ticket"></textarea>
            </div>
            <button type="submit" class="btn col-sm-8">Enviar</button>

        </form>
    </div>

</div>

