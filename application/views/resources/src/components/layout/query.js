import { enqueueSnackbar } from 'notistack'
import { useMutation } from 'react-query'
import { useNavigate } from 'react-router-dom'
import { updateActiveTenantApi } from '~/api'
import { AZURE_DEVICES, GOOGLE_DEVICES } from '~/constants/Routes'

export const useUpdateActiveTenantMutation = () => {
  const navigate = useNavigate()
  const searchAzureDevicePage = window.location.toString().includes('azure')
  const searchGoogleDevicePage = window.location.toString().includes('google')

  return useMutation(
    async id => {
      const { data } = await updateActiveTenantApi(id)
      return data.data
    },
    {
      onSuccess: data => {
        enqueueSnackbar({
          message: 'Successfully updated active tenant',
          variant: 'success'
        })
        if (searchAzureDevicePage) {
          window.location.href = AZURE_DEVICES
        } else if (searchGoogleDevicePage) {
          window.location.href = GOOGLE_DEVICES
        } else {
          window.location.reload()
        }
      },
      retry: false
    }
  )
}
