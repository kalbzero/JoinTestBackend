# JoinTestBackend

Este projeto Lavavel v10.48.28 roda dentro de um container do Docker.

Para ver a versao do Laravel dentro do docker:
- docker exec -it meu-backend bash (irá entrar no container)
- php artisan --version (Deve exibir Lavarel Framework 10.48.28)
- exit (para sair do container)


Para rodar o docker local, execute:
- docker up -d (mantem a sincronia funcionando)
- Acesse http://localhost:8000/teste e verifique se aparece a msg "Sincronizacao funcionando"
- docker exec -it meu-backend php artisan route:list (Ira listar as rotas reconhecidas pelo laravel)
- docker ps (Verifica se tem os 2 containers rodando)
- docker exec -it meu-backend php artisan key:generate

Rode as Migracions:
- docker exec -it meu-backend php artisan migrate
- docker exec -it meu-backend php artisan migrate:fresh (deleta as tabelas e cria novamente, isso deleta os dados)

Parar todos os containers
- docker stop $(docker ps -q)

Sobre o JWT, implementei a configuracao do mesmo no projeto, mas nao cheguei a completa-lo.
- Biblioteca instalada
- Arquivo app/Http/Middleware/Authenticate.php atualizado
- Arquivo config/auth.php atualizado (trecho do guards está comentado)
- Arquivo app/Http/Kernel.php atualizado (import do Authenticate está comentado)