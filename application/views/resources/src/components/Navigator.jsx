import { Login } from '@mui/icons-material'
import { useEffect } from 'react'
import { useSelector } from 'react-redux'
import { Navigate, Route, Routes, useNavigate } from 'react-router-dom'
import {
  CATALOG_DETAIL,
  CATEGORIES,
  CHAPTERS,
  CHAPTERS_DETAIL,
  CONTACT,
  DASHBOARD,
  LOGIN,
  LOVELIST,
  REGISTER,
  STORY,
  STORY_DETAIL
} from '../constants/Routes'
import Categories from '../pages/Categories'
import CategoriesDetail from '../pages/Categories/Detail'
import Chapters from '../pages/Chapters'
import ChaptersDetail from '../pages/Chapters/Detail'
import Contact from '../pages/Contact'
import Dashboard from '../pages/Home'
import Lovelist from '../pages/Lovelist'
import Stories from '../pages/Stories'
import Detail from '../pages/Stories/Detail'
import Register from '../pages/UserAccount/register'
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
  //   return null
  // }, [user])

  return (
    <Layout>
      <Routes>
        {/* {serviceRoutes} */}
        <Route path={DASHBOARD} element={<Dashboard />} />

        <Route path={STORY} element={<Stories />} />
        <Route path={STORY_DETAIL} element={<Detail />} />
        <Route path={LOVELIST} element={<Lovelist />} />

        <Route path={CATEGORIES} element={<Categories />} />
        <Route path={CATALOG_DETAIL} element={<CategoriesDetail />} />

        <Route path={CHAPTERS} element={<Chapters />} />
        <Route path={CHAPTERS_DETAIL} element={<ChaptersDetail />} />

        <Route path={CONTACT} element={<Contact />} />

        <Route path={REGISTER} element={<Register />} />
        <Route path={LOGIN} element={<Login />} />

        <Route path='*' element={<Navigate to={DASHBOARD} />} />
      </Routes>
    </Layout>
  )
}

export default Navigator
