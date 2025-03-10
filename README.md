# JoinTestBackend

Este projeto Lavavel v10.48.28 roda dentro de um container do Docker.

Para criar o laravel, execute esses comandos:
- composer create-project --prefer-dist laravel/laravel backend (mova os arquivos da pasta backend para a raiz deste projeto)
- docker build -t meu-backend .
- docker run -d -p 8000:8000 --name meu-backend meu-backend (Aqui está rodando e tudo certo)
- docker ps (para ver o ID e porta do container criado)

Para ver a versao do Laravel dentro do docker:
- docker exec -it meu-backend bash (irá entrar no container)
- php artisan --version (Deve exibir Lavarel Framework 10.48.28)
- exit (para sair do container)

Para criar um endpoint no projeto, execute:
- docker exec -it meu-backend bash
- php artisan make:model Categoria -m
