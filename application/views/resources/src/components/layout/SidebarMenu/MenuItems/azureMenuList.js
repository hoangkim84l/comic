import { DASHBOARD, AZURE_DEVICES, GROUPTAGS, ORGANISATION, HEALTH_CHECK, ORG_OVERVIEW } from '~/constants/Routes'

export const AZURE_MENU_ITEMS = [
  {
    title: 'Dashboard',
    url: DASHBOARD,
    icon: 'flutter_dash',
    permission: 'dashboard',
    children: [
        {
            title: 'Dashboard Overview',
            url: DASHBOARD,
            icon: 'dashboard',
            permission: 'dashboard'
          },
        {
          title: 'Health Check',
          url: HEALTH_CHECK,
          icon: 'favorite',
          permission: 'healthcheck'
        },
    ],
  },
  {
    title: 'Devices',
    url: AZURE_DEVICES,
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
        title: 'Group Tags',
        url: GROUPTAGS,
        icon: 'tag',
        permission: 'grouptags'
      }
    ]
  }
]
