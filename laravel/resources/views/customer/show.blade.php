<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How To Install Vue 3 in Laravel 9 with Vite</title>

    @vite('resources/css/app.css')
</head>
<body>

    <h3>Dodaj pracodawce: <a href="{{ route('customer.add') }}" >Add customer</a></h3>
    <h3>Dodaj pracownika do pracodawcy: <a href="{{ route('worker.add') }}" >Add worker</a></h3>
    <h3>Dodaj zamówienie do pracodawcy: <a href="{{ route('order.add') }}" >Add order</a></h3>

    <h1>Tabela pracodawca</h1>

    <table style="border: solid 1px;">
        <tr>
            <th>Imie</th>
            <th>Akcja</th>
        </tr>

        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>
                    <a href="{{route("customer.edit", ['customer_id' => $customer->id])}}"><button> Edytuj </button></a>
                    <form action="{{route("customer.delete")}}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="customer_id" value="{{$customer->id}}">
                        <button type="submit">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

    <h1>Tabela Pracownicy</h1>

    <table style="border: solid 1px;">
        <tr>
            <th>Imie</th>
            <th>Customer_id</th>
            <th>Akcja</th>
        </tr>

        @foreach($workers as $worker)
            <tr>
                <td>{{$worker->name}}</td>
                <td>{{$worker->customer_id}}</td>
                <td>
                    <a href="{{route("worker.edit", ['worker_id' => $worker->id])}}"><button> Edytuj </button></a>
                    <form action="{{route("worker.delete")}}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="worker_id" value="{{$worker->id}}">
                        <button type="submit">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>


    <h1>Tabela Zamówienia</h1>

    <table style="border: solid 1px;">
        <tr>
            <th>Imie</th>
            <th>Customer_id</th>
            <th>Akcja</th>
        </tr>

        @foreach($orders as $order)
            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->customer_id}}</td>
                <td>
                    <a href="{{route("order.edit", ['order_id' => $order->id])}}"><button> Edytuj </button></a>

                    <form action="{{route("order.delete")}}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <button type="submit">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>


    <h1>Tabela pracodawca - pracownik - zamówienie</h1>
    <table style="border: solid 1px;">
        <tr>
            <th>Pracodawca</th>
            <th>Pracownik</th>
            <th>Zamówienie</th>
        </tr>
    @foreach($customers as $customer)
    <tr>
        <td style="border: solid 1px;">{{ $customer->name }}</td>


    <td  style="border: solid 1px;">
        @foreach ($customer->workers as $worker)
            {{ $worker->name }}
        @endforeach
    </td>

    <td  style="border: solid 1px;">
        @foreach ($customer->orders as $order)
           {{ $order->name }}
        @endforeach
    </td>


    @endforeach
    </tr>
    </table>
    <h1>
        <a href="{{ route('cars.index') }}">Zakładka samochody</a>
    </h1>

    <div id="ShowListCustomers"></div>

    @vite('resources/js/app.js')
</body>

</html>
