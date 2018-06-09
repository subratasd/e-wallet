@extends('layouts.users.master')

@section('title', 'Email Verify')

@push('css')

@endpush


@section('content')
<form action="" method="post">
<input type="text" name="emailv">
    </br>
<input type="submit" value="verify">

</form>
@endsection


@push('js')

@endpush