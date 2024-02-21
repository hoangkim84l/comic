import KeyboardDoubleArrowLeftIcon from '@mui/icons-material/KeyboardDoubleArrowLeft'
import KeyboardDoubleArrowRightIcon from '@mui/icons-material/KeyboardDoubleArrowRight'
import MuiAppBar from '@mui/material/AppBar'
import Box from '@mui/material/Box'
import CssBaseline from '@mui/material/CssBaseline'
import Divider from '@mui/material/Divider'
import MuiDrawer from '@mui/material/Drawer'
import IconButton from '@mui/material/IconButton'
import { styled, useTheme } from '@mui/material/styles'
import Toolbar from '@mui/material/Toolbar'
import { useDispatch, useSelector } from 'react-redux'
import { selectMenu } from '../../store/menu/selector'
import { setIsOpenMenu } from '../../store/menu/slice'
import AvatarUser from './AvatarUser'

import StagingLogo from '../../assets/images/logo/logo.png'
import SidebarMenu from './SidebarMenu'
import { useLocation } from 'react-router-dom'

const drawerWidth = 300

const openedMixin = theme => ({
  width: drawerWidth,
  transition: theme.transitions.create('width', {
    easing: theme.transitions.easing.sharp,
    duration: theme.transitions.duration.enteringScreen
  }),
  overflowX: 'hidden'
})

const closedMixin = theme => ({
  transition: theme.transitions.create('width', {
    easing: theme.transitions.easing.sharp,
    duration: theme.transitions.duration.leavingScreen
  }),
  overflowX: 'hidden',
  width: `calc(${theme.spacing(7)} + 1px)`,
  [theme.breakpoints.up('sm')]: {
    width: `calc(${theme.spacing(8)} + 1px)`
  }
})

const DrawerHeader = styled('div')(({ theme }) => ({
  display: 'flex',
  alignItems: 'center',
  justifyContent: 'flex-end',
  padding: theme.spacing(0, 1),
  // necessary for content to be below app bar
  ...theme.mixins.toolbar
}))

const AppBar = styled(MuiAppBar, {
  shouldForwardProp: prop => prop !== 'open'
})(({ theme, open }) => ({
  zIndex: theme.zIndex.drawer + 1,
  transition: theme.transitions.create(['width', 'margin'], {
    easing: theme.transitions.easing.sharp,
    duration: theme.transitions.duration.leavingScreen
  }),
  ...(open && {
    marginLeft: drawerWidth,
    width: `calc(100% - ${drawerWidth}px)`,
    transition: theme.transitions.create(['width', 'margin'], {
      easing: theme.transitions.easing.sharp,
      duration: theme.transitions.duration.enteringScreen
    })
  })
}))

const Drawer = styled(MuiDrawer, {
  shouldForwardProp: prop => prop !== 'open'
})(({ theme, open }) => ({
  width: drawerWidth,
  flexShrink: 0,
  whiteSpace: 'nowrap',
  boxSizing: 'border-box',
  ...(open && {
    ...openedMixin(theme),
    '& .MuiDrawer-paper': openedMixin(theme)
  }),
  ...(!open && {
    ...closedMixin(theme),
    '& .MuiDrawer-paper': closedMixin(theme)
  })
}))

const Layout = ({ children }) => {
  const theme = useTheme()
  const dispatch = useDispatch()
  const openDrawer = useSelector(selectMenu)
  const search = useLocation()

  const handleDrawerOpen = () => {
    dispatch(setIsOpenMenu(true))
  }

  const handleDrawerClose = () => {
    dispatch(setIsOpenMenu(false))
  }

  return (
    <Box sx={{ display: 'flex' }}>
      <CssBaseline />
      <AppBar position='fixed' open={openDrawer} style={{ background: '#102F44' }}>
        <Toolbar>
          <IconButton
            color='inherit'
            aria-label='open drawer'
            onClick={handleDrawerOpen}
            edge='start'
            sx={{
              marginRight: 5,
              ...(openDrawer && { display: 'none' })
            }}
          >
            <KeyboardDoubleArrowRightIcon style={{ color: '#76B72A' }} />
          </IconButton>
          <Box sx={{ flexGrow: 1 }} />
          {!search.pathname.startsWith('/overview') && <AvatarUser />}
        </Toolbar>
      </AppBar>
      <Drawer variant='permanent' open={openDrawer} style={{ backgroundColor: 'grey' }}>
        <DrawerHeader
          sx={{
            display: 'flex',
            justifyContent: 'space-between',
            alignItems: 'center',
            ml: 2
          }}
        >
          <img
            src={StagingLogo}
            alt='cafe dang va mua'
            style={{ padding: '5px 0', margin: '0 auto' }}
          />
          <IconButton onClick={handleDrawerClose}>
            {theme.direction === 'rtl' ? (
              <KeyboardDoubleArrowRightIcon style={{ color: '#76B72A' }} />
            ) : (
              <KeyboardDoubleArrowLeftIcon style={{ color: '#76B72A' }} />
            )}
          </IconButton>
        </DrawerHeader>
        <Divider />
        <SidebarMenu />
        <Divider />
      </Drawer>
      <Box component='main' sx={{ flexGrow: 1, p: 3 }}>
        <DrawerHeader />
        <Box>{children}</Box>
      </Box>
    </Box>
  )
}

export default Layout
