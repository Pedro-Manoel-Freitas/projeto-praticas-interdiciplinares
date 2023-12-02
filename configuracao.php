<?php
    

    $dbHost = 'aws.connect.psdb.cloud';
    $dbUsername ='8bzy681rxext2ihwrmab';
    $dbPassword ='pscale_pw_7YQmXDblnRNYoHScowcLshPLIvRa4udN8Wo21GWXsiJ';
    $dataName ='projeto_pitr';  


    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dataName);
    // if($conexao->connect_errno){
    //     echo "ERRO";
    // }
    // else{
    //     echo"CONEXAO EFETUADA COM SUCESSO";
    // }

