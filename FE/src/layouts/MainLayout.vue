<template>
  <q-layout view="lHh Lpr lFf">
    <div class="text-center  text-weight-light">
      <h1 class="text-h5">instagram</h1>
    </div>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from 'vue'

export default defineComponent({
  name: 'MainLayout',

  components: {

  },

  setup() {

  }
})
</script>
