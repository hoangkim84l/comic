import React from 'react'
import PropTypes from 'prop-types'
import { Snackbar, Alert } from '@mui/material'

const StyledSnackbar = ({ open, onClose, message, type, duration }) => {
  return (
    <Snackbar
      open={open}
      autoHideDuration={duration}
      onClose={onClose}
      anchorOrigin={{
        horizontal: 'center',
        vertical: 'top'
      }}
      sx={{ marginTop: '70px' }}
    >
      <Alert severity={type}>{message}</Alert>
    </Snackbar>
  )
}

StyledSnackbar.propTypes = {
  message: PropTypes.string,
  type: PropTypes.string,
  open: PropTypes.bool.isRequired,
  onClose: PropTypes.func.isRequired,
  duration: PropTypes.number
}

StyledSnackbar.defaultProps = {
  message: '',
  type: 'info',
  duration: 3000
}

export default StyledSnackbar
