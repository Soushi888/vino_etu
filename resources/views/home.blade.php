@extends('layouts.app')


<input type="hidden" id="utilisateur" value="{{ Auth::user()->name }}">
<input type="hidden" id="idUtilisateur" value="{{ Auth::user()->id }}">

@section('content')

<section id="pageAcceuil">
    <h1>Un petit verre de vino?</h1>


</section>

@endsection
