<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

    </style>
</head>

<body>
    <div class="text-center">
        <p>
            Laporan Kondisi Server
        </p>
    </div>
    <br>
    <div class="row">
        <div class="col">
            Tanggal : 25 November 2021
        </div>
    </div>
    <br>
    <table class="table table-sm">
        <thead class="thead-dark">
            <tr>
                <th style="width:5%">No.</th>
                <th style="width:15%">Datetime</th>
                <th style="width:15%">Server</th>
                <th style="width:15%">Alamat IP</th>
                <th style="width:15%">Power State</th>
                <th style="width:15%">Health Summary</th>
                <th style="width:20%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $report->datetime }}</td>
                    <td>{{ $report->name }}</td>
                    <td>{{ $report->ip_address }}</td>
                    <td>{{ $report->power_state }}</td>
                    <td>{{ $report->health_summary }}</td>
                    <td class="text-warning">{{ $report->detail }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>



</body>

</html>
