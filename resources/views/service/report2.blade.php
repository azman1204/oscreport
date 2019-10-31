@extends('layout')
@section('content')

<form action="/report2" method="post">
    @csrf
    <div class="row">
        <div class="col-md-2">Tajuk</div>
        <div class="col-md-4"><input type="text" name="tajuk" class="form-control" value="{{ request()->tajuk }}"></div>
        <div class="col-md-2"><input type="submit" value="Cari" class="btn btn-primary"></div>
    </div>
</form>

@if (count($rs) !== 0)
    Papar {{ $rs->firstItem() }} hingga {{ $rs->lastItem() }} dari {{ $rs->total() }}
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <td>Bil</td>
            <td>Tajuk</td>
            <td>Stat</td>
        </tr>

        @php
        $no = $rs->firstItem();
        @endphp

        @foreach ($rs as $val)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $val->servicename_tx }}</td>
            <td><a href="/report2-details/{{ $val->id_permohonan }}">lihat</a></td>
        </tr>
        @endforeach
    </table>
    <!-- kalau belum search, tak perlu lah show pagination -->

    {{ $rs->appends(['tajuk' => request()->tajuk])->links() }}
@endif

@endsection
