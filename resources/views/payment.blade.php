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