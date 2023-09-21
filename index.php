<?php
$endpoint = $argv[1];       // Endpoint
$xmlContent = $argv[2];     // Arquivo xml em string
$method  = $argv[3];        // Método
$namespace = $argv[4];      // Namespace
$nodoRaiz = $argv[5];       // Nó raiz para acesso aos dados de retorno
$soapVer = $argv[6] ?? '1'; // Versão do SOAP 1 => 1.1 / 2 => 1.2

// Opções do cliente SOAP
$options = array(
    'location' => $endpoint,
    'uri' => $namespace, 
    'trace' => 1,      // Ativar rastreamento
    'exceptions' => 1, // Ativar exceções
);

// Criação do cliente SOAP
$client = new SoapClient(null, $options);

try {
    // Invoca o método da API SOAP com o conteúdo XML e método específico
    if ($soapVer == '1') {
        $response = $client->__doRequest($xmlContent, $endpoint, $method, SOAP_1_1, 0);
    } elseif ($soapVer == '2') {
        $response = $client->__doRequest($xmlContent, $endpoint, $method, SOAP_1_2, 0);
    } else {
        $arr = array('status' => false, 'SOAP' => 'versao nao prevista');
        echo json_encode($arr);
        return false;
    }
    $xmlObject = simplexml_load_string($response);
    $result = $xmlObject->xpath('//'.$nodoRaiz);
    $jsonString = json_encode($result, JSON_PRETTY_PRINT);
    echo $jsonString;

} catch (SoapFault $e) {
    echo 'Erro na requisição SOAP: ' . $e->getMessage();

}
?>
