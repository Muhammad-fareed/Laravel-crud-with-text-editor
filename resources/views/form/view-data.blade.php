<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <title>View Data</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            color: #343a40;
            line-height: 1;
            display: flex;
            justify-content: center;
        }

        table {
            width: 800px;
            margin-top: 80px;
            /* border: 1px solid #343a40; */
            border-collapse: collapse;
            font-size: 18px;
        }

        th,
        td {
            /* border: 1px solid #343a40; */
            padding: 16px 24px;
            text-align: left;
        }

        thead th {
            background-color: #087f5b;
            color: #fff;
            width: 25%;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:nth-child(odd) {
            background-color: #e9ecef;
        }

        tbody a {
            color: #343a40;
        }

        a {
            text-decoration: none;
            font-size: 20px;
            color: #fff;
            transition: all 0.3s;
        }

        a:hover {
            font-size: 22px;
            color: red;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Number Range</th>
                <th>Place</th>
                <th>Time</th>
                <th>Mood</th>
                <th>Experience</th>
                <th><a href="{{ route('insert.data') }}"><i class="fa-solid fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $entry)
                <tr>
                    <td>{{ $entry->name }}</td>
                    <td>{{ $entry->email }}</td>
                    <td>{{ $entry->number }}</td>
                    <td>{{ $entry->place }}</td>
                    <td>{{ $entry->time }}</td>
                    <td>{{ $entry->mood }}</td>
                    <td>{!! $entry->experience !!}</td>
                    <td>
                        <div style="width: 45px;">
                            <span><a href="{{ route('edit.data', $entry->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a></span>
                            <span><a
                                    href="{{ route('delete.data', $entry->id) }} "onclick="return confirm('Are you sure to delete?')"><i
                                        class="fa-solid fa-trash"></i></a></span>
                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</body>

</html>
<script>
    $(function() {
        @if (Session::has('success'))
        toastr.options = {
            "timeOut": "5000",
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-left",
        }
        toastr['success']("{{ Session::get('success') }}");
        @endif
    });
</script>
