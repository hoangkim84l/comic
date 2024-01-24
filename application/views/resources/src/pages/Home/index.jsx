import { LoadingButton } from '@mui/lab'
import { Alert, Breadcrumbs, Divider, Typography } from '@mui/material'
import { useCallback, useEffect } from 'react'
import { useTranslation } from 'react-i18next'
import { useDispatch, useSelector } from 'react-redux'
import { useNavigate } from 'react-router-dom'
import { setUser } from '~/store/auth/slice'
import { selectUser } from '../../store/auth/selector'
import { useGrantAppPermissionMutation } from '../Registration/mutation'
import { REGISTRATION_STATE } from '~/constants/constants'
import { useHealthCheckPermissionQuery } from '../HealthCheck/query'

const Dashboard = () => {
  const { t } = useTranslation()
  const user = useSelector(selectUser)

  if (user?.is_google) {
    return (
      <>
        <Breadcrumbs aria-label='breadcrumb'>
          <Typography>{t('general.dashboard')}</Typography>
        </Breadcrumbs>
        <Divider
          style={{
            marginBottom: 20
          }}
        />
      </>
    )
  }

  // CHECK PERMISSIONS
  const { data: permission, isLoading: isPermissionLoading } = useHealthCheckPermissionQuery(user?.tenant?.id)

  const permissionMutation = useGrantAppPermissionMutation()

  const dispatch = useDispatch()
  const regState = localStorage.getItem(REGISTRATION_STATE)
  useEffect(() => {
    if (regState) {
      permissionMutation.mutate(regState, {
        onSuccess: data => {
          dispatch(setUser(data))
          localStorage.removeItem(REGISTRATION_STATE)
        }
      })
    }
  }, [])

  const grantPermissionRedirect = useCallback(() => {
    if (!user) {
      return
    }

    const redirectUrl = 'redirect_uri=' + window.location.origin + '/login'
    const clientId = import.meta.env.VITE_MICROSOFT_CLIENT_ID
    const url = `https://login.microsoftonline.com/${user.tenant.service_tenant.tenant_id}/adminconsent?client_id=${clientId}&${redirectUrl}&state=${user.registration_token}`
    window.location.href = url
  }, [user])

  const showButton = !user.tenant.service_tenant.is_granted_permission

  return (
    <>
      <Breadcrumbs aria-label='breadcrumb'>
        <Typography>{t('general.dashboard')}</Typography>
      </Breadcrumbs>
      <Divider
        style={{
          marginBottom: 20
        }}
      />

      {user.tenant.service_tenant.is_granted_permission &&
        user.tenant.service_tenant.has_intune_licence_valid && (
          <Alert severity='success' style={{ marginBottom: 20 }}>
            {t('general.yourAccountAreAllSet')}
          </Alert>
        )}

      {!user.tenant.service_tenant.has_intune_licence_valid && (
        <Alert severity='warning' style={{ marginBottom: 20 }}>
          {t('general.hasIntuneLicenceValid')}
        </Alert>
      )}

      {showButton && (
        <LoadingButton
          onClick={grantPermissionRedirect}
          sx={{ mt: 1, mr: 1 }}
          loading={permissionMutation.isLoading}
          variant='contained'
        >
          {t('general.grantAppPermission')}
        </LoadingButton>
      )}
    </>
  )
}

export default Dashboard
