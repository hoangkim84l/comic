import { List } from '@mui/material'
import { useMemo } from 'react'
import { useSelector } from 'react-redux'
import MenuItem from '../../../components/layout/SidebarMenu/MenuItem'
import { menuItems } from '../../../components/layout/SidebarMenu/MenuItems/menuItems'
import { selectUser } from '../../../store/auth/selector'

const SidebarMenu = () => {
  const user = useSelector(selectUser)
  const menus = useMemo(() => {
    return menuItems
  }, [user])

  return (
    <List>
      {menus.map((i, index) => (
        <MenuItem key={index} item={i} />
      ))}
    </List>
  )
}

export default SidebarMenu
