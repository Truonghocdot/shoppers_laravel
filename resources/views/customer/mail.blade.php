<!doctype html>
<html lang="en">

<head>
    <title>Mail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <div class="container">
        <h1 class="text-center text-danger">Hello {{ $name }} Thanks To Ordered. </h1>
        <p>Here's Your Order: </p>
        <table class="table" cellpadding="5" border="1" cellspacing="0"
            style="
            width: 100%;
            border: 1px solid #f379a7;
        ">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td style="text-align: center;">{{ $item->id }}</td>
                        <td style="text-align: center;">{{ $item->title }}</td>
                        <td style="text-align: center;">
                            @if ($item->promotion_price > 0)
                                {{ $item->promotion_price }}
                            @else
                                {{ $item->price }}
                            @endif
                        </td>
                        <td style="text-align: center;">{{ $item->count }}</td>
                        <td style="text-align: center;">{{ $item->size }}</td>
                        <td style="text-align: center;">
                            @if ($item->promotion_price > 0)
                                {{ $item->promotion_price * $item->count }}
                            @else
                                {{ $item->price * $item->count }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                @if (count($coupon) > 0)

                    <tr>
                        <td colspan="5">Coupon</td>
                        <td>
                            <ul>
                                @foreach ($coupon as $item)
                                    <li>-{{ $item->value }}%</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td colspan="5" style="font-weight: bold; text-align: center">
                        ToTal
                    </td>
                    <td colspan="1" style="text-align: center;">
                        {{ $total }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
