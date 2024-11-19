<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/static/css/films.css">
    <title>Detalhes do Filme</title>
</head>
<body>
    <div class="container">
    <div class="header">
            <a href="/" class="back-button">Voltar</a>
            <h1 id="filmTitle">Título do Filme</h1>
        </div>
        <div class="content">
            <img id="filmImage" src="/public/static/img/default-cover.jpg" alt="Capa do Filme">
            <div class="details">
                <h2>Detalhes</h2>
                <p><strong>Diretor:</strong> <span id="director">Desconhecido</span></p>
                <p><strong>Produção:</strong> <span id="producers">Desconhecida</span></p>
                <p><strong>Data de Lançamento:</strong> <span id="releaseDate">Desconhecida</span></p>

                <div class="synopsis">
                    <h2>Sinopse</h2>
                    <p id="openingCrawl">Sinopse não disponível.</p>
                </div>

                <div class="characters">
                    <h2>Personagens</h2>
                    <ul id="characters"></ul>
                </div>
            </div>
        </div>
    </div>

    <script src="/public/static/js/films.js"></script>
</body>
</html>
