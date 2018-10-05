<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Laravel</title>

    <link href="/css/app.css" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="{{ URL::asset('/js/app.js') }}"></script>

</head>
<body>


<div class="container">
    <div style="margin-top:50px" class="form-group pull-right">
            <div id="app">
                <add-token-popup></add-token-popup>
            </div>
    </div>
    <table class="table">

        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Homepage</th>
            <th>Total Supply</th>
            <th>Current Price</th>
            <th></th>
            <th></th>
        </tr>

        @if(! empty($tokens))
            @foreach( $tokens as $token)

                <tr>
                    <td>{{$token->symbol}}</td>
                    <td>{{$token->name}}</td>
                    <td><a href="{{$token->homepage}}">{{$token->homepage}}</a></td>
                    <td>{{$token->total_supply}}</td>
                    <td>${{$token->current_price}}</td>
                    <td >
                        <form action='/editForm/{{$token->id}}' method="get" >
                            <button type="submit" class="btn btn-success" role="group">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action='/deleteToken/{{$token->id}}' method="get" >
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        @endif
    </table>
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


</div>
</body>
</html>