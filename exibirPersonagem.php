<?php include './template/header.php'?>

    <h1 class="text-center">Exibir personagem</h1>
    <section id="pesquisar-container" class="container py-5">
        <div class="d-flex justify-content-center mb-4">
            <div class="d-flex w-100 justify-content-center flex-column  gap-3" style="max-width: 600px;">
                <div id="personagem-container" class="d-flex d-flex justify-content-center" style="min-height: 60vh;">
                </div>
                <div id="alerta-mensagem">
                    
                </div>
            </div>
        </div>
    </section>
<script>
    const mensagem = document.getElementById('alerta-mensagem');

    function procurarPersonagem(userID) {
        return fetch("https://rickandmortyapi.com/api/character/" + userID)
            .then(resposta => resposta.json());
    }

    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");

    async function carregarPersonagem(id) {
        const personagem = await procurarPersonagem(id);

        const container = document.getElementById("personagem-container");
        container.innerHTML = `
            <div class="card shadow p-2" style="width: 20rem;">
                <img src="${personagem.image}" class="card-img-top rounded" alt="${personagem.name}">
                <div class="card-body text-center">
                    <h5 class="card-title">${personagem.name}</h5>
                    <p class="card-text"><strong>Espécie:</strong> ${personagem.species}</p>
                    <button class="btn btn-success salvar-btn" 
                        data-id="${personagem.id}" 
                        data-nome="${personagem.name}" 
                        data-imagem="${personagem.image}">
                        Salvar Personagem
                    </button>
                </div>
            </div>
        `;

        const btn = document.querySelector(".salvar-btn");

        btn.addEventListener("click", async function () {
            const personagem = {
                id: this.dataset.id,
                nome: this.dataset.nome,
                imagem: this.dataset.imagem
            };

            try {
                const resposta = await fetch('./salvarPersonagem.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(personagem)
                });

                const resultado = await resposta.text();

                mensagem.innerHTML = `
                    <div class="alert alert-${resposta.ok ? 'success' : 'danger'}" role="alert">
                        ${resultado}
                    </div>
                `;
                

                    btn.textContent = "Salvo!";
                    btn.classList.remove("btn-success");
                    btn.classList.add("btn-secondary");
                    btn.disabled = true;

            } catch (erro) {
                mensagem.innerHTML = `
                    <div class="alert alert-danger" role="alert">
                        Erro ao salvar personagem. Tente novamente.
                    </div>
                `;
            }
        });
    }

    if (id) {
        carregarPersonagem(id);
    } else {
        const container = document.getElementById("personagem-container");
        container.innerHTML = `
            <div class="alert alert-warning" role="alert">
                Nenhum ID de personagem foi fornecido.
            </div>
        `;
    }
</script>


</body>

</html>