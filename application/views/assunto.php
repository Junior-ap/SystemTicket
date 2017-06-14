<div class="ui raised very padded text container segment">

    <h2 class="ui header left aligned header center"> Crie um novo Ussunto!</h2>


    </h3>
    <form action="<?= base_url('novoAssunto')?>" method="post">
    <div class="ui form">
        <form class="ui fluid form">
        <div>
            <label for="assunto">Assunto:</label>
            <input type="text" name="assunto" required>
            <button class="ui right floated primary button" type="submit">Criar </button>

    </div>

    </form>
        <table class="ui selectable celled table">
            <tr>
                <h2 class="ui header left aligned header center"> Assuntos já criados:</h2>
            </tr>
        <?php foreach($assunto as $assu){?>
            <tr>
                <td><?= $assu->assunto?></td>
                <td><a href="<?= base_url('excluirAssunto/'.$assu->id)?>">Excluir</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
</div>