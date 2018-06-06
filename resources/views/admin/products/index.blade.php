@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" id="productName" name="productName"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity in stock</label>
                    <input type="text" id="quantity" name="quantity"/>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price"/>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" id="addProduct">Submit</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

                    <table class="table" id="products">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Date Created</td>
                        </tr>
                        <tbody>

                        @foreach($products as $product)
                            <div id="productList">
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->created_at }}</td>
                                </tr>
                            </div>
                                @endforeach
                                <tr>
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td id="total"><strong>{{ $total }}</strong></td>
                                </tr>
                        </tbody>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#addProduct').on('click', function (e) {
            console.log('take this form');
            e.preventDefault();
            var productName = $('#productName').val();
            var quantity = $('#quantity').val();
            var price = $('#price').val();

            $.ajax({
                type: "POST",
                url: '/products',
                data: {name: productName, quantity: quantity, price: price},
                success: function (data) {
                    $('#productList').append("<tr><td>" + data.product.name + "</td><td>" + data.product.quantity + "</td><td>" + data.product.price + "</td></tr>");
                    $('#total').html('<strong>' + data.total + '</strong>');
                }
            });
        });
    </script>
@endsection
