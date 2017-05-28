<div class="container">
<form action="<?= base_url('autenticar')?>" method="post">
    <div class="form-group">
        <label for="usuario">Empresa:</label>
        <input class="form-control"  name="usuario" required>
    </div>
    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" name="senha" required>
    </div>
    <?php if(isset($error)):?>
        <div>
            <?=$error->message?>
        </div>
    <?php endif;?>
    <button type="submit" class="btn btn-default">Entrar</button>
</form>
</div>
