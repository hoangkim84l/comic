import { useCallback } from "react";
import { matchPath, useLocation } from "react-router-dom";

export const useRouteMatch = (route) => {
  const { pathname } = useLocation();

  const matchRoute = useCallback(
    (path) => !!matchPath({ path, end: false }, pathname),
    [pathname]
  );

  if (Array.isArray(route)) {
    return route.some((item) => matchRoute(item));
  }

  return matchRoute(route);
};
