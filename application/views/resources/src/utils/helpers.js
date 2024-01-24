export const removeEmptyValue = obj => {
  const tmp = { ...obj }

  Object.keys(obj).forEach(k => {
    if (!obj[k] || String(obj[k]).trim().length === 0) {
      delete tmp[k]
    }
  })

  return tmp
}

export const parseApiErrorMessage = err => {
  if (err === null) {
    return ''
  }

  if (err.response?.data?.errors) {
    const errors = err.response.data.errors
    // parse laravel validation error message
    return Object.keys(errors)
      .map(key => errors[key])
      .map(item => {
        if (Array.isArray(item) && item.length > 0) {
          return item[0]
        }

        return item
      })
      .join('\n')
  }

  if (err.response?.data?.message) {
    return err.response.data.message
  }

  return err.message
}
