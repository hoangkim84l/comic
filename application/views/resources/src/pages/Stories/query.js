import { enqueueSnackbar } from 'notistack'
import { useQuery } from 'react-query'
import {
  getStories,
  getStory,
  getStoryNew,
  getStoryViewRecently,
  getStoryViewsHigh
} from '../../api'
import { parseApiErrorMessage, removeEmptyValue } from '../../utils/helpers'
import { CACHE_TTL } from '../../utils/constants'

export const useGetStoriesQuery = params => {
  return useQuery(
    ['list-stories-with-paginate', params],
    async () => {
      const p = removeEmptyValue(params)
      const data = await getStories(p)
      return { data: data?.data }
    },
    {
      onError: e => {
        const mess = parseApiErrorMessage(e)
        enqueueSnackbar({
          mess,
          variant: 'error'
        })
      },
      retry: false,
      cacheTime: CACHE_TTL.ONE_MINUTE,
      staleTime: CACHE_TTL.ONE_MINUTE
    }
  )
}

export const useGetStoryDetailQuery = id => {
  return useQuery(
    ['story-detail', id],
    async () => {
      const data = await getStory(id)
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
      retry: false,
      cacheTime: CACHE_TTL.ONE_MINUTE,
      staleTime: CACHE_TTL.ONE_MINUTE
    }
  )
}

export const useGetStoryViewsHighQuery = () => {
  return useQuery(
    ['story-view-high'],
    async () => {
      const data = await getStoryViewsHigh()
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
      retry: false,
      cacheTime: CACHE_TTL.ONE_MINUTE,
      staleTime: CACHE_TTL.ONE_MINUTE
    }
  )
}

export const useGetStoryNewQuery = () => {
  return useQuery(
    ['story-new'],
    async () => {
      const data = await getStoryNew()
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
      retry: false,
      cacheTime: CACHE_TTL.ONE_MINUTE,
      staleTime: CACHE_TTL.ONE_MINUTE
    }
  )
}

export const useGetStoryViewRecentlyQuery = id => {
  return useQuery(
    ['story-view-recently'],
    async () => {
      const data = await getStoryViewRecently(id)
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
      retry: false,
      cacheTime: CACHE_TTL.ONE_MINUTE,
      staleTime: CACHE_TTL.ONE_MINUTE
    }
  )
}
