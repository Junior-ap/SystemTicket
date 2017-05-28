<div class="container">
    <table class="table table-striped">
        <tr>
            <th>Empresa</th>
            <th>Assunto</th>
            <th>Prioridade</th>
            <th>Data</th>
        </tr>
        <?php foreach($ticket as $tic){?>
            <tr onclick="listaTicket(<?= $tic->id?>)">
                <td><?= $tic->id?></td>
                <td><?= $tic->nome?></td>
                <td><?= $tic->assunto?></td>
                <td><?= $tic->prioridade?></td>
                <td><?= $tic->data?></td>
                <td><?= $tic->status?></td>
            </tr>
        <?php } ?>
    </table>
</div>
</div>
<script>
    function listaTicket(id){
        var base_url = "<?php echo base_url('exibirTicket/');?>";
        window.location = base_url+id;
    }
</script>