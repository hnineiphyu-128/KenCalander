<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-xxl flex-grow-1 container-p-y mt-5">
        <div class="card app-calendar-wrapper">
            <div class="row g-0">
                <!-- Calendar Sidebar -->
                <div class="col-12 p-3">
                    <h5>{{ $month_year }}</h5>
                </div>
                {{-- <div class="col-12 d-flex justify-content-between align-items-center" id="app-calendar-sidebar">
                    <div class="mx-2 pt-1">
                        <div class="input-append d-flex justify-content-start date" id="datepicker" data-date="{{ date('m-Y') }}"
                            data-date-format="mm-yyyy">
                            <input type="text" name="month" placeholder="MM-YYYY" class="form-control month"
                                autocomplete="off"  name="month" id="month"
                                value="{{ $month_year }}">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                    </div>
                </div> --}}
                <!-- /Calendar Sidebar -->

                <!-- Calendar & Modal -->
                <div class="col-12 app-calendar-content">
                    <div class="card shadow-none border-0">
                        <div class="card-body pb-0">
                            <!-- FullCalendar -->
                            <table class="table table-sm">
                                 <thead>
                                        <tr>
                                            <th style="padding: 15px; border: 1px solid #000;"> Sunday </th>
                                            <th style="padding: 15px; border: 1px solid #000;"> Monday </th>
                                            <th style="padding: 15px; border: 1px solid #000;"> Tuesday </th>
                                            <th style="padding: 15px; border: 1px solid #000;"> Wednesday </th>
                                            <th style="padding: 15px; border: 1px solid #000;"> Thursday </th>
                                            <th style="padding: 15px; border: 1px solid #000;"> Friday </th>
                                            <th style="padding: 15px; border: 1px solid #000;"> Saturday </th>
                                        </tr>
                                 </thead>
                                 <tbody class="tbody">
                                    @foreach ($dates as $date)
                                        <tr>
                                            @foreach ($date as $day_by_week)
                                                @if ($day_by_week != "0")
                                                    @if ( $day_by_week['close'] && $day_by_week['holiday'])
                                                        <td class="calendar-days bg-danger text-white" style="padding: 15px; border: 1px solid #000;"> {{ $day_by_week['date'] }} ( close & holiday )</td>
                                                    @elseif ( $day_by_week['close'])
                                                        <td class="calendar-days bg-danger text-white" style="padding: 15px; border: 1px solid #000;"> {{ $day_by_week['date'] }} ( close )</td>
                                                    @elseif ($day_by_week['holiday'])
                                                        <td class="calendar-days bg-danger text-white" style="padding: 15px; border: 1px solid #000;"> {{ $day_by_week['date'] }} ( holiday )</td>
                                                    @else
                                                        @if ($day_by_week['shift'] != '-')
                                                            <td class="calendar-days" style="padding: 15px; border: 1px solid #000;"> {{ $day_by_week['date'] }} ( {{ strtoupper($day_by_week['shift']) ?? '-' }} )</td>
                                                        @else
                                                            <td class="calendar-days" style="padding: 15px; border: 1px solid #000;"> {{ $day_by_week['date'] }} </td>
                                                        @endif
                                                    @endif
                                                @else
                                                    <td class="calendar-days" style="padding: 15px; border: 1px solid #000;">  </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Calendar & Modal -->
            </div>
        </div>
    </div>
</body>
</html>
