@extends('templateHome')
@section('content')
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
      <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SET_YOUR_CLIENT_KEY_HERE"></script>
      <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    </head>
    <body>
        <br>
        <h2>Bayar Sekarang dan jadilah Member VIP!</h3>
        <br>
        <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>

        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            const payButton = document.querySelector('#pay-button');
            payButton.addEventListener('click', function(e) {
                e.preventDefault();

                snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                },
                // Optional
                onPending: function(result) {
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    console.log(result)
                }
            });
            });
        </script>
    </body>
@endsection
