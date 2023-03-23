
@foreach($customers as $customer)

<h1> Nazwa Pracowdawcy: <ul> <li>{{ $customer->name }}</li> </ul></h1>

<h2>Pracownik:</h2>
<ul>
    @foreach ($customer->workers as $worker)
        <li>{{ $worker->name }}</li>
    @endforeach
</ul>

<h2>Zamówienie:</h2>
<ul>
    @foreach ($customer->orders as $order)
        <li>{{ $order->name }}</li>
    @endforeach
</ul>

@endforeach
