<?php 
    require_once("Model/Person.php");
    require_once("Dao/PersonDao.php");

    $personDao = new PersonDao;
    $personDao->read();
    
    $person = new Person;
?>

<main>
    <div class="d-flex">
        <h1>Lista de Cadastros</h1>
        <form action="../search.php" method="GET" class="search" role="search">
            <input class="form-control me-2" type="search" name="search" placeholder="Pesquise por algum cadastro" aria-label="Search">
            <button class="btn" type="submit">Pesquisar</button>
        </form>
    </div>
    <table>
        <tr>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Endereço</th>
            <!-- <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th> -->
            <th>Celular</th>
            <th>Telefone</th>
            <th>Email</th>
            <th></th>
        </tr>
        <?php foreach ($personDao->read() as $person): ?>
            <tr>
                <td><a href="../listar.php?cpf=<?php echo $person['cpf']; ?>" class="link"><?php echo $person['full_name']; ?></a></td>
                <td>
                    <?php 
                        $cpf = $person['cpf'];
                        echo substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, -2);
                    ?>
                </td>
                <td>
                    <?php 
                        $birth = explode("-", $person['birth_date']); 
                        echo $birth[2]."/".$birth[1]."/".$birth[0];
                    ?>
                </td>
                <td>
                    <?php
                        echo $person['street_address'] . ", " . $person['street_number'] /*.
                        ($person['complement'] ? "(" . $person['complement'] . ")" : "") . " - " .
                        $person['neighborhood'] . ", " . $person['city'] . " - " . $person['state'] .
                        ", " . $person['zip_code']*/;
                    ?>
                </td>
                <td>
                    <?php 
                        $cell_phone = $person['cell_phone'];
                        echo '(' . substr($cell_phone, 0, 2) . ') ' . substr($cell_phone, 2, 5) . '-' . substr($cell_phone, 7, 4);
                    ?>
                </td>
                <td>
                    <?php 
                        $telephone = $person['telephone'];
                        echo $telephone ? '(' . substr($telephone, 0, 2) . ') ' . substr($telephone, 2, 4) . '-' . substr($telephone, 6, 4) : "";
                    ?>
                </td>
                <td><?php echo $person['email']; ?></td>
                <td>
                    <a href="../editarCadastro.php?cpf=<?php echo $person['cpf']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                    <a href="../deletarCadastro.php?cpf=<?php echo $person['cpf']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <nav aria-label="...">
        <ul class="pagination pagination-md m-3">
            <li class="page-item active" aria-current="page">
            <span class="page-link">1</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>
</main>