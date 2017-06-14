<link href="vendors/public/css/login.css" rel="stylesheet">
</head>


	

<body>
<main>

<div class="container">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <div class="content">
                    Entre em sua Conta
                </div>
            </h2>
            <div class="ui raised very padded text container segment">
                <form action="<?= base_url('autenticar')?>" method="post">
                    <div class="form-group">
                        <div class="ui stacked segment">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input class="form-control" name="usuario" required placeholder="Usuário:">
                            </div>
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" class="form-control" name="senha" required placeholder="Senha:">
                            </div>
                            <?php if(isset($error)):?>
                                <div class="ui pointing red basic label">
                                    <?=$error->message?>
                                </div>
                            <?php endif;?>
                        </div>
                        <div class="blue ui buttons">
                            <button  class="ui fluid large teal submit button" type="submit">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
