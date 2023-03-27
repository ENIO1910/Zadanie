
<h3>Add user: <a href="{{ route('users.add') }}" class="btn btn-primary">Add user</a> </h3>
<h4>Lista użytkowników:</h4>
<table>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>Akcja</td>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td><a href="{{route("users.edit", ['user_id' => $user->id])}}">Edytuj</a>
                <form action="{{route("users.delete")}}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <button type="submit">Usuń</button>
                </form>
            </td>

        </tr>
    @endforeach
</table>
<br>
<h3>Add car: <a href="{{ route('cars.add') }}" class="btn btn-primary">Add car</a>
</h3>
<table>
    <tr>
        <td>id</td>
        <td>brand</td>
        <td>model</td>
        <td>rok produkcji</td>
        <td>Akcja</td>
    </tr>

    <h4>Lista samochodów:</h4>

    @foreach ($cars as $car)



            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td><a href="{{route("cars.edit", ['car_id' => $car->id])}}">Edytuj</a>
                    <form action="{{route("cars.delete")}}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="car_id" value="{{$car->id}}">
                        <button type="submit">Usuń</button>
                    </form>
                </td>
            </tr>
            @endforeach

</table>
<br>
<form action="{{ route('cars.users.update') }}" method="POST">
    @method('PUT')
    @csrf
    <label for="car_id">
        Przypisz samochód:
    </label>
    <br>

    <select name="car_id" id="car_id">
        @foreach($cars as $car)
            <option value="{{$car->id}}">{{$car->brand}} {{$car->model}} {{$car->year}}</option>
        @endforeach
    </select>
    <br>

    <label for="user_id">
        Przypisz samochód użytkownikowi o nazwie:

    </label>
    <br>
    <select name="user_id" id="user_id">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    <br>
    Aby zapisać naciśnij przycisk
    <td>
        <button type="submit">Przypisz</button>
    </td>
</form>


<form action="{{ route('cars.users.check') }}" method="GET">
    Sprawdź czy do użytkownika przypisano samochód:
    <br>
    Wybierz użytkownika:
    <br>
    <select name="search_user_id" id="search_user_id">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    <br>
    <button type="submit">Check</button>
</form>

<h1>
    <a href="{{ route('customer.show') }}">Home</a>
</h1>
