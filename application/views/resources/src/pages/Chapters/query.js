import { enqueueSnackbar } from 'notistack'
import { useQuery } from 'react-query'
import { getChapter, getListChapters, getListChaptersNoPaginate, getNewChapters } from '../../api'
import { parseApiErrorMessage } from '../../utils/helpers'

export const useGetListChaptersQuery = id => {
  return useQuery(
    ['list-chapters', id],
    async () => {
      const data = await getListChapters(id)
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

export const useGetChapterDetailQuery = id => {
  return useQuery(
    ['chapter', id],
    async () => {
      const data = await getChapter(id)
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

export const useGetListChapterNoPaginateQuery = id => {
  return useQuery(
    ['list-chapters-no-paginate', id],
    async () => {
      const data = await getListChaptersNoPaginate(id)
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

export const useGetNewChaptersQuery = id => {
  return useQuery(
    ['new-chapters', id],
    async () => {
      const data = await getNewChapters(id)
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
