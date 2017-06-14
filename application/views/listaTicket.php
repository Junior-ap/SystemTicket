<div class="ui raised very padded text container segment">
    <h2 class="ui header"> Status Tickets:</h2>

    <table class="ui selectable celled table">
        <thead>
        <tr>
            <th>Empresa</th>
            <th>Assunto</th>
            <th>Prioridade</th>
            <th>Data</th>
            <th>Status</th>
        </tr>
        </thead>
        <?php foreach($ticket as $tic){?>
            <tr onclick="listaTicket(<?= $tic->id?>)">
                <td><?= $tic->nome?></td>
                <td><?= $tic->assunto?></td>
                <td><?= $tic->prioridade?></td>
                <td><?= $tic->data?></td>
                <td><?= $tic->status?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<script>
    function listaTicket(id){
        var base_url = "<?php echo base_url('exibirTicket/');?>";
        window.location = base_url+id;
    }
</script>

