<script setup>
const props = defineProps({
  content: {
    type: Object,
    required: true
  }
})
const {config} = useAppState()
</script>

<template>
  <div class="teaser-list-4">
    <div v-for="(teaser, teaser_count) in content.items"
    :key="'teaser-4-'+teaser_count"
         class="teaser"
         :class="teaser.props.class || ''"
    >
      <div class="teaser-image">
        <svg width="310" height="215" viewBox="0 0 310 215" fill="none" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <mask :id="'myMask_t4_'+teaser_count">
              <rect width="100%" height="100%" fill="black"/>
              <path fill="white" d="M219.353 215L6.48606 215C3.1778 215 0.493773 212.322 0.486079 209.014L0.013986 6.01395C0.00626699 2.6948 2.69482 0 6.01398 0L303.022 0C306.327 0 309.01 2.67298 309.022 5.97813L309.455 124.721C309.484 132.709 306.325 140.38 300.68 146.032L240.578 206.201C234.951 211.834 227.315 215 219.353 215Z"/>
            </mask>
          </defs>
          <image
              :href="config.REPO_URL+'/'+teaser.props.image"
              width="310"
              height="215"
              :mask="'url(#myMask_t4_'+teaser_count+')'"
          />
         </svg>
      </div>
      <div class="teaser-header">
        <h3 v-html="teaser.props.title"/>
      </div>



    </div>
  </div>
</template>

<style scoped>

</style>