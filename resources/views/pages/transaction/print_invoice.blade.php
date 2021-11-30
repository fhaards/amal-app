<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    main {
        margin-top: 50px;
    }

    main .trans-info{
        width: 100%;
        height: 200px;    
    }

    main .trans-info .left{
        width:50%;
    }
    main .trans-info .right {
        width:50%;
        float: right;
        font-size:12px;
    }
    main .trans-info .right .c1, 
    main .trans-info .right .c2, 
    main .trans-info .right .c3{
        text-align: left;
    }

    main table {
        font-size: 12px;
        border-collapse: collapse;
        margin-top: 80px;
    }

    main table tr td {
        padding: 10px;
        text-align: center;
    }

</style>

<body>
    @foreach ($data as $item)
        <header>


        </header>
        <main>
            <div class="trans-info">
                <div class="left">
                    <strong>Logo</strong>
                </div>
                <div class="right">
                    <strong>Account Information</strong>
                    <br> <br>
                    <div class="c1">
                        Name <br> {{ $item->owner_name }}
                    </div> <br>
                    <div class="c2">
                        Phone <br> {{ $item->owner_phone }}
                    </div> <br>
                    <div class="c3">
                        Address <br> {{ $item->owner_address }}
                    </div>
                </div>
            </div>
            <table width="100%" border="1">
                <thead>
                    <tr>
                        <th>Sebagai</th>
                        <th>Tanggal</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item->aliases }}</td>
                        <td>{{ date('D, m/Y', strtotime($item->created_trans)) }}</td>
                        <td> Rp {{ number_format($item->amount) }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Total</td>
                        <td colspan="1">Total</td>
                    </tr>
                </tfoot>
            </table>
        </main>
    @endforeach

</body>

</html>
