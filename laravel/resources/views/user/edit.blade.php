<h1>
    User edit
</h1>
<form action="{{ route('users.update') }}" method="POST" >
    @method('POST')
    @csrf
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <label for="name">
        name:
    </label>
    <input type="text" name="name" value="{{$user->name}}">
    <label for="email">
        email:
    </label>
    <input type="email" name="email"  value="{{$user->email}}">
    <label for="password">
        password:
    </label>
    <input type="password" name="password"  value="{{$user->password}}">
    <br>
    <button type="submit">Add</button>
</form>
