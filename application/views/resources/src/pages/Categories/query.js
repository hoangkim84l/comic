import { enqueueSnackbar } from 'notistack'
import { useQuery } from 'react-query'
import { getCategory, getListCategories, getListStoriesByCategory } from '../../api'
import { parseApiErrorMessage, removeEmptyValue } from '../../utils/helpers'

export const useGetListCategoriesQuery = params => {
  return useQuery(
    ['list-categories', params],
    async () => {
      const p = removeEmptyValue(params)
      const data = await getListCategories(p)
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

export const useGetCategoryDetailQuery = id => {
  return useQuery(
    ['category', id],
    async () => {
      const data = await getCategory(id)
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

export const useGetListStoriesByCategoryQuery = id => {
  return useQuery(
    ['list-stories-by-categories', id],
    async () => {
      const data = await getListStoriesByCategory()
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
