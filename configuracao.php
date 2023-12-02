<?php
    

    $dbHost = '';
    $dbUsername ='';
    $dbPassword ='';
    $dataName ='';  


    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dataName);
    // if($conexao->connect_errno){
    //     echo "ERRO";
    // }
    // else{
    //     echo"CONEXAO EFETUADA COM SUCESSO";
    // }

