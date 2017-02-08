<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SystemTicket</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" >

</head>
<body>

<main>
<nav class="container">

<h2 class="col-md-offset-3">Login</h2>
</nav>
    <div class="container">
        <form class="form-horizontal " action="<?php echo base_url('usuario/entra');?>" method="post">
            <input type="hidden" name="captch">
            <div class="form-group">
                <label class="control-label col-md-2" for="email">Nome:</label>
                <div class="col-md-5">
                    <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="senha">Senha:</label>
                <div class="col-md-5">
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua Senha" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-5">
                    <button type="submit" class="btn btn-block">Entra</button>
                </div>
            </div>
        </form>
    </div>




    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>