<template>
  <q-page padding>
    <!-- content -->
    <div class="row">
      <div class="col-12 q-gutter-y-sm">
        <q-input label="Title" autofocus v-model="title" rounded outlined></q-input>
        <q-input label="Caption" type="textarea" v-model="caption" rounded outlined></q-input>
        <q-btn @click="createPost" label="Create" rounded outline class="full-width" icon-right="send" />
      </div>
    </div>
  </q-page>
</template>

<script>
import { api } from 'src/boot/axios';
import { reactive, toRefs } from 'vue';

export default {
  // name: 'PageName',
  setup() {
    const props = reactive({
      title: null,
      caption: null
    })

    function createPost() {
      api.post('api/posts', {
        title: props.title,
        caption: props.caption
      }).then(res => {
        console.log(res.data);
      })
    }

    return { ...toRefs(props), createPost }
  }
}
</script>
