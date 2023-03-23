<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div v-if="mensagem_sucesso" class="alert alert-success text-center mt-3" role="alert">
                    {{ this.mensagem_sucesso }}
                </div>
                <h1 class="text-center mt-3">Adicionar Alien</h1>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input v-model="lista_aliens.nome" type="text" placeholder="Nome do alien" ref="nome"
                        class="form-control" name="nome" />
                    <span v-if="!lista_aliens.nome" class="text-danger">{{ erro_nome }}</span>
                </div>
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem do Alienígena</label>
                    <input class="form-control" @change="selecionarArquivo" type="file" ref="imagem" id="imagem">
                    <span class="text-danger">{{ erro_imagem }}</span>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success float-end" @click="adicionarAlien()">Adicionar Alien</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios'
export default {
    name: 'AdicionarAlien',

    data() {
        return {
            mensagem_sucesso: '',
            erro_nome: '',
            erro_imagem: '',
            aliens: [],
            lista_aliens: {
                nome: '',
                imagem: ''
            }
        }
    },

    methods: {
        selecionarArquivo(event) {
            this.lista_aliens.imagem = event.target.files[0].name
        },

        adicionarAlien() {
            var adicionar_alien = this.toFormData(this.lista_aliens)
            axios.post(
                'http://localhost/Projetos/app_omnitrix/src/backend/aliens.php?acao=adicionar_alien', adicionar_alien
            ).then((res) => {
                if (res.data.nome) {
                    this.erro_nome = res.data.mensagem_erro
                } else if (res.data.imagem) {
                    this.erro_imagem = res.data.mensagem_erro
                } else {
                    this.mensagem_sucesso = res.data.mensagem_sucesso
                    setTimeout(() => {
                        this.mensagem_sucesso = ''
                    }, 3000)
                    this.erro_nome = ''
                    this.erro_imagem = ''
                    this.limparFormulario()
                }
            })
        },

        limparFormulario() {
            this.lista_aliens.nome = '',
            this.$refs.imagem.value = ''
        },

        toFormData(obj) {
            var liveFormData = new FormData();
            for (var key in obj) {
                liveFormData.append(key, obj[key])
            }
            return liveFormData
        },
    }
}

</script>