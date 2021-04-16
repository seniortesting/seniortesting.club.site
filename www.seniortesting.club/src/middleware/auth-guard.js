// 采用uninversal模式将不会被渲染，因为这个是client端的路由变化触发
// 所有对于universal模式需要在对应的layout中添加watch: {}
// const loginComponentName = 'login'
// const matchedRoutePrefix = 'console'
export default ({ $auth, store, route, redirect }) => {
  // const currentComponentName = route.name
  // const loginUserInfo = store.getters.loginUserInfo
  // // // 后台页面未登录
  // if (currentComponentName.includes(matchedRoutePrefix)) {
  //   if (!loginUserInfo.id) {
  //     console.log('login: ', loginUserInfo)
  //     redirect({ name: loginComponentName, query: { redirect: route.path } })
  //   }
  // } else if (currentComponentName === loginComponentName && loginUserInfo.id) {
  //   redirect({ name: matchedRoutePrefix })
  // }
}
