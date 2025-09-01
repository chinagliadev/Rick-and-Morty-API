const containerRick = document.getElementById('rick-container')
const txtPersonagem = document.getElementById('txtPersonagem')
const btnPesquisar = document.getElementById('btnPesquisar')

const container = document.getElementById('pesquisar-container')


function procurarPersonagem(userID) {
    fetch("https://rickandmortyapi.com/api/character/" + userID)
    return fetch("https://rickandmortyapi.com/api/character/" + userID)
        .then(function (resposta) {
            return resposta.json()
        })
}

async function carregarPersonagens() {
    for (let i = 1; i <= 30; i++) {
        const personagem = await procurarPersonagem(i);
         let idPersonagem = personagem.id

        const coluna = document.createElement('div');
        coluna.className = 'col';

        // coluna.innerHTML = `
        //     <div class="card h-100 shadow-sm">
        //         <div class="card-body text-center">
        //             <img src="${personagem.image}" alt="${personagem.name}" class="personagem-img mb-2 img-fluid rounded">
        //             <h5 class="card-title">${personagem.name}</h5>
        //             <p class="card-text"><strong>Espécie:</strong> ${personagem.species}</p>
        //             <button class="btn btn-success salvar-btn" 
        //                 data-id="${personagem.id}" 
        //                 data-nome="${personagem.name}" 
        //                 data-imagem="${personagem.image}">
        //                 Salvar Personagem
        //             </button>
        //         </div>
        //         <div class="card-footer text-center">
        //             <p class="card-text text-muted"><strong>ID #</strong>${personagem.id}</p>
        //         </div>
        //     </div>
        // `;

                coluna.innerHTML = `
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <img src="${personagem.image}" alt="${personagem.name}" class="personagem-img mb-2 img-fluid rounded">
                    <h5 class="card-title">${personagem.name}</h5>
                    <p class="card-text"><strong>Espécie:</strong> ${personagem.species}</p>
                    <a class="btn btn-success" href="./exibirPersonagem.html?id=${idPersonagem}">Ver mais
                    </a>
                </div>
                <div class="card-footer text-center">
                    <p class="card-text text-muted"><strong>ID #</strong>${personagem.id}</p>
                </div>
            </div>
        `;
        containerRick.appendChild(coluna);
    }

}

async function listarPersonagem() {
            let valorCampo = txtPersonagem.value
            const personagem = await procurarPersonagem(valorCampo)
            let nomePersonagem = personagem.name
            let especiaPersonagem = personagem.species
            let idPersonagem = personagem.id
            let imagemPersonagem = personagem.image


            console.log(nomePersonagem)

            const coluna = document.createElement('div')
            coluna.className = 'd-flex justify-content-center'
            coluna.innerHTML = `
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <img src="${imagemPersonagem}" alt="${nomePersonagem}" class="personagem-img mb-2 img-fluid rounded">
                    <h5 class="card-tile">${nomePersonagem}</h5>
                    <p class="card-text"><strong>Espécie: </strong> ${especiaPersonagem}</p>
                </div>
                <div class="card-footer text-center"> 
                    <p class="card-text text-muted"><strong>Id #</strong>${idPersonagem}</p>
                </div>
            </div>
            `
            container.appendChild(coluna)
            txtPersonagem.value = ""
}


carregarPersonagens()