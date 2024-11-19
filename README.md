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
```
Teste-L5-Networks/
│
├── api/
│   ├── cache/                       # Armazena os dados temporários para reduzir o número de requisições à API externa.
│   ├── Config/                      # Contém os arquivos de configuração da API, como configurações de conexão, parâmetros e variáveis globais.
│   ├── Controllers/                 # Contém os controladores responsáveis por gerenciar as requisições HTTP e coordenar as interações com os modelos e as views.
│   ├── Models/                      # Contém os modelos responsáveis pela estrutura de dados, como a manipulação de filmes e interações com o banco de dados.
│   └── Services/                    # Pasta para a lógica de consumo de APIs externas, centralizando a comunicação com fontes externas, como a API do Star Wars.
│       └── Clients/                 # Subpasta que contém os clientes HTTP responsáveis por interagir com as APIs externas.
│
├── app/
│   ├── Controllers/                 # Contém os controladores responsáveis por lidar com as requisições da aplicação, interagindo com as views.
│   └── Views/                       # Contém os arquivos de visualização (views) que geram o conteúdo HTML para ser exibido ao usuário.
│
├── public/
│   └── static/
│       ├── css/                     # Arquivos de estilo (CSS) que definem a aparência e o layout da aplicação.
│       ├── img/                     # Imagens utilizadas na aplicação, como cartazes de filmes, ícones e outros recursos gráficos.
│       └── js/                      # Scripts JavaScript para interações no frontend, como navegação entre telas, carregamento dinâmico de dados e manipulação de eventos.
│
├── .env                             # Arquivo de configuração para variáveis de ambiente, armazenando dados sensíveis (como credenciais) e configurações específicas do ambiente de desenvolvimento.
├── .htaccess                        # Configurações de URL amigável e redirecionamento, garantindo que as URLs sejam legíveis e fáceis de navegar, além de permitir configurações de segurança.
├── index.php                        # Arquivo principal da aplicação, que inicia o ciclo de vida da aplicação e direciona as requisições para as rotas apropriadas.
├── install.md                       # Documento com instruções detalhadas sobre como instalar e configurar o projeto, incluindo dependências e requisitos.
├── README.md                        # Documentação geral do projeto, fornecendo informações sobre a configuração, uso, dependências e objetivos do projeto.
└── routes.php                       # Arquivo que define as rotas da aplicação, determinando como as requisições HTTP serão tratadas pelos controladores.
```

### Descrição dos Principais Componentes

- **`api/cache/`**: Armazena dados temporários que são utilizados para evitar consultas repetidas à API externa, melhorando a performance da aplicação.
- **`api/Config/`**: Contém configurações como credenciais de acesso à API externa, parâmetros de conexão com o banco de dados, e outras variáveis de ambiente que são utilizadas no backend.
- **`api/Controllers/`**: Responsável por gerenciar as requisições HTTP relacionadas aos filmes, redirecionando-as para os serviços apropriados ou renderizando as views.
- **`api/Models/`**: Define as estruturas de dados relacionadas aos filmes e as interações com o banco de dados, como as operações de leitura, inserção e atualização de dados.
- **`api/Services/`**: Implementa a lógica para consumir APIs externas. Aqui, a comunicação com a API do Star Wars e outros serviços externos é centralizada.
  - **`Clients/`**: Contém classes que lidam diretamente com as chamadas HTTP para consumir dados das APIs externas.
- **`app/Controllers/`**: Responsável por coordenar a lógica entre as requisições do frontend e o processamento no backend. Pode incluir autenticação, validação de dados, etc.
- **`app/Views/`**: Contém os arquivos HTML gerados pelo backend, exibindo a interface do usuário e possibilitando a interação com a aplicação.
- **`public/static/`**: Contém todos os recursos de frontend, como arquivos CSS para estilo, JavaScript para comportamento dinâmico e imagens que serão mostradas na interface do usuário.

### Funcionalidades Extras

- **Cache das requisições para a API swapi.dev**: A aplicação implementa um sistema de cache para armazenar as respostas das requisições à API externa (swapi.dev), evitando chamadas repetidas e melhorando a performance, especialmente quando o usuário acessa os mesmos dados múltiplas vezes.


### Como Rodar o Projeto

As instruções detalhadas sobre como rodar o projeto estão no arquivo `install.md`. Este arquivo contém todas as informações necessárias para configurar o ambiente, instalar dependências, configurar o banco de dados e iniciar a aplicação corretamente.