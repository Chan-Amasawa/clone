@extends("layouts.master")

@section('title')
    Create Item
@endsection

@section('content')

    <h4>Create Item</h4>

    <form action="{{ route("item.store") }}" method="post">

        @csrf

        <div class="mb-3">
            <label class=" form-label" for="">Item Name</label>
            <input type="text" class=" form-control" name="name">
        </div>

        <div class="mb-3">
            <label class=" form-label" for="">Item Price</label>
            <input type="number" class=" form-control" name="price">
        </div>

        <div class="mb-3">
            <label class=" form-label" for="">Stock</label>
            <input type="number" class=" form-control" name="stock">
        </div>

        <button class=" btn btn-primary">Save Item</button>
    </form>


@endsection
