<?php
    

    $dbHost = 'localhost';
    $dbUsername ='root';
    $dbPassword ='';
    $dataName ='projeto_pitr';


    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dataName);
    // if($conexao->connect_errno){
    //     echo "ERRO";
    // }
    // else{
    //     echo"CONEXAO EFETUADA COM SUCESSO";
    // }

