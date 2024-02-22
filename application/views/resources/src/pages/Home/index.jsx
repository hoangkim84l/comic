import { Breadcrumbs, Divider, Typography } from '@mui/material'
import { useTranslation } from 'react-i18next'
import { useGetStoriesQuery } from './query'
import { useState } from 'react'

const Dashboard = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)
  const [order, setOrder] = useState('asc')
  const [orderBy, setOrderBy] = useState('')
  const [search, setSearch] = useState('')
  const [page, setPage] = useState(1)

  const { data, isLoading } = useGetStoriesQuery(page, search, order, orderBy)
  console.log(data)
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
      bbbb
    </>
  )
}

export default Dashboard
