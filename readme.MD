# KaBuM

Kabum test project

## Required

```bash
Docker
Docker-compose
```

## Usage

```phyton
Run all commands:

docker network create kbm
docker volume create --name=db
```

## Database
In folder database have all sql.

Run all queries in databate.

To configure mysql, change in connection-config.php

```mysql
db: mysql
host: db
port: 3306
database: kbm
user: root
password: ''
```

## Database

All endpoints

```javascript
get->users (Listar todos os usuários)
get->users - (Lista apenas um usuário) - Param: userId 
put->users - (Alteração de usuário) - Param: userId 
post->users (Criação de usuário)
delete->users - (Exclusão de usuário) - Param: userId 
get->clients (Listar todos os clientes)
get->clients - (Listar apenas um cliente) - Param: clientId 
post->clients (Criação de cliente)
put->clients - (Alteração de cliente) - Param: clientId 
delete->clients - clientId (Exclusão de usuário)
```

## Documentation


Application documentation provided by the Postman.

```url
https://web.postman.co/collections/3011439-601d9e3f-dce2-4030-8186-0578e7bc236a?version=latest&workspace=8b37bec1-18d0-4a22-814e-6bd01d44c609
```

## Maintainer
```
Name: Rafael Leme
Contact: rafaelleme_2@hotmail.com
```
