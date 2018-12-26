@extends('layout.layout')

@section('content')
    <style>
        .select-option {
            overflow-y: auto !important;
        }
    </style>
    <h1>Add New Product - Step 1</h1>
    <hr>
    <form action="/products/create-step1" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Product Name</label>
            <label for="taskTitle"></label>
            <input type="text" value="{{{isset($product->name ) }}}" class="form-control" id="taskTitle" name="name">
        </div>
        <div class="form-group">
            <label for="description">Product Company</label>
            <label>
                <select class="form-control" name="company">
                    <option {{{ (isset($product->company) && $product->company == 'Apple') ? "selected=\"selected\"" : "" }}}>
                        Apple
                    </option>
                    <option {{{ (isset($product->company) && $product->company == 'Google') ? "selected=\"selected\"" : "" }}}>
                        Google
                    </option>
                    <option {{{ (isset($product->company) && $product->company == 'Mi') ? "selected=\"selected\"" : "" }}}>
                        Mi
                    </option>
                    <option {{{ (isset($product->company) && $product->company == 'Samsung') ? "selected=\"selected\"" : "" }}}>
                        Samsung
                    </option>
                </select>
            </label>
        </div>

        <div class="form-group">
            <label for="description">Product category</label>
            <label>
                <div class="input-field col s12">
                    <select name="category">
                        @foreach ($categories  as $category)
                            <option
                                value="{{ $category->product_category_name }}">{{ $category->product_category_name }}</option>
                            {{{isset( $product->category ) }}}
                        @endforeach

                    </select>
                    {{--<label>Materialize Select</label>--}}
                </div>
                {{--<select class="dropdown-trigger btn" name="category">--}}

                {{--@foreach ($categories  as $category)--}}
                {{--<option--}}
                {{--value="{{ $category->product_category_name }}">{{ $category->product_category_name }}</option>--}}
                {{--{{{isset( $product->category ) }}}--}}
                {{--@endforeach--}}
                {{--</select>--}}
            </label>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="input-field col s12">
                    <input id="input_text" name="amount" type="number" data-length="5"
                           value="{{{ isset($product->amount) }}}">
                    <label for="input_text">Product Amount</label>
                </div>
            </div>

            {{--<label for="productAmount">Product Amount</label>--}}
            {{--<label for="productAmount"></label>--}}
            {{--<input type="text" "--}}
            {{--class="input-field col s6" id="productAmount" name="amount"/>--}}
        </div>
        <div class="form-group">
            <label for="description">Product Available</label><br/>
            <label>
                <input class="with-gap" type="radio" name="available"
                       value="1" {{{ (isset($product->available) && $product->available == '1') ? "checked" : "" }}}>
                <span>Yes</span>
            </label>
            <label>
                <input class="with-gap" type="radio" name="available"
                       value="0" {{{ (isset($product->available) && $product->available == '0') ? "checked" : "" }}}>
                <span>No</span>
            </label>
        </div>
        <div class="form-group">
            <label for="description">Product Description</label>
            <label for="taskDescription"></label><textarea type="text" class="form-control" id="taskDescription"
                                                           name="description">{{{isset( $product->description ) }}}</textarea>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Add Product Image</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function () {
            $('select').formSelect();
        });
        $(document).ready(function () {
            $('input#input_text, textarea#textarea2').characterCounter();
        });

    </script>

@endsection
