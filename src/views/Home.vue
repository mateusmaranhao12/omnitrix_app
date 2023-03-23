<template>
  <div class="container">
    <div class="row">
      <div class="col md-6">
        <div class="card exibir-alien mt-3">
          <div class="card-header"></div>

          <div class="card-body bg-alien bg-normal">
            <div class="alien">
              <img v-if="!exibir_lista" @click="mostrarLista()" class="omnitrix-img" src="../assets/imgs/omnitrix.png">
              <transition 
                enter-active-class="animate__animated animate__fadeInRight"
                leave-active-class="animate__animated animate__fadeOutLeft"
              >
                <img v-if="exibir_alien" @click="mostrarLista()" :src="require(`@/assets/imgs/aliens/${lista_aliens.imagem}`)">
              </transition>
            </div>
          </div>

          <div class="card-footer">

            <div class="botao-transformar">
              <button class="btn btn-success float-end">Transformar</button>
            </div>

          </div>
        </div>
      </div>
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
            <select class="form-select">
              <option value="" disabled>Ordenar Aliens</option>
              <option value="1">Id crescente</option>
              <option value="2">Id decrescrente</option>
              <option value="3">De A - Z</option>
              <option value="4">De Z - A</option>
            </select>
          </div>

          <div class="col">
            <input type="text" class="form-control" placeholder="Pesquisar Alien (watch)">
          </div>
        </div>

        <div class="row">
          <div class="alien-catalogo">


            <!-- início listagem dinâmica -->

            <div v-for="alien in aliens" @click="mostrarAlien(alien)" :key="alien.id" :value="alien.id" class="cartao-alien">
              <h1>{{ alien.id }}. {{ alien.nome }}</h1>
              <div class="cartao-alien-img">
                <img :src="require(`@/assets/imgs/aliens/${alien.imagem}`)">
              </div>
            </div>

            <!-- fim listagem dinâmica -->


          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from 'axios'
export default {
  name: 'Home',
  components: {

  },

  data() {
    return {
      exibir_lista: false,
      exibir_alien: false,
      aliens: [],
      lista_aliens: {
        nome: '',
        imagem: ''
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
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../scss/home.scss';
</style>