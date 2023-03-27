<form action="{{ route('customer.create') }}" method="POST" >
    @method('POST')
    @csrf
    <label for="name">
        name:
    </label>
    <input type="text" name="name">

    <br>
    <button type="submit">Add</button>
</form>
