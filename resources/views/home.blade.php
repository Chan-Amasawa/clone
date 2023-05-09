@extends("layouts.master")

@section('title')
    Home Page
@endsection

@section('content')

    <h4>I'm Home</h4>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi iure praesentium accusamus dicta magni adipisci molestias nemo tempora ipsum odio dolores, voluptas quo debitis id corporis rem, vitae quaerat nostrum.
    </p>
    <div class=" alert alert-info">
        {{-- {{ route("item.show",[15,"a"=>"aaa","b"=>"bbb"]) }} --}}
        {{ route("multi",[5,10,"a"=>"aaa","b"=>"bbbb"]) }}
    </div>

@endsection
