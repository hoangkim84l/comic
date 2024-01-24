import { SnackbarProvider } from 'notistack'
import React from 'react'
import { useTranslation } from 'react-i18next'
import { QueryClient, QueryClientProvider } from 'react-query'
import { ReactQueryDevtools } from 'react-query/devtools'
import { Provider } from 'react-redux'
import { BrowserRouter } from 'react-router-dom'
// import ScrollUpButton from './components/Button/ScrollUpButton'
import MasterLayout from './components/MasterLayout'
import StyledDialogProvider from './components/providers/StyledDialogProvider'
import store from './store'
import ThemeProvider from './theme'

const queryClient = new QueryClient({
  defaultOptions: {
    queries: {
      // refetchOnWindowFocus: false,
    }
  }
})

export default function App() {
  const { i18n } = useTranslation()

  const locale = localStorage.getItem('LOCALE')

  React.useEffect(() => {
    i18n.changeLanguage(locale)
  }, [locale, i18n])

  return (
    <React.StrictMode>
      <SnackbarProvider anchorOrigin={{ vertical: 'top', horizontal: 'center' }} />

      <Provider store={store}>
        <StyledDialogProvider>
          <QueryClientProvider client={queryClient}>
            <BrowserRouter>
              <ThemeProvider>
                <MasterLayout />
                {/* <ScrollUpButton /> */}
              </ThemeProvider>
            </BrowserRouter>
            <ReactQueryDevtools initialIsOpen={false} />
          </QueryClientProvider>
        </StyledDialogProvider>
      </Provider>
    </React.StrictMode>
  )
}
