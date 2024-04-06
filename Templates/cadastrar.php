<?php require_once("../Templates/header.php"); ?>

<main>
    <div class="container">
        <h1>Cadastrar</h1>
        <form action="../criarCadastro.php" method="POST">
            <div class="mb-3">
                <label for="fullName" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Insira o seu nome completo">
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o número do seu CPF">
            </div>

            <div class="mb-3">
                <label for="birthDate" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="birthDate" name="birthDate" placeholder="Insira a sua data de nascimento">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="streetAddress" class="form-label">Rua</label>
                        <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Insira o nome da rua">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="streetNumber" class="form-label">Número</label>
                        <input type="text" class="form-control" id="streetNumber" name="streetNumber" placeholder="Insira o número">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="complement" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complement" name="complement" placeholder="Insira o complemento (opcional)">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="neighborhood" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Insira o nome do bairro">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Insira o nome da cidade">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="state" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Insira o nome do estado">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="zipCode" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="Insira o CEP">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="cellPhone" class="form-label">Celular</label>
                <input type="tel" class="form-control" id="cellPhone" name="cellPhone" placeholder="Insira o número do seu celular">
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Insira o número do seu telefone (opcional)">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Insira o seu e-mail">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</main>

<?php require_once("../Templates/footer.php"); ?>