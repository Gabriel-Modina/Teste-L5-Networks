## Projeto APIService

Este componente de serviço é responsável pela integração com APIs externas, centralizando a lógica de consumo e tratamento de dados. O `ApiService` faz parte da camada de serviço da aplicação, permitindo uma interação mais modular e organizada com fontes de dados externas.

### Estrutura de Pastas e Arquivos

A estrutura do projeto está organizada da seguinte forma:

```
Teste-L5-Networks/
│
├── app/
│   ├── config/
│   │   └── Routes.php              # Configurações de rotas da aplicação
│   │
│   ├── controllers/
│   │   ├── FilmeController.php     # Controller para gerenciar filmes
│   │   └── LogController.php       # Controller para gerenciar logs de interações
│   │
│   ├── logs/
│   │   └── app.log                 # Arquivo de log para armazenar as interações com a API
│   │
│   ├── models/
│   │   ├── FilmeModel.php          # Modelo para acessar dados dos filmes
│   │   └── LogModel.php            # Modelo para registrar logs no banco de dados
│   │
│   ├── services/                   # Pasta para a lógica de consumo de APIs
│   │   ├── ApiClient.php           # Cliente HTTP para interagir com APIs externas
│   │   └── ApiService.php          # Serviço responsável pela lógica de consumo da API
│   │
│   └── sql/
│       └── database.sql            # Dump do banco de dados com a estrutura inicial
│
├── views/
│   ├── filme.php                   # Página de detalhes de um filme
│   └── index.php                   # Página principal com o catálogo de filmes
│
├── public/
│   └── static/
│       ├── css/                    # Arquivos de estilo (CSS)
│       ├── img/                    # Imagens utilizadas na aplicação
│       └── js/                     # Scripts JavaScript para interações no frontend
│
├── .env                            # Arquivo de configuração para variáveis de ambiente
├── .htaccess                       # Configurações de URL amigável e redirecionamento
├── index.php                       # Arquivo principal que direciona para as rotas configuradas
└── README.md                       # Documentação do projeto
```

### Descrição dos Principais Componentes

- **`app/config/Routes.php`**: Define as rotas da aplicação e redireciona as requisições para os controllers correspondentes.
- **`app/controllers/`**: Contém os controladores responsáveis por lidar com as requisições.
- **`app/logs/`**: Armazena o arquivo `app.log`, que registra logs das interações do usuário com a API.
- **`app/models/`**: Contém os modelos que fazem a conexão com a API do Star Wars e o banco de dados.
- **`app/services/`**: Esta pasta contém a lógica de consumo da API, centralizando a comunicação com fontes externas.
- **`app/sql/`**: Contém o arquivo `database.sql`, com a estrutura inicial do banco de dados.
- **`views/`**: Arquivos de visualização que definem a interface do usuário para o catálogo de filmes e os detalhes de cada filme.
- **`public/static/`**: Contém os arquivos estáticos de frontend, incluindo CSS, JavaScript e imagens.