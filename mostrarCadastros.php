<?php

require_once "Model/Person.php";
require_once "Dao/PersonDao.php";

$personDao = new PersonDao;
$personDao->read();

$person = new Person;