import dayjs from 'dayjs'
import 'dayjs/locale/zh-cn'
import relativeTime from 'dayjs/plugin/relativeTime'
import IsBetween from 'dayjs/plugin/isBetween'
dayjs.locale('zh-cn')
dayjs.extend(relativeTime)
dayjs.extend(IsBetween)

// 文档参数： https://day.js.org/

const wordDate = function (timestamp) {
  return dayjs(timestamp).fromNow()
}
const formatDate = function (timestamp) {
  return format(timestamp, 'YYYY-MM-DD')
}
const formatTime = function (timestamp) {
  return format(timestamp, 'HH:mm:ss')
}
const formatDateTime = function (timestamp) {
  return format(timestamp, 'YYYY-MM-DD HH:mm:ss')
}
const isBetween = function (date, first, second) {
  return dayjs(date).isBetween(first, second)
}
const formatBuildVersion = function () {
  return format(new Date(), 'YYYYMMDDHHmm')
}
const format = function (timestamp, pattern) {
  return dayjs(timestamp).format(pattern)
}
const addDay = function (num) {
  return dayjs().add(num, 'day').format('YYYY/MM/DD')
}
const subtractDay = function (num) {
  return dayjs().subtract(num, 'day').format('YYYY/MM/DD')
}
const ago = function (timestamp) {
  return dayjs(timestamp).fromNow()
}
const timeWelcomeWord = function () {
  const time = new Date()
  const hour = time.getHours()
  return hour < 9 ? '早上好' : hour <= 11 ? '上午好' : hour <= 13 ? '中午好' : hour < 20 ? '下午好' : '晚上好'
}

export { wordDate, isBetween, formatDate, formatTime, formatDateTime, formatBuildVersion, timeWelcomeWord, addDay, subtractDay, ago }
