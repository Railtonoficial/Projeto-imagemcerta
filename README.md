# ImagemCerta

## Sobre o Projeto

ImagemCerta é uma aplicação web desenvolvida com o objetivo de gerenciar e aprovar imagens enviadas por usuários. Com um foco em usabilidade e escalabilidade, o projeto utiliza tecnologias modernas e padrões de mercado para garantir uma experiência fluida e segura.

## Funcionalidades

- Cadastro e autenticação de usuários utilizando **Laravel Breeze**.
- Envio de imagens com título e descrição.
- Visualização de imagens em uma galeria responsiva.
- Aprovação ou rejeição de imagens por administradores.
- Exclusão de imagens indesejadas.
- Modal para visualização ampliada das fotos.
- Feedback visual em ações como envio e avaliação de fotos.

## Tecnologias Utilizadas

### Back-end
- **PHP 8.0**
- **Laravel** (Framework principal)
- **Laravel Breeze** (Sistema de autenticação)
- **MySQL 5.7** (Banco de dados)
- **Docker** (Gerenciamento do ambiente de desenvolvimento)

### Front-end
- **Bootstrap 5** (Estilização e responsividade)
- **Font Awesome** (Ícones)
- **HTML5/CSS3** (Estrutura e personalização)

## Estrutura do Projeto

- **`routes/web.php`**: Define as rotas principais, como envio, avaliação e exclusão de fotos.
- **`app/Http/Controllers`**: Contém os controladores responsáveis pela lógica de envio, aprovação e exibição de fotos.
- **`resources/views`**: Abriga as views Blade para renderizar a interface do usuário.
- **`public/storage`**: Diretório onde as imagens enviadas são armazenadas.

## Como Executar o Projeto Usando Docker

Siga os passos abaixo para configurar e rodar o projeto:

### 1. Pré-requisitos

1.Clone o repositório:
    `bash`
    
    git clone https://github.com/railtonoficial/imagemcerta.git
    
    cd imagemcerta 
   
Certifique-se de que os seguintes softwares estão instalados em sua máquina:
- **Docker**
- **Docker Compose**

No diretório raiz do projeto, execute o seguinte comando para subir os containers:
- **docker-compose up -d**

Após subir os containers, execute os comandos abaixo para instalar as dependências do Laravel e configurar o ambiente:
- **docker exec -it app-container-name composer install**
- **docker exec -it app-container-name php artisan migrate**
- **docker exec -it app-container-name php artisan storage:link**
