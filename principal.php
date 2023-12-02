<?php
    session_start();
    // print_r($_SESSION);
    include_once('configuracao.php');
    if((!isset($_SESSION['email'])==true ) and (!isset($_SESSION['senha'])==true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');


    }
    else
    {
        $email = $_SESSION['email'];
        $sql = "SELECT nome FROM usuarios WHERE email='$email'";
        $result = $conexao->query($sql);
        $row = mysqli_fetch_assoc($result);
        $nome = $row['nome'];


        //print_r($nome);

    }



    
    







?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
   body {
    display: flex;
    flex-direction:column;
    font-family: 'Pacifico', cursive;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
    text-align: center;
    }

    header {
        display: flex;
        justify-content: space-around;
        align-items:center;
        background-color: #333;
        color: #f8e866;
        padding: 20px;
        border-radius: 20px 20px 0 0;
    }

    header h1 {
        font-size: 36px;
        margin: 0;
        padding: 20px;
    }

    main {
        display: flex;
        justify-content: space-around;
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.4);
        text-align: center;
        padding: 30px;
        max-width: 1000px;
        margin: 20px auto;
        
    }
    .expense-list{
        display: flex;
        flex-direction: column;
        align-items: center;
    
        margin: 20px;
    }

    .income-list{
        display: flex;
        flex-direction: column;
        align-items: center;
    
        margin: 20px;
    }

    #balance-amount {
        font-weight: bold;
        font-size: 18px;
        color: #4ccf48;
    }
    form {
        margin-top: 20px;
    }
    .button_remove {
        background-color: blue;
    }
    input[type="text"], input[type="number"] {
        width: 90%;
        padding: 5px;
        margin-top: 10px;
        border: 1px solid #333;
        border-radius: 5px;
    }

    select {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #333;
        border-radius: 5px;
    }

    button{
        width: auto;
        padding: auto;
        margin-top: auto;
        background-color: #333;
        color: #f8e866;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #111;
    }

    ul {
        list-style: none;
        margin-top: 20px;
        padding: 0;
    }

    li {
        background-color: #f0f0f0;
        border: 1px solid #333;
        border-radius: 5px;
        padding: 10px;
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
    }

    li button {
        background-color: #ff4444;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    li button:hover {
        background-color: #d92626;
    }
    .balance{
        color: green
    }
    @media (max-width: 700px) {
        main{
            flex-direction: column;
        }
            

    }


    </style>
    <title>Controle de Gastos</title>
</head>
<body>
    <header>
        <h1 >Controle de Gastos</h1>
        <div class="balance">
            <h2>Saldo Disponível</h2>
            <p>R$ <span id="available-balance">0.00</span></p>
        </div>
        <div class="sair">
        <a href=" sair.php" class="button">sair</a>
        </div>
    </header>
    <main>
        <div class="expense-list">
            <h2>Despesas</h2>
            <p>Total de Despesas: R$ <span id="expense-balance-amount">0.00</span></p>
            <form id="expense-transaction-form">
                <input type="text" id="expense-transaction-input" placeholder="Nome da Despesa" required>
                <input type="number" id="expense-amount-input" placeholder="Valor (R$)" step="0.01" required>
                <button type="submit" className="button-principal">Adicionar</button>
            </form>
            <ul id="expense-transaction-list"></ul>
        </div>
        <div class="income-list">
            <h2>Ganhos</h2>
            <p>Total de Ganhos: R$ <span id="income-balance-amount">0.00</span></p>
            <form id="income-transaction-form">
                <input type="text" id="income-transaction-input" placeholder="Nome do Ganho" required>
                <input type="number" id="income-amount-input" placeholder="Valor (R$)" step="0.01" required>
                <button type="submit" className="button-principal">Adicionar</button>
            </form>
            <ul id="income-transaction-list"></ul>
        </div>
    </main>
    <script src="scriptprinc.js"></script>
</body>
</html>
