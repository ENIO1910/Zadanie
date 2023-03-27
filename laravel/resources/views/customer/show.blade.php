
<h3>Dodaj pracodawce: <a href="{{ route('customer.add') }}" >Add customer</a></h3>
<h3>Dodaj pracownika do pracodawcy: <a href="{{ route('worker.add') }}" >Add worker</a></h3>
<h3>Dodaj zamówienie do pracodawcy: <a href="{{ route('order.add') }}" >Add order</a></h3>

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
