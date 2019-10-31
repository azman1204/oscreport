@extends('layout')
@section('content')

<div class="col-md-7">
    <div class="card">
        <div class="card-body">
            <form action="/report">
                <div class="row">
                    <div class="col-md-2">Tarikh Dari</div>
                    <div class="col-md-4"><input type="text" class="form-control"></div>
                    <div class="col-md-2">Tarikh Hingga</div>
                    <div class="col-md-4"><input type="text" class="form-control"></div>
                </div>
                <div class="row mb-2 mt-1">
                    <div class="col-md-2"></div>
                    <div class="col-md-4"><input type="submit" value="Cari" class="btn btn-primary"></div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
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
        </div>
    </div>
</div>
@endsection
