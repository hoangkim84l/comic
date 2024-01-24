import axiosClient from "./base";

export const authenticateWithMicrosoft = (accessToken) =>
  axiosClient.post("/api/auth/microsoft", {
    access_token: accessToken,
  });

export const authenticateWithGoogle = (data) =>
  axiosClient.post("api/sso/google/authorize", { ...data });

export const requestGoogleOAuth = () => axiosClient.post("/api/sso/google");

export const getUserProfile = () => axiosClient.get("api/me");
export const updateActiveTenantApi = (id) =>
  axiosClient.post("api/me/update-active-tenant", {
    id: id,
  });
