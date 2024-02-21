import { createSlice } from '@reduxjs/toolkit'

export const snackbarSlice = createSlice({
  name: 'snackbar',
  initialState: {
    snackbar: null
  },
  reducers: {
    setSnackbar: (state, action) => {
      state.snackbar = action.payload
    },
    unsetSnackbar: (state, action) => {
      state.snackbar = null
    }
  }
})

export const { setSnackbar, unsetSnackbar } = snackbarSlice.actions

export default snackbarSlice
