# Teste Prático > SPUN
# Getting Started

## :clipboard: Descrição do desafio
### Tecnologias obrigatórias:
PHP (puro ou framework) / MySQL ou equivalente
Bootstrap 5 para frontend (pode utilizar layout pronto)
Github (versione em um repositório privado)

### O que queremos?
Nesse cenário, considere que temos uma campanha rodando em plataformas de anúncios e que queremos captar e conhecer melhor esses leads que estão chegando, portanto ao clicar no anúncio, o usuário cai em um quiz criado por nós.

Precisamos então de um sistema que crie e gerencie quizzes, assim como os disponibilize para acesso público, onde pessoas poderão acessar e respondê-los.

Nesse cenário a gente também precisa transportar esses leads para uma api de uma ferramenta de automação de marketing. Precisamos então que seja criada a API que simulará essa ferramenta.

## Screenshots

![login](https://raw.githubusercontent.com/kaycklbr/leads-entrevista-spun/main/Screenshot-Login.png)
![login](https://raw.githubusercontent.com/kaycklbr/leads-entrevista-spun/main/Screenshot-Quizz.png)


## :hammer: Instruções para executar o teste

### Comece a instalação clonando este repositório

#### Usando https
```
https://github.com/kaycklbr/leads-entrevista-spun.git
```
ou

#### Usando SSH
```
git@github.com:kaycklbr/leads-entrevista-spun.git
```

### Após o clone configure o banco de dados MySql

Crie um banco de dados chamado **leads_api** e outro chamado **leads_front**

#### Modificações na pasta _api_

Acesse o arquivo **database.php** dentro da pasta **config**, e mude as configurações de **username** e **password** para o seu acesso MySql na sua máquina.

### Prepare o _api_

Execute o seguinte comando em um terminal aberto na pasta **api**

### Criar tabelas
```
php migrate.php
```

#### Modificações na pasta _sistema_leads_

Acesse o arquivo **.env** e mude as configurações **DB_USERNAME** **DB_PASSWORD**  para o seu acesso MySql na sua máquina.

### Prepare o _sistema_leads_

Antes de continuar, certifique-se de possuir o **composer** instalado na sua máquina. [Instale aqui](https://getcomposer.org/doc/00-intro.md)

Execute os seguinte comandos em um terminal aberto na pasta **sistema_leads**

### Instalar dependências do composer
```
composer install
```

### Crie as tabelas
```
php artisan migrate
```


### Agora para cada comando abaixo, execute em um terminal independente


#### Na pasta _api_

Servidor parte 01
```
php -S 127.0.0.1:8001
```

#### Na pasta _sistema-leads_
Servidor parte 02
```
php artisan serve
```
```
php artisan queue:work --queue=leads
```

### Testando

Agora basta ir para _http://localhost:8000_ e fazer os testes, vendo a mágica acontecer! Haha.
