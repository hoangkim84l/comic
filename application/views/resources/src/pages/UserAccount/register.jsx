import { Breadcrumbs, Divider, Link, Typography } from '@mui/material'
import { useTranslation } from 'react-i18next'
import { useGetStoriesQuery } from '../Stories/query'
import { useState } from 'react'
import { STORY_DETAIL } from '../../constants/Routes'

const Register = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)
  const [order, setOrder] = useState('asc')
  const [orderBy, setOrderBy] = useState('')
  const [search, setSearch] = useState('')
  const [page, setPage] = useState(1)

  // const { data, isLoading } = useGetStoriesQuery(page, search, order, orderBy)
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
      Register Register
    </>
  )
}

export default Register
