<script setup>
import {ref} from 'vue'

const props = defineProps({
  content: {
    type: Object,
    required: true
  },
  initialActiveIndex: {
    type: Number,
    default: 0
  }
})
// Stato reattivo per il tab attivo
const activeTabIndex = ref(props.initialActiveIndex)
</script>

<template>
  <div class="v-tabs-1">
    <div class="row">
      <!--      ///////////////////////LIST-->
      <div class="col-md-5 offset-md-1">
        <widget-pretitle v-if="content.pretitle" :content="content.pretitle.props"></widget-pretitle>
        <widget-main-title v-if="content.title" :content="content.title.props"></widget-main-title>
        <!--      /////////list-->
        <div class="v-tabs-items-list">
          <ul>
            <li v-for="(item, index) in content.items"
                :key="index"
                @click="activeTabIndex = index"
                :class="{ 'active': activeTabIndex === index }"
            >
              <span v-html="item.props.title"/>
            </li>
          </ul>
        </div>
        <!--      /////////-->

      </div>
      <!--      ///////////////////////CONTENT-->
      <div class="col-md-6">
        <div  class="v-tabs-items-content">
        <!--      //////////item-->

        <div
            v-for="(item, index) in content.items"
            :key="index"
            v-show="activeTabIndex === index"
            class="content-panel"
            :class="{ 'active': activeTabIndex === index }"
        >

            <h1>{{ index }}</h1>
            <svg width="852" height="735" viewBox="0 0 852 735" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M626.953 735L6 735C2.68629 735 0 732.314 0 729L0 6C0 2.68629 2.68627 0 5.99998 0L846 0C849.314 0 852 2.6863 852 6L852 509.729C852 517.68 848.844 525.305 843.225 530.93L648.179 726.201C642.552 731.835 634.916 735 626.953 735Z"/>
            </svg>
          </div>

        <!--      ////// /item-->
      </div>

      </div>
      <!--      ///////////////////////-->
    </div>
  </div>

</template>

<style scoped>

</style>