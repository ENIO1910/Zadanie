<h1>
    car edit
</h1>
<form action="{{ route('cars.update') }}" method="POST" >
    @method('POST')
    @csrf
    <input type="hidden" name="car_id" value="{{$car->id}}">
    <label for="brand">
        Brand:
    </label>
    <input type="text" name="brand" value="{{$car->brand}}">
    <label for="model">
        Model:
    </label>
    <input type="text" name="model"  value="{{$car->model}}">
    <label for="year">
        Year:
    </label>
    <input type="text" name="year"  value="{{$car->year}}">
    <br>
    <button type="submit">Add</button>
</form>
