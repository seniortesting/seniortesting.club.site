// import config from '@/config'

// const filterRouter = null
// const globalWhiteList = [config.page.loginComponentName, config.page.changePwdComponentName, config.page.error401ComponentName]
// const GetRouterAction = 'sys/user/GetRouter'
// const logoutAction = 'sys/user/logout'
/**
 * 路由拦截
 * @param store
 * @param route
 * @param redirect
 */
export default ({ store, route, redirect }) => {
  // const currentComponentName = route.name
  // if (currentComponentName) {
  //   const token = store.getters.token
  //   if (!globalWhiteList.includes(currentComponentName)) {
  //     // 判断是否有token
  //     if (token) {
  //       if (store.getters.isLock && currentComponentName !== config.page.lockComponentName) {
  //         redirect({ name: config.page.lockComponentName })
  //       } else if (!config.page.ignoreComponentName.includes(currentComponentName)) {
  //         try {
  //           fetchUserMenus(store, route, redirect)
  //         } catch (error) {
  //           console.log(error || 'Data fetch has Error')
  //           store.dispatch(logoutAction).then(() => {
  //             redirect({ name: config.page.loginComponentName, query: { redirect: route.path } }) // 否则全部重定向到登录页
  //           })
  //         }
  //       }
  //     } else if (!globalWhiteList.includes(currentComponentName)) {
  //       redirect({ name: config.page.loginComponentName, query: { redirect: route.path } })
  //     }
  //   } else if (token && currentComponentName === config.page.loginComponentName) {
  //     redirect({ name: config.page.homeComponentName })
  //   }
  // }
}

/**
 * 获取所有的用户对应的路由列表, 路由路径权限控制
 * @param store
 * @param route
 * @param redirect
 */
// const fetchUserMenus = function (store, route, redirect) {
//   const currentComponentName = route.name
//   const routes = store.getters.routes
//   const routeMap = store.getters.routeMap
//   const permissions = store.getters.permissions
//   const allPermission = config.permission.superPermission
//   const ignorePermissionCheck = (permissions && permissions.length > 0 && permissions[0] === allPermission) ||
//     currentComponentName === config.page.homeComponentName
//   // 没有对应的路由信息
//   if (routes.length === 0) {
//     store.dispatch(GetRouterAction).then((routes) => {
//       // 当前路由对应的权限是否与用户的权限
//       if (!ignorePermissionCheck) {
//         const foundPermission = routeMap[currentComponentName]
//         // 如果没有找到当前路由的权限,直接放行访问
//         let hasPermission = false
//         if (foundPermission) {
//           hasPermission = permissions.includes(foundPermission)
//         } else if (foundPermission === '') {
//           hasPermission = true
//         }
//         if (!hasPermission) {
//           redirect({ name: config.page.error401ComponentName, query: { redirect: route.path } }) // 否则全部重定向到401页
//         }
//       }
//     })
//   } else if (!ignorePermissionCheck) {
//     const foundPermission = routeMap[currentComponentName]
//     // 如果没有找到当前路由的权限,直接放行访问
//     let hasPermission = false
//     if (foundPermission) {
//       hasPermission = permissions.includes(foundPermission)
//     } else if (foundPermission === '') {
//       hasPermission = true
//     }
//     if (!hasPermission) {
//       redirect({ name: config.page.error401ComponentName, query: { redirect: route.path } }) // 否则全部重定向到401页
//     }
//   }
// }
/**
 * 过滤对应的路由的名称
 * @param routers
 * @param componentName
 */
// const filterRouterPermission = function (routers, componentName) {
//   for (let i = 0; i < routers.length; i++) {
//     if (routers[i].componentName === componentName) {
//       filterRouter = routers[i]
//       // filterRouter.children = []
//       break
//     }
//     if (routers[i].children) {
//       filterRouterPermission(routers[i].children, componentName)
//     }
//   }
//   return filterRouter
// }
