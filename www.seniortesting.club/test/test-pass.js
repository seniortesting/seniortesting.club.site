const CryptoJS = require('crypto-js')
const config = require('@/config')
const secretKey = config.secretKey

const str = '11111111'
const md5Str = CryptoJS.MD5(str).toString()
console.log('Md5: ', md5Str)

const encryptStr = CryptoJS.AES.encrypt(md5Str, secretKey).toString()
console.log('Encrypt: ', encryptStr)

const decryptStr = CryptoJS.AES.decrypt(encryptStr, secretKey).toString(CryptoJS.enc.Utf8)
console.log('Decrypt: ', decryptStr)
