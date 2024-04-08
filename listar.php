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
        <p>CPF: <?php echo $person ? substr($person->getCpf(), 0, 3) . '.' . substr($person->getCpf(), 3, 3) . '.' . substr($person->getCpf(), 6, 3) . '-' . substr($person->getCpf(), -2) : ''; ?></p>
        <p>Data de Nascimento: <?php $birth = explode("-", $person->getBirthDate()); 
        echo $birth[2]."/".$birth[1]."/".$birth[0]; ?></p>
        <p>Endereço:
            <?php
                echo $person->getStreetAddress() . ", " . $person->getStreetNumber() .
                ($person->getComplement() ? "(" . $person->getComplement() . ")" : "") . " - " .
                $person->getNeighborhood() . ", " . $person->getCity() . " - " . $person->getState() .
                ", " . $person->getZipCode();
            ?>
        </p>
        <p>Celular: 
        <?php 
            $cell_phone = $person->getCellPhone();
            echo '(' . substr($cell_phone, 0, 2) . ') ' . substr($cell_phone, 2, 5) . '-' . substr($cell_phone, 7, 4);
        ?></p>
        <p>Telefone: <?php 
            $telephone = $person->getTelephone();
            echo '(' . substr($telephone, 0, 2) . ') ' . substr($telephone, 2, 4) . '-' . substr($telephone, 6, 4);
        ?></p>
        <p>Email: <?php echo $person->getEmail(); ?></p>
    </div>
<?php else: ?>
    <p>Nenhuma pessoa encontrada com o CPF fornecido.</p>
<?php endif; ?>


</main>

<?php require_once("Templates/footer.php"); ?>