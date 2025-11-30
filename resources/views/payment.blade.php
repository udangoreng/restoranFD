<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Methods</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .modal-content {
            background: linear-gradient(135deg, #18312E 0%, #2a4d48 100%);
            border-radius: 10px;
            padding-bottom: 20px;
            border: 2px solid #c89b3c;
        }
        .payment-header {
            text-align: center;
            width: 100%;
            font-size: 20px;
            font-weight: 600;
            color: #c89b3c;
        }
        .divider {
            width: 90%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #c89b3c 50%, transparent 100%);
            margin: 10px auto 20px;
        }
        .method-box {
            background: #18312E;
            padding: 12px;
            border: 2px solid #c89b3c;
            border-radius: 8px;
            margin: 8px auto;
            width: 85%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            cursor: pointer;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .method-box:hover {
            background: #c89b3c;
            color: #18312E;
            transform: translateY(-2px);
        }
        .sub-box {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #c89b3c;
            border-radius: 6px;
            padding: 10px;
            width: 75%;
            margin: 6px auto;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 17px;
            color: #18312E;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .sub-box:hover {
            background: #c89b3c;
            color: #18312E;
            transform: translateX(5px);
        }
        
        .bank-radio {
            display: none;
        }
        
        .custom-radio {
            width: 20px;
            height: 20px;
            border: 2px solid #c89b3c;
            border-radius: 50%;
            display: inline-block;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .bank-radio:checked + .custom-radio {
            background: #c89b3c;
            border-color: #18312E;
        }
        
        .bank-radio:checked + .custom-radio::after {
            content: "";
            width: 8px;
            height: 8px;
            background: #18312E;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .sub-box.selected {
            background: #c89b3c;
            border-color: #18312E;
            transform: translateX(5px);
        }

        .checkbox-square {
            width: 22px;
            height: 22px;
            border: 2px solid #c89b3c;
            border-radius: 4px;
            background: #18312E;
        }

        .method-box:hover .checkbox-square {
            border-color: #18312E;
            background: #c89b3c;
        }

        .btn-close {
            filter: invert(1);
        }
        .payment-banner {
            width: 160px;
            height: 160px;
            margin: 0 auto 15px;
            border-radius: 50%;
            border: 3px solid #c89b3c;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #18312E;
        }

        .payment-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .btn-dark {
            background: #18312E;
            border: 2px solid #c89b3c;
            color: #c89b3c;
            font-weight: 600;
        }

        .btn-dark:hover {
            background: #c89b3c;
            color: #18312E;
            border-color: #18312E;
        }

        .confirm-btn {
            background: #c89b3c;
            border: 2px solid #18312E;
            color: #18312E;
            font-weight: 600;
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 8px;
            margin: 20px auto 10px;
            display: block;
            width: 85%;
            transition: all 0.3s ease;
        }

        .confirm-btn:hover {
            background: #18312E;
            color: #c89b3c;
            border-color: #c89b3c;
            transform: translateY(-2px);
        }

        .confirm-btn:disabled {
            background: #5c5c5c;
            border-color: #5c5c5c;
            color: #d9d9d9;
            cursor: not-allowed;
            transform: none;
        }

        .method-box span {
            color: #c89b3c;
            font-weight: bold;
        }

        .method-box:hover span {
            color: #18312E;
        }
    </style>
</head>

<body>
<button class="btn btn-dark m-3" data-bs-toggle="modal" data-bs-target="#paymentModal">
    Buka Metode Pembayaran
</button>

<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <div class="payment-header">Payment Methods</div>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="divider"></div>
            <div class="payment-banner">
                  <img src="{{ asset('img/payment.jpeg') }}" alt="payment" width="20">
            </div>
            <div class="method-box" data-bs-toggle="collapse" data-bs-target="#creditBox">
                <div class="d-flex align-items-center gap-2">
                    <div class="checkbox-square"></div>
                    Credit
                </div>
                <span>▾</span>
            </div>
            <div class="collapse show" id="creditBox">
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="bca-credit">
                    <span class="custom-radio"></span>
                    BCA
                </label>
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="bri-credit">
                    <span class="custom-radio"></span>
                    BRI
                </label>
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="bni-credit">
                    <span class="custom-radio"></span>
                    BNI
                </label>
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="mandiri-credit">
                    <span class="custom-radio"></span>
                    MANDIRI
                </label>
            </div>
            <div class="method-box" data-bs-toggle="collapse" data-bs-target="#debitBox">
                <div class="d-flex align-items-center gap-2">
                    <div class="checkbox-square"></div>
                    Debit
                </div>
                <span>▾</span>
            </div>
            <div class="collapse show" id="debitBox">
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="bca-debit">
                    <span class="custom-radio"></span>
                    BCA
                </label>
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="bri-debit">
                    <span class="custom-radio"></span>
                    BRI
                </label>
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="bni-debit">
                    <span class="custom-radio"></span>
                    BNI
                </label>
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="mandiri-debit">
                    <span class="custom-radio"></span>
                    MANDIRI
                </label>
            </div>
            <div class="method-box" data-bs-toggle="collapse" data-bs-target="#vaBox">
                <div class="d-flex align-items-center gap-2">
                    <div class="checkbox-square"></div>
                    Virtual Account
                </div>
                <span>▾</span>
            </div>
            <div class="collapse show" id="vaBox">
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="bca-va">
                    <span class="custom-radio"></span>
                    BCA
                </label>
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="bri-va">
                    <span class="custom-radio"></span>
                    BRI
                </label>
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="bni-va">
                    <span class="custom-radio"></span>
                    BNI
                </label>
                <label class="sub-box">
                    <input type="radio" name="bank" class="bank-radio" value="mandiri-va">
                    <span class="custom-radio"></span>
                    MANDIRI
                </label>
            </div>
            <button class="confirm-btn" id="confirmButton" disabled>
                Konfirmasi Pembayaran
            </button>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radioButtons = document.querySelectorAll('.bank-radio');
        const confirmButton = document.getElementById('confirmButton');
        
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.sub-box').forEach(box => {
                    box.classList.remove('selected');
                });
                if (this.checked) {
                    this.parentElement.classList.add('selected');
                }
                const anySelected = document.querySelector('.bank-radio:checked');
                confirmButton.disabled = !anySelected;
            });
        });
    })
</script>

</body>
</html>