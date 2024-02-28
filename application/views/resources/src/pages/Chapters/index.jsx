import { Link } from '@mui/material'
import { useTranslation } from 'react-i18next'
import { useParams } from 'react-router-dom'
import { CHAPTERS_DETAIL } from '../../constants/Routes'
import { useGetListChaptersQuery } from './query'

const Chapters = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)
  const { id } = useParams()

  const { data, isLoading } = useGetListChaptersQuery(id)
  console.log(data?.data?.data)
  return (
    <>
      truyen {id}
      {data?.data?.data?.map((item, key) => {
        console.log(item)
        return (
          <Link
            href={CHAPTERS_DETAIL.replace(':id', item?.id).replace(':slug', item?.slug)}
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

export default Chapters
