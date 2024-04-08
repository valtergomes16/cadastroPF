<?php

require_once("Model/Person.php");
require_once ("Dao/PersonDao");

$search = filter_input(INPUT_GET, "search");

if($search):
    $personDao = new PersonDao;
    $personDao->search($search);
endif;