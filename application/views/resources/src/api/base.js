import Axios from "axios";
import { enqueueSnackbar } from "notistack";
import { KEY_AUTH_TOKEN } from "~/constants/constants";
import { parseApiErrorMessage } from "~/utils/helpers";

const REQUEST_TIMEOUT = 30000;
const REQUEST_FORM_TIMEOUT = 30000;

export const axiosClient = Axios.create({
  baseURL: import.meta.env.VITE_BASE_API_URL,
  headers: {
    Accept: "application/json",
    ContentType: "application/json",
  },
  timeout: REQUEST_TIMEOUT,
});

export const axiosFormClient = Axios.create({
  baseURL: import.meta.env.VITE_BASE_API_URL,
  headers: {
    Accept: "application/json",
    contentType: "multipart/form-data",
  },
  processData: false,
  mimeType: "multipart/form-data",
  contentType: false,
  timeout: REQUEST_FORM_TIMEOUT,
});

axiosClient.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    if (error.response) {
      const message = parseApiErrorMessage(error);
      enqueueSnackbar({
        message,
        variant: "error",
      });
    }

    return Promise.reject(error);
  }
);

export const setApiClientAuthToken = (t) => {
  axiosClient.defaults.headers.common.Authorization = `Bearer ${t}`;
  axiosClient.defaults.headers.common["X-CSRF-TOKEN"] = t;
  axiosFormClient.defaults.headers.common.Authorization = `Bearer ${t}`;
  axiosFormClient.defaults.headers.common["X-CSRF-TOKEN"] = t;
};

setApiClientAuthToken(localStorage.getItem(KEY_AUTH_TOKEN)); // initiate the token from localStorage

export default axiosClient;
