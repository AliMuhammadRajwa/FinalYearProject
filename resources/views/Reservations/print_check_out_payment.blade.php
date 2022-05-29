<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>{{$ClientId->first_name . ' ' . $ClientId->last_name}}</h3>
                <pre>
No of Childs: {{$getReservationId->no_of_childs}}
No of Adults :  {{$getReservationId->no_of_adults}}
Reserved Rooms : {{$getReservationId->no_of_rooms}}
<br /><br />
Check in Date: {{$checkInDateTime}}
Check out Date: {{$checkOutDateTime}}
Total Amount : {{$totalAmountDB}}
</pre>


            </td>
            <td align="center">
                <img src="{{asset('img/logo1.png')}}" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>North Trip Cycle</h3>
                <pre>
                    https://company.com
                    Street 26
                    123456 City
                    United Kingdom
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Room Details</h3>
    <table width="100%">

        <thead>
        <tr>
            <th>S#</th>
            <th>Room Title</th>
            <th>Room No</th>
            <th>Room Price</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        @forelse($RoomId as $Rooms)
            <tr>
                <td>{{$Rooms->id}}</td>
                <td>
                    <strong> {{$Rooms->room_title}}</strong>
                </td>
                <td>{{$Rooms->room_no}}</td>
                <td>{{$Rooms->total_price}}</td>

                @if($Rooms->status =='1')
                    <td><strong>Active</strong></td>
                @else
                    <td><strong>In Active</strong></td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="6">No Records Found...</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="information " style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                NTC : Everyone Together
            </td>
        </tr>

    </table>
</div>
</body>
</html>
