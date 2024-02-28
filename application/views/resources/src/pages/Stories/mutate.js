import { enqueueSnackbar } from 'notistack'
import { useMutation } from 'react-query'
import { addLoveList, addStoryViewRecently } from '../../api'
import { parseApiErrorMessage } from '../../utils/helpers'

export const useAddStoryViewRecentlyMutation = id => {
  return useMutation(
    ['add-story-view-recently'],
    async id => {
      return await addStoryViewRecently(id)
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

export const useAddStoryToLoveListMutation = data => {
  return useMutation(
    ['add-story-to-lovelist'],
    async data => {
      return await addLoveList(data)
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
