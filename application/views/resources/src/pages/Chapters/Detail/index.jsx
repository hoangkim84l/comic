import { Breadcrumbs, Divider, Typography } from '@mui/material'
import { useTranslation } from 'react-i18next'
import { useParams } from 'react-router-dom'
import { useGetChapterDetailQuery } from '../query'

const ChaptersDetail = slug => {
  const { t } = useTranslation()
  const { id } = useParams()
  // const { t } = useTranslation()
  const localization = 'pages.device.detail'
  const { data, isLoading } = useGetChapterDetailQuery(id)
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
      detail {id} - {data?.data?.data?.name}
    </>
  )
}

export default ChaptersDetail