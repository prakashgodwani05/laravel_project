
@extends('layouts.default')
@section('content')
<h1>Another session is in progress</h1>

<a href="{{route('closeSession')}}" class="btn btn-primary">Close Previous Session</a>
@endsection