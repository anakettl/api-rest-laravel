<b>A aplicação</b>

Este é uma API que recebe uma planilha de produtos e realiza o processamento em background(queue).
Possui um endpoint que informa se a planilha foi processada com sucesso ou não.
Permite visualizar, atualizar e apagar os produtos (só é possível criar novos produtos via planilha).

<b>Funcionalidade</b>

Uma página web que pode ser acessada no navegador em localhost/excelLaravel/importView e permite a importação de planilha em formato xls.

A API pode ser testada no endereço localhost:8000/api. Possui quadro endpoints, deletar, atualizar, visualizar todos os produtos e apenas um produto.


<b>A instalação</b>

Para testar o projeto é preciso, inicialmente, ter um ambiente de desenvolvimento web (Wampserver, Lamp ou Xamp com Apache, Mysql e PhpMyAdmin), conforme o sistema operacional ou instalá-los separadamente.

A instalação da linguagem Laravel versão 5.8.32 pode ser feita via composer https://getcomposer.org/

Após, baixe a pasta zipada ou clone o repositório, envie a pasta para a pasta www do seu servidor.

Para rodar os comandos do php artisan acesse via terminal a pasta do projeto.


<b>Configuração do banco de dados</b>

O banco de dados foi criado em sqlite e o arquivo já consta no projeto, caso seja necessário modificar a conexão com o banco, basta alterar o arquivo .env, excluir o arquivo database.sqlite e rodar as migrations no terminal com o comando do composer php artisan migrate:refresh.


