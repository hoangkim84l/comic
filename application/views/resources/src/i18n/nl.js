// eslint-disable-next-line import/no-anonymous-default-export
export default {
  translation: {
    general: {
      searchFor: 'Zoeken naar ',
      serials_or_State: 'serienummers of staat',
      serials_or_importStatus: 'serienummers of status',
      serials_or_AadDeviceId: 'serials or AadDeviceId',
      serials_or_preProvisioningToken: 'serials or Pre Provisioning Token',
      name_or_domain_name: 'Name or Domain Name',
      schoolName: 'schoolnaam',
      dashboard: 'Dashboard',
      yourAccountAreAllSet: 'Je account is klaar!',
      hasIntuneLicenceValid:
        'De verbinding met de tenant is verbroken, geef de app opnieuw toestemming',
      grantAppPermission: 'Ken rechten toe aan applicatie.',
      tenantOverview: 'Overzicht huurders',
      registerSessionOverview: 'Overzicht apparaatsessies registreren',
      healthCheck: 'Gezondheids controle',
      syncDevice: 'Apparaat Synchroniseren',
      syncingDevice: 'Apparaten synchroniseren',
      overview: 'Overzicht'
    },
    login: {
      loginButton: 'Inloggen',
      welcomeTitle: 'Welkom bij easy4Device!'
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
      signOut: 'Uitloggen',
      openSetting: 'Open instelling'
    },
    message: {
      authenticationFail: 'Verificatie mislukt',
      noData: 'Geen gegevens'
    },
    pages: {
      device: {
        serialNumber: 'Serienummer',
        state: 'Staat',
        aadDeviceId: 'AAD Apparaat ID',
        vendor: 'Leverancier',
        model: 'Model',
        osSystem: 'Besturingssysteem',
        osVersion: 'OS versie',
        groupTag: 'Groepslabel',
        profile: 'Inschrijvingsprofiel',
        action: 'Actie',
        googleDeviceCreated: 'Google-apparaat gemaakt',
        overview: {
          pageTitle: 'Lijst met apparaten'
        },
        create: {
          pageTitle: 'Registreer een apparaat',
          serialNumber: 'Serienummer',
          productKey: 'Product sleutel',
          hardwareHash: 'Hardware-hash',
          hardwareModel: 'Hardware-model',
          domain: 'Domein',
          customerId: 'Klanten ID',
          attestedDeviceId: 'Geattesteerde apparaat-ID',
          externalID: 'Externe ID'
        },
        detail: {
          deviceOverview: 'Apparaat overzicht',
          deviceInformation: 'Apparaat informatie',
          deviceSessionInformation: 'Apparaat sessie informatie'
        },
        status: 'Status',
        error_name: 'Foutbeschrijving',
        register_status: 'Register status',
        preProvisioningToken: 'Pre-provisioning-token',
        preProvisionedDeviceId: 'Vooraf ingerichte apparaat-ID',
        brandCode: 'Merkcode',
        putDeviceToRepair: 'Wilt u dit apparaat ter reparatie aanbieden',
        azureTenant: 'Azure Tenant',
        googleDomain: 'Google Domain',
        deleteDevices: 'Wilt u deze apparaten afmelden?',
        deleteDevice: 'Wilt u dit apparaat afmelden:',
        registerSession: {
          ipAddress: 'IP adres',
          complete: 'Voltooid',
          serialNumber: 'Serienummer',
          state: 'Staat',
          successCode: 'Succes Code',
          createdAt: 'Gemaakt Bij',
          updatedAt: 'Bijgewerkt Op',
          message: 'Bericht',
          completed: 'Voltooid',
          organisation: 'Organisatie'
        }
      },
      organisation: {
        Id: 'ID',
        name: 'Naam',
        school: 'School',
        tenantID: 'Huurder ID',
        groupTag: 'Groepslabel',
        devices: 'Apparaten',
        externalId: 'Externe ID',
        nameShort: 'Naam kort',
        parentExternalId: 'Ouder extern',
        entityId: 'Entiteit ID',
        defaultGroupTag: 'Standaard groepstag',
        groupTagLoaner: 'Group Tag Leensysteem',
        contact: 'Contact',
        updateGroupTag: 'Groepstags bijwerken',
        removeOrganisationFromTenant: 'Organisatie verwijderen uit Tenant',
        doYouWantToRemoveOrganisationFromTenant: 'Wilt u de organisatie verwijderen uit de Tenant',
        confirm: 'Bevestigen',
        cancel: 'Annuleren',
        organisationInformation: 'Organisatie informatie',
        preprovisioningToken: 'Preprovisioning Token',
        devices: 'Devices',
        organisation: 'Organisatie',
        updateToken: 'Update Provisioning Token'
      },
      tenant: {
        name: 'Naam',
        defaultDomainName: 'Standaard domeinnaam',
        initialDomainName: 'Oorspronkelijke domeinnaam',
        tenantId: 'Huurder/domein-ID',
        active: 'Actief',
        updatedAt: 'Bijgewerkt op',
        hostedDomain: 'Gehost domein',
        checkStatus: 'Controleer de status'
      },
      healthCheck: {
        lastConnection: 'Laatste verbinding',
        applicationConnection: 'Toepassing verbinding',
        permissions: 'Rechten',
        cname: 'Stuurautomaat CNAME'
      }
    },
    validation: {
      emailRequired: 'E-mail is een verplicht veld.',
      emailInvalid: 'E-mail is een ongeldig formaat.'
    }
  }
}
