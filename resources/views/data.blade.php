@extends('default')
@section('title')   
    Data
@endsection('title')

@section('content')
<!-- Tabel om data te testen -->
<table class="data_table">
    <tr>
        <th>locatie_id</th>
        <th>naam</th>
        <th>plaats</th>
        <th>adres</th>
        <th>ldr</th>
        <th>temperatuur</th>
        <th>gas</th>
        <th>luchtvochtigheid</th>
        <th>geluidsoverlast</th>
        <th>gemeten op</th>
    </tr>
    @foreach($data as $row)
    <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->naam }}</td>
        <td>{{ $row->plaats }}</td>
        <td>{{ $row->adres }}</td>
        <td>{{ $row->ldr }}</td>
        <td>{{ $row->temperatuur }}</td>
        <td>{{ $row->gas }}</td>
        <td>{{ $row->luchtvochtigheid }}</td>
        <td>{{ $row->geluid }}</td>
        <td>{{ $row->gemeten_op }}</td>
    </tr>
    @endforeach

</table>
@endsection('content')