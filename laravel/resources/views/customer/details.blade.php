<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
</head>
<body>
<div id="CustomerDetails"></div>
<h1>Tabela pracodawca</h1>

<table style="border: solid 1px;">
    <tr>
        <th>ID</th>
        <th>Imie</th>
        <th>Utworzony</th>
        <th>Aktualizowany</th>
    </tr>


        <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->created_at}}</td>
            <td>{{$customer->updated_at}}</td>

        </tr>

</table>
@vite('resources/js/app.js')
</body>

</html>
