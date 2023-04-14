@extends('layouts.app')
@section('content')
<div>
    <div class="row">
        <h1 style="margin-left:600px;">Please select a payment method</h1>
    </div>

    <form action="{{route('payment')}}" method="POST">
        <div class="row">
        @csrf
        <div class="col-md-4 offset-md-3">
        <select id="paymentOption" name="paymentOption" class="form-select md-4" aria-label="Default select example">
            <option selected>Select a payment option</option>
            <option value="TnG Ewallet">TnG EWallet</option>
            <option value="Credit/Debit Card">Credit/Debit Card</option>
        </select>
        </div>
        <div class="col-md-2">
        <button type="submit" class="btn btn-primary mb-2">Choose</button>
        </div>
        </div>
    </form>

    @if($method == "TnG Ewallet")
    <div class="row">
    <div class="col-md-5 offset-md-3">
    <form>
        <h3>The total price will be: RM{{$total}}</h3>
        <div class="form-group">
            <label for="phoneNo">Please Enter Your Phone Number</label>
            <input type="text" class="form-control" id="phoneNo" placeholder="Enter Phone Number Here">
        </div>
    </form>
    </div>
    </div>
    @elseif($method == "Credit/Debit Card")
    <div class="row">
    <div class="col-md-5 offset-md-3">
    <form>
        <h3>The total price will be: RM{{$total}}</h3>
        <div class="form-group">
            <label for="cardNo">Card Number</label>
            <input type="text" class="form-control" id="phoneNo" placeholder="Enter Card Number Here">
        </div>
        <div class="form-group col-md-3">
            <label for="expiryDate">Expiry Date</label>
            <input type="text" class="form-control" id="expiryDate" placeholder="Eg. 08/22">
        </div>
        <div class="form-group col-md-3">
            <label for="CVV">CVV</label>
            <input type="text" class="form-control" id="CVV" placeholder="Eg. 222">
        </div>
    </form>
    </div>
    </div>
    @endif

    
    <a style="margin-left:70%;" class="btn btn-success position-relative" href="/confirmOrder/confirm/{{Auth::user()->id}}">Confirm Payment</a><br><br>
</div>
@endsection
<script>
    function run() {
        var selected = document.getElementById("paymentOption").value;
        document.getElementById('result').innerHTML = selected;
    }
</script>