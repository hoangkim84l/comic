import { useEffect } from 'react'
import { useSelector } from 'react-redux'
import { Navigate, Route, Routes, useNavigate } from 'react-router-dom'
import { DASHBOARD } from '../constants/Routes'
import Dashboard from '../pages/Home'
import { selectUser } from '../store/auth/selector'
import Layout from './layout'

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

  // const serviceRoutes = useMemo(() => {
  //   if (user?.is_azure) {
  //     return (
  //       <>
  //         <Route path={AZURE_DEVICES} element={<AzureDeviceTable />} />
  //         <Route path={AZURE_DEVICE_NEW} element={<RegisterAzureDevice />} />
  //         <Route path={AZURE_DEVICE_DETAIL} element={<AzureDevice />} />
  //         <Route path={GROUPTAGS} element={<GroupTags />} />
  //       </>
  //     )
  //   }
  //   if (user?.is_google) {
  //     return (
  //       <>
  //         <Route path={GOOGLE_DEVICES} element={<GoogleDeviceTable />} />
  //         <Route path={GOOGLE_DEVICE_NEW} element={<RegisterGoogleDevice />} />
  //         <Route path={GOOGLE_DEVICE_DETAIL} element={<GoogleDevice />} />
  //         <Route path={PRE_PROVISIONING_TOKEN} element={<ProvisionTokensTable />} />
  //       </>
  //     )
  //   }
  //   return null
  // }, [user])

  return (
    <Layout>
      <Routes>
        {/* {serviceRoutes} */}
        <Route path={DASHBOARD} element={<Dashboard />} />
        {/* <Route path='/overview/*' element={<Navigate to={ADMIN_OVERVIEW} />} /> */}
        <Route path='*' element={<Navigate to={DASHBOARD} />} />
      </Routes>
    </Layout>
  )
}

export default Navigator
