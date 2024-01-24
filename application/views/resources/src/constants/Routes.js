export const DASHBOARD = "/dashboard";

//Google routes
export const GOOGLE_LOGIN_REDIRECT = "/google-login-redirect";
export const GOOGLE_REGISTRATION = "/google-registration";
export const GOOGLE_DEVICE_DETAIL = "/google/devices/:id";
export const GOOGLE_DEVICE_NEW = "/google/devices/new";
export const GOOGLE_DEVICES = "/google/devices";
export const PRE_PROVISIONING_TOKEN = "/google/provisioning-tokens";

//Azure routes
export const AZURE_DEVICES = "/azure/devices";
export const AZURE_DEVICE_NEW = "/azure/devices/new";
export const AZURE_DEVICE_DETAIL = "/azure/devices/:id";
export const GROUPTAGS = "azure/group-tags";
export const ORG_OVERVIEW = "azure/organisation-overview";

export const ORGANISATION = "/organisations";

export const HEALTH_CHECK = "/health-check";

export const ADMIN_LOGIN = "/overview/login";
export const ADMIN_OVERVIEW = "/overview/tenants";
export const OVERVIEW_TENANTS_DETAIL = "/overview/tenants/:tenantId";
export const OVERVIEW_DEVICE_REGISTER_SESSION_DETAIL =
  "/overview/devices-register-sessions/:sessionId";
export const ADMIN_DEVICES = "/overview/devices";
export const ADMIN_DEVICE_REGISTER_SESSIONS =
  "/overview/devices-register-sessions";
export const ADMIN_AZURE_DEVICE_DETAIL = "/overview/devices/azure/:id";
export const ADMIN_GOOGLE_DEVICE_DETAIL = "/overview/devices/google/:id";
