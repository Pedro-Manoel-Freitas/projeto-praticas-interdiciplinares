<?php
    if(isset($_POST['submit']))
    {
        // print_r($_POST['nome']);
        // print_r('<br>');
        // print_r($_POST['email']);
       
        include_once('configuracao.php');
        

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];



        //conferindo se o email ja foi cadastrado
        $query="SELECT * FROM usuarios WHERE email = '$email'";
        $result =mysqli_query($conexao,$query);
        $count = mysqli_num_rows($result);
        if ($count > 0) 
        {
            echo "Este email já está cadastrado.";
        } 
        else
        {
            $result = mysqli_query($conexao,"INSERT INTO usuarios(nome,email,senha) VALUES('$nome','$email','$senha')");

            header('Location: login.php');
            
        }


       
    }



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Tela de Cadastro</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
body { 
    background-color: #f0f0f0; 
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: 'Pacifico', cursive; 
}

.signup-container {
    background-color: #ffffff; 
    border-radius: 20px; 
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.4); 
    text-align: center;
    padding: 30px;
    max-width: 600px; 
}

.signup-tab {
    background-color: #333; 
    color: #f8e866;
    font-size: 36px; 
    padding: 20px;
    border-radius: 20px 20px 0 0; 
}

form {
    display: flex;
    flex-direction: column;
    gap: 20px; 
    padding: 20px 0;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    padding: 15px; 
    border: none;
    border-bottom: 3px solid #555; 
    outline: none;
    font-size: 20px; 
}

button {
    background-color: #555; 
    color: #f8e866; 
    padding: 15px;
    border: none;
    border-radius: 10px; 
    cursor: pointer;
    font-size: 20px; 
}

button:hover {
    background-color: #333; 
}

.login-link {
    margin-top: 20px; 
    font-size: 18px; 
    color: #333; 
}

a {
    color: #dbc519; 
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.Cadastrar {
    background-color: #333;
    justify-content: center;
}
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-tab">Cadastro</div>
        <form action="cadastro.php" method="POST">
            <div class="inputbox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelinput">Nome completo</label>
            </div>
            <br><br>
            <div class="inputbox">
                <input type="email" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelinput">Email</label>

            </div>
            <br><br>
            <div class="inputbox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="labelinput">senha</label>

            </div>
            <input type="submit" name="submit" id="submit">
            
        </form>
        <div class="login-link">
            Já possui uma conta? <a href=" login.php">Faça login</a>
        </div>
    </div>
</body>
</html>
