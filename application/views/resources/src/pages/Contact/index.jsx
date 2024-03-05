import { yupResolver } from '@hookform/resolvers/yup'
import { LoadingButton } from '@mui/lab'
import { Box, TextField, Typography } from '@mui/material'
import { enqueueSnackbar } from 'notistack'
import { useForm } from 'react-hook-form'
import { useTranslation } from 'react-i18next'
import { useNavigate } from 'react-router-dom'
import * as yup from 'yup'
import { useAddContactMutation } from './mutate'

const schema = yup
  .object({
    contact_email: yup.string().required(),
    contact_person_name: yup.string().required(),
    mobile_number: yup.string().required()
  })
  .required()

const Contact = () => {
  const { t } = useTranslation()
  // const user = useSelector(selectUser)
  const navigate = useNavigate()
  const { mutate, isLoading } = useAddContactMutation()
  const onSubmit = async values => {
    mutate(values, {
      onSuccess: () => {
        enqueueSnackbar({
          message: 'Successfully Registered',
          variant: 'success'
        })

        navigate({ pathname: '/login' })
      }
    })
  }

  const {
    register,
    handleSubmit,
    formState: { errors },
    control
  } = useForm({
    resolver: yupResolver(schema),
    defaultValues: {
      contact_email: 'user?.contact_email',
      contact_person_name: 'user?.contact_person_name',
      mobile_number: 'user?.mobile_number',
      store_device_details_not_under_contract: true,
      capture_device_entitlements_not_under_contract: true
    }
  })
  return (
    <>
      <form onSubmit={handleSubmit(onSubmit)}>
        <Box sx={{ mb: 2 }}>
          <Typography>
            Contact person name <span style={{ color: 'red' }}>*</span>
          </Typography>
          <TextField
            fullWidth
            variant='outlined'
            {...register('contact_person_name')}
            error={!!errors.contact_person_name}
            helperText={<>{errors.contact_person_name?.message}</>}
          />
        </Box>

        <Box sx={{ mb: 2 }}>
          <Typography>
            Mobile phone <span style={{ color: 'red' }}>*</span>
          </Typography>
          <TextField
            fullWidth
            variant='outlined'
            {...register('mobile_number')}
            error={!!errors.mobile_number}
            helperText={<>{errors.contact_person_name?.message}</>}
          />
        </Box>

        <Box sx={{ mb: 2 }}>
          <Typography>
            Contact Email <span style={{ color: 'red' }}>*</span>
          </Typography>
          <TextField
            fullWidth
            variant='outlined'
            sx={{ width: '100%' }}
            {...register('contact_email')}
            error={!!errors.contact_email}
            helperText={<>{errors.contact_person_name?.message}</>}
          />
        </Box>

        <Box sx={{ mb: 2 }}>
          <LoadingButton
            variant='contained'
            type='submit'
            loading={isLoading}
            sx={{ mt: 1, mr: 1, textTransform: 'none', backgroundColor: '#76B72A' }}
          >
            Submit
          </LoadingButton>
        </Box>
      </form>
    </>
  )
}

export default Contact
