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
        <th>Accommodation</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Departure from</th>
        <th>Departure date</th>
        <th>Arrival at</th>
        <th>Arrival date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->first_name }} {{ $sale->last_name }}</td>
            <td>{{ $sale->accommodation_name }}</td>
            <td>{{ Carbon::parse($sale->date_from)->format('d. m. Y') }}</td>
            <td>{{ Carbon::parse($sale->date_to)->format('d. m. Y') }}</td>
            <td>{{ $sale->departure_airport_trip_A }}</td>
            <td>{{ Carbon::parse($sale->departure_airport_trip_A_date)->format('d. m. Y') }}</td>
            <td>{{ $sale->arrival_airport_trip_A }}</td>
            <td>{{ Carbon::parse($sale->arrival_airport_trip_A_date)->format('d. m. Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<br>

<table>
    <thead>
    <tr>
        <th>Departure from</th>
        <th>Departure date</th>
        <th>Arrival at</th>
        <th>Arrival date</th>
        <th>Total Amount</th>
        <th>Payment Type</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->departure_airport_trip_B }}</td>
            <td>{{ Carbon::parse($sale->departure_airport_trip_B_date)->format('d. m. Y') }}</td>
            <td>{{ $sale->arrival_airport_trip_B }}</td>
            <td>{{ Carbon::parse($sale->arrival_airport_trip_B_date)->format('d. m. Y') }}</td>
            <td>€{{ number_format($sale->accommodation_total_amount + $sale->flights_total_amount, 2) }}</td>
            <td>{{ $sale->payment_type }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
