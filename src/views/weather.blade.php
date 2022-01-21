<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weather App</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            font-family: 'Nunito', sans-serif;
            margin-top: 50px;
        }
    </style>
</head>
<body class="container">
<div class="row">
    <form action="{{route('weather')}}" method="POST">
        <div class="col-lg-12" style="display: inline">
            <div class="col-lg-6">
                @csrf
                <select name="city" required class="form-select" >
                    <option value="">Select a city</option>
                    <option value="31.582045_74.329376">Lahore</option>
                    <option value="	24.858480_67.001884">Karachi</option>
                    <option value="	33.738045_73.084488">Islamabad</option>
                </select>
                <button class="btn btn-primary" type="submit">Check</button>

            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </form>
    @if (!empty($forecast->forecast))
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Weather</th>
                <th scope="col">Hour</th>
                <th scope="col">Temperature</th>
            </tr>
            </thead>
            <tbody>
            @foreach (array_slice($forecast->forecast,0,24) as $f)
                <tr>
                    <th scope="row">
                        <img width=24 src="{{ $f->iconLink }}">
                    </th>
                    <td>{{ $f->description }}</td>
                    <td>{{ Carbon\Carbon::createFromFormat("HmdY", $f->localTime) }}</td>
                    <td> {{ $f->temperature }}&deg;</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @else
        <li>no forecast here.</li>
    @endif

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
