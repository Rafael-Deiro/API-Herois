# API de/para Heróis
Projeto feito para o desafio de Desenvolvedor Jr. da NVMO.

---

## Configuração do Ambiente Local e Execução
1. É necessário obter as dependências do projeto via Composer.
2. Configurar as credenciais do banco de dados no arquivo .env (com base no arquivo .env.example). (A APP_KEY já está configurada por não se tratar de um projeto para produção)
3. Criar o banco de dados manualmenete de acordo com a configuração, migrar e popular via CLI.
4. Utilizar o comando "php artisan serve" para iniciar o servidor da aplicação.
5. Utilizar postman ou similar para utilizar a API, ~ou o front-end da aplicação~ (Front-end ainda não implementado)

---

## A fazer
1. Implementar middlewares e resources para a verificação dos corpos das requisições
2. Melhorar o tratamento de erros
3. Implementar um front-end em React

---

## Endpoints
- GET    /api/herois
    + Para listar os heróis
- GET    /api/herois/{id}
    + Para buscar um herói pelo id
- GET    /api/herois/poder/{poder}/{incluirSecundario[y]?}
    + Para listar os heróis por poder (opcional: incluindo o poder secundário)
- POST   /api/herois
    + Para inserir um novo herói
- PUT    /api/herois/{id}
    + Para atualizar um herói pelo id ou inserir um novo
- DELETE /api/herois/{id}
    + Para remover um herói pelo id

---

## Observações
As operações de inserção e atualização até então requerem o envio do objeto completo como JSON no corpo da requisição.<br>
Isso será melhorado/corrigido após a implementação de middlewares e resources.