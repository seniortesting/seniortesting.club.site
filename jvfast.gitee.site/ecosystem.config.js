module.exports = {
  apps: [
    {
      name: 'www',
      cwd: './',
      script: './node_modules/nuxt-start/bin/nuxt-start.js',
      env: {
        HOST: '127.0.0.1',
        PORT: 3000,
        NODE_ENV: 'production'
      },
      watch: [
        'dist',
        '.dist',
        '_nuxt'
      ]
    }
  ]
}
