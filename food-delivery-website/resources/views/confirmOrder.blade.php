@extends('layouts.app')
@section('content')
<div>
    <h1>WElcome to confirm</h1>

    <form action="{{route('payment')}}" method="POST">
        @csrf
        <select id="paymentOption" name="paymentOption" class="form-select" aria-label="Default select example">
            <option selected>Select a payment option</option>
            <option value="TnG Ewallet">TnG EWallet</option>
            <option value="Credit/Debit Card">Credit/Debit Card</option>
            <option value="PayPal">PayPal</option>
        </select>
        <button type="submit">Choose</button>
    </form>

    @if($method == "TnG Ewallet")
    <p>Enter phone number</p>
    @endif


    <a style="margin-left:70%;" class="btn btn-success position-relative" href="/confirmOrder/confirm">Confirm Payment</a><br><br>
</div>
@endsection
<script>
    function run() {
        var selected = document.getElementById("paymentOption").value;
        document.getElementById('result').innerHTML = selected;
    }
</script>