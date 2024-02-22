import { enqueueSnackbar } from 'notistack'
import { useQuery } from 'react-query'
import { getStories } from '../../api'
import { parseApiErrorMessage, removeEmptyValue } from '../../utils/helpers'

export const useGetStoriesQuery = params => {
  return useQuery(
    ['list-stories', params],
    async () => {
      const p = removeEmptyValue(params)
      const data = await getStories(p)
      return { data: data?.data, total: data?.meta?.total }
    },
    {
      onError: e => {
        const mess = parseApiErrorMessage(e)
        enqueueSnackbar({
          mess,
          variant: 'error'
        })
      },
      retry: false
    }
  )
}
