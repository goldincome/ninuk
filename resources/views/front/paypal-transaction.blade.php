<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Book NIN Payment</title>
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
</head>
<body>
    {{-- <a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Pay $1000</a> --}}
    @if(\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
    @endif
    {{config('settings.nin_capture_price')}}
    <form method="GET" name="duration" action="{{route('processTransaction')}}">
        @csrf
        <button type="submit" class="btn btn-primary m-3">
            Pay for NIN Booking
        </button>
    </form>
</body>
</html>