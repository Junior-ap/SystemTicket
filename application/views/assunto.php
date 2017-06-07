<div class="container ">
    <form action="<?= base_url('novoAssunto')?>" method="post">
        <div>
            <label for="assunto">Assunto</label>
            <input type="text" name="assunto">
            <button type="submit">Novo Assunto</button>
        </div>
    </form>
    <table class="table table-striped">
        <tr>
            <th>Assunto</th>
        </tr>
        <?php foreach($assunto as $assu){?>
            <tr>
                <td><?= $assu->assunto?></td>
                <td><a href="<?= base_url('excluirAssunto/'.$assu->id)?>">Excluir</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
