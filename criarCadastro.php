<?php

require_once("Model/Person.php");
require_once("Dao/PersonDao.php");

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

$person = new Person;

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

// Criando cadastro
$personDao = new PersonDao;
$personDao->create($person);

// Listando

header("Location: /");
exit();