import axiosClient from './base'

// ACCOUNT
export const register = data => axiosClient.post('/api/register', { ...data })

export const authenticate = data => axiosClient.post('/api/login', { ...data })

// STORY APIs
export const getStories = () => axiosClient.get('api/st/get-list-stories')
export const getStory = id => axiosClient.get(`api/st/get-story/${id}`)
export const getStoryViewsHigh = () => axiosClient.get(`api/st/get-story-views`)
export const getStoryNew = () => axiosClient.get(`api/st/get-story-new`)
export const addStoryViewRecently = id => axiosClient.get(`api/st/add-story-view-recently/${id}`)
export const getStoryViewRecently = id => axiosClient.get(`api/st/get-story-view-recently`)

// CHAPTER APIs
export const getListChapters = id => axiosClient.get(`api/ct/get-list-chapters/${id}`)
export const getChapter = id => axiosClient.get(`api/ct/get-chapter/${id}`)
export const getListChaptersNoPaginate = id =>
  axiosClient.get(`api/ct/get-list-chapters-no-paginate/${id}`)
export const getNewChapters = id => axiosClient.get(`api/ct/get-list-new-chapters`)

// CATALOG APIs
export const getListCategories = () => axiosClient.get(`api/ctl/get-list-catalog`)
export const getCategory = id => axiosClient.get(`api/ctl/get-catalog/${id}`)
export const getListStoriesByCategory = id =>
  axiosClient.get(`api/ctl/get-stories-by-category-id/${id}`)

// CONTACT APIs
export const addContact = data => axiosClient.post('api/contact/add-contact', { ...data })

// CONTACT APIs
export const addLoveList = data => axiosClient.post('api/ll/add-lovelist', { ...data })
