
<h3>Add user: <a href="{{ route('customer.add') }}" class="btn btn-primary">Add user</a> </h3>
    <h3>Add user: <a href="{{ route('customer.add') }}" class="btn btn-primary">Add user</a> </h3>
<h4>Lista użytkowników:</h4>
<table>
    <tr>
        <td>id</td>
        <td>name</td>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
        </tr>
    @endforeach
</table>
<br>
<h3>Add car: <a href="{{ route('cars.add') }}" class="btn btn-primary">Add car</a>
</h3>
<h4>Lista samochodów:</h4>
<table>
    <tr>
        <td>id</td>
        <td>brand</td>
        <td>model</td>
        <td>rok produkcji</td>
    </tr>

    @foreach ($cars as $car)
        <form action="{{ route('cars.users.update') }}" method="POST">


            @method('PUT')
            @csrf
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
            </tr>
            @endforeach

</table>
<br>
Przypisz samochód id nr:
<br>
<input type="number" name="car_id" value="">

<br>
Przypisz samochód użytkownikowi o id nr:
<br>
<input type="number" name="user_id" value="">
<br>
Aby zapisać naciśnij przycisk
<td>
    <button type="submit">Przypisz</button>
</td>

<br>
<br>


</form>
<form action="{{ route('cars.users.check') }}" method="GET">
    Sprawdź czy do użytkownika przypisano samochód:
    <br>
    Podaj id użytkownika:
    <br>
    <input type="number" name="search_user_id" value="">
    <br>
    <button type="submit">Check</button>
</form>

<h1>
    <a href="{{ route('customer.show') }}">Home</a>
</h1>
