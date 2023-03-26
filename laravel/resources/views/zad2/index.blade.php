Lista użytkowników:
<br>
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
</br>
Aby zapisać naciśnij przycisk
<td>
    <button type="submit" class="btn btn-primary">Przypisz</button>
</td>
</form>
