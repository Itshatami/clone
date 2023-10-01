<template>
  <q-page padding>
    <!-- content -->
    <div class="row justify-center">
      <div class="col-auto text-center">
        <q-avatar size="80px">
          <q-img src="smile.png" />
        </q-avatar>
        <h4 class="text-h6 q-ma-none">Alireza</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <q-tabs v-model="tab" dense class="text-grey" active-color="primary" indicator-color="primary" align="justify"
          narrow-indicator>
          <q-tab name="posts" label="Posts" />
          <q-tab name="followers" label="Followers" />
          <q-tab name="followings" label="Followings" />
        </q-tabs>

        <q-separator />

        <q-tab-panels v-model="tab" animated>
          <q-tab-panel name="posts" class=" q-gutter-y-md">
            <div class="text-h6">Posts</div>
            <div>You Don't Have Any Post</div>
            <q-btn @click="$router.push('/posts/create')" label="Create Your First Post" class="full-width" rounded outline />
          </q-tab-panel>

          <q-tab-panel name="followers">
            <div class="text-h6">Followers</div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </q-tab-panel>

          <q-tab-panel name="followings">
            <div class="text-h6">Followings</div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </q-tab-panel>
        </q-tab-panels>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  // name: 'PageName',
  setup() {
    const tab = ref('posts')
    return { tab }
  }
}
</script>
