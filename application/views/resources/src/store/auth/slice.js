import { createSlice } from '@reduxjs/toolkit'

export const userSlice = createSlice({
  name: 'auth',
  initialState: {
    user: null,
    ssoRedirectUrl: null,
    userPermission: [],
    isAuthenticating: false
  },
  reducers: {
    setUser: (state, action) => {
      state.user = action.payload
    },
    logout: state => {
      state.user = null
    },
    setIsAuthenticating: (state, action) => {
      state.isAuthenticating = action.payload
    }
  }
})

export const { logout, setUser, setIsAuthenticating } = userSlice.actions

export default userSlice
