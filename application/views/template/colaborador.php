<?= $this->session->nome?>

<a href="<?= base_url('sair')?>">Sair</a>
<div class="container">
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('ticket/listar/'.'Todos')?>">Todos</a></li>
                    <li><a href="<?= base_url('ticket/listar/'.'Aberto')?>">Abertos</a></li>
                    <li><a href="<?= base_url('ticket/listar/'.'Andamento')?>">Andamento</a></li>
                    <li><a href="<?= base_url('ticket/listar/'.'Finalizado')?>">Finalizados</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</nav>