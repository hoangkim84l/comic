import { enqueueSnackbar } from 'notistack'
import { useMutation } from 'react-query'
import { addContact } from '../../api'
import { parseApiErrorMessage } from '../../utils/helpers'

export const useAddContactMutation = data => {
  return useMutation(
    ['add-contact'],
    async data => {
      return await addContact(data)
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
