@extends("layouts.app")

@section("header")
<script src={{asset("js/functions.js")}}></script>
@endsection

@section("content")
    <div class="page">
        <div class="container">
            <main class="content">
                <div id="celliers">

                </div>
                <h1 class="logo">
                    <img src={{ asset("img/logo_vino.png") }} alt="vino">
                </h1>

                <form method="POST" class="form" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Adresse courriel : </label>
                        <input class="input" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email"
                               placeholder="adresse@courriel.com"
                               autofocus>

                        @error('email')
                        <span class="invalid-feedback fail" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input class="input" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback fail" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-enter" id="bouton-bleu-main" type="submit" class="btn btn-primary">
                            Se connecter
                        </button>
                    </div>

                    <div class="form-group">
                        <button id="inscription" class="btn btn-cancel">
                            S'inscrire
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </div>
    <script>eventInscription();</script>
@endsection
