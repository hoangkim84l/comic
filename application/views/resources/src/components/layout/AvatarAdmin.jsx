import { Box, Button, Divider, IconButton, Menu, Tooltip, Typography } from '@mui/material'
import Avatar from '@mui/material/Avatar'
import Badge from '@mui/material/Badge'
import Stack from '@mui/material/Stack'
import { styled } from '@mui/material/styles'
import { useCallback, useState } from 'react'
import { useTranslation } from 'react-i18next'
import { useDispatch, useSelector } from 'react-redux'
import { ADMIN_LOGIN } from '~/constants/Routes'
import { KEY_ADMIN_AUTH_TOKEN } from '~/constants/constants'
import { selectAdmin } from '~/store/adminAuth/selector'
import { logout } from '~/store/auth/slice'
import AvatarImage from '../../assets/images/avatar.jpg'

const StyledBadge = styled(Badge)(({ theme }) => ({
  '& .MuiBadge-badge': {
    backgroundColor: '#44b700',
    color: '#44b700',
    '&::after': {
      position: 'absolute',
      top: 0,
      left: 0,
      width: '100%',
      height: '100%',
      borderRadius: '50%',
      content: '""'
    }
  }
}))

const ColorButton = styled(Button)(({ theme }) => ({
  backgroundColor: 'white',
  width: '95%',
  color: `${theme.palette.blue[100]}`,
  border: '1px solid #ccc',
  margin: '0 5px 0 5px',
  '&:hover': {
    backgroundColor: `${theme.palette.blue[100]}`,
    color: 'white'
  }
}))

const AvatarAdmin = () => {
  const { t } = useTranslation()
  const admin = useSelector(selectAdmin)
  const [anchorElUser, setAnchorElUser] = useState(null)

  const handleOpenUserMenu = event => {
    setAnchorElUser(event.currentTarget)
  }

  const handleCloseUserMenu = () => {
    setAnchorElUser(null)
  }
  const dispatch = useDispatch()

  const doLogout = useCallback(() => {
    localStorage.removeItem(KEY_ADMIN_AUTH_TOKEN)
    window.location.href = ADMIN_LOGIN
    dispatch(logout())
  }, [dispatch])

  return (
    <Box>
      <Tooltip
        title={t('profileSetting.openSetting')}
        sx={{
          display: 'flex',
          justifyContent: 'flex-end'
        }}
      >
        <IconButton onClick={handleOpenUserMenu} sx={{ p: 0 }}>
          <Stack direction='row' spacing={2}>
            <StyledBadge overlap='circular' variant='dot'>
              <Avatar src={AvatarImage} />
            </StyledBadge>
          </Stack>
        </IconButton>
      </Tooltip>
      <Menu
        sx={{ mt: '45px', '& .MuiMenu-paper': { p: '5px' } }}
        id='menu-appbar'
        anchorEl={anchorElUser}
        anchorOrigin={{
          vertical: 'top',
          horizontal: 'right'
        }}
        keepMounted
        transformOrigin={{
          vertical: 'top',
          horizontal: 'right'
        }}
        open={Boolean(anchorElUser)}
        onClose={handleCloseUserMenu}
      >
        <Stack direction='column' alignItems='center' justifyContent='space-between'>
          <Avatar src={AvatarImage} />
          <Typography variant='h6' sx={{ fontWeight: 'bold' }} gutterBottom>
            {admin?.first_name} {admin?.last_name}
          </Typography>
          <Typography variant='h7' sx={{ p: '0 10px' }} gutterBottom>
            {admin?.email || 'Email'}
          </Typography>
        </Stack>
        <Divider style={{ marginBottom: 10 }} />
        <ColorButton style={{ textTransform: 'none' }} variant='contained' onClick={doLogout}>
          {t('profileSetting.signOut')}
        </ColorButton>
      </Menu>
    </Box>
  )
}

export default AvatarAdmin
