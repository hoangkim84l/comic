import { ADMIN_DEVICES, ADMIN_DEVICE_REGISTER_SESSIONS, ADMIN_OVERVIEW } from '~/constants/Routes'

export const OVERVIEW_MENU_ITEMS = [
  {
    title: 'Tenants',
    url: ADMIN_OVERVIEW,
    icon: 'house',
    permission: 'tenant'
  },
  {
    title: 'Devices',
    url: ADMIN_DEVICES,
    icon: 'devices',
    permission: 'devices'
  },
  {
    title: 'Device Register Sessions',
    url: ADMIN_DEVICE_REGISTER_SESSIONS,
    icon: 'history',
    permission: 'devices'
  }
]
