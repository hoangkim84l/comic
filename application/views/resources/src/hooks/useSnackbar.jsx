import { Alert, Snackbar } from "@mui/material";
import { t } from "i18next";
import { useCallback, useState } from "react";

export const useSnackbar = () => {
  const [message, setMessage] = useState();
  const [type, setType] = useState();
  const [open, setOpen] = useState();
  const [autoHideDuration, setAutoHideDuration] = useState();
  const showSnackbar = useCallback(
    (message, type = "info", autoHideDuration = 3000) => {
      setMessage(message);
      setType(type);
      setOpen(true);
      setAutoHideDuration(autoHideDuration);
    },
    []
  );

  const snackbar = (
    <Snackbar
      open={open}
      onClose={() => setOpen(false)}
      autoHideDuration={autoHideDuration}
      anchorOrigin={{
        horizontal: "center",
        vertical: "top",
      }}
      sx={{ marginTop: "70px" }}
    >
      <Alert severity={type}>{t(message)}</Alert>
    </Snackbar>
  );

  return { showSnackbar, snackbar };
};
