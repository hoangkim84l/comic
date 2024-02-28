import { Breadcrumbs, Divider, Typography } from '@mui/material'
import { useTranslation } from 'react-i18next'
import { useGetStoryDetailQuery } from '../query'
import { useParams } from 'react-router-dom'
import Chapters from '../../Chapters'

const Detail = slug => {
  const { t } = useTranslation()
  const { id } = useParams()
  // const { t } = useTranslation()
  const localization = 'pages.device.detail'
  const { data, isLoading } = useGetStoryDetailQuery(id)
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
      detail {id} - {data?.data?.data?.name}
      <Divider
        style={{
          marginBottom: 20
        }}
      />
      <Chapters />
    </>
  )
}

export default Detail
