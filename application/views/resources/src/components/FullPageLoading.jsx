import { CircularProgress, Grid } from '@mui/material'

const FullPageLoading = () => {
  return (
    <Grid
      container
      spacing={0}
      direction='column'
      alignItems='center'
      justifyContent='center'
      style={{ minHeight: '100vh' }}
    >
      <CircularProgress />
    </Grid>
  )
}

export default FullPageLoading
