<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Products // index
        </div>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Entity Type ID</td>
                <td>Attribute Set ID</td>
                <td>Type ID</td>
                <td>SKU</td>
                <td>Has options</td>
                <td>Required options</td>
                <td>Status</td>
                <td>Name</td>
                <td>Amount Package</td>
                <td>Price</td>
                <td>Is Salable</td>
                <td>Stock Item</td>
                <td>Group Prices ID</td>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $value)
                <tr>
                    <td>{{ $value->entity_id }}</td>
                    <td>{{ $value->entity_type_id }}</td>
                    <td>{{ $value->attribute_set_id }}</td>
                    <td>{{ $value->type_id }}</td>
                    <td>{{ $value->sku }}</td>
                    <td>{{ $value->has_options }}</td>
                    <td>{{ $value->required_options }}</td>
                    <td>{{ $value->status }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->amount_package }}</td>
                    <td>{{ $value->price }}</td>
                    <td>{{ $value->is_salable }}</td>
                    <td>{{ $value->stock_item }}</td>
                    <td>{{ $value->group_prices_id }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('products/' . $value->entity_id) }}">Show this Product</a>

                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('products/' . $value->entity_id . '/edit') }}">Edit this Product</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
</body>
</html>