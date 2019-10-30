@extends('layout')
@section('content')
Hello World
...
<table border="1">
    <tr>
        <td>Status</td>
        <td>Bil</td>
    </tr>
    @foreach($arr as $result)
    <tr>
        <td>{{ $result->result_tx }}</td>
        <td>{{ $result->bil }}</td>
    </tr>
    @endforeach
</table>
@endsection
