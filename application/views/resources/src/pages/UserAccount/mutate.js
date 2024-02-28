import { enqueueSnackbar } from 'notistack'
import { useMutation } from 'react-query'
import { authenticate, register } from '../../api'
import { parseApiErrorMessage } from '../../utils/helpers'

export const useRegisterMutation = data => {
  return useMutation(
    ['add-contact'],
    async data => {
      return await register(data)
    },
    {
      onSuccess: data => {},
      onError: error => {
        const message = parseApiErrorMessage(error)
        enqueueSnackbar({
          message,
          variant: 'error'
        })
      },
      retry: false
    }
  )
}

export const useLoginMutation = data => {
  return useMutation(
    ['add-contact'],
    async data => {
      return await authenticate(data)
    },
    {
      onSuccess: data => {},
      onError: error => {
        const message = parseApiErrorMessage(error)
        enqueueSnackbar({
          message,
          variant: 'error'
        })
      },
      retry: false
    }
  )
}
