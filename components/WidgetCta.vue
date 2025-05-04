<template>
  <a
      :href="href"
      :class="['cta-button']"
      @click="handleClick"
      :target="isExternalLink ? '_blank' : null"
      :rel="isExternalLink ? 'noopener noreferrer' : null"

  >

    <span class="label" v-html="filteredHtml"></span>

    <svg v-if="isAnchorLink"
        viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M24.1716 46H12C10.8954 46 10 45.1046 10 44V4C10 2.89543 10.8954 2 12 2H35C36.1046 2 37 2.89543 37 4V33.1716C37 33.702 36.7893 34.2107 36.4142 34.5858L25.5858 45.4142C25.2107 45.7893 24.702 46 24.1716 46Z"/>
      <path d="M23 20.5V40L30 33" stroke-linecap="round"/>
    </svg>

  </a>

</template>

<script>
export default {
  name: 'CallToAction',
  props: {
    content: {
      type: Object,
      required: true
    },
  },
  computed: {
    href(){
      return this.content.href;
    },

    filteredHtml(){
      return this.content.html
    },
    isExternalLink() {
      return this.href && !this.href.startsWith('#') && !this.href.startsWith('/');
    },
    isAnchorLink() {
      return this.href && this.href.startsWith('#');
    }
  },
  methods: {
    handleClick(event) {
      // Gestisce lo scroll fluido per le ancore
      if (this.isAnchorLink) {
        event.preventDefault();
        const targetId = this.href.substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });

          // Aggiorna l'URL con l'ancora senza ricaricare la pagina
          history.pushState(null, null, this.href);
        }
      }
    }
  }
}
</script>

<style scoped>

</style>