A aplicação

Este é um projeto de uma API feita em Laravel.

Possui uma página web que pode ser acessada via navegador em localhost/excelLaravel/importView e permite a importação de planilha em formato xls.

A API pode ser testada no endereço http://127.0.0.1:8000/api via postman com quadro endpoints, deletar, atualizar, visualizar todos os produtos e apenas um produto.


A instalação

Para testar o projeto é preciso inicialmente ter um servidor, que pode ser no pacote de softwares Wampserver, Lamp ou Xamp com Apache, Mysql e PhpMyAdmin, conforme o sistema operacional ou instala-los separadamente.

A instalação da linguagem Laravel versão 5.8.32 pode ser feita via composer https://getcomposer.org/

Após, baixe a pasta zipada ou clone o repositório, envie a pasta para a pasta www do seu servidor.

Para rodar os comandos do php artisan acesse via terminal a pasta do projeto.


Configuração do banco de dados

O banco de dados foi criado em sqlite e o arquivo já consta no projeto, caso seja necessário modificar a conexão com o banco basta alterar o arquivo .env, excluir o arquivo database.sqlite e rodar as migrations no terminal com o comando do composer php artisan migrate:refresh.


