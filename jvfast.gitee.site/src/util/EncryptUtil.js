import CryptoJS from 'crypto-js'
import config from '@/config'

const encrypt = {
  /**
   * 加密算法,参考: https://stackoverflow.com/questions/41432896/cryptojs-aes-encryption-and-java-aes-decryption
   * @param str
   * @returns {string}
   */
  encode (str) {
    const secretKey = config.secretKey
    // 进行加密操作
    const encodeBody = CryptoJS.AES.encrypt(str, secretKey).toString()
    return encodeBody
  },
  decode (str) {
    const secretKey = config.secretKey
    const decodeBody = CryptoJS.AES.decrypt(str, secretKey).toString(CryptoJS.enc.Utf8)
    return decodeBody
  },
  md5 (str) {
    return CryptoJS.MD5(str).toString()
  }
}

export default encrypt
