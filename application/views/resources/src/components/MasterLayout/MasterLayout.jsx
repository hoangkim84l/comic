import PropTypes from 'prop-types'
import { useState } from 'react'
import { Navigate, Route, Routes, useLocation } from 'react-router-dom'
import FullPageLoading from '../FullPageLoading'
// import FullPageLoading from '~/components/FullPageLoading'
// import Navigator from '~/components/Navigator'

const MasterLayout = ({ isAuthenticated, isAdminAuthenticated }) => {
  // const { isLoading: isLoadingProfile } = useProfileQuery(!!cachedAuthToken)
  // const { isLoading: isAdminLoadingProfile } = useAdminProfileQuery(!!cachedAdminAuthToken)

  // const search = useLocation()

  // const state = new URLSearchParams(search.search).get('state')
  // const error = new URLSearchParams(search.search).get('error')
  // if (state && !error) {
  //   localStorage.setItem(REGISTRATION_STATE, state)
  // }

  // if (isAdminLoadingProfile || isLoadingProfile) {
  //   return <FullPageLoading />
  // }
  return <FullPageLoading />
  // USER AUTH
  // if (!isAuthenticated && !search.pathname.startsWith('/overview')) {
  //   return (
  //     <>
  //       {' '}
  //       '96'
  //       {/* <Routes>
  //         <Route path={GOOGLE_LOGIN_REDIRECT} element={<GoogleLoginRedirect />} />
  //         <Route path={GOOGLE_REGISTRATION} element={<GoogleRegistration />} />
  //         <Route path='/registration' element={<Registration />} />
  //         <Route path='/login' element={<Login />} />
  //         <Route path='*' element={<Navigate to='/login' />} />
  //       </Routes> */}
  //     </>
  //   )
  // }

  // return <Navigator />
}

MasterLayout.propTypes = {
  isAuthenticated: PropTypes.bool
}

MasterLayout.defaultProps = {
  isAuthenticated: false
}

export default MasterLayout
