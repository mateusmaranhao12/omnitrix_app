<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center mt-3">Adicionar Alien</h1>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" placeholder="Nome do alien" ref="nome" class="form-control" name="nome" />
                </div>
                <div class="mb-3">
                    <label for="imagemAlien" class="form-label">Imagem do Alienígena</label>
                    <input class="form-control" type="file" id="imagemAlien">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success float-end">Adicionar Alien</button>
                </div>
            </div>
        </div>
    </div>
</template>