
<div class="ui raised very padded text container segment">

    <h3 class="ui left aligned header center">
        Envie seu Ticket!
    </h3>
    <div class="ui form">
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
                <textarea class="form-control" rows="5" id="comment" name="ticket" required ></textarea>
            </div>
            <button class="ui right floated primary button" type="submit" >Salvar</button>
        </form>
    </div>

</div>

