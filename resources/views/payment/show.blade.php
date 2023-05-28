<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
</head>

<body>
    <h1>Payment Details</h1>

    <h3>Order ID: {{ $transaction['order_id'] }}</h3>
    <h4>Status: {{ $transaction['transaction_status'] }}</h4>
    <h4>Total Amount: {{ $transaction['gross_amount'] }}</h4>
    <h4>Payment Method: {{ $transaction['payment_type'] }}</h4>
    <!-- Tampilkan informasi pembayaran lainnya yang relevan -->

    <script>
        window.onload = function() {
            // Kirim status pembayaran ke server Anda untuk diverifikasi
            fetch('/payment/callback', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        transaction: {!! json_encode($transaction) !!}
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Tampilkan pesan atau lakukan tindakan sesuai dengan respons dari server
                })
                .catch(error => {
                    console.error(error);
                    // Tampilkan pesan atau lakukan tindakan jika terjadi kesalahan
                });
        };
    </script>
</body>

</html>
