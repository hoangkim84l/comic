import React, { createContext, useContext } from 'react'
import PropTypes from 'prop-types'
import useSnackBar from '~/hooks/usePublicSnackbar'
import StyledSnackbar from '../StyledSnackbar'

const StyledDialogContext = createContext({})

export const useDialogContext = () => useContext(StyledDialogContext)

const StyledDialogProvider = ({ children }) => {
  const { snackbarOpen, snackbarConfig, openSnackbar, hideSnackbar } = useSnackBar()

  return (
    <StyledDialogContext.Provider
      value={{
        openSnackbar,
        hideSnackbar
      }}
    >
      <StyledSnackbar
        open={snackbarOpen}
        onClose={hideSnackbar}
        message={snackbarConfig?.message}
        type={snackbarConfig?.type}
        duration={snackbarConfig?.duration}
      />
      {children}
    </StyledDialogContext.Provider>
  )
}

StyledDialogProvider.propTypes = {
  children: PropTypes.oneOfType([PropTypes.arrayOf(PropTypes.node), PropTypes.node]).isRequired
}

export default StyledDialogProvider
