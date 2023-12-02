<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Tela de Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');

body {
    background-color: #f0f0f0;
    display: grid;
    place-items: center;
    height: 100vh;
    margin: 0;
    font-family: 'Pacifico', cursive;
}

.login-container {
    background-color: #ffffff;
    border-radius: 20px;
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
    text-align: center;
    padding: 30px;
    max-width: 600px;
    display: grid;
    gap: 20px;
}

.login-tab {
    background-color: #333;
    color: #f8e866;
    font-size: 36px;
    padding: 20px;
    border-radius: 20px 20px 0 0;
}

#login-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px 0;
}

input[type="email"],
input[type="password"] {
    padding: 10px;
    border: none;
    border-bottom: 3px solid #555;
    outline: none;
    font-size: 20px;
    width: 90%;
   
    
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

.register-link {
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

.footer {
    text-align: center;
    background-color: #f0f0f0;
    padding: 10px;
    position: absolute;
    bottom: 0;
    width: 100%;
}
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-tab">Login</div>
        <form action="testelogin.php" method="POST">
        <input type="email" name="email" placeholder="Email">
        <br><br>
        <input type="password" name="senha" placeholder="senha">
        <br><br>
        <input class="inputSubmit" type="submit" name="submit" value="login">
        </form>
        <div class="register-link">
            Ainda não possui uma conta? <a href="../cadastro/cadastro.php">Cadastre-se</a>
        </div>
    </div>
    <footer class="footer">
        Nektar World
    </footer>
    <script src="script.js"></script>
</body>
</html>
