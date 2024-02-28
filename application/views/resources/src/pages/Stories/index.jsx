import { Breadcrumbs, Divider, Link, Typography } from '@mui/material'
import { useTranslation } from 'react-i18next'
import { useGetStoriesQuery } from '../Stories/query'
import { useState } from 'react'
import { STORY_DETAIL } from '../../constants/Routes'

const Stories = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)
  const [order, setOrder] = useState('asc')
  const [orderBy, setOrderBy] = useState('')
  const [search, setSearch] = useState('')
  const [page, setPage] = useState(1)

  const { data, isLoading } = useGetStoriesQuery(page, search, order, orderBy)
  console.log(data?.data)
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

      {data?.data?.data?.map((item, key) => {
        console.log(item)
        return (
          <Link
            href={STORY_DETAIL.replace(':id', item?.id).replace(':slug', item?.slug)}
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

export default Stories
