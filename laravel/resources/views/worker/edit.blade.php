<h1>
    Worker edit
</h1>
<form action="{{ route('worker.update') }}" method="POST" >
    @method('POST')
    @csrf
    <input type="hidden" name="worker_id" value="{{$worker->id}}">

    <label for="name">
        name:
    </label>
    <input type="text" name="name" value="{{$worker->name}}">
    <br>
    <label for="customer_id">Pracodawca:</label>

    <select name="customer_id" >
        @foreach($customers as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
        @endforeach
    </select>
    <button type="submit">Add</button>
</form>
