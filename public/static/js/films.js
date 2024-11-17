// Obtém os dados de uma URL
function fetchData(url) {
    return fetch(url)
        .then(response => response.json())
        .catch(error => {
            console.error(`Erro ao carregar dados de ${url}:`, error);
            return null;
        });
}

// Atualiza o conteúdo de um elemento
function updateElementContent(elementId, content) {
    const element = document.getElementById(elementId);
    if (element) {
        element.textContent = content;
    }
}

// Carrega os detalhes do filme
function loadFilmDetails(filmId) {
    fetchData(`/api/films/${filmId}`).then(film => {
        if (!film) return;

        updateElementContent('filmTitle', film.title);
        updateElementContent('episodeId', film.episode_id);
        updateElementContent('openingCrawl', film.opening_crawl);
        updateElementContent('releaseDate', film.release_date);
        updateElementContent('director', film.director);
        updateElementContent('producers', film.producer);

        loadCharacters(film.characters);
    }).catch(error => console.error('Erro ao carregar detalhes do filme:', error));
}

// Carrega e exibe os personagens
function loadCharacters(characterUrls) {
    const charactersList = document.getElementById('characters');
    if (!charactersList) return;

    const localUrls = characterUrls.map(url => url.replace('https://swapi.dev/api/people/', '/api/people/'));

    const characterPromises = localUrls.map(url => fetchData(url).then(character => character?.name));
    
    Promise.all(characterPromises).then(characterNames => {
        characterNames.forEach(name => {
            if (name) {
                const listItem = document.createElement('li');
                listItem.textContent = name;
                charactersList.appendChild(listItem);
            }
        });
    }).catch(error => console.error('Erro ao carregar personagens:', error));
}

// Obtm o ID do filme da URL
function getFilmIdFromUrl() {
    const urlParams = new URLSearchParams(window.location.search);
    return window.location.pathname.split('/').pop();
}

document.addEventListener('DOMContentLoaded', function() {
    const filmId = getFilmIdFromUrl();
    loadFilmDetails(filmId);
});
