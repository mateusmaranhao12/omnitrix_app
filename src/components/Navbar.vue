<template>
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <router-link to="/" class="nav-link">Home</router-link>
        </li>
        <li class="nav-item">
            <router-link to="/adicionar-alien" class="nav-link" >Adicionar Alien</router-link>
        </li>
    </ul>
</template>

<script>

export default {
  name: 'Navbar',

  data() {
    return {
        isActive: true
    }
  }
}
</script>


<style lang="scss" scoped>
    @import '../scss/navbar.scss';
</style>