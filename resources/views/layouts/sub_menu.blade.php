@can('manage_admin_dashboard')
    {{-- <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/dashboard*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/dashboard*') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}">{{ __('messages.dashboard') }}</a>
    </li> --}}

    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/dashboard*') ? 'd-none' : '' }}">
           <form class="d-flex position-relative aside-menu-container__aside-search search-control py-3 mt-1" style="background: none; width:600px; ">
            <div class="position-relative w-50">
                <input class="form-control" type="text" placeholder="{{ __('messages.common.search') }}" aria-label="Search" id="" style="background-color: #E9F1F6; border-radius:10px;">
                <span class="aside-menu-container__search-icon position-absolute d-flex align-items-center top-0 bottom-0">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path
                         d="M13.77 12.6659L11.1264 10.0301C11.9794 8.94347 12.4422 7.60162 12.4404 6.22022C12.4404 4.98998 12.0756 3.78736 11.3921 2.76445C10.7087 1.74154 9.73719 0.944282 8.60059 0.473489C7.464 0.0026951 6.21332 -0.120486 5.00672 0.119523C3.80011 0.359531 2.69178 0.951949 1.82186 1.82186C0.951949 2.69178 0.359531 3.80011 0.119523 5.00672C-0.120486 6.21332 0.0026951 7.464 0.473489 8.60059C0.944282 9.73719 1.74154 10.7087 2.76445 11.3921C3.78736 12.0756 4.98998 12.4404 6.22022 12.4404C7.60162 12.4422 8.94347 11.9794 10.0301 11.1264L12.6659 13.77C12.7382 13.8429 12.8242 13.9007 12.9189 13.9402C13.0137 13.9797 13.1153 14 13.218 14C13.3206 14 13.4222 13.9797 13.517 13.9402C13.6117 13.9007 13.6977 13.8429 13.77 13.77C13.8429 13.6977 13.9007 13.6117 13.9402 13.517C13.9797 13.4222 14 13.3206 14 13.218C14 13.1153 13.9797 13.0137 13.9402 12.9189C13.9007 12.8242 13.8429 12.7382 13.77 12.6659ZM1.55506 6.22022C1.55506 5.29754 1.82866 4.39558 2.34128 3.62839C2.85389 2.86121 3.58249 2.26327 4.43494 1.91017C5.28739 1.55708 6.2254 1.46469 7.13035 1.6447C8.0353 1.8247 8.86655 2.26902 9.51899 2.92145C10.1714 3.57389 10.6157 4.40514 10.7957 5.31009C10.9757 6.21504 10.8834 7.15305 10.5303 8.0055C10.1772 8.85795 9.57923 9.58655 8.81205 10.0992C8.04486 10.6118 7.1429 10.8854 6.22022 10.8854C4.98294 10.8854 3.79634 10.3939 2.92145 9.51899C2.04656 8.6441 1.55506 7.4575 1.55506 6.22022Z"
                         fill="#6C757D"/>
                     </svg>
                </span>
            </div>
        </form>

    </li>


@endcan


@role('doctor')
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/dashboard*') ? 'd-none' : '' }}">
    {{-- <a class="nav-link p-0 {{ Request::is('doctors/dashboard*') ? 'active' : '' }}"
       href="{{ route('doctors.dashboard') }}">{{ __('messages.dashboard') }}</a> --}}
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/appointments*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/appointments*') ? 'active' : '' }}"
       href="{{ route('doctors.appointments') }}">{{ __('messages.appointments') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/doctor-schedule-edit*','doctors/doctor-sessions/create*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/doctor-schedule-edit*','doctors/doctor-sessions/create*') ? 'active' : '' }}"
       href="{{ getLoginDoctorSessionUrl() }}">{{ __('messages.doctor_session.my_schedule') }}</a>
</li>


<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/visits*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/visits*') ? 'active' : '' }}"
       href="{{ route('doctors.visits.index') }}">{{ __('messages.visits') }}</a>
</li>


{{-- <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/connect-google-calendar*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/connect-google-calendar*') ? 'active' : '' }}"
       href="{{ route('doctors.googleCalendar.index') }}">{{ __('messages.setting.connect_google_calendar') }}</a>
</li> --}}


{{-- <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/live-consultations*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/live-consultation*') ? 'active' : '' }}"
       href="{{ route('doctors.live-consultations.index') }}">{{ __('messages.live_consultations') }}</a>
</li> --}}


<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/transactions*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/transactions*') ? 'active' : '' }}"
       href="{{ route('doctors.transactions') }}">{{ __('messages.transactions') }}</a>
</li>

{{-- <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('doctors/holidays*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('doctors/holidays*') ? 'active' : '' }}"
       href="{{ route('doctors.holiday') }}">{{ __('messages.holiday.holiday') }}</a>
</li> --}}
@endrole



@role('patient')
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/dashboard*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/dashboard*') ? 'active' : '' }}"
       href="{{ route('patients.dashboard') }}">{{ __('messages.dashboard') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/appointments*','patients/patient-appointments-calendar*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/appointments*','patients/patient-appointments-calendar*') ? 'active' : '' }}"
       href="{{ route('patients.patient-appointments-index') }}">{{ __('messages.appointments') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/patient-visits*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/patient-visits*') ? 'active' : '' }}"
       href="{{ route('patients.patient.visits.index') }}">{{ __('messages.visits') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/transactions*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/transactions*') ? 'active' : '' }}"
       href="{{ route('patients.transactions') }}">{{ __('messages.transactions') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/connect-google-calendar*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/connect-google-calendar*') ? 'active' : '' }}"
       href="{{ route('patients.googleCalendar.index') }}">{{ __('messages.setting.connect_google_calendar') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/reviews*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/reviews*') ? 'active' : '' }}"
       href="{{ route('patients.reviews.index') }}">{{ __('messages.reviews') }}</a>
</li>
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('patients/live-consultations*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('patients/live-consultations*') ? 'active' : '' }}"
       href="{{ route('patients.live-consultations.index') }}">{{ __('messages.live_consultations') }}</a>
</li>
@endrole
@can('manage_staff')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/staffs*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/staffs*') ? 'active' : '' }}"
           href="{{ route('staffs.index') }}">{{ __('messages.staffs') }}</a>
    </li>
@endcan
@can('manage_doctors')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/doctors*', 'admin/doctor-sessions*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/doctors*') ? 'active' : '' }}"
           href="{{ route('doctors.index') }}">{{ __('messages.doctors') }}</a>
    </li>
@endcan
@can('manage_doctor_sessions')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/doctors*', 'admin/doctor-sessions*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/doctor-sessions*') ? 'active' : '' }}"
           href="{{ route('doctor-sessions.index') }}">{{ (getLogInUser()->hasRole('doctor')) ? __('messages.doctor_session.my_schedule') : __('messages.doctor_sessions') }}</a>
    </li>
@endcan
@can('manage_patients')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/patients*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/patients*') ? 'active' : '' }}"
           href="{{ route('patients.index') }}">{{ __('messages.patients') }}</a>
    </li>
@endcan
@can('manage_settings')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/settings*') ? 'active' : '' }}"
           href="{{ route('setting.index') }}">{{ __('messages.settings') }}</a>
    </li>
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/clinic-schedules*') ? 'active' : '' }}"
           href="{{ route('clinic-schedules.index') }}">{{ __('messages.clinic_schedules') }}</a>
    </li>

@endcan
@can('manage_doctors_holiday')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/holidays*') ? 'active' : '' }}"
           href="{{ route('holidays.index') }}">{{ __('messages.holiday.doctor_holiday') }}</a>
    </li>
@endcan
@can('manage_roles')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/roles*') ? 'active' : '' }}"
           href="{{ route('roles.index') }}">{{ __('messages.roles') }}</a>
    </li>
@endcan
@can('manage_currencies')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/currencies*') ? 'active' : '' }}"
           href="{{ route('currencies.index') }}">{{ __('messages.currencies') }}</a>
    </li>
@endcan
@can('manage_countries')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/countries*') ? 'active' : '' }}"
           href="{{ route('countries.index') }}">{{ __('messages.countries') }}</a>
    </li>
@endcan

@can('manage_states')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/states*') ? 'active' : '' }}"
           href="{{ route('states.index') }}">{{ __('messages.states') }}</a>
    </li>
@endcan

@can('manage_cities')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0
    {{ !Request::is('admin/settings*','admin/roles*','admin/currencies*','admin/clinic-schedules*','admin/countries*','admin/states*','admin/cities*','admin/holidays*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/cities*') ? 'active' : '' }}"
           href="{{ route('cities.index') }}">{{ __('messages.cities') }}</a>
    </li>
@endcan

@can('manage_specialities')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/specializations*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/specializations*') ? 'active' : '' }}"
           href="{{ route('specializations.index') }}">{{ __('messages.specializations') }}</a>
    </li>
@endcan
@can('manage_services')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/services*','admin/service-categories*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/services*') ? 'active' : '' }}"
           href="{{ route('services.index') }}">{{ __('messages.services') }}</a>
    </li>
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/services*','admin/service-categories*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/service-categories*') ? 'active' : '' }}"
           href="{{ route('service-categories.index') }}">{{ __('messages.service_categories') }}</a>
    </li>
@endcan
@can('manage_appointments')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/appointments*','admin/admin-appointments-calendar*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/appointments*','admin/admin-appointments-calendar*') ? 'active' : '' }}"
           href="{{ route('appointments.index') }}">{{ __('messages.appointments') }}</a>
    </li>
@endcan
@can('manage_patient_visits')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/visits*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/visits*') ? 'active' : '' }}"
           href="{{ route('visits.index') }}">{{ __('messages.visits') }}</a>
    </li>
@endcan
<li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('profile/edit*') ? 'd-none' : '' }}">
    <a class="nav-link p-0 {{ Request::is('profile/edit*') ? 'active' : '' }}"
       href="{{ route('profile.setting') }}">{{ __('messages.user.profile_details') }}</a>
</li>
@can('manage_front_cms')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/front-services*','admin/faqs*','admin/front-patient-testimonials*','admin/cms*','admin/sliders*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/cms*') ? 'active' : '' }}"
           href="{{ route('cms.index') }}">{{ __('messages.cms.cms') }}</a>
    </li>
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/front-services*','admin/faqs*','admin/front-patient-testimonials*','admin/cms*','admin/sliders*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/sliders*') ? 'active' : '' }}"
           href="{{ route('sliders.index') }}">{{ __('messages.sliders') }}</a>
    </li>
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/front-services*','admin/faqs*','admin/front-patient-testimonials*','admin/cms*','admin/sliders*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/faqs*') ? 'active' : '' }}"
           href="{{ route('faqs.index') }}">{{ __('messages.faqs') }}</a>
    </li>
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/front-services*','admin/faqs*','admin/front-patient-testimonials*','admin/cms*','admin/sliders*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/front-patient-testimonials*') ? 'active' : '' }}"
           href="{{ route('front-patient-testimonials.index') }}">{{ __('messages.front_patient_testimonials') }}</a>
    </li>
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/enquiries*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/enquiries*') ? 'active' : '' }}"
           href="{{ route('enquiries.index') }}">{{ __('messages.enquiries') }}</a>
    </li>

    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/subscribers*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/subscribers*') ? 'active' : '' }}"
           href="{{ route('subscribers.index') }}">{{ __('messages.subscribers') }}</a>
    </li>
@endcan
@can('manage_transactions')
    <li class="nav-item position-relative mx-xl-3 mb-3 mb-xl-0 {{ !Request::is('admin/transactions*') ? 'd-none' : '' }}">
        <a class="nav-link p-0 {{ Request::is('admin/transactions*') ? 'active' : '' }}"
           href="{{ route('transactions') }}">{{ __('messages.transactions') }}</a>
    </li>
@endcan
