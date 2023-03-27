<form action="{{ route('cars.create') }}" method="POST" >
    @method('POST')
    @csrf
    <label for="brand">
        Brand:
    </label>
    <input type="text" name="brand">
    <label for="model">
        Model:
    </label>
    <input type="text" name="model">
    <label for="year">
        Year:
    </label>
    <input type="text" name="year">
    <br>
    <button type="submit">Add</button>
</form>
