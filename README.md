# COM231-final

## Apresentação
 - Esse é o sistema de uma loja de instrumentos musicais feito em PHP para a matéria de COM231 ministrada por João Bosco na UNIFEI em 2020/1

## Como rodar
- Primeiramente deve se garantir que as extensões do php apra o uso de Postgres estão habilitadas, é possivel ter essa informação entrando no arquivo php.ini disponivel na pasta em que se encontra o php.exe.
- Então nesse arquivo, procure por "extension" até encontrar algo do tipo: 
``` php
;extension=openssl
;extension=pdo_firebird
extension=pdo_mysql
;extension=pdo_oci
;extension=pdo_odbc
extension=pdo_pgsql
extension=pdo_sqlite
extension=pgsql
;extension=shmop
```

- As linhas marcadas com ; estão comentadas, é necessário que se tire o ponto e virgula das extensões: 
  - pdo_pgsql
  - pgsql
  
- Pronto, o PHP está pronto para rodar o projeto, agora vamos configurar o banco

## Configuração de Banco
- Nesse repositório existe um backup, rode ele usando o comando pg_restore
- O banco deve estar funcionando, agora é conectar nele via aplicação
- No arquivo database\Database.php existem variáveis de conexão coloque o username e o password que cabe ao seu banco, o nome do banco no backup é loja, caso alterado, alterar aqui também

