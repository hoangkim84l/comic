import { useEffect, useMemo } from 'react'
import { useSelector } from 'react-redux'
import { Navigate, Route, Routes, useNavigate } from 'react-router-dom'
import {
  ADMIN_AZURE_DEVICE_DETAIL,
  ADMIN_DEVICES,
  ADMIN_DEVICE_REGISTER_SESSIONS,
  ADMIN_GOOGLE_DEVICE_DETAIL,
  ADMIN_OVERVIEW,
  AZURE_DEVICES,
  AZURE_DEVICE_DETAIL,
  AZURE_DEVICE_NEW,
  DASHBOARD,
  GOOGLE_DEVICES,
  GOOGLE_DEVICE_DETAIL,
  GOOGLE_DEVICE_NEW,
  GROUPTAGS,
  HEALTH_CHECK,
  ORGANISATION,
  ORG_OVERVIEW,
  OVERVIEW_DEVICE_REGISTER_SESSION_DETAIL,
  OVERVIEW_TENANTS_DETAIL,
  PRE_PROVISIONING_TOKEN
} from '~/constants/Routes'
import DeviceOverview from '~/pages/Admin/Device'
import AdminAzureDevice from '~/pages/Admin/Device/Azure/DeviceDetail/AdminAzureDevice'
import AdminGoogleDevice from '~/pages/Admin/Device/GoogleDeviceDetail/AdminGoogleDevice'
import Overview from '~/pages/Admin/overview'
import Dashboard from '~/pages/Dashboard'
import AzureDevice from '~/pages/Device/Detail/AzureDevice'
import GoogleDevice from '~/pages/Device/Detail/GoogleDevice'
import RegisterAzureDevice from '~/pages/Device/New/Register/RegisterAzureDevice'
import RegisterGoogleDevice from '~/pages/Device/New/Register/RegisterGoogleDevice'
import AzureDeviceTable from '~/pages/Device/Overview/DeviceOverViewTable/AzureDeviceTable'
import GoogleDeviceTable from '~/pages/Device/Overview/DeviceOverViewTable/GoogleDeviceTable'
import HealthCheck from '~/pages/HealthCheck'
import GroupTags from '~/pages/Organisations/GroupTag'
import Organisations from '~/pages/Organisations/Organisations'
import ProvisionTokensTable from '~/pages/Organisations/PreprovisionToken'
import { selectUser } from '~/store/auth/selector'
import Layout from './layout'
import OverviewHealthCheck from '~/pages/Admin/Tenant/OverviewHealthCheck'
import OrganisationsOverview from '~/pages/Organisations/Overview'
import OverviewRegisterSession from '~/pages/Admin/DeviceRegisterSession'
import DeviceRegisterSessionDetail from '~/pages/Admin/DeviceRegisterSession/DeviceRegisterSessionDetail'

const Navigator = () => {
  const user = useSelector(selectUser)
  const navigate = useNavigate()

  useEffect(() => {
    const redirectPath = localStorage.getItem('REDIRECT_URL')
    if (redirectPath) {
      localStorage.removeItem('REDIRECT_URL')
      navigate(redirectPath)
    }
  })

  const serviceRoutes = useMemo(() => {
    if (user?.is_azure) {
      return (
        <>
          <Route path={AZURE_DEVICES} element={<AzureDeviceTable />} />
          <Route path={AZURE_DEVICE_NEW} element={<RegisterAzureDevice />} />
          <Route path={AZURE_DEVICE_DETAIL} element={<AzureDevice />} />
          <Route path={GROUPTAGS} element={<GroupTags />} />
        </>
      )
    }
    if (user?.is_google) {
      return (
        <>
          <Route path={GOOGLE_DEVICES} element={<GoogleDeviceTable />} />
          <Route path={GOOGLE_DEVICE_NEW} element={<RegisterGoogleDevice />} />
          <Route path={GOOGLE_DEVICE_DETAIL} element={<GoogleDevice />} />
          <Route path={PRE_PROVISIONING_TOKEN} element={<ProvisionTokensTable />} />
        </>
      )
    }
    return null
  }, [user])

  return (
    <Layout>
      <Routes>
        {serviceRoutes}
        <Route path={DASHBOARD} element={<Dashboard />} />
        <Route path={HEALTH_CHECK} element={<HealthCheck />} />
        <Route path={ORGANISATION} element={<Organisations />} />
        <Route path={GROUPTAGS} element={<GroupTags />} />
        <Route path={ORG_OVERVIEW} element={<OrganisationsOverview />} />
        <Route path={ADMIN_OVERVIEW} element={<Overview />} />
        <Route path={OVERVIEW_TENANTS_DETAIL} element={<OverviewHealthCheck />} />
        <Route path={ADMIN_DEVICES} element={<DeviceOverview />} />
        <Route path={ADMIN_GOOGLE_DEVICE_DETAIL} element={<AdminGoogleDevice />} />
        <Route path={ADMIN_AZURE_DEVICE_DETAIL} element={<AdminAzureDevice />} />
        <Route path={ADMIN_DEVICE_REGISTER_SESSIONS} element={<OverviewRegisterSession />} />
        <Route path={OVERVIEW_DEVICE_REGISTER_SESSION_DETAIL} element={<DeviceRegisterSessionDetail />} />
        <Route path='/overview/*' element={<Navigate to={ADMIN_OVERVIEW} />} />
        <Route path='*' element={<Navigate to={DASHBOARD} />} />
      </Routes>
    </Layout>
  )
}

export default Navigator
