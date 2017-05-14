<div class="container ">
    <div class="row">
        <form role="form" method="post" action="<?= base_url('novoUsuario')?>">
            <div class="form-group col-sm-10">
                <label for="empresa">Empresa</label>
                <input  type="text" name="empresa">
            </div>
            <div class="form-group col-sm-10">
                <label for="empresa">Email</label>
                <input type="text" name="email">
            </div>
            <div class="form-group col-sm-10">
                <label for="senha">Senha</label>
                <input  type="text" name="senha">
            </div>
            <div class="col-sm-6">

            <label for="prioridade">Prioridade</label>
                <select class="form-control " id="sel1" name="permissao">
                    <option>Cliente</option>
                    <option>Colaborador</option>
                    <option>Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn col-sm-8">Enviar</button>

        </form>
    </div>

</div>

