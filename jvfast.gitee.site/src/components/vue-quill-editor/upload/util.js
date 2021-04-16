export const getObjValue = (data, params = '', type) => {
  const list = params.split('.')
  let result = data
  if (list[0] === '' && type !== 'object') {
    return getDeepData(data)
  } else if (list[0] !== '') {
    list.forEach((ele) => {
      result = result[ele]
    })
  }
  return result
}
export const getDeepData = (res) => {
  return (Array.isArray(res) ? res : res.data) || []
}
