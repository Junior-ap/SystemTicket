<div class="container">
<a href="novoUsuario">Novo Usuário</a>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Empresa</th>
                <th>Email</th>
                <th>Permissão</th>
            </tr>
            <?php foreach($usuarios as $user){?>
                <tr onclick="listaUsuario(<?= $user->id?>)">
                    <td><?= $user->nome?></td>
                    <td><?= $user->email?></td>
                    <td><?= $user->permissao?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script>
    function listaUsuario(id){
        var base_url = "<?php echo base_url('exibirUsuario/');?>";
       window.location = base_url+id;
    }
</script>