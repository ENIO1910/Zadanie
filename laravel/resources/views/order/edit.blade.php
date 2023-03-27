<h1>
    Order edit
</h1>
<form action="{{ route('order.update') }}" method="POST" >
    @method('POST')
    @csrf
    <label for="name">
        name:
    </label>
    <input type="text" name="order_id" value="{{$order->id}}">
    <br>
    <br>
    <label for="customer_id">Pracodawca:</label>

    <select name="customer_id" >
        @foreach($customers as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
        @endforeach
    </select>

    <br>
    <button type="submit">Add</button>
</form>
