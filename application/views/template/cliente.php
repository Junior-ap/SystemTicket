
</head>
<body>
<main>
<nav>
    <div class="ui inverted segment">
        <div class="ui inverted secondary pointing menu">
            <h2>  Sistem Tickets</h2>
            <div class="right menu">
                <label class="ui left attached disabled button"><?= $this->session->nome?></label>
                <a href="<?= base_url('sair')?>" class="right attached ui button"> <i class="sign out icon "></i> Sair</a>
            </div>
        </div>
    </div>

    <div class="ui menu">
        <a href= "<?= base_url('criarTicket')?>" class="item">Novo Ticket </a>
        <div class="ui simple dropdown item">
            Status Tickets <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="<?= base_url('ticket/listar/'.'Todos')?>">Todos</a>
                <a class="item" href="<?= base_url('ticket/listar/'.'Aberto')?>">Em Aberto</a>
                <a class="item" href="<?= base_url('ticket/listar/'.'Andamento')?>">Em Andamento</a>
                <a class="item" href="<?= base_url('ticket/listar/'.'Finalizado')?>">Finalizados</a>

            </div>

</nav>

