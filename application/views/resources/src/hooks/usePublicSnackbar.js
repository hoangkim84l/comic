import { useCallback, useState } from "react";

const useSnackBar = () => {
  const [snackbarConfig, setSnackbarConfig] = useState(null);

  const openSnackbar = useCallback(({ message, type = "success" }) => {
    setSnackbarConfig({ message, type });
  }, []);

  const hideSnackbar = useCallback(() => {
    setSnackbarConfig(null);
  }, []);

  return {
    snackbarOpen: !!snackbarConfig,
    snackbarConfig,
    openSnackbar,
    hideSnackbar,
  };
};

export default useSnackBar;
