import {
  DASHBOARD,
  AZURE_DEVICES,
  GROUPTAGS,
  ORGANISATION,
  ORG_OVERVIEW
} from '../../../../constants/Routes'
import Book from '@mui/icons-material/Book'

export const BOOKER_MENU = [
  {
    title: 'Trang Chu',
    url: DASHBOARD,
    icon: <Book />,
    permission: 'dashboard'
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
