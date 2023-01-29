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

    <h2>History of</h2><h1>{{$butcher->name}}</h1>

    <table id="customers">
        <tr>
            <th>Date</th>
            <th>Sheet</th>
            <th>Kilos</th>
            <th>Total Price</th>
        </tr>
        @foreach($data as $dt)
        <tr>
            <td>{{date_format($dt->created_at, 'd M Y')}}</td>
            <td>{{$dt->sheet}}</td>
            <td>{{$dt->kilos}}</td>
            <td>Rp. {{number_format($dt->total_price) }}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>