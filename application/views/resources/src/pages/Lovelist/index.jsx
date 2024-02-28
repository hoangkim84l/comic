import { useTranslation } from 'react-i18next'
import { useParams } from 'react-router-dom'
import { useGetLovelistQuery } from './query'

const Lovelist = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)
  const { id } = useParams()

  const { data, isLoading } = useGetLovelistQuery(id)
  console.log(data?.data?.data)
  return <>lovelist</>
}

export default Lovelist
