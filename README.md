## Star Wars Movie Catalog

Este projeto consiste em uma aplicação web que consome a API do Star Wars para exibir um catálogo de filmes da franquia Star Wars, permitindo aos usuários explorar detalhes sobre cada filme de forma interativa.

### Funcionalidades

1. **Catálogo de Filmes**: Exibe todos os filmes da franquia Star Wars ordenados por data de lançamento, mostrando o nome e a data de lançamento de cada um.
2. **Detalhes do Filme**: Ao clicar em um filme, o usuário poderá visualizar informações detalhadas, incluindo:
   - Nome
   - Número do episódio
   - Sinopse
   - Data de lançamento
   - Diretor(a)
   - Produtor(es)
   - Nome dos personagens
3. **Navegação**: O usuário pode navegar entre o catálogo de filmes e a tela de detalhes de forma intuitiva, podendo voltar ao catálogo após visualizar os detalhes de um filme.

### Arquitetura

- **Backend**: Utiliza PHP com cURL para consumir a API do Star Wars e disponibilizar os dados através de endpoints próprios.
- **Frontend**: Construído com HTML, CSS e JavaScript, com requisições para a API local.
- **Banco de Dados**: MySQL para armazenar logs de interações com a API, incluindo:
  - Data/hora da solicitação
  - Tipo de solicitação realizada

### Estrutura de Pastas e Arquivos

A estrutura do projeto está organizada da seguinte forma:

Teste-L5-Networks/
│
├── api/
│   ├── Controllers/
│   │   └── FilmController.php      # Controller para gerenciar filmes, lidando com as requisições relacionadas a filmes, como listagem e detalhes.
│   │
│   └── Services/                   # Pasta para a lógica de consumo de APIs externas
│       ├── Clients
│       │   └── SwapiClient.php      # Cliente HTTP para interagir com APIs externas, realizando as requisições necessárias.
│       └── SwapiService.php         # Serviço responsável pela lógica de consumo da API, processando e formatando os dados recebidos da API.
│
├── app/
│   ├── Controllers/
│   │   └── FilmeController.php     # Controller responsável pela interação entre a lógica de negócios e as views de filmes.
│   │
│   └── Views/
│       ├── films.php               # Página de detalhes de um filme, exibindo informações específicas sobre um filme.
│       └── index.php               # Página principal com o catálogo de filmes, apresentando uma lista de filmes disponíveis.
│
├── public/
│   └── static/
│       ├── css/                    # Arquivos de estilo (CSS) que definem a aparência da aplicação.
│       ├── img/                    # Imagens utilizadas na aplicação, como cartazes de filmes.
│       └── js/                     # Scripts JavaScript para interações no frontend, como navegação e exibição dinâmica.
│          ├── films.js             # Script específico para funcionalidades da página de filmes.
│          └── index.js             # Script específico para funcionalidades da página inicial, como filtragem de filmes.
│
├── .env                            # Arquivo de configuração para variáveis de ambiente, armazenando dados sensíveis e configurações específicas do ambiente.
├── .htaccess                       # Configurações de URL amigável e redirecionamento, garantindo que as URLs sejam legíveis e fáceis de navegar.
├── index.php                       # Arquivo principal que direciona para as rotas configuradas, iniciando o ciclo de vida da aplicação.
├── README.md                       # Documentação do projeto, contendo informações sobre a configuração, uso e detalhes do projeto.
└── routes.php                      # Arquivo que define as rotas da aplicação, direcionando as requisições para os Controllers apropriados.


### Descrição dos Principais Componentes

- **`api/Controllers/`**: Contém os controladores responsáveis por gerenciar as requisições relacionadas aos filmes.
- **`api/Services/`**: Contém a lógica de consumo de APIs externas, centralizando a comunicação com fontes externas.
  - **`Clients/`**: Subpasta que contém os clientes HTTP responsáveis por interagir com as APIs externas.
- **`app/Controllers/`**: Contém os controladores responsáveis por lidar com as requisições.
- **`app/Views/`**: Contém os arquivos de visualização (views) responsáveis pela interface de usuário da aplicação.
- **`public/static/`**: Contém os arquivos estáticos de frontend, incluindo CSS, JavaScript e imagens, essenciais para o layout e interatividade da aplicação.

### Funcionalidades Extras

- 

### Como Rodar o Projeto

### Requisitos

### Instruções de Instalação