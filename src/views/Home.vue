<template>
  <div class="container">
    <div class="row">
      <div class="col md-6">
        <div class="card exibir-alien mt-3">
          <div class="card-header"></div>

          <div class="card-body bg-alien bg-normal">
            <div class="alien">
              <img v-if="!exibir_lista" @click="mostrarLista()" class="omnitrix-img" src="../assets/imgs/omnitrix.png">
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
            <button @click="ocultarLista()" class="btn btn-secondary mt-2 mb-2">Fechar lista</button>
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

              <div class="cartao-alien">
                <h1>1. Cromático</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/cromatico.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>2. Friagem</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/friagem.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>3. Gosma</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/gosma.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>4. Artrópode</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/artropode.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>5. Enormossauro</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/enormossauro.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>6. Fogo Fátuo</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/fogo-fatuo.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>7. Eco Eco</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/eco-eco.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>8. Arraia a Jato</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/arraia-a-jato.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>9. Macaco Aranha</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/macaco-aranha.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>10. Alien X</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/alien-x.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>11. Bala de Canhão</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/bala-de-canhao.png`)">
                </div>
              </div>
              <div class="cartao-alien">
                <h1>12. Estrela Polar</h1>
                <div class="cartao-alien-img">
                    <img :src="require(`@/assets/imgs/aliens/estrela-polar.png`)">
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

export default {
  name: 'Home',
  components: {

  },

  data() {
    return {
      exibir_lista: false
    }
  },

  methods: {
    mostrarLista() {
      this.exibir_lista = true
    },

    ocultarLista() {
      this.exibir_lista = false
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../scss/home.scss';
</style>