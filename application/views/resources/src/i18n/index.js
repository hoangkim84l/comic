import i18n from 'i18next'
import { initReactI18next } from 'react-i18next'
import { DEFAULT_LANGUAGE } from '../constants/constants'
import en from './en'
import nl from './nl'

// the translations
// (tip move them in a JSON file and import them)
const resources = {
  en,
  nl
}

i18n
  .use(initReactI18next) // passes i18n down to react-i18next
  .init({
    resources,
    fallbackLng: 'en',
    lng: DEFAULT_LANGUAGE,
    ns: ['translation'],
    defaultNS: 'translation',

    interpolation: {
      escapeValue: false // react already safes from xss
    }
  })

export default i18n

const translation = i18n.t.bind(i18n)
export { translation }
