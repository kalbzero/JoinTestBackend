# JoinTestBackend

Este projeto Lavavel v10.48.28 roda dentro de um container do Docker.


Para rodar o docker local, execute:
- Criar o .env a apartir do .env.example 
- docker up -d (mantem a sincronia funcionando)
- Acesse http://localhost:8000/teste e verifique se aparece a msg "Sincronizacao funcionando"
- docker exec -it meu-backend php artisan route:list (Ira listar as rotas reconhecidas pelo laravel)
- docker ps (Verifica se tem os 2 containers rodando)

Caso as rotas de Categoria e Produto nao aparecam, rode esses comandos:
- docker exec -it meu-backend php artisan make:controller ProdutoController --resource
- docker exec -it meu-backend php artisan make:controller CategoriaProdutoController --resource
- docker-compose down
- docker-compose up -d --build
- Por ultimo, verifique o docker-compose o atributo MYSQL_ROOT_PASSWORD, senha padrao é root. O mesmo deve feito no .env.

Rode as Migracions:
- docker exec -it meu-backend php artisan migrate
- docker exec -it meu-backend php artisan migrate:fresh (deleta as tabelas e cria novamente, isso deleta os dados)
- OK, aqui é para estar tudo funcionando!

Parar todos os containers
- docker stop $(docker ps -q)

Sobre o JWT, implementei a configuracao do mesmo no projeto, mas nao cheguei a completa-lo.
- Biblioteca instalada
- Arquivo app/Http/Middleware/Authenticate.php atualizado
- Arquivo config/auth.php atualizado (trecho do guards está comentado)
- Arquivo app/Http/Kernel.php atualizado (import do Authenticate está comentado)