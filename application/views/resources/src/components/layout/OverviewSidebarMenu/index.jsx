import { List } from '@mui/material'
import MenuItem from '~/components/layout/SidebarMenu/MenuItem'
import { menuItems } from '~/components/layout/OverviewSidebarMenu/MenuItems/menuItems'

const OverviewSidebarMenu = () => {
  return (
    <List>
      {menuItems.map((i, index) => (
        <MenuItem key={index} item={i} />
      ))}
    </List>
  )
}

export default OverviewSidebarMenu
