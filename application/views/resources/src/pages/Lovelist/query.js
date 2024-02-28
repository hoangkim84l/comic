import { enqueueSnackbar } from 'notistack'
import { useQuery } from 'react-query'
import { getLoveList } from '../../api'
import { parseApiErrorMessage } from '../../utils/helpers'

export const useGetLovelistQuery = id => {
  return useQuery(
    ['love-list', id],
    async () => {
      const data = await getLoveList(id)
      return data
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
