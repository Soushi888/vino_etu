@extends('layouts.app')

@section('content')
<div class="page">
    <div class="container">
        <main class="content">

            <h1 class="logo"><img src="img/logo_vino.png" alt="vino"></h1>
            <form class="form" action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                    <input class="input" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nom">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="input" name="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" placeholder="Courriel">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="input" type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required
                        autocomplete="new-password" placeholder="MDP">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="input" type="password" name="password_confirmation"
                        class="form-control @error('password') is-invalid @enderror" required
                        autocomplete="new-password" placeholder="comfirmation MDP">
                </div>
                <div class="form-group">
                    <button class="btn btn-register" type="submit" class="btn btn-primary"> S'enregistrer
                    </button>
                </div>
                <div class="form-group">
                    <button class="btn btn-cancel" onclick="window.location.href='{{ route('login') }}'">Annuler</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection
