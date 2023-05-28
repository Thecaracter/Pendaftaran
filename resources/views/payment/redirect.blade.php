<!-- resources/views/payment/redirect.blade.php -->
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 400px;
            padding: 30px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-title {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .btn-pay {
            background-color: #2890ff;
            border: none;
            color: #fff;
            font-size: 20px;
            padding: 12px 24px;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .btn-pay:hover {
            background-color: #4040ff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h3 class="card-title mb-4">Silahkan siapkan alat pembayaran untuk melakukan pembayaran</h3>
            <img src="https://img.freepik.com/free-vector/hand-holding-phone-with-credit-card-screen-man-making-purchase-shopping-paying-online-using-banking-app-flat-vector-illustration-transaction-e-commerce-concept_74855-26014.jpg?t=st=1685302049~exp=1685302649~hmac=5b65996f49cb3fcd2bee2847325d9bdd19037a071b03d96eb05c0eddd70ae2b9"
                alt="Payment Icon" class="mb-4">
            <button id="pay-button" class="btn-pay btn-block">Bayar Sekarang</button>
        </div>
    </div>

    <!-- Form for updatePayment -->
    <form id="update-payment-form" action="{{ route('update-payment') }}" method="POST" style="display: none;">
        @csrf
        @method('POST')
        <input type="hidden" name="pendaftaranId" value="{{ $pendaftaran->id }}">
        <input type="hidden" name="jumlah" value="{{ $pendaftaran->lomba->harga }}">
        <input type="hidden" name="tanggalPembayaran" id="tanggalPembayaran">
    </form>

    <script type="text/javascript">
        var payButton = document.getElementById("pay-button");
        payButton.addEventListener("click", function() {
            window.snap.pay("{{ $paymentToken }}", {
                onSuccess: function(result) {
                    alert("Payment success!");

                    // Submit the form for updatePayment
                    var form = document.getElementById("update-payment-form");
                    form.submit();
                },
                onPending: function(result) {
                    alert("Waiting for your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert("You closed the popup without finishing the payment");
                }
            });
        });
    </script>
</body>

</html>
