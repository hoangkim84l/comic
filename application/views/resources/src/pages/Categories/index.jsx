import { Breadcrumbs, Divider, Link, Typography } from '@mui/material'
import { useTranslation } from 'react-i18next'
import { useGetStoriesQuery } from '../Stories/query'
import { useState } from 'react'
import { CATALOG_DETAIL, STORY_DETAIL } from '../../constants/Routes'
import { useGetListCategoriesQuery } from './query'

const Categories = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)
  const [order, setOrder] = useState('asc')
  const [orderBy, setOrderBy] = useState('')
  const [search, setSearch] = useState('')
  const [page, setPage] = useState(1)

  const { data, isLoading } = useGetListCategoriesQuery(page, search, order, orderBy)
  console.log(data?.data?.data?.data)
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

      {data?.data?.data?.data?.map((item, key) => {
        console.log(item)
        return (
          <Link
            href={CATALOG_DETAIL.replace(':id', item?.id).replace(':slug', item?.slug)}
            sx={{
              textDecoration: 'none'
            }}
          >
            {item?.slug}
          </Link>
        )
      })}
    </>
  )
}

export default Categories
