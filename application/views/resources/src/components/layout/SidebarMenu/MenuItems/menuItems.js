import { BOOKER_MENU } from './bookerMenu'

const collectAllChildrenUrls = item => {
  if (Array.isArray(item.children) && item.children.length > 0) {
    return [item.url, item.children.map(collectAllChildrenUrls)]
  }
  return [item.url]
}

const collectAllPermission = item => {
  if (Array.isArray(item.children) && item.children.length > 0) {
    return [item.permission, item.children.map(collectAllPermission)]
  }
  return [item.permission]
}

const mapSubitemUrlsToParent = (items, level = 1) => {
  return items.map(item => {
    if (!Array.isArray(item.children)) {
      return { ...item, level }
    }

    return {
      ...item,
      level,
      match_urls: collectAllChildrenUrls(item)
        .flat(Infinity)
        .filter(i => !!i),
      permissions_group: collectAllPermission(item)
        .flat(Infinity)
        .filter(i => !!i),
      children: mapSubitemUrlsToParent(item.children, level + 1)
    }
  })
}

const menuItems = mapSubitemUrlsToParent(BOOKER_MENU)

export { menuItems }
