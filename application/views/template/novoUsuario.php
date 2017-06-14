<div class="ui raised very padded text container segment">
    <h3 class="ui left aligned header center">
        Crie um novo Usuário.
    </h3>
    <div class="ui form">
        <form role="form" method="post" action="<?= base_url('novoUsuario')?>">
            <div>
                <label for="empresa">Empresa</label>
                <input  type="text" name="empresa" required>
            </div>

            <div>
                <label for="empresa">Email</label>
                <input type="email" name="email" required>
            </div>

            <div>
                <label for="senha">Senha</label>
                <input  type="text" name="senha" required>
            </div>

            <div>
            <label for="prioridade">Prioridade</label>
            <select id="sel1" name="permissao">
                <option>Cliente</option>
                <option>Colaborador</option>
                <option>Administrador</option>
            </select>
            </div>

            <a class="ui left floated button" href="<?= base_url('listaUsuarios')?>""> Voltar </a>
            <button class="ui right floated primary button" type="submit">Salvar </button>

        </form>
    </div>
</div>






