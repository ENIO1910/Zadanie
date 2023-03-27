<h1>
    User create
</h1>
<form action="{{ route('users.create') }}" method="POST" >
    @method('POST')
    @csrf
    <label for="name">
        name:
    </label>
    <input type="text" name="name">
    <label for="email">
        email:
    </label>
    <input type="email" name="email">
    <label for="password">
        password:
    </label>
    <input type="password" name="password">
    <br>
    <button type="submit">Add</button>
</form>
