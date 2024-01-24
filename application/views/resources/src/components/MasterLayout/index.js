import { connect } from 'react-redux'
// import { selectAdmin } from '~/store/adminAuth/selector'
// import { selectUser } from '~/store/auth/selector'
import MasterLayout from './MasterLayout'

const mapStateToProps = state => {
  return {
    // isAuthenticated: !!selectUser(state),
    // isAdminAuthenticated: !!selectAdmin(state)
    isAuthenticated: true,
    isAdminAuthenticated: false
  }
}

const mapDispatch = {}

export default connect(mapStateToProps, mapDispatch)(MasterLayout)
