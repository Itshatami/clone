<template>
  <q-page padding>
    <!-- content -->
    <div class="row">
      <div class="col-12 q-gutter-y-sm">
        <q-input label="Title" autofocus v-model="title" rounded outlined></q-input>
        <q-input label="Caption" type="textarea" v-model="caption" rounded outlined></q-input>
        <q-btn @click="createPost" :loading="loading" :disable="loading" label="Create" rounded outline class="full-width"
          icon-right="send" />
      </div>
    </div>
  </q-page>
</template>

<script>
import { useQuasar } from 'quasar';
import { api } from 'src/boot/axios';
import { reactive, toRefs } from 'vue';
import { useRouter } from 'vue-router';

export default {
  // name: 'PageName',
  setup() {
    const q = useQuasar();
    const router = useRouter();
    const props = reactive({
      title: null,
      caption: null,
      loading: false
    })

    function createPost() {
      props.loading = true;
      api.post('api/posts', {
        title: props.title,
        caption: props.caption
      }).then(res => {
        props.loading = false;
        q.notify({
          color: 'info',
          position: 'top',
          message: 'پست با موفقیت ثبت شد',
          icon: 'done_all'
        })
        router.push('/')
        console.log(res.data);
      }).catch(err => {
        props.loading = false;
        console.log(err);
      })
    }

    return { ...toRefs(props), createPost }
  }
}
</script>
