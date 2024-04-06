<?php
require_once "Dao/PersonDao.php";

$person = null;

if(isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];
    $personDao = new PersonDao;
    $person = $personDao->findByCpf($cpf); // Recuperando os dados do cadastro usando o CPF
}

if(isset($_POST['submit'])) {

    $full_name = filter_input(INPUT_POST, "fullName");
    $cpf = filter_input(INPUT_POST, "cpf");
    $birth_date = filter_input(INPUT_POST, "birthDate");
    $street_address = filter_input(INPUT_POST, "streetAddress");
    $street_number = filter_input(INPUT_POST, "streetNumber");
    $complement = filter_input(INPUT_POST, "complement");
    $neighborhood = filter_input(INPUT_POST, "neighborhood");
    $city = filter_input(INPUT_POST, "city");
    $state = filter_input(INPUT_POST, "state");
    $zip_code = filter_input(INPUT_POST, "zipCode");
    $cell_phone = filter_input(INPUT_POST, "cellPhone");
    $telephone = filter_input(INPUT_POST, "telephone");
    $email = filter_input(INPUT_POST, "email");

    if($person) {
        // Atualizar os dados do objeto $person
        $person->setFullName($full_name);
        $person->setCpf($cpf);
        $person->setBirthDate($birth_date);
        $person->setStreetAddress($street_address);
        $person->setStreetNumber($street_number);
        $person->setComplement($complement);
        $person->setNeighborhood($neighborhood);
        $person->setCity($city);
        $person->setState($state);
        $person->setZipCode($zip_code);
        $person->setCellPhone($cell_phone);
        $person->setTelephone($telephone);
        $person->setEmail($email);

        // Atualizar no banco de dados
        $personDao->update($person);

        // Redirecionar após a atualização
        header("Location: /");
        exit();
    }
}


require_once("Templates/header.php");
?>

<main>
    <div class="container">
        <h1>Editar Cadastro</h1>
        <form action="" method="POST">
    
            <div class="mb-3">
                <label for="fullName" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo $person ? $person->getFullName() : ''; ?>">
            </div>
    
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $person ? $person->getCpf() : ''; ?>">
            </div>
    
            <div class="mb-3">
                <label for="birthDate" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo $person ? $person->getBirthDate() : ''; ?>">
            </div>
    
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="streetAddress" class="form-label">Rua</label>
                        <input type="text" class="form-control" id="streetAddress" name="streetAddress" value="<?php echo $person ? $person->getStreetAddress() : ''; ?>">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="streetNumber" class="form-label">Número</label>
                        <input type="text" class="form-control" id="streetNumber" name="streetNumber" value="<?php echo $person ? $person->getStreetNumber() : ''; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="complement" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complement" name="complement" value="<?php echo $person ? $person->getComplement() : ''; ?>">
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="neighborhood" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="neighborhood" name="neighborhood" value="<?php echo $person ? $person->getNeighborhood() : ''; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $person ? $person->getCity() : ''; ?>">
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="state" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $person ? $person->getState() : ''; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="zipCode" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="zipCode" name="zipCode" value="<?php echo $person ? $person->getZipCode() : ''; ?>">
                    </div>
                </div>
            </div>
    
            <div class="mb-3">
                <label for="cellPhone" class="form-label">Celular</label>
                <input type="tel" class="form-control" id="cellPhone" name="cellPhone" value="<?php echo $person ? $person->getCellPhone() : ''; ?>">
            </div>
    
            <div class="mb-3">
                <label for="telephone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php echo $person ? $person->getTelephone() : ''; ?>">
            </div>
    
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $person ? $person->getEmail() : ''; ?>">
            </div>
    
            <button type="submit" name="submit" class="btn btn-primary">Salvar Alterações</button>
    
        </form>
    </div>
</main>

<?php require_once("Templates/footer.php"); ?>
