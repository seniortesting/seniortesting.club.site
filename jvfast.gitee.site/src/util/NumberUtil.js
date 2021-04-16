/**
 * 得到最小的和最大的数之间的随机数，包含最小值和最大值
 * @returns {string}
 */
const randomNum = function (min, max) {
  min = Math.ceil(min)
  max = Math.floor(max)
  const number = Math.floor(Math.random() * (max - min + 1)) + min
  // const number = Math.random() * (max - min) + min  ,不包含最大值，只包含最小值
  return number
}
/**
 * 产生唯一的字符串
 * @returns {string}
 */
const uniqueStr = function () {
  const timestamp = +new Date() + ''
  const randomNum = parseInt((1 + Math.random()) * 65536) + ''
  return (+(randomNum + timestamp)).toString(32)
}
/**
 * @param {Array} arr
 * @returns {Array}
 */
function uniqueArray (arr) {
  return Array.from(new Set(arr))
}
/**
 * 生成随机len位数字
 */
const randomNumWithLen = (len, date) => {
  let random = ''
  random = Math.ceil(Math.random() * 100000000000000).toString().substr(0, len || 4)
  if (date) { random = random + Date.now() }
  return random
}

export { randomNum, uniqueStr, uniqueArray, randomNumWithLen }
