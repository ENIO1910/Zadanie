<form action="{{ route('order.create') }}" method="POST" >
    @method('POST')
    @csrf
    <label for="name">
        name:
    </label>
    <input type="text" name="name">
    <br>
    <br>
    <label for="cars">Pracodawca:</label>

    <select name="customer_id" id="cars">
        @foreach($customers as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
        @endforeach
    </select>

    <br>
    <button type="submit">Add</button>
</form>
