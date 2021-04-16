const express = require('express')
const router = express.Router()
const { check } = require('express-validator')
// ------------------上传文件接口设置列表
const upload = require('../model/multer')
const file = require('./file')
router.post('/file/upload', upload.any(), file.upload)
router.post('/file/del', [
  check('url').notEmpty().withMessage('file url should not empty'),
  check('token').notEmpty().withMessage('file token should not empty')
], file.delete)
router.post('/file/token', [
  check('token').notEmpty().withMessage('file token should not empty')
], file.getFileListByToken)
// ------------------ 用户登录注册，忘记密码接口
const user = require('./user')
router.post('/user/login', [
  check('username').notEmpty().withMessage('username should not empty'),
  check('passwd').notEmpty().withMessage('password should not empty')
], user.login)
router.post('/user/profile', [
  check('id').notEmpty().withMessage('user id should not empty')
], user.updateUserProfileInfo)
// ------------------视频接口
const video = require('./video')
router.post('/video/list', [
  check('pageNum').isNumeric().withMessage('pageNum should not empty'),
  check('pageSize').isNumeric().withMessage('pageSize should not empty')
], video.listVideos)
router.post('/video/like', [
  check('videoId').notEmpty().withMessage('video should not empty'),
  check('version').isNumeric().withMessage('version should not numberic')
], video.likeVideo)
// ------------------图片接口
const photo = require('./photo')
router.get('/photo/list', [
  check('page').isNumeric().withMessage('page should not empty'),
  check('limit').custom((value, { req }) => {
    try {
      const limit = parseInt(value)
      if (limit >= 100) {
        throw new Error('Limit parameter should less than 100')
      }
    } catch (e) {
      throw new Error('Limit parameter is incorrect')
    }
  }).withMessage('limit should not empty')
], photo.getPhotos)
router.get('/photo/random', photo.getRandomPhotos)
// -------------------音乐视频上传
const media = require('./media')
router.post('/media/add', [
  check('title').notEmpty().withMessage('title should not empty'),
  check('fileToken').notEmpty().withMessage('file token should not empty'),
  check('tags').isArray({ min: 1, max: 50 }).withMessage('tags should not empty and less than 50')
], media.publishMedia)
router.post('/media/tags', [
  check('pageNum').isNumeric().withMessage('page number should not empty'),
  check('pageSize').isNumeric().withMessage('page size should not empty')
], media.getTagsPage)
router.post('/media/search', [
  check('keyword').notEmpty().withMessage('keyword should not empty')
], media.searchMedia)

module.exports = router
