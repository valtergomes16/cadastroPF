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
    $adress = filter_input(INPUT_POST, "adress");
    $phone = filter_input(INPUT_POST, "phone");
    $email = filter_input(INPUT_POST, "email");

    // Atualizar os dados do objeto $person
    $person->setFullName($full_name);
    $person->setBirthDate($birth_date);
    $person->setAdress($adress);
    $person->setPhone($phone);
    $person->setEmail($email);

    // Atualizar no banco de dados
    $personDao = new PersonDao;
    $personDao->update($person);

    // Redirecionar após a atualização
    header("Location: cadastros.php");
    exit();
}