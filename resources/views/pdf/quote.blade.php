<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quote from First Vision Contracting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 90%;
            margin: auto;
            padding: 10px;
        }
        .header, .title, .services {
            margin-bottom: 10px;
        }
        .header h2 {
            text-align: center;
        }
        .header img {
            width: 100px;
            height: 100px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            font-size: 13px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
        p {
            line-height: 4px;
            font-size: 13px;
        }
        .terms {
            line-height: 20px;
            font-size: 13px;
        }
        .title-table {
            display: flex;
            justify-content: space-between;
        }
        .title-table table {
            width: 48%;
        }
    </style>
</head>
<body>
    <section class="header">
        <div class="container container-header">
            
            <div class="right">
                <h2>QUOTE</h2>
                <img src="image/FVClogo.png" alt="Logo">
            </div>

            <div class="left">
                <h3 style="font-weight: bold">FIRST VISION CONTRACTING</h3>
                <p>Operated by 2589813 Alberta Ltd.</p>
                <p>firstvisioncontracting@gmail.com</p>
                <p>587-602-0333</p>
                <p><b>Business Number:</b> 794206029</p>
            </div>
        </div>
    </section>

    <section class="title">
        <div class="container">
            <table>
                <tr>
                    <th>Bill To:</th>
                    <td colspan="3">{{$quotation->client->last_name}} {{$quotation->client->first_name}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{$quotation->client->email}}</td>
                    <th>Phone Number:</th>
                    <td>{{ preg_replace("/(\d{3})(\d{3})(\d{4})/", '($1)-$2-$3', $quotation->client->phone_number)}}</td>
                </tr>
                <tr>
                    <th>Quotation Number:</th>
                    <td>{{$quotation->quote_number}}</td>
                    <th>Date Created:</th>
                    <td>{{$quotation->created_at->format('M-d-Y')}}</td>
                </tr>
            </table>
        </div>
    </section>



    <section class="services">
        <div class="container">
            <h5 style="font-weight: bold">Services</h5>
            <table>
                <tr>
                    <th>#</th>
                    <th style="width:60%">Description</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <tbody class="mt-5">
                    @php
                        $n = 1
                    @endphp
                    @foreach ($quotation->service as $service)
                        
                        <tr>
                            <td>
                                {{$n++}}
                            </td>
                            <td class="text-transform:capitalize">
                                <b>{{$service->servicelist->name}}</b>
                                <p class="trix-content">{!!$service->description!!}</p>
                            </td>
                            <td>
                                {{number_format($service->unit_price)}}
                            </td>
                            <td>
                                {{$service->quantity}}
                            </td>
                            <td>
                                {{number_format($service->total)}}
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <th colspan="3">
                            </th>
                            <th>
                                Sub Total:
                            </th>
                            <td>
                                {{number_format($quotation->sub_total)}}
                            </td>
                        </tr>
                        <tr>
                            <th colspan="3">
                            </th>
                            <th>
                                GST (5%):
                            </th>
                            <td>
                                {{$quotation->tax}}
                            </td>
                        </tr>
                        <tr>
                            <th colspan="3">
                            </th>
                            <th>
                                Total
                            </th>
                            <td>
                                {{number_format($quotation->total)}}
                            </td>
                        </tr>
                </tbody>

            </table>
        </div>
    </section>

    <section class="terms-section">
        <div class="container">
            <h5 class="font-weight:bold">Terms & Conditions</h5>
            <p class="terms">
                Please note:<br>
                50% deposit required before any work begins. 25% after drywalling is completed. Balance paid after work is fully completed.<br>
                Make all checks payable to: <b>2589813 Alberta Ltd.</b><br>
                We look forward to working with you!<br>
                <b>Quote valid for 30 days</b>
            </p>
        </div>
    </section>
</body>
</html>
