<?php include './template/header.php'?>

    <section id="pesquisar-container" class="container py-5">
        <div class="d-flex justify-content-center mb-4">
            <div class="d-flex w-100" style="max-width: 600px;">
                <input id="txtPersonagem" type="text" class="form-control me-2" placeholder="Buscar personagem...">
                <button id="btnPesquisar" class="btn btn-primary" onclick="javascript:listarPersonagem()">Pesquisar</button>
            </div>
        </div>
    </section>


    <script src="./script.js">
    </script>
</body>

</html>