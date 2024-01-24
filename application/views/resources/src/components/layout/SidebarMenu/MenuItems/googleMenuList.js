import { DASHBOARD, GOOGLE_DEVICES, ORGANISATION, ORG_OVERVIEW, PRE_PROVISIONING_TOKEN } from '~/constants/Routes'

export const GOOGLE_MENU_ITEMS = [
  {
    title: 'Dashboard',
    url: DASHBOARD,
    icon: 'flutter_dash',
    permission: 'dashboard'
  },
  {
    title: 'Devices',
    url: GOOGLE_DEVICES,
    icon: 'devices',
    permission: 'devices'
  },
  {
    title: 'Organisations',
    url: ORGANISATION,
    icon: 'groups',
    permission: 'organisations',
    children: [
      {
        title: 'Organisations',
        url: ORGANISATION,
        icon: 'dvr',
        permission: 'organisations'
      },
      {
        title: 'Overview',
        url: ORG_OVERVIEW,
        icon: 'overview',
        permission: 'organisations-overview'
      },
      {
        title: 'Pre Provisioning Token',
        url: PRE_PROVISIONING_TOKEN,
        icon: 'tag',
        permission: 'grouptags'
      }
    ]
  }
]
