<?php require_once "mostrarCadastros.php"; ?>

<body>
    <h1>Listagem de Cadastros</h1>
    <table>
        <tr>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Endereço</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th>
            <th>Celular</th>
            <th>Telefone</th>
            <th>Email</th>
            <th></th>
        </tr>
        <?php foreach ($personDao->read() as $person): ?>
            <tr>
                <td><?php echo $person['full_name']; ?></td>
                <td><?php echo $person['cpf']; ?></td>
                <td><?php echo $person['birth_date']; ?></td>
                <td><?php echo $person['street_address']; ?></td>
                <td><?php echo $person['street_number']; ?></td>
                <td><?php echo $person['complement']; ?></td>
                <td><?php echo $person['neighborhood']; ?></td>
                <td><?php echo $person['city']; ?></td>
                <td><?php echo $person['state']; ?></td>
                <td><?php echo $person['zip_code']; ?></td>
                <td><?php echo $person['cell_phone']; ?></td>
                <td><?php echo $person['telephone']; ?></td>
                <td><?php echo $person['email']; ?></td>
                <td>
                    <a href="../editarCadastro.php?cpf=<?php echo $person['cpf']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                    <a href="../deletarCadastro.php?cpf=<?php echo $person['cpf']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
