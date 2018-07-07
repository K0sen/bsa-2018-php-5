<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Popular currencies</title>
</head>
<body>
    <h1 style="text-align: center">Popular currencies</h1>

    <table border="1" align="center">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Daily Change</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($currencies as $currency)
            <tr>
                <td>
                    <img width="32px" src="{{ $currency->getImageUrl() }}" alt="cryptocurrency">
                    {{ $currency->getName() }}
                </td>
                <td>{{ $currency->getPrice() }}</td>
                <td>{{ $currency->getDailyChangePercent() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>