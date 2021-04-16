<template>
  <div>
    <client-only>
      <div v-if="$nuxt.isOffline" class="error">
        <h4>抱歉,你当前网络连接已经断开!</h4>
      </div>
      <nuxt v-else id="app" />
    </client-only>
  </div>
</template>

<style>
  .error {
    text-align: center;
  }
</style>
