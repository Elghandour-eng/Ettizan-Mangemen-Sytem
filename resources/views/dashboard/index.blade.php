@extends('layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')


    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">

                <div class="col-12 mb-2">
                    <h1 style="font-weight: 700px; font-size:33px; color:#1B1B1B; line-height: 120%;">{{__('messages.admin_dashboard.dashboard')}}</h1>
                </div>

                {{-- boxes start --}}



                <div class="col-12 mb-4">
                    <div class="row">

                        <div class="col-xxl-3 col-xl-3 col-sm-6 widget" >
                            <a href="{{ route('doctors.index') }}" class=" text-decoration-none">
                            <div class="p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3" style=" height:75px; border-radius:8px; box-shadow: 0px 3px 20px 0px rgba(0, 0, 0, 0.08);background: #FFFFFF" >
                                <div class=" d-flex align-items-center justify-content-center" style="background: #845EC2; width:42px; height:42px; border-radius:8px;">
                                    {{-- <i class="fas fa-user-md display-4 card-icon text-white"></i> --}}
                                    <img src="{{ asset('web/media/avatars/doctor.png') }}" alt="" width="24" height="24">
                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-1-xxl fw-bolder" style="color: #1B1B1B">{{$data['totalDoctorCount']}}</h2>
                                    <h3 class="mb-0 fs-4 fw-light" style="color: #ACACAC">{{__('messages.admin_dashboard.total_doctor')}}</h3>
                                </div>
                            </div>
                            </a>
                        </div>





                        <div class="col-xxl-3 col-xl-3 col-sm-6 widget">
                            <a href="{{ route('patients.index') }}" class="text-decoration-none">
                                <div
                                    class=" p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3"  style=" height:75px; border-radius:8px; box-shadow: 0px 3px 20px 0px rgba(0, 0, 0, 0.08); background: #FFFFFF">
                                    <div
                                        class="d-flex align-items-center justify-content-center" style="background: #FE7ABC; width:42px; height:42px; border-radius:8px;">
                                        {{-- <i class="fas fa-hospital-user display-4 card-icon text-white hospital-user-dark-mode"></i> --}}
                                        <img src="{{ asset('web/media/avatars/patients.png') }}" alt="" width="24" height="24">
                                    </div>
                                    <div class="text-end text-white">
                                        <h2 class="fs-1-xxl fw-bolder" style="color: #1B1B1B">{{$data['totalPatientCount']}}</h2>
                                        <h3 class="mb-0 fs-4 fw-light" style="color: #ACACAC">{{__('messages.admin_dashboard.total_patients')}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>



                        <div class="col-xxl-3 col-xl-3 col-sm-6 widget">
                            <a href="{{ route('appointments.index') }}" class="text-decoration-none">
                                <div
                                    class="  p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3"   style=" height:75px; border-radius:8px; box-shadow: 0px 3px 20px 0px rgba(0, 0, 0, 0.08); background: #FFFFFF">
                                    <div
                                        class=" d-flex align-items-center justify-content-center" style="background: #00D2FC; width:42px; height:42px; border-radius:8px;">
                                        {{-- <i class="fas fa-calendar-alt display-4 card-icon text-white"></i> --}}
                                        <img src="{{ asset('web/media/avatars/calender.png') }}" alt="" width="24" height="24">
                                    </div>
                                    <div class="text-end text-white">
                                        <h2 class="fs-1-xxl fw-bolder" style="color: #1B1B1B">{{$data['todayAppointmentCount']}}</h2>
                                        <h3 class="mb-0 fs-4 fw-light" style="color: #ACACAC">{{__('messages.admin_dashboard.today_appointments')}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-sm-6 widget">
                            <a href="{{ route('patients.index') }}" class="text-decoration-none">
                                <div class="p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3" style=" height:75px; border-radius:8px; box-shadow: 0px 3px 20px 0px rgba(0, 0, 0, 0.08); background: #FFFFFF">
                                    <div class="d-flex align-items-center justify-content-center" style="background: #FFC580; width:42px; height:42px; border-radius:8px;">
                                        {{-- <i class="fas fa-user-injured display-4 card-icon text-white"></i> --}}
                                        <img src="{{ asset('web/media/avatars/patients.png') }}" alt="" width="24" height="24">
                                    </div>
                                    <div class="text-end text-white">
                                        <h2 class="fs-1-xxl fw-bolder" style="color: #1B1B1B">{{$data['totalRegisteredPatientCount']}}</h2>
                                        <h3 class="mb-0 fs-4 fw-light" style="color: #ACACAC">{{__('messages.admin_dashboard.today_registered_patients')}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>
                </div>

                {{-- boxes end --}}




                {{-- appointment calendar start --}}

                    <div class="col-12 mb-5" >
                        {{Form::hidden('book_calender', \App\Models\Appointment::BOOKED,['id' => 'bookCalenderConst'])}}
                        {{Form::hidden('check_in_calender', \App\Models\Appointment::CHECK_IN,['id' => 'checkInCalenderConst'])}}
                        {{Form::hidden('checkOut_calender', \App\Models\Appointment::CHECK_OUT,['id' => 'checkOutCalenderConst'])}}
                        {{Form::hidden('cancel_calender', \App\Models\Appointment::CANCELLED,['id' => 'cancelCalenderConst'])}}
                        <div class="d-flex flex-column flex-lg-row">
                            <div class="flex-lg-row-fluid">
                                <div class="card" style="box-shadow: 0px 4.263158321380615px 28.421052932739258px 0px rgba(0, 0, 0, 0.08);">
                                    <div class="card-header">
                                        <h2 class="card-title">{{__('messages.appointment.calendar')}}</h2>
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center">
                                                <span class="badge bg-primary badge-circle me-1 slot-color-dot"></span>
                                                <span class="me-4">{{__('messages.common.'.strtolower(\App\Models\Appointment::STATUS[1]))}}</span>
                                                <span class="badge bg-success badge-circle me-1 slot-color-dot"></span>
                                                <span class="me-4">{{__('messages.common.'.strtolower(\App\Models\Appointment::STATUS[2]))}}</span>
                                                <span class="badge bg-warning badge-circle me-1 slot-color-dot"></span>
                                                <span class="me-4">{{__('messages.common.'.strtolower(\App\Models\Appointment::STATUS[3]))}}</span>
                                                <span class="badge bg-danger badge-circle me-1 slot-color-dot"></span>
                                                <span class="me-4">{{__('messages.common.'.strtolower(\App\Models\Appointment::STATUS[4]))}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div id="adminAppointmentCalendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                {{-- appointment calendar end --}}

                {{-- transactions and today calendar --}}


                        <div class="col-12 mb-4">
                            <div class="row">


                                <div class="col-12 col-lg-6 col-xl-6 d-flex mb-3">
                                    <div class="card radius-10 overflow-hidden w-100" style="box-shadow: 0px 7.690400123596191px 38.45199966430664px 0px rgba(0, 0, 0, 0.10);">
                                        {{-- <div class="card-body">
                                        <div class="mt-5">
                                        <div class="">
                                            <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
                                            </div>
                                        </div>
                                        </div> --}}
                                        <div class="card-body">
                                            <h1 style="font-size: 30px; font-style: normal; font-weight: 500; line-height: 120%;">{{__('messages.admin_dashboard.Total_Transactions')}}</h1>
                                            <h4 class="mb-0">{{ $data['totaltransactions']->sum('amount') }} KD</h4>

                                            <hr>
                                            <div class="mt-5">
                                            <div class="">
                                            {{-- <canvas id="myChart" style="width:100%;max-width:600px"></canvas> --}}
                                            <img src="{{ asset('web/media/avatars/chart2.jpg') }}" style="width:90%" height="250">
                                            </div>
                                        </div>
                                        </div>

                                    </div>
                                    </div>

                                    {{-- transaction end --}}



                            <div class="col-12 col-lg-6 col-xl-6 d-flex mb-3">
                                  <div class="card radius-10 overflow-hidden w-100" style="box-shadow: 0px 4.810179710388184px 24.0508975982666px 0px rgba(0, 0, 0, 0.08);">
                                    <div class="card-body calendar_body">
                                
                                      <div class="wrapper_test">
                                        <header class="header_calendar">
                                          <p class="current-date" ></p>
                                          <div class="icons">
                                            <span id="prev">
                                                <img src="https://ettizan-system.com/public/assets/image/Frame.png" width="30" height="30" alt="Prev">
                                            </span>
                                
                                            <span id="next">
                                                <img src="https://ettizan-system.com/public/assets/image/next.png" width="30" height="30" alt="Next">
                                            </span>
                                          </div>
                                        </header>

                                        <div class="calendar_test">
                                          <ul class="weeks">
                                            <li>{{ __('messages.doctor_session.sunday') }}</li>
                                            <li>{{  __('messages.doctor_session.monday') }}</li>
                                            <li>{{ __('messages.doctor_session.tuesday') }}</li>
                                            <li>{{ __('messages.doctor_session.wednesday') }}</li>
                                            <li>{{ __('messages.doctor_session.thursday') }}</li>
                                            <li> {{__('messages.doctor_session.friday') }}</li>
                                            <li>{{ __('messages.doctor_session.saturday') }}</li>
                                          </ul>
                                          <ul class="days"></ul>
                                        </div>
                                      </div>
                                
                                    </div>
                                  </div>
                                </div>

                                  {{-- calendar end --}}
                            </div>
                        </div>


                {{-- transactions and calendar today --}}





              {{-- doctor and patients and advertise --}}


                <div class="col-12 mb-4">
                    <div class="row">



                        <div class="col-12 col-lg-4 col-xl-4 d-flex mb-3">


                            <div class="card radius-10 w-100" style="box-shadow: 0px 7.690400123596191px 38.45199966430664px 0px rgba(0, 0, 0, 0.10);">
                                <div class="card-header border-bottom bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0" style="font-size: 26px; font-style: normal; font-weight: 500; line-height: 120%;">{{__('messages.admin_dashboard.Latest_Patients_Added')}}</h6>
                                    </div>
                                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">

                                @forelse($data['totalpatients'] as $patient)

                                        <li class="list-group-item bg-transparent">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $patient->profile }}" alt="user avatar" class="rounded-circle" width="55" height="55">
                                        <div class="ms-3">
                                            <h6 class="mb-0"><small class="ms-4">{{ $patient->user->first_name }} {{ $patient->user->last_name }}</small></h6>
                                            <p class="mb-0 small-font"> {{ $patient->user->email }}</p>
                                        </div>
                                        <div class="ms-auto star">
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-light-4'></i>
                                            <i class='bx bxs-star text-light-4'></i>
                                        </div>
                                        </div>
                                        </li>

                                @empty
                                    <tr class="text-center">
                                        <td colspan="5"
                                            class="text-center text-muted fw-bold">{{ __('messages.common.no_data_available') }}</td>
                                    </tr>
                                @endforelse

                            </ul>
                            </div>


                            {{-- <div class="card radius-10 overflow-hidden w-100" style="box-shadow: 10px 10px 5px #aaaaaa;">
                            <div class="card-body">
                                <div class="mt-5">
                                <div class="">
                                <canvas id="myChart3" style="width:100%;max-width:600px"></canvas>
                                </div>
                                </div>
                            </div>
                            </div> --}}
                        </div>


                        {{-- latest patients --}}






                        <div class="col-12 col-lg-4 col-xl-4 d-flex mb-3" >
                            <div class="card radius-10 w-100" style="box-shadow: 0px 4.810179710388184px 24.0508975982666px 0px rgba(0, 0, 0, 0.08);">
                                <div class="card-header border-bottom bg-transparent">
                                 <div class="d-flex align-items-center">
                                     <div>
                                         <h6 class="mb-0" style="font-size: 26px; font-style: normal; font-weight: 500; line-height: 120%;">{{__('messages.admin_dashboard.Latest_Doctors_Added')}}</h6>
                                     </div>
                                     <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                     </div>
                                 </div>
                             </div>
                              <ul class="list-group list-group-flush">

                                 @forelse($data['totaldoctors'] as $doctor)

                                         <li class="list-group-item bg-transparent">
                                         <div class="d-flex align-items-center">
                                             <img src="{{ $doctor->user->profile_image }}" alt="user avatar" class="rounded-circle" width="55" height="55">
                                         <div class="ms-3">
                                             <h6 class="mb-0"><small class="ms-4">{{ $doctor->user->first_name }} {{ $doctor->user->last_name }}</small></h6>
                                             <p class="mb-0 small-font"> {{ $doctor->user->email }}</p>
                                         </div>
                                         <div class="ms-auto star">
                                             <i class='bx bxs-star text-warning'></i>
                                             <i class='bx bxs-star text-warning'></i>
                                             <i class='bx bxs-star text-warning'></i>
                                             <i class='bx bxs-star text-light-4'></i>
                                             <i class='bx bxs-star text-light-4'></i>
                                         </div>
                                         </div>
                                         </li>

                                 @empty
                                     <tr class="text-center">
                                         <td colspan="5"
                                             class="text-center text-muted fw-bold">{{ __('messages.common.no_data_available') }}</td>
                                     </tr>
                                 @endforelse

                               </ul>
                            </div>
                         </div>

                         {{-- doctor end --}}


						<div class="col-12 col-lg-4 col-xl-4 d-flex">
						  <div class="card radius-10 overflow-hidden w-100" style="background: #DCECF5; box-shadow: 0px 4.810179710388184px 24.0508975982666px 0px rgba(0, 0, 0, 0.08);">
							 <div class="card-body">


                                 <a href="{{ route('visits.index') }}">
                                     <img src="{{ asset('web/media/avatars/adv3.png') }}" alt="" style="width: 100% ; height=100%; " >
                                 </a>

							   {{-- <p>Total Transactions</p>
							   <h4 class="mb-0">${{ $data['totaltransactions']->sum('amount') }}</h4>
							   <hr>
							   <div class="mt-5">
							   <div class="">
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
								</div>
							  </div> --}}


							 </div>
						  </div>
						</div>






					</div>
                </div>

                {{-- doctor and today calendar and advertise --}}















                                {{-- start calendar --}}

                                {{-- <div class="col-12 col-lg-12 col-xl-12 d-flex mb-5" style="height: 320px">
                                    <div class="card radius-10 overflow-hidden w-100">
                                       <div class="card-body">
                                         <div class="mt-5">

                                           <div class="parent_calendar">
                                            <div class="card_calendar">
                                                <div>
                                                  <div id="month_calendar"></div>
                                                </div>
                                                <div class="content_calendar">
                                                  <div id="day"></div>
                                                  <div id="date"></div>
                                                  <div id="year"></div>
                                                </div>
                                              </div>
                                           </div>

                                        </div>
                                       </div>
                                    </div>
                                </div> --}}


                                {{-- end calendar --}}




                {{-- <div class="col-xxl-12">
                        <div class="d-flex border-0 pt-5">
                            <h3 class="align-items-start flex-column">
                                <span class="fw-bolder fs-3 mb-1">{{__('messages.admin_dashboard.recent_patients_registration')}}</span>
                            </h3>
                            <div class="ms-auto">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active text-primary btn-active-light-primary fw-bolder px-4 active dayData"
                                           data-bs-toggle="tab" href=""
                                           id="dayData">{{__('messages.admin_dashboard.day')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1 weekData"
                                           data-bs-toggle="tab" href=""
                                           id="weekData">{{__('messages.admin_dashboard.week')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1 monthData"
                                           data-bs-toggle="tab" href=""
                                           id="monthData">{{__('messages.admin_dashboard.month')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="month">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-25px text-muted mt-1 fw-bold fs-7">{{__('messages.admin_dashboard.name')}}</th>
                                                <th class="min-w-150px text-muted mt-1 fw-bold fs-7">{{__('messages.admin_dashboard.patient_id')}}</th>
                                                <th class="min-w-150px text-muted mt-1 fw-bold fs-7 text-center">{{__('messages.doctor_dashboard.total_appointments')}}</th>
                                                <th class="min-w-150px text-muted mt-1 fw-bold fs-7 text-center">{{__('messages.patient.registered_on')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody id="monthlyReport" class="text-gray-600 fw-bold">
                                            @forelse($data['patients'] as $patient)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="image image-circle image-mini me-3">
                                                                <img src="{{ $patient->profile}}" alt="user" class="">
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <a href="{{ route('patients.show',$patient->id) }}"
                                                                   class="text-primary-800 mb-1 fs-6 text-decoration-none
">{{$patient->user->fullname}}</a>
                                                                <span
                                                                        class="text-muted fw-bold d-block">{{$patient->user->email}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-start">
                                                        <span class="badge bg-light-success">{{$patient->patient_unique_id}}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge bg-light-danger">{{$patient->appointments_count}}</span>
                                                    </td>
                                                    <td class="text-center text-muted fw-bold">
                                                        <span class="badge bg-light-info">
                                                        {{ \Carbon\Carbon::parse($patient->user->created_at)->isoFormat('DD MMM YYYY hh:mm A')}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center">
                                                    <td colspan="5"
                                                        class="text-center text-muted fw-bold">{{ __('messages.common.no_data_available') }}</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="week">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-25px text-muted mt-1 fw-bold fs-7">{{__('messages.admin_dashboard.name')}}</th>
                                                <th class="min-w-150px text-muted mt-1 fw-bold fs-7">{{__('messages.admin_dashboard.patient_id')}}</th>
                                                <th class="min-w-150px text-muted mt-1 fw-bold fs-7 text-center">{{__('messages.doctor_dashboard.total_appointments')}}</th>
                                                <th class="min-w-150px text-muted mt-1 fw-bold fs-7 text-center">{{__('messages.patient.registered_on')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody id="weeklyReport" class="text-gray-600 fw-bold">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="day">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-25px text-muted mt-1 fw-bold fs-7">{{__('messages.admin_dashboard.name')}}</th>
                                                <th class="min-w-150px text-muted mt-1 fw-bold fs-7">{{__('messages.admin_dashboard.patient_id')}}</th>
                                                <th class="min-w-150px text-muted mt-1 fw-bold fs-7 text-center">{{__('messages.doctor_dashboard.total_appointments')}}</th>
                                                <th class="min-w-150px text-muted mt-1 fw-bold fs-7 text-center">{{__('messages.patient.registered_on')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody id="dailyReport" class="text-gray-600 fw-bold">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                </div> --}}



            </div>
        </div>
    </div>
    @include('dashboard.templates.templates')
    @include('appointments.models.admin-appointment-model')
@endsection
