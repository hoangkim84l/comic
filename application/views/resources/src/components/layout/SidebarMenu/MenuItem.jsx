import PropTypes from 'prop-types'
import MenuItemGroup from './MenuItemGroup'
import MenuItemLink from './MenuItemLink'

const MenuItem = ({ item }) => {
  if (item.children) {
    return <MenuItemGroup key={item.title} item={item} />
  } else {
    return <MenuItemLink key={item.title} item={item} />
  }
}

MenuItem.propTypes = {
  item: PropTypes.object
}

export default MenuItem
