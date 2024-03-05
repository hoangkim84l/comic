import { Box, Breadcrumbs, Divider, Grid, Link, Typography, Paper } from '@mui/material'
import { useTranslation } from 'react-i18next'
import { useGetStoriesQuery } from '../Stories/query'
import { useCallback, useState } from 'react'
import { STORY_DETAIL } from '../../constants/Routes'
import { styled } from '@mui/material/styles'

const Item = styled(Paper)(({ theme }) => ({
  backgroundColor: theme.palette.mode === 'dark' ? '#1A2027' : '#fff',
  ...theme.typography.body2,
  padding: theme.spacing(1),
  textAlign: 'center',
  color: theme.palette.text.secondary
}))

const Stories = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)
  const [order, setOrder] = useState('asc')
  const [orderBy, setOrderBy] = useState('')
  const [search, setSearch] = useState('')
  const [page, setPage] = useState(1)

  const searchHandler = useCallback(event => {
    if (event.key === 'Enter') {
      setSearch(event.target.value)
      setPage(1)
    }
  }, [])

  const handleChangePage = useCallback((_, value) => {
    setPage(value)
  }, [])

  const { data, isSuccess } = useGetStoriesQuery(page, search, order, orderBy)
  return (
    <>
      {data?.data?.data?.map((item, key) => {
        return (
          <Box sx={{ margin: '10px 0' }}>
            <Grid container spacing={2}>
              <Grid item xs={12}>
                <Grid container spacing={2}>
                  {isSuccess &&
                    data?.data?.data?.map((item, index) => {
                      let imgLink = item?.image_link.replace('cfn-crawler.', '')
                      return (
                        <Grid item xs={12} sm={2}>
                          <Item>
                            <Link
                              href={STORY_DETAIL.replace(':id', item?.id).replace(
                                ':slug',
                                item?.slug
                              )}
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
            </Grid>
          </Box>
        )
      })}
    </>
  )
}

export default Stories
