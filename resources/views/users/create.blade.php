<x-layout title="Cadastro">

    <form method="post">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <!--
        <div class="form-group my-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="admin" name="admin">
                <label class="form-check-label" for="admin">Usuário Administrador</label>
            </div>
        </div>
        -->

        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>


        <button class="btn btn-primary mt-3">
            Registrar
        </button>
    </form>
</x-layout>
