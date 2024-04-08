<?php
require_once("Dao/PersonDao.php");

$person = null;

if(isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];
    $personDao = new PersonDao;
    $personDao->read();
    $person = $personDao->findByCpf($cpf); // Recuperando os dados do cadastro usando o CPF
}

require_once("Templates/header.php");
?>

<main>

<?php if ($person): ?>
    <a href="../" class="btn m-3 mt-2 mb-2" style="width: 40px;"><i class="bi bi-arrow-left"></i></a>
    <div class="lerCadastro">
        <h1><?php echo $person->getFullName(); ?></h1>
        <p>CPF: <?php echo $person->getCpf(); ?></p>
        <p>Data de Nascimento: <?php echo $person->getBirthDate(); ?></p>
        <p>Endereço:
            <?php
                echo $person->getStreetAddress() . ", " . $person->getStreetNumber() .
                ($person->getComplement() ? "(" . $person->getComplement() . ")" : "") . " - " .
                $person->getNeighborhood() . ", " . $person->getCity() . " - " . $person->getState() .
                ", " . $person->getZipCode();
            ?>
        </p>
        <p>Celular: <?php echo $person->getCellPhone(); ?></p>
        <p>Telefone: <?php echo $person->getTelephone(); ?></p>
        <p>Email: <?php echo $person->getEmail(); ?></p>
    </div>
<?php else: ?>
    <p>Nenhuma pessoa encontrada com o CPF fornecido.</p>
<?php endif; ?>


</main>

<?php require_once("Templates/footer.php"); ?>