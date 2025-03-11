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

Rode as Migracions:
- docker exec -it meu-backend php artisan migrate
- Caso de erro, verifique se o banco está rodando na porta 3306