import { combineReducers, configureStore } from "@reduxjs/toolkit";
import authSlice from "./auth/slice";
import menuSlice from "./menu/slice";
import snackbarSlice from "./snackbar/slice";
import registrationSlice from "./registration/slices";
import adminSlice from "./adminAuth/slice";

const combinedReducer = combineReducers({
  auth: authSlice.reducer,
  menu: menuSlice.reducer,
  snackbar: snackbarSlice.reducer,
  registration: registrationSlice.reducer,
  adminAuth: adminSlice.reducer,
});

const reducers = (state, action) => {
  return combinedReducer(state, action);
};

export default configureStore({
  reducer: reducers,
});
