module.exports = {
  isAdmin (req, res, next) {
    const payload = req.decoded
    if (payload && payload.role === 'admin') {
      next()
    } else {
      res.status(403).send({
        success: false,
        message: '无权限访问'
      })
    }
  },
  checkUserId (req, res, next) {
    const payload = req.decoded
    if (req.params.id === payload.id || payload.role === 'admin') {
      next()
    } else {
      res.status(403).send({
        success: false,
        message: '无权限访问'
      })
    }
  }
}
