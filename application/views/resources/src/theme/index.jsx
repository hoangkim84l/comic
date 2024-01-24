import PropTypes from 'prop-types'
import { useMemo } from 'react'
// material
import { CssBaseline } from '@mui/material'
import {
  ThemeProvider as MUIThemeProvider,
  createTheme,
  StyledEngineProvider
} from '@mui/material/styles'
//
import typography from './typography/typography'
import palette from './palette'

// ----------------------------------------------------------------------

ThemeProvider.propTypes = {
  children: PropTypes.node
}

export default function ThemeProvider ({ children }) {
  const themeOptions = useMemo(
    () => ({
      palette,
      typography
    }),
    []
  )

  const theme = createTheme(themeOptions)

  return (
    <StyledEngineProvider injectFirst>
      <MUIThemeProvider theme={theme}>
        <CssBaseline />
        {children}
      </MUIThemeProvider>
    </StyledEngineProvider>
  )
}
