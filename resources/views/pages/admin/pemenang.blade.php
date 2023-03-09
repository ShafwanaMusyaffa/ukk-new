@extends('layouts.admin')
    
@section('content')
<form action="{{ route('lelang.determineWinner', $lelang->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Tentukan Pemenang</button>
</form>
@endsection