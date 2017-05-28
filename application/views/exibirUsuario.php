<div class="container ">
    <div class="row">
        <?php foreach($use as $user){?>
        <a href="<?= base_url('deletar/'.$user->id)?>">Deletar</a>
        <form role="form" method="post" action="<?= base_url('atualizar/'.$user->id)?>">
            <div class="form-group col-sm-10">
                <label for="empresa">Empresa</label>
                <input  type="text" name="empresa" value="<?= $user->nome?>">
            </div>
            <div class="form-group col-sm-10">
                <label for="empresa">Email</label>
                <input type="text" name="email" value="<?= $user->email?>">
            </div>

            <div class="form-group col-sm-10">
                <label for="senha">Senha</label>
                <input  type="text" name="senha">
            </div>
            <div class="col-sm-6">

                <label for="prioridade">Prioridade</label>
                <select class="form-control " id="sel1" name="permissao">
                    <option <?php if($user->permissao == 'Cliente'):?>selected<?php endif;?>>Cliente</option>
                    <option <?php if($user->permissao == 'Colaborador'):?>selected<?php endif;?>>Colaborador</option>
                    <option <?php if($user->permissao == 'Administrador'):?>selected<?php endif;?>>Administrador</option>
                </select>
            </div>
            <?php } ?>
            <button type="submit" class="btn col-sm-2">Atualizar</button>

        </form>
    </div>

</div>