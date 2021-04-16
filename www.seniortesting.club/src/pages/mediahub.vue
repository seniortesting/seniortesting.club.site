<template>
  <el-container class="page-container">
    <el-header class="top-header">
      <el-row>
        <el-col class="menu-area" :xl="24" :sm="24" :md="24" :lg="24">
          <a href="/mediahub">{{ title }}</a>
          <el-menu
            mode="horizontal"
            :default-active="menuActiveIndex"
            :background-color="menuBackgroundColor"
            :text-color="menuTextColor"
            :active-text-color="menuActiveColor"
            :router="true"
            @select="handleSelect"
            @open="handleSubMenuOpen"
          >
            <el-menu-item index="home" :route="{name: 'mediahub'}">
              首页
            </el-menu-item>
            <el-menu-item index="mediahub-publish" :route="{name: 'mediahub-publish'}">
              发布
            </el-menu-item>
            <el-menu-item index="mediahub-tags" :route="{name: 'mediahub-tags'}">
              标签云
            </el-menu-item>
            <!--            <el-submenu index="mediahub" popper-append-to-body class="el-submenu_wrapper">-->
            <!--              <template slot="title">-->
            <!--                媒体库-->
            <!--              </template>-->
            <!--              <el-menu-item index="mediahub-category" :route="{name: 'mediahub-tags'}">-->
            <!--                标签-->
            <!--              </el-menu-item>-->
            <!--            </el-submenu>-->
            <!--            &lt;!&ndash;            <el-menu-item index="notification" :route="{name: 'console-notification'}">&ndash;&gt;-->
            <!--            &lt;!&ndash;              Notifications&ndash;&gt;-->
            <!--            &lt;!&ndash;            </el-menu-item>&ndash;&gt;-->
            <!--          </el-menu>-->
            <el-dropdown class="el-profile" @command="handleProfileCommand">
              <span class="el-dropdown-link">
                <el-avatar
                  class="user-avatar"
                  :src="loginUserInfo.avatar"
                />
                <i class="el-icon-arrow-down el-icon--right" />
              </span>

              <el-dropdown-menu slot="dropdown">
                <el-dropdown-item>
                  <el-icon class="el-dropdown-icon" name="user-solid" />
                  {{ loginUserInfo.user }}
                </el-dropdown-item>
                <el-dropdown-item command="profile" divided>
                  <el-icon class="el-dropdown-icon" name="user-solid" />
                  个人中心
                </el-dropdown-item>
                <el-dropdown-item divided command="signout">
                  <el-icon class="el-dropdown-icon" name="bottom-left" />
                  退出
                </el-dropdown-item>
              </el-dropdown-menu>
            </el-dropdown>
          </el-menu>
        </el-col>
      </el-row>
    </el-header>
    <!--      主体部分-->
    <el-main class="center-main">
      <nuxt-child />
    </el-main>
    <el-footer class="bottom-footer">
      Copyright  © {{ new Date().getFullYear() }}&nbsp;<a target="_blank" href="https://pingbook.top/">评布客</a>
    </el-footer>
  </el-container>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'Home',
  data () {
    return {
      title: '自媒体中心',
      menuActiveIndex: 'home',
      // 白色主题
      // menuBackgroundColor: '#fff',
      // menuTextColor: '#4d4f52',
      // menuActiveColor: '#0084ff',
      // 蓝色主题
      menuBackgroundColor: '#0366d6',
      menuTextColor: '#fff',
      menuActiveColor: '#fff'
    }
  },
  computed: {
    ...mapGetters(['loginUserInfo'])
  },
  watch: {
    $route: {
      immediate: true,
      handler (to, from) {
        // if (!this.$store.getters.loginUserInfo.id) {
        //   return this.$router.push({ name: 'login', query: { redirect: to.path } })
        // }
      }
    }
  },
  methods: {
    handleSelect (index, indexPath) {
      this.menuActiveIndex = index
    },
    handleSubMenuOpen (index, indexPath) {
      if (index === 'products') {
        this.$router.push({ name: 'console-products' })
      }
    },
    handleProfileCommand (command) {
      if (command === 'profile') {
        this.$router.push({ name: 'console-profile' })
      } else if (command === 'signout') {
        this.$confirm('Are your sure to sign out?', {
          confirmButtonText: 'OK',
          cancelButtonText: 'CANCEL',
          type: 'warning'
        }).then(() => {
          this.$store.dispatch('app/logout').then(() => {
            this.$router.push({ name: 'login' })
          })
        })
      }
    }
  }
}
</script>

<style>
:root {
  --menu-background-color: #0366d6;
  --menu-text-color: #fff;
}
</style>
<style lang="scss" scoped>
.page-container {
  height: 100vh;
}
.top-header {
  font-weight: 500;
  // 设置位置
  position: sticky;
  top: 0;
  padding: 0 180px;
  z-index: 2;
  // 设置底纹
  background-color: var(--menu-background-color);
  border-bottom: 0;
  box-shadow: 0 0 10px rgba(0,0,0,.1);
  transform: translateZ(0);
  .menu-area {
    display: flex;
    align-items: center;
    justify-content: space-around;
    a {
      padding: 0;
      margin: 0;
      color: var(--menu-text-color);
      text-decoration: none;
      outline: none;
      font-size: 1.25rem;
      line-height: inherit;
      white-space: nowrap;
    }
    .el-submenu_wrapper {
      /deep/ .el-submenu__icon-arrow {
        color: #fff;
      }
    }
  }
  .el-profile {
    .el-dropdown-link {
      padding-left: 400px;
      height: 50px;
      display: flex;
      align-items: center;
      align-content: center;
      justify-items: center;
      justify-content: center;
      .user-avatar {
        cursor: pointer;
        width: 40px;
        height: 40px;
        border-radius: 50%;
      }
      .user-name {
        cursor: pointer;
        width: 40px;
        height: 40px;
        border-radius: 50%;
      }
      .el-icon--right {
        color: #fff;
        margin-left: 5px;
      }
      .el-dropdown-icon {
        width: 1em;
        height: 1em;
      }
    }
  }
}
.center-main {
  width: 85%;
  margin: auto;
  overflow: inherit;
}
.bottom-footer {
  position: sticky;
  padding: 24px 50px;
  font-size: 12px;
  color: #999;
  text-align: center;
  flex: 0 0 auto;
  /* background: #f0f2f5; */
  a {
    text-decoration: none;
    margin-right: 40px;
    color: #007bff;
    &:hover {
      /*background-color: #409EFF;*/
      color:#409EFF;
    }
  }
}
</style>
