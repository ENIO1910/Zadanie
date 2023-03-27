<h1>
    Worker create
</h1>
<form action="{{ route('worker.create') }}" method="POST" >
    @method('POST')
    @csrf
    <label for="name">
        name:
    </label>
    <input type="text" name="name">
    <br>
    <br>
    <label for="customer_id">Pracodawca:</label>

    <select name="customer_id">
        @foreach($customers as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
        @endforeach
    </select>

    <br>
    <button type="submit">Add</button>
</form>
