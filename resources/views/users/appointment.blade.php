<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Form</title>

    <!-- Add your custom CSS for styling here -->
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .calendar-container {
            margin-top: 0px;
                }

        .btn-request {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 10px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-request:hover {
            background-color: #0056b3;
        }
    

    </style>
</head>

@include('../layouts/header')
<body>

    
    <div class="container">
        
        <h1>Booking Form</h1>

        <div class="calendar-container" id="calendar">
        <a class="btn-request" href="{{ route('user.createRequest', $id) }}">Request</a>

        </div>

    </div>

    <!-- Include FullCalendar scripts and styles here -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />

    <!-- Include FullCalendar JavaScript library and initialization script -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: '9:00:00',
                slotMaxTime: '17:00:00',
                events: @json($events),
            });
            calendar.render();
        });
    </script>
</body>

</html>