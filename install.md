# Instruções para Rodar o Aplicativo PHP (Windows)

Este documento descreve o processo necessário para rodar o aplicativo PHP localmente em sua máquina. Siga os passos abaixo para configurar o ambiente de desenvolvimento corretamente.

## Requisitos

Antes de começar, você precisará dos seguintes programas instalados em seu computador:

- [XAMPP](https://www.apachefriends.org/pt_br/index.html) - Um pacote que inclui o Apache, MySQL e PHP.
- [Git](https://git-scm.com/) - Para clonar o repositório.

## Passos

### 1. Instalar o XAMPP

1. Baixe e instale o XAMPP a partir do [site oficial](https://www.apachefriends.org/pt_br/index.html).
2. Após a instalação, abra o XAMPP e inicie o Apache e o MySQL.

### 2. Clonar o Repositório

1. Abra o terminal ou o prompt de comando.
2. Clone o repositório utilizando o comando:

```bash
git clone https://github.com/Gabriel-Modina/Teste-L5-Networks
```

3. Navegue até a pasta do repositório clonado:

```bash
cd Teste-L5-Networks
```

### 3. Mover os Arquivos para a Pasta `htdocs`

1. Abra a pasta `Teste-L5-Networks` e copie todos os arquivos dentro dela (sem a pasta em si).
2. Vá até a pasta `htdocs` do XAMPP. A pasta `htdocs` está localizada em:

   - `C:\xampp\htdocs\`

3. Cole os arquivos copiados diretamente dentro da pasta `htdocs`.

4. Após mover os arquivos, o aplicativo estará disponível em:

   ```text
   http://localhost/
   ```

### 4. Configurar o Ambiente

1. Renomeie o arquivo `.env_example` para `.env`:

```bash
mv .env_example .env
```

2. Edite o arquivo `.env` e configure as variáveis de ambiente, como as credenciais do banco de dados (por exemplo, nome de usuário e senha).

### 5. Criar o Banco de Dados

1. Abra o `phpMyAdmin` pelo painel de controle do XAMPP (geralmente acessível em `http://localhost/phpmyadmin`).
2. Crie um novo banco de dados chamado `starwars`.
3. Execute o seguinte SQL para criar a tabela `access_log`:

```sql
CREATE TABLE access_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    request VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT DATETIME
);
```

### 6. Iniciar o Aplicativo

1. Verifique se o Apache e o MySQL estão em execução no painel de controle do XAMPP.
2. Acesse o aplicativo no seu navegador usando o endereço:

   ```text
   http://localhost/
   ```

Isso deve ser o suficiente para rodar o aplicativo PHP em seu ambiente local!

## Problemas Comuns

- **Erro ao acessar a API**: Certifique-se de que o Apache e o MySQL estão em execução e que o arquivo `.env` está configurado corretamente com as credenciais do banco de dados.
- **Erro de conexão com o banco de dados**: Verifique se o banco de dados `starwars` foi criado corretamente e se o MySQL está rodando no XAMPP.