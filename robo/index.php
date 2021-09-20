<?php
require('conexao.php');

$result = "SELECT * FROM minha_urls m WHERE m.situacao='aguardando' ";
$resultado = mysqli_query($conn, $result);

while($row = mysqli_fetch_assoc($resultado)){
    $base_url = $row['url'];

    $cURL = curl_init($base_url);
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    $resultado_html = curl_exec($cURL);
    $statusCode = (int)curl_getinfo($cURL, CURLINFO_HTTP_CODE);
    curl_close($cURL);
    //echo $statusCode;
    //echo '<hr>';
    //echo $resultado;

    //$novo_html = str_replace("'", '', $resultado_html);
    //$novo_html = str_replace('"', '', $novo_html);
    //$novo_html = substr($novo_html,0,);

    $novo_html = addslashes($resultado_html);
    
    $id = $row['id'];
    $result_up = "UPDATE minha_urls SET
    situacao='$statusCode',
    html='$novo_html',
    data_verifica=CURRENT_TIMESTAMP
    WHERE id=$id";
    //echo $result_up;
    $resultado_up = mysqli_query($conn, $result_up);

}


     

 //Primeiro de tudo fazer um select pra comercar meu while
 //cara vez que a minha variavel linha passar no registro url
 //pegar o valor e por na linha 2


 