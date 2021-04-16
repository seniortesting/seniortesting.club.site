<template>
  <div class="hub-page">
    <div class="search-wrapper">
      <el-input v-model="keyword" placeholder="请输入音视频相关关键字标签" @keyup.enter.prevent="searchMedia" @change="searchMedia">
        <el-button slot="append" icon="el-icon-search" @click="searchMedia" />
      </el-input>
    </div>
    <div class="hot-keyword">
      <div class="hot-inner">
        热门搜索:
        <div class="keyword">
          <el-tag v-for="item in hotTags" :key="item.id" class="tag" type="info" @click="searchTag(item)">
            {{ item.name }}
          </el-tag>
        </div>
      </div>
    </div>
    <div class="media-result">
      热门推荐
      <div class="medias">
        <div v-for="item in medias" :key="item.id" class="media-item">
          <el-icon class="player-icon" name="video-play" @click.prevent="handlePlay(item)" />
          <wave-surfer :ref="item.id" :src="item.url" />, title: {{ item.title }}, remark: {{ item.remark }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import media from '@/api/media'
export default {
  name: 'MediaHubIndex',
  data () {
    return {
      keyword: '',
      hotTags: [
        { id: 1, name: '搞笑' },
        { id: 2, name: '励志' },
        { id: 3, name: '逗逼' },
        { id: 4, name: '美女' }
      ],
      medias: []
    }
  },
  mounted () {
    this.getHotMedias()
    this.getHotTags()
    const query = this.$route.query.s
    if (query) {
      this.keyword = query
      this.searchMedia()
    }
  },
  methods: {
    getHotMedias () {

    },
    getHotTags () {

    },
    searchMedia () {
      if (this.keyword.length === 0) {
        this.$swal({
          toast: true,
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: false,
          title: '关键字不能为空!',
          icon: 'warning'
        })
        return
      }
      const loader = this.$loading({
        fullscreen: true,
        text: '搜索中...'
      })
      media.searchMedia({ keyword: this.keyword }).then((res) => {
        const resCode = res.code
        if (resCode === 0) {
          const resData = res.data
          this.medias = resData
        } else {
          this.$swal({
            toast: true,
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            title: res.message,
            icon: 'error'
          })
        }
      }).catch((err) => {
        this.$swal({
          toast: true,
          timer: 3000,
          timerProgressBar: true,
          showConfirmButton: false,
          title: err,
          icon: 'error'
        })
      }).finally(() => {
        loader.close()
      })
    },
    // 点击热门标签搜索
    searchTag (item) {
      const name = item.name
      this.keyword = name
      this.searchMedia()
    },
    handlePlay (item) {
      const id = item.id
      const player = this.$refs[id].waveSurfer
      console.log('player is: ', player)
      player.play()
    }
  }
}
</script>

<style lang="scss" scoped>
.hub-page {
  .search-wrapper {
    padding: 60px 0px 30px 0px;
    display: flex;
    justify-content: center;

    /deep/ .el-input {
      width: 80%;
    }
    /deep/ .el-input__inner {
      height: 55px;
  }
  }
  .hot-keyword {
    display: flex;
    flex-direction: row;
    justify-content: center;
    .hot-inner {
      display: inline-flex;
      width: 80%;
      .keyword {
        padding-left: 10px;

        .tag {
          margin-left: 10px;
          cursor: pointer;
        }
      }
    }
  }
  .media-result {
    display: flex;
    flex-direction: row;
    justify-content: center;
    padding: 60px 0px 30px 0px;
    .medias {
      width: 80%;
      .media-item {
        .player-icon {
          font-size: 32px;
        }
      }
    }
  }
}
</style>
