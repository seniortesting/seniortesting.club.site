<template>
  <div class="tags-page">
    <div class="tags-list">
      <!--      <el-row>-->
      <!--        <el-col-->

      <!--          :md="3"-->
      <!--          :lg="3"-->
      <!--          :sm="6"-->
      <!--          :xs="6"-->
      <!--        >-->
      <el-tag
        v-for="item in tags"
        :key="item.id"
        :type="randomTagType()"
        @click="searchTag(item)"
      >
        {{ item.name }}
      </el-tag>
      <!--        </el-col>-->
      <!--      </el-row>-->
    </div>
  </div>
</template>

<script>
import media from '@/api/media'
export default {
  name: 'Tags',
  data () {
    return {
      pageNum: 1,
      pageSize: 30,
      tags: [],
      total: 0
    }
  },
  mounted () {
    this.getTagsPage()
  },
  methods: {
    randomTagType () {
      const types = ['', 'success', 'info', 'warning', 'danger']
      const number = Math.floor(Math.random() * (4 - 1 + 1)) + 0
      return types[number]
    },
    getTagsPage () {
      media.getTagsPage({
        pageNum: this.pageNum,
        pageSize: this.pageSize
      }).then((res) => {
        const resCode = res.code
        if (resCode === 0) {
          const resData = res.data
          this.tags = resData.records
          this.total = resData.total
        }
      })
    },
    searchTag (item) {
      const name = item.name
      this.$router.push({ name: 'mediahub', query: { s: name } })
    }
  }
}
</script>

<style lang="scss" scoped>
.tags-page {
  padding-top: 60px;
  .tags-list {
    padding: 10px 20px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    /deep/ .el-tag {
      cursor: pointer;
    }
  }
}
</style>
