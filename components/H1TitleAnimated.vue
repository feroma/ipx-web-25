<template>
  <h1 class="title-wrapper" ref="titleRef">
    <span
        v-for="(char, index) in title"
        :key="index"
        class="char"
        :style="{ '--char-index': index }"
    >
      {{ char }}
    </span>
  </h1>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'

const props = defineProps({
  title: {
    type: String,
    required: true
  },
  animation: {
    type: String,
    default: 'default',
    validator: (value) => ['default', 'shuffle', 'scale', 'wave'].includes(value)
  },
  options: {
    type: Object,
    default: () => ({})
  }
})

const titleRef = ref(null)

if (process.client) {
  gsap.registerPlugin(ScrollTrigger)
}

let tl

const defaultOptions = {
  duration: 2,
  staggerAmount: 0.05,
  startPosition: 50,
  ease: 'power2.out',
 // startTrigger: 'top center+=100',
  startTrigger: 'top bottom-=100',
  endTrigger: 'bottom center'
}

const getAnimationOptions = () => ({
  ...defaultOptions,
  ...props.options
})

const animations = {
  default: (chars) => {
    const options = getAnimationOptions()

    gsap.set(chars, {
      opacity: 0,
      y: options.startPosition,
      rotateX: -90
    })

    return {
      duration: options.duration,
      opacity: 1,
      y: 0,
      rotateX: 0,
      stagger: options.staggerAmount,
      ease: 'back.out(1.7)'
    }
  },

  shuffle: (chars) => {
    const options = getAnimationOptions()

    chars.forEach((char) => {
      const randomX = (Math.random() - 0.5) * 100
      const randomY = (Math.random() - 0.5) * 100

      gsap.set(char, {
        x: randomX,
        y: randomY,
        opacity: 0,
        rotation: Math.random() * 360
      })
    })

    return {
      duration: options.duration,
      x: 0,
      y: 0,
      opacity: 1,
      rotation: 0,
      stagger: options.staggerAmount,
      ease: 'power4.out'
    }
  },

  scale: (chars) => {
    const options = getAnimationOptions()

    gsap.set(chars, {
      scale: 0,
      opacity: 0
    })

    return {
      duration: options.duration,
      scale: 1,
      opacity: 1,
      stagger: options.staggerAmount,
      ease: 'elastic.out(1, 0.3)'
    }
  },

  wave: (chars) => {
    const options = getAnimationOptions()

    gsap.set(chars, {
      y: options.startPosition,
      opacity: 0
    })

    return {
      duration: options.duration,
      y: 0,
      opacity: 1,
      stagger: {
        each: options.staggerAmount,
        ease: 'sine.inOut'
      },
      ease: options.ease
    }
  }
}

const initAnimation = () => {
  if (!titleRef.value) return

  const chars = titleRef.value.querySelectorAll('.char')
  const options = getAnimationOptions()

  // Ottiene l'animazione selezionata o fallback su default
  const selectedAnimation = animations[props.animation] || animations.default

  // Crea la timeline
  tl = gsap.timeline({
    scrollTrigger: {
      trigger: titleRef.value,
      start: options.startTrigger,
      end: options.endTrigger,
      //markers: true,
      toggleActions: 'play none none reverse'
    }
  })

  // Applica l'animazione
  tl.to(chars, selectedAnimation(chars))
}

const cleanupAnimation = () => {
  if (tl) {
    tl.kill()
  }
  ScrollTrigger.getAll().forEach(trigger => trigger.kill())
}

onMounted(() => {
  if (process.client) {
    setTimeout(initAnimation, 100)
  }
})

onUnmounted(() => {
  if (process.client) {
    cleanupAnimation()
  }
})
</script>

<style scoped>
.title-wrapper {
  perspective: 1000px;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

.char {
  display: inline-block;
  opacity: 0;
  white-space: pre;
  transform-origin: center center;
}
</style>