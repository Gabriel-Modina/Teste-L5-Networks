// Função para obter os dados de uma URL
function fetchData(url) {
    return fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro na requisição: ${response.status}`);
            }
            return response.json();
        })
        .catch(error => {
            console.error(`Erro ao carregar dados de ${url}:`, error);
            return null;
        });
}

// Cria e retorna o item de lista do filme
function createFilmListItem(film) {
    const listItem = document.createElement('li');
    
    let filmDetailUrl = film.url.replace('https://swapi.dev/api/films/', '').replace('/', '');
    
    if (isNaN(parseInt(filmDetailUrl, 10))) {
        console.error(`URL inválida: ${film.url}`);
        filmDetailUrl = 'unknown';
    }

    listItem.innerHTML = `
        <h2>${film.title}</h2>
        <p><strong>Diretor:</strong> ${film.director}</p>
        <p><strong>Produtor:</strong> ${film.producer}</p>
        <p><strong>Data de Lançamento:</strong> ${new Date(film.release_date).toLocaleDateString()}</p>
        <p><a href="/films/${filmDetailUrl}">Ver detalhes</a></p>
    `;
    
    return listItem;
}

// Exibe os filmes na página
function displayFilms(films) {
    const filmList = document.getElementById('filmList');
    filmList.innerHTML = '';

    films.forEach(film => {
        const listItem = createFilmListItem(film);
        filmList.appendChild(listItem);
    });
}

// Carrega os filmes
function loadFilms() {
    fetchData('/api/films/')
        .then(data => {
            if (!data) {
                throw new Error('Dados de filmes não encontrados');
            }
            displayFilms(data);
        })
        .catch(error => {
            console.error('Erro ao carregar filmes:', error);
            const filmList = document.getElementById('filmList');
            filmList.innerHTML = '<li>Não foi possível carregar os filmes. Tente novamente mais tarde.</li>';
        });
}

document.addEventListener('DOMContentLoaded', loadFilms);
