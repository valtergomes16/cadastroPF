<?php
require_once "Model/Person.php";
require_once "Dao/PersonDao.php";

$cpf = $_GET['cpf'];

var_dump($cpf);

$personDao = new PersonDao;
$personDao->delete($cpf);

header("Location: /");
exit(); // Sai do script após o redirecionamento