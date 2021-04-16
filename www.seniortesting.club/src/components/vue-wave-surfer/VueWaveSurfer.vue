<template>
  <div />
</template>

<script>
import WaveSurfer from 'wavesurfer.js'
export default {
  name: 'WaveSurfer',
  props: ['src', 'options'],
  data () {
    return {
      waveSurfer: {}
    }
  },
  mounted () {
    const options = this.options
    const wsOptions = Object.assign({ container: this.$el }, options)
    // eslint-disable-next-line new-cap
    this.waveSurfer = new WaveSurfer.create(wsOptions)
    this.waveSurfer.load(this.src)
  },
  beforeDestroy () {
    this.waveSurfer.destroy()
  }
}
</script>

<style lang="css" scoped>
div {
  position: relative;
}
</style>
