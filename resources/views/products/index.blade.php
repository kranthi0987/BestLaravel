@extends('layout.layout')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="striped centered responsive-table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
            <th scope="col">product category</th>
            <th scope="col">Company</th>
            <th scope="col">Amount</th>
            <th scope="col">Available</th>
            <th scope="col">Images</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td><a href="/viewproduct/{{$product->id}}">{{$product->name}}</a></td>
                <td>{{$product->description}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->company}}</td>
                <td>{{$product->amount}}</td>
                <td>{{$product->available ? 'Yes' : 'No'}}</td>
                <td>
                    <div class="col s2"><img class="circle small responsive-img" src={{$product->productimg}}></div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $products->render() !!}

@endsection
