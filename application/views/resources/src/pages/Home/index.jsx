import { Box, Breadcrumbs, Divider, Grid, Typography, Paper, Link } from '@mui/material'
import { useTranslation } from 'react-i18next'
import { useGetStoriesQuery } from './query'
import { useState } from 'react'
import { styled } from '@mui/material/styles'
import { useGetStoryNewQuery, useGetStoryViewsHighQuery } from '../Stories/query'
import { STORY_DETAIL } from '../../constants/Routes'

const Item = styled(Paper)(({ theme }) => ({
  backgroundColor: theme.palette.mode === 'dark' ? '#1A2027' : '#fff',
  ...theme.typography.body2,
  padding: theme.spacing(1),
  textAlign: 'center',
  color: theme.palette.text.secondary
}))

const Dashboard = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)
  const [order, setOrder] = useState('asc')
  const [orderBy, setOrderBy] = useState('')
  const [search, setSearch] = useState('')
  const [page, setPage] = useState(1)

  const { data, isSuccess } = useGetStoriesQuery(page, search, order, orderBy)
  // const { data: dataNew } = useGetStoryNewQuery(page, search, order, orderBy)
  const { data: dataViewHigh, isSuccess: isDataViewHighLoadSuccess } = useGetStoryViewsHighQuery(
    page,
    search,
    order,
    orderBy
  )
  return (
    <>
      <Box sx={{ margin: '10px 0' }}>
        <Grid container spacing={2}>
          <Grid item xs={12} sm={9}>
            <Grid container spacing={2}>
              {isSuccess &&
                data?.data?.data?.map((item, index) => {
                  let imgLink = item?.image_link.replace('cfn-crawler.', '')
                  console.log(item?.name)
                  return (
                    <Grid item xs={12} sm={2}>
                      <Item>
                        <Link
                          href={STORY_DETAIL.replace(':id', item?.id).replace(':slug', item?.slug)}
                          sx={{
                            textDecoration: 'none'
                          }}
                        >
                          <img
                            srcSet={`${imgLink}?w=161&fit=crop&auto=format&dpr=2 2x`}
                            src={`${imgLink}?w=161&fit=crop&auto=format`}
                            alt={item.site_title}
                            loading='lazy'
                            style={{ maxWidth: '100%', height: '275px' }}
                          />
                          <Typography
                            variant='h6'
                            sx={{
                              width: '90%',
                              textOverflow: 'ellipsis',
                              overflow: 'hidden',
                              whiteSpace: 'nowrap'
                            }}
                          >
                            {item?.name}
                          </Typography>
                        </Link>
                      </Item>
                    </Grid>
                  )
                })}
            </Grid>
          </Grid>

          <Grid item xs={12} sm={3}>
            {isDataViewHighLoadSuccess &&
              dataViewHigh?.data?.data?.map((item, index) => {
                let imgLink = item?.image_link.replace('cfn-crawler.', '')
                console.log(item?.name)
                return (
                  <Grid item xs={12} sm={12}>
                    <Item sx={{ margin: '10px 0' }}>
                      <Link
                        href={STORY_DETAIL.replace(':id', item?.id).replace(':slug', item?.slug)}
                        sx={{
                          textDecoration: 'none'
                        }}
                      >
                        <img
                          srcSet={`${imgLink}?w=161&fit=crop&auto=format&dpr=2 2x`}
                          src={`${imgLink}?w=161&fit=crop&auto=format`}
                          alt={item.site_title}
                          loading='lazy'
                          style={{ maxWidth: '100%', height: '275px' }}
                        />
                        <Typography
                          variant='h6'
                          sx={{
                            width: '90%',
                            textOverflow: 'ellipsis',
                            overflow: 'hidden',
                            whiteSpace: 'nowrap'
                          }}
                        >
                          {item?.name}
                        </Typography>
                      </Link>
                    </Item>
                  </Grid>
                )
              })}
          </Grid>
        </Grid>
      </Box>
    </>
  )
}

export default Dashboard
