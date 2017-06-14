





<div class="ui raised very padded text container segment">
    <h2 class="ui header"> Lista de Usuários:</h2>



    <a href="novoUsuario" class="ui primary right floated button ">Novo Usuário</a>

    <table class="ui selectable celled table">
        <thead>
        <tr>
            <th>Empresa</th>
            <th>Email</th>
            <th>Permissão</th>
        </tr>
        </thead>
        <?php foreach($usuarios as $user){?>
            <tr onclick="listaUsuario(<?= $user->id?>)">
                <td><?= $user->nome?></td>
                <td><?= $user->email?></td>
                <td><?= $user->permissao?></td>
            </tr>
        <?php } ?>



    </table>


</div>
<script>
    function listaUsuario(id){
        var base_url = "<?php echo base_url('exibirUsuario/');?>";
        window.location = base_url+id;
    }
</script>

