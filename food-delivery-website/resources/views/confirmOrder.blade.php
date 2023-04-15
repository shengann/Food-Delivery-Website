@extends('layouts.app')
@section('content')
<div>
    <div class="container">

    <div class="row">
        <div class="col-sm-3">Photo</div>
        <div class="col-sm-4">Item</div>
        <div class="col-sm-1">Price</div>
        <div class="col-sm-2">Quantity</div>
        <div class="col-sm-2">Total</div>
    </div>
    <hr>
    @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-4">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                    </td>
                    <div class="col-sm-1" data-th="Price">RM {{ $details['price'] }}</div>
                    <div class="col-sm-2" data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" readonly />
                    </div>
                    <div class="col-sm-2"  data-th="Subtotal" class="text-center">RM {{ $details['price'] * $details['quantity'] }}</td>
                    </div>
                    
                    </div>
                </tr>
                <tr>
                </tr>
            @endforeach
        @endif
    </div><br><br>

    <div class="row">
        <div class="col-sm-10 text-end"><h4>Total:</h4></div>
        <div class="col-sm-2"><h4>RM {{$total}}</h4></td>
        </div>
    </div>



        
    <form action="{{route('payment')}}" method="POST">
        @csrf
    <div class="row ">
    <div class="col-sm-5 ">
        <h4 class="text-center">Please select a payment method</h1>
    </div>

        <div class="col-sm-4  ">
        <select id="paymentOption" name="paymentOption" class="form-select" aria-label="Default select example">
            <option selected>Select a payment option</option>
            <option value="TnG Ewallet">TnG EWallet</option>
            <option value="Credit/Debit Card">Credit/Debit Card</option>
        </select>
        </div>
        <div class="col-sm-1">
        <button type="submit" class="btn btn-primary mb-2">Choose</button>
        </div>
    </form>
    </div>

    @if($method == "TnG Ewallet")
    <div class="container">
    <div class="row">
    <div class="col-md-5">
    <form>
        <div class= "row justify-content-center">
        <div>
        <br>
            <h4>Details</h4>
        </div>
        <div class="form-group">
            <label for="phoneNo">Please Enter Your Phone Number</label>
            <input type="text" class="form-control" id="phoneNo" placeholder="Enter Phone Number Here">
        </div>
        <div class="form-group">
            <label for="address">Please Enter Your Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter Address Here">
        </div>
    </div>
    </form>
    </div>
    </div>
    @elseif($method == "Credit/Debit Card")
    <div class="row">
    <div class="col-ms-5">
    <form>
        <h3>The total price will be: RM{{$total}}</h3>
        <div class="form-group">
            <label for="cardNo">Card Number</label>
            <input type="text" class="form-control" id="phoneNo" placeholder="Enter Card Number Here">
        </div>
        <div class="form-group col-ms-3">
            <label for="expiryDate">Expiry Date</label>
            <input type="text" class="form-control" id="expiryDate" placeholder="Eg. 08/22">
        </div>
        <div class="form-group col-md-3">
            <label for="CVV">CVV</label>
            <input type="text" class="form-control" id="CVV" placeholder="Eg. 222">
        </div>
        <div class="form-group">
            <label for="address">Please Enter Your Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter Address Here">
        </div>
    </form>
    </div>
    </div>
    @endif

    
    <div class="row justify-content-center">
        <div class="col">
            <br>
        <a class=" btn btn-success " href="/confirmOrder/confirm/{{Auth::user()->id}}">Confirm Payment</a><br><br>
        </div>
    
    </div>
    
</div>
@endsection
