import {
  AppRegistration,
  BookOnline,
  Bookmarks,
  ContactEmergency,
  HeartBroken,
  HomeMax,
  Login
} from '@mui/icons-material'
import {
  CATEGORIES,
  CONTACT,
  DASHBOARD,
  LOGIN,
  LOVELIST,
  REGISTER,
  STORY
} from '../../../../constants/Routes'

export const BOOKER_MENU = [
  {
    title: 'Trang Chu',
    url: DASHBOARD,
    icon: <HomeMax />,
    permission: 'trangChu'
  },
  {
    title: 'Truyen',
    url: STORY,
    icon: <BookOnline />,
    permission: 'truyen'
    // children: [
    //   {
    //     title: 'Organisations',
    //     url: ORGANISATION,
    //     icon: 'dvr',
    //     permission: 'organisations'
    //   },
    //   {
    //     title: 'Overview',
    //     url: ORG_OVERVIEW,
    //     icon: 'overview',
    //     permission: 'organisations-overview'
    //   },
    //   {
    //     title: 'Group Tags',
    //     url: GROUPTAGS,
    //     icon: 'tag',
    //     permission: 'grouptags'
    //   }
    // ]
  },
  {
    title: 'Truyen Da Danh Dau',
    url: LOVELIST,
    icon: <HeartBroken />,
    permission: 'truyen-da-danh-dau'
  },
  {
    title: 'Danh Muc',
    url: CATEGORIES,
    icon: <Bookmarks />,
    permission: 'danhMuc'
  },
  {
    title: 'Lien He',
    url: CONTACT,
    icon: <ContactEmergency />,
    permission: 'lienHe'
  },
  {
    title: 'Dang Ky Thanh Vien',
    url: REGISTER,
    icon: <AppRegistration />,
    permission: 'dangKyThanhVien'
  },
  {
    title: 'Dang Nhap',
    url: LOGIN,
    icon: <Login />,
    permission: 'dangNhap'
  }
]
