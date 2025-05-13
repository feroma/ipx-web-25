<template>
  <div id="contact-form" class="contact-form-panel">
    <a @click.prevent="closeMenu()" href="#" class="close-menu">
    <span>Close</span>
    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M3 11L14.5 22.5H34.5L46 11" stroke-width="2"/>
      <path d="M46 37.5L34.5 26L14.5 26L3 37.5"  stroke-width="2"/>
    </svg>
  </a>
    <div class="scrollable">
      <span @click.prevent="closeMenu" class="scrollable-overlay-bg"/>

      <div class="form-container">



        <h2>Please fill this form</h2>
        <p>Your message will be sent directly to our team, and one of our representatives will get back to you as soon as possible.</p>

        <!-- Alert per errori di validazione -->
        <div v-if="validationError" class="alert alert-danger" role="alert">
         <p class="text-danger">{{ validationMessage }}</p>
        </div>

        <form @submit.prevent="validateAndSubmit">
          <!-- First and Last Name - Separate fields -->
          <div class="form-row">
            <div class="form-group col-sm-7">
              <label for="firstName">First Name <span class="text-danger">*</span></label>
              <input
                  type="text"
                  class="form-control"
                  :class="{'is-invalid': errors.firstName}"
                  id="firstName"
                  v-model="formData.firstName"
                  required
              >
              <div v-if="errors.firstName" class="invalid-feedback">
                First name is required
              </div>
            </div>
            <div class="form-group col-sm-7">
              <label for="lastName">Last Name <span class="text-danger">*</span></label>
              <input
                  type="text"
                  class="form-control"
                  :class="{'is-invalid': errors.lastName}"
                  id="lastName"
                  v-model="formData.lastName"
                  required
              >
              <div v-if="errors.lastName" class="invalid-feedback">
                Last name is required
              </div>
            </div>
          </div>

          <div class="form-row">
            <!-- Organization -->
            <div class="form-group col-sm-7">
              <label for="organization">Organization <span class="text-danger">*</span></label>
              <input
                  type="text"
                  class="form-control"
                  :class="{'is-invalid': errors.organization}"
                  id="organization"
                  v-model="formData.organization"
                  required
              >
              <div v-if="errors.organization" class="invalid-feedback">
                Organization is required
              </div>
            </div>
            <!-- Location -->
            <div class="form-group col-sm-7">
              <label for="location">Location <span class="text-danger">*</span></label>
              <input
                  type="text"
                  class="form-control"
                  :class="{'is-invalid': errors.location}"
                  id="location"
                  v-model="formData.location"
                  required
              >
              <div v-if="errors.location" class="invalid-feedback">
                Location is required
              </div>
            </div>
          </div>

          <div class="form-row">
            <!-- Email -->
            <div class="form-group col-sm-10">
              <label for="email">Email <span class="text-danger">*</span></label>
              <input
                  type="email"
                  class="form-control"
                  :class="{'is-invalid': errors.email}"
                  id="email"
                  v-model="formData.email"
                  required
              >
              <div v-if="errors.email" class="invalid-feedback">
                A valid email is required
              </div>
            </div>

            <!-- Phone -->
            <div class="form-group col-sm-4">
              <label for="phone">Phone <span class="text-danger">*</span></label>
              <input
                  type="tel"
                  class="form-control"
                  :class="{'is-invalid': errors.phone}"
                  id="phone"
                  v-model="formData.phone"
                  required
              >
              <div v-if="errors.phone" class="invalid-feedback">
                Phone number is required
              </div>
            </div>
          </div>

          <!-- Select Aircraft - Custom Checkboxes -->
          <div class="form-group">
            <label>Select Aircraft <span class="text-danger">*</span></label>
            <div class="small-note mb-2 font-italic">**Available for USA Department of Defense customers only.</div>
            <div v-if="errors.selectedAircraft" class="text-danger mb-2">
              Please select at least one aircraft
            </div>

            <div v-for="aircraft in aircraftOptions" :key="aircraft.value" class="custom-control custom-checkbox custom-control-inline">
              <input
                  type="checkbox"
                  class="custom-control-input"
                  :id="aircraft.value"
                  :value="aircraft.value"
                  v-model="formData.selectedAircraft"
              >
              <label class="custom-control-label" :for="aircraft.value">
                {{ aircraft.label }}
                <span v-if="aircraft.dod">**</span>
              </label>
            </div>
          </div>

          <div class="form-row">
            <!-- Number of Seats -->
            <div class="form-group col-sm-6">
              <label for="seats">No. of Seats <span class="text-danger">*</span></label>
              <input
                  type="number"
                  class="form-control"
                  :class="{'is-invalid': errors.seats}"
                  id="seats"
                  min="1"
                  v-model="formData.seats"
                  required
              >
              <div v-if="errors.seats" class="invalid-feedback">
                Please specify a valid number of seats (minimum 1)
              </div>
            </div>

            <!-- Options - Custom Checkboxes -->
            <div class="form-group col-sm-7 offset-sm-1">
              <label>Options <span class="text-danger">*</span></label>
              <div v-if="errors.selectedOptions" class="text-danger mb-2">
                Please select at least one option
              </div>

              <div v-for="option in optionsAvailable" :key="option.value" class="custom-control custom-checkbox custom-control-inline">
                <input
                    type="checkbox"
                    class="custom-control-input"
                    :id="option.value"
                    :value="option.value"
                    v-model="formData.selectedOptions"
                >
                <label class="custom-control-label" :for="option.value">{{ option.label }}</label>
              </div>
            </div>

          </div>


          <!-- Additional Project Needs -->
          <div class="form-group">
            <label for="additionalNeeds">Additional Project Needs</label>
            <div class="small-note mb-2 font-italic">Please provide any other details to indicate your project needs</div>
            <textarea class="form-control" id="additionalNeeds" rows="4" v-model="formData.additionalNeeds"></textarea>
          </div>

          <div class="main-button-wrapper d-flex justify-content-end">
            <button type="submit" class="main-button">

              <span class="label">Submit</span>
              <svg class="icon" width="34" height="36" viewBox="0 0 34 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M30.1364 35.5L3.86364 35.5C1.72981 35.5 -7.56124e-08 33.7702 -1.68885e-07 31.6364L2.69187e-06 4.36361C2.87635e-06 2.22978 1.72981 0.499973 3.86363 0.499973L23.6366 0.499972C25.6567 0.499972 27.5965 1.29106 29.0405 2.70378L31.6766 5.28287C33.1625 6.73657 34 8.72762 34 10.8063L34 31.6364C34 33.7702 32.2702 35.5 30.1364 35.5Z" fill="#002358"/>
                <path d="M20 11L27.4834 17.8571C28.1722 18.4883 28.1722 19.5117 27.4834 20.1429L20 27" stroke="#ACD1E9"/>
              </svg>

              <svg class="bg" viewBox='0 0 1669 509' fill='none' xmlns='http://www.w3.org/2000/svg'>
                <path d='M1627.29 508.5H0V0H1668.5V467.287C1668.5 471.265 1666.92 475.08 1664.11 477.893L1637.89 504.107C1635.08 506.92 1631.26 508.5 1627.29 508.5Z'/>
              </svg>
            </button>
          </div>
          <!-- Submit Button -->

        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { useAppState } from '~/composables/useAppState'

const { changeHideOverflow, changeContactForm } = useAppState()

// Form data object to collect all inputs
const formData = reactive({
  firstName: '',
  lastName: '',
  organization: '',
  location: '',
  email: '',
  phone: '',
  selectedAircraft: [],
  seats: 1,
  selectedOptions: [],
  additionalNeeds: ''
})

// Validation errors
const errors = reactive({
  firstName: false,
  lastName: false,
  organization: false,
  location: false,
  email: false,
  phone: false,
  selectedAircraft: false,
  seats: false,
  selectedOptions: false
})

// Alert validation error
const validationError = ref(false)
const validationMessage = ref('')

// Array of aircraft options
const aircraftOptions = [
  { value: 't6a', label: 'T-6A', dod: true },
  { value: 't6b', label: 'T-6B', dod: true },
  { value: 't38c', label: 'T-38C', dod: true },
  { value: 't45c', label: 'T-45C', dod: true },
  { value: 'f35a', label: 'F-35A', dod: true },
  { value: 'c172', label: 'C-172', dod: false },
  { value: 'pa28', label: 'PA-28', dod: false },
  { value: 'da20', label: 'DA-20', dod: false },
  { value: 'da40', label: 'DA-40', dod: false },
  { value: 'da42', label: 'DA-42', dod: false }
]

// Array of available options
const optionsAvailable = [
  { value: 'wingman', label: 'WINGMAN™ Intelligent Tutor' },
  { value: 'ai-debrief', label: 'AI Debrief' },
  { value: 'remote-instructor', label: 'Remote Instructor' }
]

const closeMenu = () => {
  changeHideOverflow(false)
  changeContactForm(false)

}

// Reset all error flags
const resetErrors = () => {
  Object.keys(errors).forEach(key => {
    errors[key] = false
  })
  validationError.value = false
  validationMessage.value = ''
}

// Validate the form
const validateForm = () => {
  resetErrors()
  let isValid = true

  // Check text fields
  if (!formData.firstName.trim()) {
    errors.firstName = true
    isValid = false
  }

  if (!formData.lastName.trim()) {
    errors.lastName = true
    isValid = false
  }

  if (!formData.organization.trim()) {
    errors.organization = true
    isValid = false
  }

  if (!formData.location.trim()) {
    errors.location = true
    isValid = false
  }

  // Check email with regex
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (!formData.email.trim() || !emailRegex.test(formData.email)) {
    errors.email = true
    isValid = false
  }

  if (!formData.phone.trim()) {
    errors.phone = true
    isValid = false
  }

  // Check arrays
  if (formData.selectedAircraft.length === 0) {
    errors.selectedAircraft = true
    isValid = false
  }

  // Check number
  if (!formData.seats || formData.seats < 1) {
    errors.seats = true
    isValid = false
  }

  if (formData.selectedOptions.length === 0) {
    errors.selectedOptions = true
    isValid = false
  }

  // Show general error message if form is invalid
  if (!isValid) {
    validationError.value = true
    validationMessage.value = 'Please complete all required fields before submitting.'
  }

  return isValid
}

// Validate form and submit if valid
const validateAndSubmit = () => {
  if (validateForm()) {
    submitForm()
  } else {
    // Scroll to top to show error message
   // window.scrollTo(0, 0)
  }
}

// Reset the form to initial values
const resetForm = () => {
  Object.assign(formData, {
    firstName: '',
    lastName: '',
    organization: '',
    location: '',
    email: '',
    phone: '',
    selectedAircraft: [],
    seats: 1,
    selectedOptions: [],
    additionalNeeds: ''
  })
  resetErrors()
}

// Submit form data
const submitForm = () => {
  console.log('Form submitted:', formData)
  // Here you would send the data to your backend
  // const { $axios } = useNuxtApp()
  // $axios.post('/api/submit-form', formData)
  //   .then(response => {
  //     // Handle success
  //   })
  //   .catch(error => {
  //     // Handle error
  //   })

  // Success message
  validationError.value = false
  alert('Form submitted successfully!')

  const {
    firstName, lastName, organization, location,
    email, phone, selectedAircraft, seats,
    selectedOptions, additionalNeeds
  } = formData

  const subject = encodeURIComponent(`New contact from ${firstName} ${lastName}`)

  const body = encodeURIComponent(
      `Name: ${firstName} ${lastName}\n` +
      `Organization: ${organization}\n` +
      `Location: ${location}\n` +
      `Email: ${email}\n` +
      `Phone: ${phone}\n\n` +
      `Selected Aircraft: ${selectedAircraft.join(', ')}\n` +
      `Seats Needed: ${seats}\n` +
      `Selected Options: ${selectedOptions.join(', ')}\n` +
      `Additional Needs:\n${additionalNeeds}`
  )

  const mailtoLink = `mailto:your@email.com?subject=${subject}&body=${body}`
  window.location.href = mailtoLink
  console.log('=======================MAIL')
  console.log('subject: ' + subject)
  console.log('body: ')
  console.log('---------------------------')

  // Optional: Reset form after successful submission
  // resetForm()
}
</script>

<style scoped>

</style>