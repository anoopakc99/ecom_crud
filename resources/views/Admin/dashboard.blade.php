<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        /* body {
            background-color: #f0f4ff;
            padding: 20px;
            color: #333;
        } */
        .dashboard {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px 0;
        }
        .header h1 {
            font-size: 24px;
            font-weight: 600;
            color: #1a56db;
        }
        .user-info {
            display: flex;
            align-items: center;
        }
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .user-info span {
            font-weight: 500;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .card-blue {
            background-color: #1a56db;
            color: white;
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .card-title {
            font-size: 16px;
            font-weight: 600;
        }
        .card-content {
            font-size: 28px;
            font-weight: 700;
        }
        .truck-details {
            grid-row: span 2;
        }
        .truck-details input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
        }
        .truck-details button {
            width: 100%;
            padding: 12px;
            background-color: #ffffff;
            color: #1a56db;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .truck-details button:hover {
            background-color: #f0f4ff;
        }
        .total-transport {
            grid-column: span 2;
        }
        .calendar {
            grid-column: span 3;
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .calendar-nav {
            display: flex;
            gap: 10px;
        }
        .calendar-nav button {
            background-color: #f0f4ff;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .calendar-nav button:hover {
            background-color: #e2e8f0;
        }
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            text-align: center;
        }
        .calendar-day {
            padding: 10px;
            border-radius: 50%;
            font-weight: 500;
        }
        .calendar-day.active {
            background-color: #1a56db;
            color: white;
        }
        .calendar-events {
            margin-top: 20px;
        }
        .event {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            font-size: 14px;
        }
        .event-1 { background-color: #e6e6ff; }
        .event-2 { background-color: #fff0e6; }
        .event-3 { background-color: #e6fff0; }
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
            .truck-details, .total-transport, .calendar {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <header class="header">
            <h1>Dashboard</h1>
           
        </header>
       dashboard
    </div>


<!-- /.container-fluid -->
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
@endpush