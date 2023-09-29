<template>
  <q-page padding>
    <div class="row justify-center">
      <div class="col-xs-12 col-sm-8 col-md-4">
        <q-input label="Username" v-model="username" type="email" outlined placeholder="Username" ref="usernameRef"
          :rules="[val => !!val || 'Field is required']"></q-input>
        <q-input label="Password" v-model="password" type="password" outlined placeholder="Password" ref="passwordRef"
          :rules="[val => !!val || 'Field is required']"></q-input>
        <q-btn @click="login" color="primary" label="login" class="full-width" />
      </div>
    </div>
  </q-page>
</template>

<script>
import { api } from 'src/boot/axios';
import { ref } from 'vue';
import { useQuasar } from "quasar";
import { useRouter } from "vue-router";

export default {
  // name: 'PageName',
  setup() {
    const q = useQuasar();
    const router = useRouter();
    const username = ref(null)
    const usernameRef = ref('')
    const password = ref(null)
    const passwordRef = ref('')


    function login() {
      usernameRef.value.validate();
      passwordRef.value.validate();
      if (usernameRef.value.hasError || passwordRef.value.hasError) {
       q.notify({
        color:'red',
        position:'center',
        message:'invalid inputs'
       })
      }else{
        api.post('oauth/token' , {
          
        })
      }
    }

    return { username, usernameRef, password, passwordRef, login }
  }
}
</script>
