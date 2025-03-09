@php use Carbon\Carbon; @endphp
    <!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Sales Report</h2>
<p><strong>Date:</strong> {{ Carbon::now()->format('d. m. Y') }}</p>

<table>
    <thead>
    <tr>
        <th>Client Name</th>
        <th>Accommodation & Stay</th>
        <th>Trip A</th>
        <th>Trip B</th>
        <th>Total Amount</th>
        <th>Payment Type</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
        <tr>
{{--Client's name--}}
            <td>{{ $sale->first_name }} {{ $sale->last_name }}</td>

{{--Accommodation and stay--}}
            <td>
                {{ $sale->accommodation_name }}<br>
                <small>{{ Carbon::parse($sale->date_from)->format('d. m. Y') }} - {{ Carbon::parse($sale->date_to)->format('d. m. Y') }}</small>
            </td>

{{--Trip A--}}
            <td>
                <strong>From:</strong> {{ $sale->departure_airport_trip_A }}<br>
                <strong>Date:</strong> {{ Carbon::parse($sale->departure_airport_trip_A_date)->format('d. m. Y') }}<br>
                <strong>To:</strong> {{ $sale->arrival_airport_trip_A }}<br>
                <strong>Date:</strong> {{ Carbon::parse($sale->arrival_airport_trip_A_date)->format('d. m. Y') }}
            </td>

{{--Trip B--}}
            <td>
                <strong>From:</strong> {{ $sale->departure_airport_trip_B }}<br>
                <strong>Date:</strong> {{ Carbon::parse($sale->departure_airport_trip_B_date)->format('d. m. Y') }}<br>
                <strong>To:</strong> {{ $sale->arrival_airport_trip_B }}<br>
                <strong>Date:</strong> {{ Carbon::parse($sale->arrival_airport_trip_B_date)->format('d. m. Y') }}
            </td>

{{--Financial--}}
            <td>€{{ number_format($sale->accommodation_total_amount + $sale->flights_total_amount, 2) }}</td>
            <td>{{ $sale->payment_type }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
