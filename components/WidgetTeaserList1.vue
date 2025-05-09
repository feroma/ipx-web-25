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
  <div class="teaser-list-1">
    <div v-for="(teaser, teaser_count) in content.items"
         :key="'teaser-1-'+teaser_count"
         class="teaser"
         :class="teaser.props.class || ''"
    >


      <div class="teaser-image">
        <svg width="309" height="320" viewBox="0 0 309 320" fill="none" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <mask :id="'myMask_'+teaser_count">
              <rect width="100%" height="100%" fill="black"/>
              <path fill="white" d="M218.853 320H5.99063C2.68058 320 -0.00418842 317.319 -0.00936037 314.009L-0.49061 6.00938C-0.495794 2.69201 2.192 0 5.50937 0L302.512 0C305.821 0 308.506 2.67875 308.512 5.98762L308.974 229.749C308.991 237.721 305.833 245.372 300.199 251.012L240.078 311.201C234.451 316.835 226.815 320 218.853 320Z"/>
            </mask>
          </defs>
          <image

              :href="config.REPO_URL+'/'+teaser.props.image.src"
              width="309"
              height="320"
              :mask="'url(#myMask_'+teaser_count+')'"
          />
        </svg>


<!--        <NuxtImg-->
<!--            v-if="teaser.props.image"-->
<!--            :alt="teaser.props.image.alt"-->
<!--            :src="config.REPO_URL+'/'+teaser.props.image.src"/>-->
      </div>
      <div class="teaser-entry">
        <h4 v-html="teaser.props.title"/>
        <p v-html="teaser.props.html"/>
      </div>

    </div>
  </div>
</template>

<style scoped>

</style>