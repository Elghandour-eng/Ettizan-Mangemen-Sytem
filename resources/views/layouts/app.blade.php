<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ getAppName() }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset(getAppFavicon()) }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS Files -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/pages.css') }}">

    @if(!Auth::user()->dark_mode)
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    @else
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-dark.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.dark.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/custom-pages-dark.css') }}"> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css') }}">
    @endif

<!-- Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>

    @livewireStyles
    @routes
    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>
    @include('layouts.livewire-turbo')
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
            data-turbolinks-eval="false" data-turbo-eval="false"></script>
    {{--    <script src='fullcalendar/core/locales-all.js'></script>--}}
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="{{ mix('js/third-party.js') }}"></script>
    <script src="{{ mix('js/pages.js') }}"></script>
    <script data-turbo-eval="false">
        let stripe = '';
        @if(config('services.stripe.key'))
            stripe = Stripe('{{ config('services.stripe.key') }}');
        @endif
        let usersRole = '{{ !empty(getLogInUser()->roles->first()) ? getLogInUser()->roles->first()->name : '' }}';
        let currencyIcon = '{{ getCurrencyIcon() }}';
        let isSetFirstFocus = true;
        let womanAvatar = '{{ url(asset('web/media/avatars/female.png')) }}';
        let manAvatar = '{{ url(asset('web/media/avatars/male.png')) }}';
        let changePasswordUrl = "{{ route('user.changePassword') }}";
        let updateLanguageURL = "{{ route('change-language')}}";
        let phoneNo = '';
        let dashboardChartBGColor = "{{ (Auth::user()->dark_mode) ? '#13151f' : '#FFFFFF'}}";
        let dashboardChartFontColor = "{{ (Auth::user()->dark_mode) ? '#FFFFFF' : '#000000'}}";
        let userRole = '{{getLogInUser()->hasRole('patient')}}';
        let appointmentStripePaymentUrl = '{{ url('appointment-stripe-charge') }}';
        let checkLanguageSession = '{{checkLanguageSession()}}'
        let noData = "{{__('messages.common.no_data_available')}}"
        let defaultCountryCodeValue = "{{ getSettingValue('default_country_code')}}";
        let currentLoginUserId = "{{ getLogInUserId()}}";

        Lang.setLocale(checkLanguageSession);
        let options = {
            'key': "{{ config('payments.razorpay.key') }}",
            'amount': 0, //  100 refers to 1
            'currency': 'INR',
            'name': "{{getAppName()}}",
            'order_id': '',
            'description': '',
            'image': '{{ asset(getAppLogo()) }}', // logo here
            'callback_url': "{{ route('razorpay.success') }}",
            'prefill': {
                'email': '', // recipient email here
                'name': '', // recipient name here
                'contact': '', // recipient phone here
                'appointmentID': '', // appointmentID here
            },
            'readonly': {
                'name': 'true',
                'email': 'true',
                'contact': 'true',
            },
            'theme': {
                'color': '#4FB281',
            },
            'modal': {
                'ondismiss': function () {
                    displayErrorMessage(Lang.get('messages.flash.appointment_created_payment_not_complete'));
                    setTimeout(function () {
                        location.reload();
                    }, 1500);
                },
            },
        }
    </script>




      {{-- css for calendar --}}
<style>

/* .parent_calendar
{
    position: relative;
}

.card_calendar {
  width: 280px;
  background: rgb(155, 155, 155);
  box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
  backdrop-filter: blur(5px);
  -webkit-backdrop-filter: blur(5px);
  border-radius: 7px;
  border: 1px solid rgba(255, 255, 255, 0.01);
  text-align: center;
  margin:100px  auto;
  overflow: hidden;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.content_calendar {
  height: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

#month_calendar {
  background: rgb(243, 45, 78);
  padding: 10px 0;
  font-size: 25px;
  font-weight: 700;
}

#day
{
  font-size: 20px;
  color: black;
}

#year {
  font-size: 20px;
  color: black;
}

#date {
  font-size: 120px;
  font-weight: 700;
  margin: 80px 0;
  color: black;
} */




.calendar_body {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.wrapper_test {
    width: 100%;
    background: #fff;
    border-radius: 10px;
    -webkit-box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
}
.wrapper_test .header_calendar {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 25px 30px 10px;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    background: #ffffff;
    color: black;
    border-radius: 10px 10px 0 0;
}
.header_calendar .icons {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.header_calendar .icons span {
    height: 38px;
    width: 38px;
    margin: 0 1px;
    cursor: pointer;
    color: #878787;
    text-align: center;
    font-size: 1.9rem;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border-radius: 50%;
}
.icons span:last-child {
    margin-right: -10px;
}
.header_calendar .icons span:hover {
    background: #f2f2f2;
}
.header_calendar .current-date {
    font-size: 1.45rem;
    font-weight: 500;
}
.calendar_test {
    padding: 20px;
}
.calendar_test ul {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    list-style: none;
    text-align: center;
}
.calendar_test .days {
    margin-bottom: 20px;
}
.calendar_test li {
    color: #333;
    width: calc(100% / 7);
    font-size: 1.07rem;
}
.calendar_test .weeks li {
    font-weight: 500;
    cursor: default;
}
.calendar_test .days li {
    z-index: 1;
    cursor: pointer;
    position: relative;
    margin-top: 30px;
}
.days li.inactive {
    color: #aaa;
}
.days li.active {
    color: #;
}
.days li::before {
    position: absolute;
    content: "";
    left: 50%;
    top: 50%;
    height: 40px;
    width: 40px;
    z-index: -1;
    border-radius: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.days li.active::before {
    background: #DCECF5;
}
.days li:not(.active):hover::before {
    /* background: #747474; */
    background: #f2f2f2;
}



</style>

{{-- end css for calendar --}}


</head>
@php $styleCss = 'style'; @endphp
<body>
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid">
        @include('layouts.sidebar')
        <div class="wrapper d-flex flex-column flex-row-fluid">
            <div class='container-fluid d-flex align-items-stretch justify-content-between px-0'>
                @include('layouts.header')
            </div>
            <div class='content d-flex flex-column flex-column-fluid pt-7'>
                @yield('header_toolbar')
                <div class='d-flex flex-column-fluid'>
                    @yield('content')
                </div>
            </div>
            <div class='container-fluid'>
                @include('layouts.footer')
            </div>
        </div>
    </div>
    {{Form::hidden('currentLanguage',checkLanguageSession(),['class'=>'currentLanguage'])}}
</div>




@include('profile.changePassword')
@include('profile.email_notification')
@include('profile.changelanguage')


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


<script>
    var xValues = ["March", "April", "May", "June", "july"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
      "#164B60",
      "#1B6B93",
      "#4FC0D0",
      "#A2FF86",
      "#1e7145"
    ];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
        //   text: "World Wine Production 2018"
        }
      }
    });
    </script>


{{-- chart2 --}}
<script>
    var xValues = ["March", "April", "May", "June", "July"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
      "#164B60",
      "#1B6B93",
      "#4FC0D0",
      "#A2FF86",
      "#1e7145"
    ];

    new Chart("myChart2", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
        //   text: "World Wide Wine Production 2018"
        }
      }
    });
    </script>

    {{-- chart3 --}}

    <script>
        var xValues = [];
        var yValues = [];
        generateData("Math.sin(x)", 0, 10, 0.5);

        new Chart("myChart3", {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{
              fill: false,
              pointRadius: 2,
              borderColor: "rgba(0,0,255,0.5)",
              data: yValues
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
            //   text: "y = sin(x)",
              fontSize: 16
            }
          }
        });
        function generateData(value, i1, i2, step = 1) {
          for (let x = i1; x <= i2; x += step) {
            yValues.push(eval(value));
            xValues.push(x);
          }
        }
        </script>



{{-- calendar script --}}

{{-- <script>

let date = document.getElementById("date"),
  day = document.getElementById("day"),
  month = document.getElementById("month_calendar"),
  year = document.getElementById("year"),
  days = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday"
  ],
  months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "يوليو",
    "August",
    "September",
    "October",
    "November",
    "December"
  ];

function update() {
  let now = new Date();
  date.innerText = now.getDate();
  day.innerText = days[now.getDay()];
  month.innerText = months[now.getMonth()];
  year.innerText = now.getFullYear();
}

document.body.onload = () => {
  setInterval(update, 1000);
  setTimeout(() => {
    document.getElementsByClassName("content_calendar")[0].style.height = "260px";
    document.getElementsByClassName("card_calendar")[0].style.color = "white";
  }, 500);
};

</script> --}}


{{-- calendar script --}}


<script>
    var daysTag = document.querySelector(".days");
    var currentDate = document.querySelector(".current-date");
    var prevNextIcon = document.querySelectorAll(".icons span");

    var currYear = new Date().getFullYear();
    var currMonth = new Date().getMonth();

    var months = ["January", "February", "March", "April", "May", "June", "يوليو", "August", "September", "October", "November", "December"];

    var renderCalendar = () => {
        var date = new Date(currYear, currMonth, 1);
        var firstDayofMonth = date.getDay();
        var lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate();
        var lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay();
        var lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();

        var liTag = "";

        for (var i = firstDayofMonth; i > 0; i--) {
            liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
        }

        for (var i = 1; i <= lastDateofMonth; i++) {
            var isToday = i === new Date().getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
            liTag += `<li class="${isToday}">${i}</li>`;
        }

        for (var i = lastDayofMonth; i < 6; i++) {
            liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
        }

        currentDate.innerText = `${months[currMonth]} ${currYear}`;
        daysTag.innerHTML = liTag;
    };

    renderCalendar();

    prevNextIcon.forEach(icon => {
        icon.addEventListener("click", () => {
            currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

            if (currMonth < 0 || currMonth > 11) {
                currYear = icon.id === "prev" ? currYear - 1 : currYear + 1;
                currMonth = currMonth < 0 ? 11 : 0;
            }

            renderCalendar();
        });
    });
</script>


{{-- calendar script --}}


</body>
</html>
