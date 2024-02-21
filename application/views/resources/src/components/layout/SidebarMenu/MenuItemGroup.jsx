import KeyboardArrowDownIcon from '@mui/icons-material/KeyboardArrowDown'
import KeyboardArrowUpIcon from '@mui/icons-material/KeyboardArrowUp'
import {
  Box,
  Collapse,
  List,
  ListItemButton,
  ListItemIcon,
  ListItemText,
  Typography
} from '@mui/material'
import PropTypes from 'prop-types'
import { useCallback, useEffect, useMemo, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { useLocation, useNavigate } from 'react-router-dom'
import { useRouteMatch } from '../../../hooks/useRouteMatch'
import { selectMenu } from '../../../store/menu/selector'
import { setIsOpenMenu } from '../../../store/menu/slice'
import MenuItem from './MenuItem'

const activeRootStyle = {
  color: '#76B72A',
  fontWeight: 800
}

const activeGroup = {
  borderRight: '2px solid #76B72A',
  bgcolor: '#eaf5df'
}

const MenuItemGroup = ({ item }) => {
  const isMatched = useRouteMatch(item.match_urls)

  const [isOpen, setIsOpen] = useState(isMatched)
  const navigate = useNavigate()
  const dispatch = useDispatch()
  const { pathname } = useLocation()
  const isOpenMenu = useSelector(selectMenu)

  const actived = useMemo(() => {
    const countUrl = item.match_urls.filter(i => i === item.url)

    if (isOpenMenu && pathname === item.url && countUrl.length === 1) {
      return true
    }

    if (isOpenMenu && !isOpen && isMatched) {
      return true
    }

    if (!isOpenMenu && isMatched) {
      return true
    }

    return false
  }, [isMatched, isOpen, isOpenMenu, item.match_urls, item.url, pathname])

  const handleClick = useCallback(() => {
    setIsOpen(pre => !pre)

    if (!isOpenMenu) {
      dispatch(setIsOpenMenu(true))
    }
  }, [dispatch, isOpenMenu, item?.permission, item?.url, navigate])

  useEffect(() => {
    if (!isMatched) {
      setIsOpen(false)
    }
  }, [isMatched])

  return (
    <>
      <ListItemButton
        onClick={handleClick}
        sx={{
          py: item.level > 1 ? 1 : 1.25,
          pl: `${item.level * item.level * 12}px`,
          ...(actived && activeGroup)
        }}
      >
        <ListItemIcon
          sx={{
            minWidth: 0,
            mr: 4,
            justifyContent: 'center'
          }}
        >
          <Box component='span' className='material-symbols-rounded'>
            {item.icon}
          </Box>
        </ListItemIcon>
        <ListItemText
          primary={
            <Typography
              variant='body1'
              color='inherit'
              sx={{ my: 'auto', ...(actived && activeRootStyle) }}
            >
              {item.title}
            </Typography>
          }
        />
        <ListItemIcon sx={{ my: 'auto', minWidth: !item.icon ? 18 : 36 }}>
          {isOpen ? <KeyboardArrowUpIcon /> : <KeyboardArrowDownIcon />}
        </ListItemIcon>
      </ListItemButton>
      {isOpenMenu && (
        <Collapse in={isOpen} timeout='auto' unmountOnExit>
          <List
            component='div'
            disablePadding
            sx={{
              position: 'relative',
              '&:after': {
                content: "''",
                position: 'absolute',
                left: '32px',
                top: 0,
                height: '100%',
                width: '1px',
                opacity: 1
              }
            }}
          >
            {item.children.map((i, index) => (
              <MenuItem key={index} item={i} />
            ))}
          </List>
        </Collapse>
      )}
    </>
  )
}

MenuItemGroup.propTypes = {
  item: PropTypes.object
}

export default MenuItemGroup
