# My Microservice Project

Este projeto configura um ambiente de desenvolvimento utilizando Docker, Nginx e PHP-FPM.

## Estrutura do Projeto
```plaintext
my-microservice/
├── docker-compose.yml
├── nginx/
│   └── default.conf
├── php/
│   └── Dockerfile
└── src/
    └── index.php
````
## Pré-requisitos
Docker: Instalar Docker
Docker Compose: Instalar Docker Compose

## Instalação
Clone o repositório:

git clone https://github.com/seu-usuario/my-microservice.git

cd my-microservice

Configure o arquivo docker-compose.yml:

````
version: '3.8'

services:
  nginx:
    image: nginx:latest
    ports:
      - "80:80"
    volumes:
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf
      - ./src:/var/www/html
    depends_on:
      - php

  php:
    build:
      context: ./php
    volumes:
      - ./src:/var/www/html
    expose:
      - "9000"
````

Configure o Nginx: Crie um arquivo default.conf dentro do diretório nginx com o seguinte conteúdo:
````
server {
    listen 80;
    server_name localhost;

    root /var/www/html;
    index index.php index.html;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}

````
Configure o Dockerfile do PHP: Crie um arquivo Dockerfile dentro do diretório php com o seguinte conteúdo:
````
FROM php:7.4-fpm

# Instalar extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Configurar o diretório de trabalho
WORKDIR /var/www/html

# Expor a porta do PHP-FPM
EXPOSE 9000
````

Crie um Script PHP: Crie um arquivo index.php dentro do diretório src com o seguinte conteúdo:
````
<?php
echo "Olá, mundo!";
?>
````

Iniciar os Contêineres
No terminal, navegue até o diretório do seu projeto e execute o comando:

docker-compose up -d

Isso irá construir e iniciar os contêineres definidos no docker-compose.yml.

Testar a Configuração
Abra o navegador e acesse http://localhost. Você deve ver a mensagem "Connected successfully" se tudo estiver configurado corretamente.

