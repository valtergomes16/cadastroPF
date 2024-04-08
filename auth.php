<?php
require_once("Templates/header.php");
?>

<div class="container">
    <div id="login-container">
        <h1>Entrar</h1>
        <form action="auth_process.php" method="POST">
            <input type="hidden" name="type" value="login">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
    <?php
        if (isset($_GET['error'])) {
            $errorMessage = $_GET['error'];
            echo '<div class="alert alert-danger" role="alert" style="margin: 0 20px;">'.$errorMessage.'</div>';
        }
        if (isset($_GET['success'])) {
            $successMessage = $_GET['success'];
            echo '<div class="alert alert-success" role="alert" style="margin: 0 20px;">'.$successMessage.'</div>';
        }
    ?>
    <div id="register-container">
        <h1>Criar Conta</h1>
        <form action="auth_process.php" method="POST">
            <input type="hidden" name="type" value="register">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Sobrenome:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Digite seu sobrenome">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
            </div>
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirmação de senha:</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirme sua senha">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</div>

<?php
    require_once("Templates/footer.php");
?>