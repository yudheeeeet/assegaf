<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Leather Sales History</h1>

    <table id="customers">
        <tr>
            <th>Date</th>
            <th>Customer</th>
            <th>Grade</th>
            <th>Kilos</th>
            <th>Sheet</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>
        @foreach($data as $dt)
        <tr>
            <td>{{date_format($dt->created_at, 'd M Y')}}</td>
            <td>{{$dt->customer}}</td>
            <td>{{$dt->grade}}</td>
            <td>{{$dt->kilos}}</td>
            <td>{{$dt->sheet}}</td>
            <td>Rp. {{number_format($dt->price) }}</td>
            <td>Rp. {{number_format($dt->total_price) }}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>