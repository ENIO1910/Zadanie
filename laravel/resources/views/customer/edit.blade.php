<h1>
    Customer Edit
</h1>
<form action="{{ route('customer.update') }}" method="POST" >
    @method('POST')
    @csrf
    <input type="hidden" name="customer_id" value="{{$customer->id}}">

    <label for="name">
        name:
    </label>
    <input type="text" name="name" value="{{$customer->name}}">
    <br>
    <button type="submit">Add</button>
</form>
