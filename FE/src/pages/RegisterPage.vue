<template>
  <q-page padding>
    <div class="row justify-center">
      <div class="col-xs-12 col-sm-8 col-md-4">
        <q-input label="Username" v-model="username" type="email" outlined placeholder="Username"></q-input>
        <q-input label="Password" v-model="password" type="password" outlined placeholder="Username"></q-input>
        <q-input label="Confirm Password" v-model="confirmPassword" type="password" outlined
          placeholder="Username"></q-input>
        <q-btn @click="register" color="primary" label="sign up" class="full-width" />
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
    const password = ref(null)
    const confirmPassword = ref(null)

    function register() {
      if (password.value && confirmPassword.value) {
        if (password.value === confirmPassword.value) {
          api.post('/api/register', {
            email: username.value,
            password: password.value
          }).then(res => {
            console.log(res.data);
            if (res.data.status) {
              router.push('/login')
            }
            else {
              q.notify({
                color: 'red',
                position: 'center',
                message: 'could not register'
              })
            }
          })
        } else {
          q.notify({
            color: 'red',
            position: 'center',
            message: 'confirm password does not match'
          })
        }
      } else {
        q.notify({
          color: 'red',
          position: 'center',
          message: "empty inputs"
        })
      }
    }

    return { username, password, confirmPassword, register }
  }
}
</script>
