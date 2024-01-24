// eslint-disable-next-line import/no-anonymous-default-export
export default {
  translation: {
    general: {
      searchFor: 'Search for ',
      serials_or_State: 'serials or state',
      serials_or_importStatus: 'serials or status',
      serials_or_AadDeviceId: 'serials or AadDeviceId',
      serials_or_preProvisioningToken: 'serials or Pre Provisioning Token',
      name_or_domain_name: 'Name or Domain Name',
      schoolName: 'school name',
      dashboard: 'Dashboard',
      yourAccountAreAllSet: 'Your account are all set!',
      hasIntuneLicenceValid:
        'The connection with the tenant is lost, please grant the app permission',
      grantAppPermission: 'Grant App Permission',
      tenantOverview: 'Tenant Overview',
      registerSessionOverview: 'Register Device Sessions Overview',
      healthCheck: 'Health Check',
      syncDevice: 'Sync Devices',
      syncingDevice: 'Syncing Devices',
      overview: 'Overview'
    },
    login: {
      loginButton: 'Login',
      welcomeTitle: 'Welcome to easy4Enroll!'
    },
    breadCrumb: {
      Home: 'Home',
      Dashboard: 'Dashboard',
      Devices: 'Devices'
    },
    button: {
      create: 'Create',
      register: 'Register',
      edit: 'Edit',
      close: 'Close',
      save: 'Save',
      SignInWithMicrosoft: 'Sign in with Microsoft',
      SignInWithGoogle: 'Sign in with Google',
      registerEasy4Enroll: 'Register easy4Enroll app',
      grantAdminConsent: 'Grant Application Permissions',
      bulkDeregisBtn: 'Bulk deregister',
      deRegister: 'De-register',
      inRepair: 'In-repair',
      isRepaired: 'Is-Repaired',
      captureDevices: ''
    },
    profileSetting: {
      signOut: 'Sign out',
      openSetting: 'Open setting'
    },
    message: {
      authenticationFail: 'Authentication failed',
      noData: 'No data'
    },
    pages: {
      device: {
        serialNumber: 'Serial Number',
        state: 'State',
        aadDeviceId: 'AAD Device ID',
        vendor: 'Vendor',
        model: 'Model',
        osSystem: 'Operating system',
        osVersion: 'OS version',
        groupTag: 'Group Tag',
        profile: 'Enrollment Profile',
        action: 'Action',
        googleDeviceCreated: 'Google Device Created',
        overview: {
          pageTitle: 'List of Devices'
        },
        create: {
          pageTitle: 'Register a Device',
          serialNumber: 'Serial Number',
          productKey: 'Product Key',
          hardwareHash: 'Hardware Hash',
          hardwareModel: 'Hardware Model',
          domain: 'Domain',
          customerId: 'Customer ID',
          attestedDeviceId: 'Attested Device ID',
          externalID: 'External ID'
        },
        detail: {
          deviceOverview: 'Device Overview',
          deviceInformation: 'Device Information',
          deviceSessionInformation: 'Device Session Information'
        },
        status: 'Status',
        error_name: 'Error Description',
        register_status: 'Register status',
        preProvisioningToken: 'Pre Provisioning Token',
        preProvisionedDeviceId: 'Pre Provisioned Device Id',
        brandCode: 'Brand Code',
        putDeviceToRepair: 'Do you want to put this device to repair',
        azureTenant: 'Azure Tenant',
        googleDomain: 'Google Domain',
        deleteDevices: 'Do you want to deregister these devices?',
        deleteDevice: 'Do you want to deregister this device:',
        registerSession: {
          ipAddress: 'IP Address',
          complete: 'Completed',
          serialNumber: 'Serial Number',
          state: 'State',
          successCode: 'Success Code',
          createdAt: 'Created At',
          updatedAt: 'Updated At',
          message: 'Message',
          completed: 'Completed',
          organisation: 'Organisation'
        }
      },
      organisation: {
        Id: 'ID',
        name: 'Name',
        school: 'School',
        tenantID: 'TenantID',
        groupTag: 'Group Tag',
        devices: 'devices',
        externalId: 'External ID',
        nameShort: 'Name Short',
        parentExternalId: 'Parent External',
        entityId: 'Entity ID',
        defaultGroupTag: 'Default Group Tag',
        groupTagLoaner: 'Default Group Tag Loaner',
        contact: 'Contact',
        updateGroupTag: 'Update Group Tags',
        removeOrganisationFromTenant: 'Remove Organisation From Tenant',
        doYouWantToRemoveOrganisationFromTenant: 'Do you want to remove organisation from tenant',
        confirm: 'Confirm',
        cancel: 'Cancel',
        organisationInformation: 'Organisation Information',
        preprovisioningToken: 'Preprovisioning Token',
        devices: 'Devices',
        organisation: 'Organisation',
        updateToken: 'Update Provisioning Token'
      },
      tenant: {
        name: 'Name',
        defaultDomainName: 'Default Domain Name',
        initialDomainName: 'Initial Domain Name',
        tenantId: 'Tenant/Domain Id',
        active: 'Active',
        updatedAt: 'Updated At',
        hostedDomain: 'Hosted Domain',
        checkStatus: 'Check Status'
      },
      healthCheck: {
        lastConnection: 'Last connection',
        applicationConnection: 'Application connection',
        permissions: 'Permissions',
        cname: 'Autopilot CNAME'
      }
    },
    validation: {
      emailRequired: 'Email is a required field.',
      emailInvalid: 'Email is an invalid format.'
    }
  }
}
