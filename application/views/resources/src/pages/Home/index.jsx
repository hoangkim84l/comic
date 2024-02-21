import { Breadcrumbs, Divider, Typography } from '@mui/material'
import { useTranslation } from 'react-i18next'

const Dashboard = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)

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
      aaaa
    </>
  )
}

export default Dashboard
