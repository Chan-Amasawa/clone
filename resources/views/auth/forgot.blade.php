@extends("layouts.master")

@section('title')
    Forgot Password
@endsection

@section('content')

    <h4>Forgot Password</h4>

    <hr>

    <form action="{{ route("auth.checkEmail") }}" method="post">

        @csrf


        <div class="mb-3">
            <label class=" form-label" for="">Enter your email</label>
            <input type="email" class=" form-control @error('email') is-invalid @enderror" name="email">
            @error('email')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button class=" btn btn-primary"> Reset </button>
        </div>


    </form>


@endsection
