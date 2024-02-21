import {
  Box,
  ListItem,
  ListItemButton,
  ListItemIcon,
  ListItemText,
  Typography
} from '@mui/material'
import PropTypes from 'prop-types'
import { useRouteMatch } from '../../../hooks/useRouteMatch'
import { useCallback } from 'react'
import { useNavigate } from 'react-router-dom'

const activeRootStyle = {
  color: '#76B72A'
}

const activeItemLink = {
  borderRight: '2px solid #76B72A',
  bgcolor: '#eaf5df'
}

const MenuItemLink = ({ item }) => {
  const isMatched = useRouteMatch(item.url)

  const navigate = useNavigate()
  const openItemLink = useCallback(() => {
    navigate(item.url)
  }, [item.url, navigate])

  return (
    <ListItem disablePadding sx={{ ...(isMatched && activeRootStyle) }}>
      <ListItemButton
        onClick={openItemLink}
        sx={{
          minHeight: 48,
          mb: 0.5,
          pl: item.level < 3 ? `${item.level * item.level * 12}px` : `${item.level * 2.5 * 12}px`,

          ...(isMatched && activeItemLink)
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
          primary={<Typography fontWeight={isMatched ? 800 : 400}>{item.title}</Typography>}
        />
      </ListItemButton>
    </ListItem>
  )
}

MenuItemLink.propTypes = {
  item: PropTypes.object
}

export default MenuItemLink
