import { enqueueSnackbar } from 'notistack'
import { useQuery } from 'react-query'
import { useDispatch } from 'react-redux'
import { useNavigate } from 'react-router-dom'
import { getAdminProfile, getUserProfile } from '~/api'
import { KEY_ADMIN_AUTH_TOKEN, KEY_AUTH_TOKEN } from '~/constants/constants'
import { setAdmin } from '~/store/adminAuth/slice'
import { setUser } from '~/store/auth/slice'
import { parseApiErrorMessage } from '~/utils/helpers'

export const useProfileQuery = (enabled, refetchInterval = 0) => {
  const dispatch = useDispatch()
  const navigate = useNavigate()
  return useQuery(
    'profile',
    async () => {
      const { data } = await getUserProfile()
      return data.data
    },
    {
      refetchInterval,
      enabled,
      retry: false,
      refetchOnWindowFocus: false,
      onSuccess: data => {
        dispatch(setUser(data))
      },
      onError: e => {
        if (e.response.status === 401) {
          localStorage.removeItem(KEY_AUTH_TOKEN)
          navigate('/login')
        }

        enqueueSnackbar({
          message: parseApiErrorMessage(e),
          variant: 'error'
        })
      }
    }
  )
}

export const useAdminProfileQuery = enabled => {
  const dispatch = useDispatch()
  const navigate = useNavigate()
  return useQuery(
    'admin_profile',
    async () => {
      const { data } = await getAdminProfile()
      return data.data
    },
    {
      enabled,
      retry: false,
      refetchOnWindowFocus: false,
      onSuccess: data => {
        dispatch(setAdmin(data))
      },
      onError: e => {
        if (e.response.status === 401) {
          localStorage.removeItem(KEY_ADMIN_AUTH_TOKEN)
          navigate('/overview/login')
        }

        enqueueSnackbar({
          message: parseApiErrorMessage(e),
          variant: 'error'
        })
      }
    }
  )
}
