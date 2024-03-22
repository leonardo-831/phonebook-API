<b>Como iniciar a aplicação (Docker necessário)</b><br>
clone o repositório: https://github.com/leonardo-831/phonebook-API.git<br>
1 - git clone https://github.com/leonardo-831/phonebook-API.git<br> 
2 - cd phonebook-API<br>
3 - composer install<br>
4 - sail up -d<br>
5 - faça uma cópia do arquivo .env.example e renomeie para .env<br>
6 - crie o seu Banco de Dados<br>
7 - no .env, coloque:<br>
DB_CONNECTION=mysql<br>
DB_PORT=3306<br>
DB_HOST=db(serviço do mysql na docker-compose)<br>
DB_DATABASE=seuBancodeDados<br>
DB_USERNAME=seuUsername<br>
DB_PASSWORD=suaSenha<br>
8 - sail artisan key:generate<br>
9 - crie as tabelas rodando: sail artisan migrate<br>
14- Acesse localhost:8000/api/documentation<br>
