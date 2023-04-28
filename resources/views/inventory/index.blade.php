@extends('layouts.master')

@section('title')
    Item List
@endsection

@section('content')
    <h4>Item List</h4>

    @if (session('status'))
        <div class=" alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class=" table">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
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
