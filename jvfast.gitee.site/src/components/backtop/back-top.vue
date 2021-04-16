<template>
  <transition name="animate fadeIn">
    <div
      v-if="visible"
      class="bottomtotop"
      :style="{
        'right': styleRight,
        'bottom': styleBottom
      }"
      @click.stop="handleClick"
    >
      <i class="fa fa-chevron-right" />
    </div>
  </transition>
</template>

<script>
import throttle from 'throttle-debounce/throttle'
const cubic = value => value ** 3
const easeInOutCubic = value => value < 0.5
  ? cubic(value * 2) / 2
  : 1 - cubic((1 - value) * 2) / 2
export default {
  name: 'BackToTop',
  props: {
    visibilityHeight: {
      type: Number,
      default: 200
    },
    target: {
      type: String,
      default: ''
    },
    right: {
      type: Number,
      default: 40
    },
    bottom: {
      type: Number,
      default: 40
    }
  },
  data () {
    return {
      el: null,
      container: null,
      visible: false
    }
  },
  computed: {
    styleBottom () {
      return `${this.bottom}px`
    },
    styleRight () {
      return `${this.right}px`
    }
  },
  mounted () {
    this.init()
    this.throttledScrollHandler = throttle(300, this.onScroll)
    this.container.addEventListener('scroll', this.throttledScrollHandler)
  },
  beforeDestroy () {
    this.container.removeEventListener('scroll', this.throttledScrollHandler)
  },
  methods: {
    init () {
      this.container = document
      this.el = document.documentElement
      if (this.target) {
        this.el = document.querySelector(this.target)
        if (!this.el) {
          throw new Error(`target is not existed: ${this.target}`)
        }
        this.container = this.el
      }
    },
    onScroll () {
      const scrollTop = this.el.scrollTop
      this.visible = scrollTop >= this.visibilityHeight
    },
    handleClick (e) {
      this.scrollToTop()
      this.$emit('click', e)
    },
    scrollToTop () {
      const el = this.el
      const beginTime = Date.now()
      const beginValue = el.scrollTop
      const rAF = window.requestAnimationFrame || (func => setTimeout(func, 16))
      const frameFunc = () => {
        const progress = (Date.now() - beginTime) / 500
        if (progress < 1) {
          el.scrollTop = beginValue * (1 - easeInOutCubic(progress))
          rAF(frameFunc)
        } else {
          el.scrollTop = 0
        }
      }
      rAF(frameFunc)
    }
  }
}
</script>

<style scoped>
  /* bottomtotop Css */
  .bottomtotop i {
    width: 50px;
    height: 50px;
    line-height: 50px;
    position: fixed;
    font-size: 14px;
    text-align: center;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    -webkit-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    transform: rotate(-90deg);
    bottom: 15px;
    right: 15px;
    -webkit-box-shadow: 0px 0px 21px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 0px 21px 0px rgba(0, 0, 0, 0.2);
    z-index: 999;
    background: #5e00d9;
  }

</style>
