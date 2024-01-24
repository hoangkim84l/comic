import { List } from '@mui/material'
import { useMemo } from 'react'
import { useSelector } from 'react-redux'
import MenuItem from '~/components/layout/SidebarMenu/MenuItem'
import { azureItems, googleItems, menuItems } from '~/components/layout/SidebarMenu/MenuItems/menuItems'
import { selectUser } from '~/store/auth/selector'

const SidebarMenu = () => {
  const user = useSelector(selectUser)
  const hrefPath = window.location.href
  const shouldUseAdminMenu = hrefPath.indexOf('/overview') > -1
  const menus = useMemo(
    () => {
      if (shouldUseAdminMenu) {
        return menuItems;
      } else {
        if (user?.is_azure) {
          return azureItems;
        }
        if (user?.is_google) {
          return googleItems;
        }
      }
      return []
    },
    [user]
  )

  

  return (
    <List>
      {menus.map((i, index) => (
        <MenuItem key={index} item={i} />
      ))}
    </List>
  )
}

export default SidebarMenu
