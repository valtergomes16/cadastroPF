<?php

// require_once("globals.php");
require_once("connection.php");
require_once("Model/User.php");
// require_once("Model/Message.php");
require_once("Dao/UserDAO.php");

$message = new Message("/");

$userDao = new UserDAO("/");

// Resgata o tipo do formulário
$type = filter_input(INPUT_POST, "type");

// Verificação do tipo de formulário
if($type === "register") {

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    // Verificação de dados mínimos
    if($name && $lastname && $email && $password) {

        // Verificar se as senhas batem
        if($password === $confirmpassword) {

            // Verificar se o e-mail já está cadastrado no sistema
            if($userDao->findByEmail($email) === false) {

                $user = new User();

                // Criação de token e senha
                $userToken = $user->generateToken();
                $finalPassword = $user->generatePassword($password);

                $user->name = $name;
                $user->lastname = $lastname;
                $user->email = $email;
                $user->password = $finalPassword;
                $user->token = $userToken;

                $auth = true;

                $userDao->create($user, $auth);

                header("Location: auth.php?success=Conta criada com sucesso!");

            } else {

                // Enviar uma msg de erro, usuário já existe
                // $message->setMessage("Usuário já cadastrado, tente outro e-mail.", "error", "back");
                header("Location: auth.php?error=Atenção: E-mail já cadastrado.");

            }

        } else {

            // Enviar uma msg de erro, de senhas não batem
            // $message->setMessage("As senhas não são iguais.", "error", "back");
            header("Location: auth.php?error=Erro: As senhas não são iguais");

        }

    } else {

        // Enviar uma msg de erro, de dados faltantes
        // $message->setMessage("Por favor, preencha todos os campos.", "error", "back");
        header("Location: auth.php?error=Por favor, preencha todos os campos.");

    }

} else if($type === "login") {

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    // Tenta autenticar usuário
    if($userDao->authenticateUser($email, $password)) {

        header("Location: Templates/cadastro.php");

    } else {

        // $message->setMessage("Usuário e/ou senha incorretos.", "error", "back");
        header("Location: auth.php?error=E-mail ou senha incorretos.");

    }

} else {

    header("Location: auth.php?error=Informações inválidas!");

}