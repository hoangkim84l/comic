import { combineReducers, configureStore } from '@reduxjs/toolkit'
import authSlice from './auth/slice'
import menuSlice from './menu/slice'
import snackbarSlice from './snackbar/slice'

const combinedReducer = combineReducers({
  auth: authSlice.reducer,
  menu: menuSlice.reducer,
  snackbar: snackbarSlice.reducer
})

const reducers = (state, action) => {
  return combinedReducer(state, action)
}

export default configureStore({
  reducer: reducers
})
