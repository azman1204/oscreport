@extends('layout')
@section('content')
<table class="table table-bordered table-striped">
    <tr>
        <td>Jabatan</td>
        <td>Bil Hari</td>
        <td>Tarikh Terima</td>
        <td>Tarikh Ulas</td>
    </tr>
    @foreach($rs as $val)
    <tr>
        <td>{{ $val->departmentname_tx }} </td>
        <td>{{ $val->hari }}</td>
        <td>{{ $val->crateddate_ts }}</td>
        <td>{{ $val->completiondate_ts }}</td>
    </tr>
    @endforeach
</table>

<table class="table table-bordered table-striped">
        <tr>
            <td>Agensi</td>
            <td>Bil Hari</td>
            <td>Tarikh Terima</td>
            <td>Tarikh Ulas</td>
        </tr>
        @foreach($rs2 as $val)
        <tr>
            <td>{{ $val->agencyname_tx }} </td>
            <td>{{ $val->hari }}</td>
            <td>{{ $val->crateddate_ts }}</td>
            <td>{{ $val->completiondate_ts }}</td>
        </tr>
        @endforeach
    </table>
@endsection
