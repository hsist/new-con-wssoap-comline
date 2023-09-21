# new-con-wssoap-comline
Novo consumo de webservice SOAP. Execução via linha de comando.

<hr>

## Dependência
```
sudo apt-get install php7.2-soap
service apache2 restart
```

<hr>

## Teste para verificar o funcionamento da dependência
```
<?php
    phpinfo();
```
get soap Soap Client => enabled<br> 
Soap Server => enabled<br>
soap.wsdl_cache => 1 => 1<br> 
soap.wsdl_cache_dir => /tmp => /tmp<br>
soap.wsdl_cache_enabled => 1 => 1<br>
soap.wsdl_cache_limit => 5 => 5<br>
soap.wsdl_cache_ttl => 86400 => 86400

<hr>

## Exemplo de execução/teste
Ambiente de homologação da API Apoio Cotações
```
php con-wssoap-comline/index3.php 'http://homologacao.apoiocotacoes.com.br:80/app/WSPedidoCotacao' '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ped="http://pedidocotacao.mv.client.webService.apoio.com.br/"><soapenv:Header/><soapenv:Body><ped:enviarPedidoCotacao><arg0><cabecalho><login>ws.avare</login><senha>ws.avare</senha></cabecalho><solicitacaoCompra><dataHoraValidade>01/01/2024 11:01</dataHoraValidade><listaProduto><produto><codigoProduto>0000037788</codigoProduto><quantidade>5.000000</quantidade></produto></listaProduto><operacao>I</operacao><titulo>TESTE</titulo></solicitacaoCompra></arg0></ped:enviarPedidoCotacao></soapenv:Body></soapenv:Envelope>' 'enviarPedidoCotacao' 'http://homologacao.apoiocotacoes.com.br' 'WSRetornoPedidoCotacao' '1'
```

<hr>

## Sequência de parâmetros na execução do consumo
<ol>
  <li>Endpoint</li>
  <li>Arquivo xml em string</li>
  <li>Método</li>
  <li>Namespace</li>
  <li>Nó raiz para acesso aos dados de retorno</li>
  <li>Versão do SOAP 1 => 1.1 / 2 => 1.2</li>
</ol>

