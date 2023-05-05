@extends('layouts.master')

@section('title')
    Item List
@endsection

@section('content')
    <h4>
        Item List
        @if (request()->has('keyword'))
            [ Search result by '{{ request()->keyword }}' ]
        @endif
    </h4>

    @if (session('status'))
        <div class=" alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-between mb-3">
        <div class="col-md-3">
            <a href="{{ route('item.create') }}" class="btn btn-outline-primary">Create</a>
        </div>
        <div class="col-md-5">
            <form action="{{ route('item.index') }}" method="get">
                <div class=" input-group ">
                    <input type="text" class=" form-control" name="keyword"
                        @if (request()->has('keyword')) value="{{ request()->keyword }}" @endif>
                    @if (request()->has('keyword'))
                        <a href="{{ route("item.index") }}" class="btn btn-danger">Clear</a>
                    @endif
                    <button class=" btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <table class=" table">
        <thead>
            <tr>
                <td>#</td>
                <td>
                    Name
                    <a class=" btn btn-sm btn-outline-primary" href="{{ route('item.index') }}?name=asc">ASC</a>
                    <a class=" btn btn-sm btn-outline-primary" href="{{ route('item.index') }}?name=desc">DESC</a>
                    <a class=" btn btn-sm btn-outline-primary" href="{{ route('item.index') }}">Clear</a>
                </td>
                <td>Price</td>
                <td>Stock</td>
                <td>Control</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <a class=" btn btn-sm btn-outline-primary" href="{{ route('item.show', $item->id) }}">
                            Detail
                        </a>
                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form class=" d-inline-block" action="{{ route('item.destroy', $item->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class=" btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class=" text-center">
                        <p>
                            There is no record
                        </p>
                        <a class=" btn btn-sm btn-primary" href="{{ route('item.create') }}">Create Item</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $items->onEachSide(1)->links() }}
@endsection
