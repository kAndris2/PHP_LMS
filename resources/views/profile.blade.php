@extends('layouts.app')

@section('content')
ID:
{{Auth::User()->id}}

Name:
{{Auth::User()->name}}
@endsection('content')