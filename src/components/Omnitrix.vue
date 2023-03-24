<template>
    <div class="col md-6">
        <div class="card exibir-alien mt-3">
            <div class="card-header"></div>

            <div class="card-body bg-alien bg-normal">
                <div class="alien">
                    <transition appear enter-active-class="animate__animated animate__fadeIn"
                        leave-active-class="animate__animated animate__fadeOut">
                        <img v-if="!exibir_lista" @click="mostrarLista()" class="omnitrix-img"
                            src="../assets/imgs/omnitrix.png">
                    </transition>
                    <transition enter-active-class="animate__animated animate__fadeInRight"
                        leave-active-class="animate__animated animate__fadeOutLeft">
                        <img v-if="exibir_alien && exibir_lista" @click="mostrarLista()"
                            :src="require(`@/assets/imgs/aliens/${lista_aliens.imagem}`)">
                    </transition>
                </div>
            </div>

            <div class="card-footer">

                <div class="botao-transformar">
                    <button v-if="!transformar & exibir_lista & exibir_alien" class="btn btn-success float-end"
                        @click="transformarAlien()">Transformar</button>
                    <button v-if="transformar & exibir_lista & exibir_alien" class="btn btn-danger float-end"
                        @click="transformarAlien()">Destransformar</button>
                </div>

            </div>
        </div>
    </div>
    <transition enter-active-class="animate__animated animate__fadeInDown"
        leave-active-class="animate__animated animate__fadeOutUp">
        <div v-if="exibir_lista == true" class="col-md-6 alien">
            <div class="row">
                <div class="col-md-6">
                    <h1>Lista de Aliens</h1>
                </div>
                <div class="col-md-6">
                    <button @click="mostrarLista()" class="btn btn-secondary mt-2 mb-2">Fechar lista</button>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <select class="form-select" v-model="ordenar_aliens">
                        <option value="" disabled>Ordenar Aliens</option>
                        <option value="1">Id crescente</option>
                        <option value="2">Id decrescrente</option>
                        <option value="3">De A - Z</option>
                        <option value="4">De Z - A</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="alien-catalogo">


                    <!-- início listagem dinâmica -->

                    <transition-group name="ordenar_aliens">
                        <h1 v-if="transformar" class="text-success text-center p-3">Transformado em {{ lista_aliens.nome }}
                        </h1>
                        <div v-for="alien in aliens" @click="mostrarAlien(alien)" :key="alien.id" :value="alien.id"
                            class="cartao-alien mx-auto">
                            <h1>{{ alien.id }}. {{ alien.nome }}</h1>
                            <div class="cartao-alien-img">
                                <transition appear enter-active-class="animate__animated animate__flipInX">
                                    <img :src="require(`@/assets/imgs/aliens/${alien.imagem}`)">
                                </transition>
                            </div>
                        </div>
                    </transition-group>

                    <!-- fim listagem dinâmica -->


                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import axios from 'axios'
export default {

    name: 'Omnitrix',

    data() {
        return {
            exibir_lista: false,
            exibir_alien: false,
            aliens: [],
            ordenar_aliens: '',
            transformar: false,
            lista_aliens: {
                nome: '',
                imagem: ''
            }
        }
    },

    watch: {

        ordenar_aliens(valor) {
            if (valor == 1) { // ordenação por ID crescente
                this.aliens.sort((proximo, atual) => {
                    return proximo.id - atual.id;
                });
            }

            if (valor == 2) { // ordenação por ID decrescente
                this.aliens.sort((proximo, atual) => {
                    return atual.id - proximo.id;
                });
            }

            if (valor == 3) { //ordenação de A - Z
                this.aliens.sort((proximo, atual) => {
                    //1 caso a ordem esteja correta
                    if (atual.nome < proximo.nome) {
                        return 1
                    }

                    //-1 caso a ordem seja errada (necessário inverter as posições)
                    if (atual.nome > proximo.nome) {
                        return -1
                    }

                    //0 caso nenhuma ação seja necessária
                    return 0
                })
            }

            if (valor == 4) { //ordenação de Z - A
                this.aliens.sort((proximo, atual) => {

                    return atual.nome.localeCompare(proximo.nome)
                })
            }
        }

    },

    created() {
        this.getAliens()
    },

    methods: {
        getAliens() {
            axios.get('http://localhost/Projetos/app_omnitrix/src/backend/aliens.php')
                .then((res) => {
                    if (res.data.error) {
                        this.mensagem_erro = res.data.mensagem
                    }
                    else {
                        this.aliens = res.data.aliens
                    }
                })
        },

        mostrarLista() {
            this.exibir_lista = !this.exibir_lista
        },

        mostrarAlien(alien) {
            //se o alien exibido na tela é diferente do alien clicado
            //se o atributo exibir_alien for true
            if ((this.lista_aliens.id != alien.id) && this.exibir_alien) {
                setTimeout(() => {
                    this.mostrarAlien(alien)
                }, 500)
            }
            this.lista_aliens = alien
            this.exibir_alien = !this.exibir_alien
        },

        transformarAlien() {
            this.transformar = !this.transformar

            if (!this.transformar) {
                this.exibir_lista = false
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../scss/omnitrix.scss';
</style>