<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    header {
        position: relative;
        display: flex;
        flex-direction: row-reverse;
        width: 100%;
        height: 80px;
        font-family: Arial, Helvetica, sans-serif;
    }

    header .c1 {
        float: left;
        width: 60%;
        height: 100%;
    }

    header .c2 {
        float: right;
        width: 40%;
        height: 100%;
    }
    header .c2 span {
        float: right;
        font-size: 40px;
        color: #34D399;
        letter-spacing: 10px;
    }

    main {
        position: relative;
        font-family: Arial, Helvetica, sans-serif;
    }

    main .trans-info {
        width: 100%;
    }

    main .trans-info .right .c1,
    main .trans-info .right .c2,
    main .trans-info .right .c3 {
        text-align: left;
    }

    main table {
        font-size: 12px;
        margin-top: 80px;
    }

    main table tr td {
        padding: 10px;
    }

    main table h4 {
        font-size: 15px;
        color: #1F2937;
        padding: 0px 0px;
        margin: 6px 0px;
    }

    main table tr td strong {
        color: #374151;
    }

    main table tr td {
        color: #111827;
    }

    /* PAYMENT TABLE */

    .payment-table {
        border-collapse: collapse;
        border: 1px solid #9CA3AF;
    }

    .payment-table tr th {
        background-color: #374151;
        padding: 10px;
        border: 1px solid #9CA3AF;
        color: #F9FAFB;
    }

    .payment-table tr td {
        border: 1px solid #9CA3AF;
        padding-left: 20px;
    }


    .payment-table .data {
        background-color: #F9FAFB;
    }

    .payment-table .total {
        background: #34D399;
    }


    /* TRANS TABLE */

    .trans-table .trans-info span {
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 0px;
        margin: 0px;
    }

    .trans-table tr td {
        justify-content: start;
        align-items: flex-start;
        justify-items: start;
    }

    .trans-table tr td label {
        font-family: Arial, Helvetica, sans-serif;
    }

    .comp-table {
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 100px;
        font-size: 10px;
        text-align: justify;
    }

    .comp-table tr td {
        text-align: left;
        align-items: flex-start;
        justify-content: start;
        color: #1F2937;
    }

    .comp-table tr td div {
        margin-top: 20px;
    }

    .hr1{
        color:#D1FAE5;
        border:1px solid #D1FAE5;
    }

    .hr2{
        color:#A7F3D0;
        border:1px solid #A7F3D0;
    }

    .hr3{
        color:#6EE7B7;
        border:1px solid #6EE7B7;
    }

</style>

<body>
    @foreach ($data as $item)
        <header>
            {{-- <div class="c1">
                <img src="{{ public_path('img/app-img/logo.png') }}" height="40px">
            </div> --}}
            <div class="c2">
                <span>INVOICE</span>
            </div>
        </header>
        <main>
            <hr class="hr1">
            <hr class="hr2">
            <hr class="hr3">
            <table width="100%" class="trans-table">
                <tbody>
                    <tr>
                        <td width="60%">
                            <br>
                            <div class="trans-info">
                                <div class="c1">
                                    <h4>Transaction Number</h4>
                                    <span> {{ $item->id_transaction }} </span>
                                </div> <br>
                                <div class="c2">
                                    <h4> Payment Method </h4>
                                    <span> {{ $item->paycat . ' - ' . $item->payname }} </span>
                                </div> <br>
                                <div class="c3">
                                    <h4> Status </h4>
                                    <span> {{ $item->status }}</span>
                                </div>
                            </div>
                        </td>
                        <td width="40%">
                            <div class="trans-info">
                                <h4>Account Information</h4>
                                <div class="c1">
                                    <span> <strong> Name</strong> <br>
                                        <span> {{ $item->owner_name }} </span>
                                </div> <br>
                                <div class="c2">
                                    <span><strong> Phone</strong> </span><br>
                                    <span> {{ $item->owner_phone }}</span>
                                </div> <br>
                                <div class="c3">
                                    <span><strong> Address</strong> </span><br>
                                    <span> {{ $item->owner_address }}</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="payment-table" width="100%" border="1">
                <thead>
                    <tr>
                        <th width="40%">Name For</th>
                        <th width="20%">Date</th>
                        <th width="40%">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="data">
                        <td>{{ $item->aliases }}</td>
                        <td style="text-align:center;">{{ date('d/m/Y', strtotime($item->created_trans)) }}</td>
                        <td style="text-align:right;"> Rp {{ number_format($item->amount) }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Sub Total</td>
                        <td colspan="1" style="text-align:right;"> Rp {{ number_format($item->amount) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Fee</td>
                        <td colspan="1" style="text-align:right;"> Rp 0</td>
                    </tr>
                    <tr class="total">
                        <td colspan="2">Total</td>
                        <td colspan="1" style="text-align:right;"> Rp {{ number_format($item->amount) }}</td>
                    </tr>
                </tfoot>
            </table>
        </main>
    @endforeach

    <table width="100%" class="comp-table">
        <tbody>
            <tr>
                <td width="30%">
                    <img src="{{ public_path('img/app-img/logo.png') }}" height="40px"> <br>
                    {{ $comp->comp_name }}<br>
                    <div class="">
                        <strong> Phone </strong> <br>
                        {{ $comp->comp_phone }}
                    </div>
                    <div class="">
                        <strong> Email </strong> <br>
                        {{ $comp->comp_email }}
                    </div>
                    <div class="">
                        <strong> Address </strong>
                        <br>
                        {{ $comp->comp_address }}
                    </div>
                </td>
                <td width="30%">

                </td>
                <td width="30%">
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
