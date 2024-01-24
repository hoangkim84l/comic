import {
  Box,
  Button,
  Divider,
  FormControl,
  IconButton,
  InputLabel,
  Menu,
  MenuItem,
  Select,
  TextField,
  Tooltip,
  Typography
} from '@mui/material'
import Avatar from '@mui/material/Avatar'
import Badge from '@mui/material/Badge'
import Stack from '@mui/material/Stack'
import { styled } from '@mui/material/styles'
import debounce from 'lodash.debounce'
import { useCallback, useEffect, useState } from 'react'
import { useTranslation } from 'react-i18next'
import { useDispatch, useSelector } from 'react-redux'
import { useNavigate } from 'react-router-dom'
import { KEY_AUTH_TOKEN, REGISTRATION_STATE } from '~/constants/constants'
import { selectUser } from '~/store/auth/selector'
import { logout } from '~/store/auth/slice'
import AvatarImage from '../../assets/images/avatar.jpg'
import { useUpdateActiveTenantMutation } from './query'
import { Padding } from '@mui/icons-material'

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

const AvatarUser = () => {
  const { t } = useTranslation()
  const user = useSelector(selectUser)
  const [anchorElUser, setAnchorElUser] = useState(null)
  const [activeTenant, setActiveTenant] = useState('')
  const updateActiveTenant = useUpdateActiveTenantMutation()

  const handleOpenUserMenu = event => {
    setAnchorElUser(event.currentTarget)
  }

  const handleCloseUserMenu = () => {
    setAnchorElUser(null)
  }
  const dispatch = useDispatch()
  const navigate = useNavigate()

  const doLogout = useCallback(() => {
    dispatch(logout())
    localStorage.removeItem(KEY_AUTH_TOKEN)
    localStorage.removeItem(REGISTRATION_STATE)
    navigate('/login')
  }, [dispatch])

  useEffect(() => {
    setActiveTenant(user?.tenant?.name)
  }, [user])

  //PROCESS CHANGE ACTIVE TENANT
  const handleActiveTenantChange = debounce(event => {
    setActiveTenant(event.target.value['name'])
    updateActiveTenant.mutate(event.target.value['id'])
  }, 300)

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
              <Avatar
                src={
                  user?.is_google
                    ? user?.google_avatar ?? AvatarImage
                    : user?.media?.preview_url ?? AvatarImage
                }
              />
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
          <Avatar
            src={
              user?.is_google
                ? user?.google_avatar ?? AvatarImage
                : user?.media?.preview_url ?? AvatarImage
            }
          />
          <Typography variant='h6' sx={{ mt: 1, fontWeight: 'bold' }} gutterBottom>
            {user?.name || 'Name'}
          </Typography>
          <Typography variant='h7' sx={{ p: '0 10px' }} gutterBottom>
            {user?.email || 'Email'}
          </Typography>
        </Stack>
        <Divider style={{ marginBottom: 10 }} />
        <FormControl sx={{ mb: '10px', width: '100%', p: '0 5px' }}>
          <InputLabel id='select-label-tenant' sx={{ width: '80%', p: '0 5px' }}>
            {activeTenant}
          </InputLabel>
          <TextField
            id='outlined-select'
            select
            label='Tenant/Domain'
            variant='outlined'
            onChange={handleActiveTenantChange}
            InputLabelProps={{
              shrink: true
            }}
          >
            {user?.tenants?.map((data, index) => {
              return (
                <MenuItem
                  key={data.name}
                  value={{
                    id: data.id,
                    name: data.name
                  }}
                >
                  {data.name}
                </MenuItem>
              )
            })}
          </TextField>
        </FormControl>
        <Divider style={{ marginBottom: 10 }} />
        <ColorButton style={{ textTransform: 'none' }} variant='contained' onClick={doLogout}>
          {t('profileSetting.signOut')}
        </ColorButton>
      </Menu>
    </Box>
  )
}

export default AvatarUser
