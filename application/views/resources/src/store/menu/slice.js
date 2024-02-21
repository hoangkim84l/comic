import { createSlice } from '@reduxjs/toolkit'

export const menuSlice = createSlice({
  name: 'menuOpen',
  initialState: {
    open: true
  },
  reducers: {
    setIsOpenMenu: (state, action) => {
      state.open = action.payload
    }
  }
})

export const { setIsOpenMenu } = menuSlice.actions

export default menuSlice
