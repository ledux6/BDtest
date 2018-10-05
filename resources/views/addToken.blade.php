<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="/css/app.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

        <form action="/addToken" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="symbol">Symbol</label>
                <input type="text" class="form-control" id="symbol" placeholder="BDG" name="symbol" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="BitDegree" name="name" required>
            </div>
            <div class="form-group">
                <label for="homepage">Homepage</label>
                <input type="text" class="form-control" id="homepage" placeholder="https://bitdegree.org" name="homepage" required>
            </div>
            <div class="form-group">
                <label for="totalsupply">Total Supply</label>
                <input type="text" class="form-control" id="totalsupply" placeholder="550000000" name="totalsupply" required>
            </div>
            <div class="form-group">
                <label for="currentprice">Current Price</label>
                <input type="text" class="form-control" id="currentprice" placeholder="0.04556" name="currentprice" required>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <ul>
                                {{$error}}
                            </ul>
                        @endforeach
                </div>
            </div>
            @endif
        </form>


    </div>
</div>
</body>
</html>