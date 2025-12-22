{{-- Create file: resources/views/admin/reservation_detail.blade.php --}}
@extends('admin.layout.index')
@section('style')
    <style>
        .toast-container {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .toast {
            visibility: hidden;
            min-width: 250px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 16px;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        .toast.show {
            visibility: visible;
        }

        .toast-content {
            flex-grow: 1;
            text-align: left;
            padding-right: 10px;
        }

        .toast-close {
            background: none;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            opacity: 0.7;
            padding: 0 0 0 10px;
        }

        .toast-close:hover {
            opacity: 1;
        }

        .toast-success {
            background-color: #2ecc71 !important;
        }

        .toast-warning {
            background-color: #f39c12 !important;
        }

        .toast-error {
            background-color: #e74c3c !important;
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container mt-4">
        <a href="{{ route('admin.reservation') }}" class="btn btn-secondary mb-4">
            ← Back to Reservations
        </a>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Reservation Details: {{ $reservation->reservation_code }}</h4>
                <span
                    class="badge bg-{{ $reservation->status == 'Confirmed' ? 'success' : ($reservation->status == 'Pending Payment' ? 'warning' : ($reservation->status == 'Created' ? 'info' : ($reservation->status == 'Cancelled' ? 'danger' : ($reservation->status == 'Dine' ? 'info' : ($reservation->status == 'Completed' ? 'success' : 'secondary'))))) }}">
                    {{ $reservation->status }}
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Guest Information</h5>
                        <p><strong>Name:</strong> {{ $reservation->salutation }} {{ $reservation->first_name }}
                            {{ $reservation->last_name }}</p>
                        <p><strong>Phone:</strong> {{ $reservation->phone }}</p>
                        <p><strong>Email:</strong> {{ $reservation->email }}</p>
                        <p><strong>Persons:</strong> {{ $reservation->person_attend }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Reservation Details</h5>
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($reservation->booking_date)->format('d M Y') }}
                        </p>
                        <p><strong>Time:</strong> {{ $reservation->time_in }} - {{ $reservation->time_out }}</p>
                        <p><strong>Table:</strong>
                            @if ($reservation->table)
                                Table #{{ $reservation->table->id }} ({{ $reservation->table->capacity }} seats)
                            @else
                                Not assigned
                            @endif
                        </p>
                        <p><strong>Created:</strong>
                            {{ \Carbon\Carbon::parse($reservation->created_at)->format('d M Y H:i') }}</p>
                    </div>
                </div>

                @if ($reservation->request || $reservation->allergies || $reservation->message)
                    <div class="row mt-3">
                        <div class="col-12">
                            <h5>Special Notes</h5>
                            @if ($reservation->request)
                                <p><strong>Request:</strong> {{ $reservation->request }}</p>
                            @endif
                            @if ($reservation->allergies)
                                <p><strong>Allergies:</strong> {{ $reservation->allergies }}</p>
                            @endif
                            @if ($reservation->message)
                                <p><strong>Message:</strong> {{ $reservation->message }}</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reservation Actions</h5>

                        <form action="{{ route('admin.reservation.update-status', $reservation->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('PUT')
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="status" class="col-form-label">Update Status:</label>
                                </div>
                                <div class="col-auto">
                                    <select name="status" id="status" class="form-select"
                                        onchange="showTableAssignment(this)">
                                        <option value="">Select Status</option>
                                        <option value="Confirmed"
                                            {{ $reservation->status == 'Confirmed' ? 'selected' : '' }}>Confirm</option>
                                        <option value="Cancelled"
                                            {{ $reservation->status == 'Cancelled' ? 'selected' : '' }}>Cancel</option>
                                        <option value="Dine" {{ $reservation->status == 'Dine' ? 'selected' : '' }}>Mark
                                            as Dining</option>
                                        <option value="Completed"
                                            {{ $reservation->status == 'Completed' ? 'selected' : '' }}>Complete</option>
                                    </select>
                                </div>

                                <div class="col-auto" id="tableAssignment" style="display: none;">
                                    <label for="table_id" class="col-form-label">Assign Table:</label>
                                    <select name="table_id" id="table_id" class="form-select">
                                        <option value="">Select Table</option>
                                        @foreach ($availableTables as $table)
                                            <option value="{{ $table->id }}"
                                                {{ $reservation->table_id == $table->id ? 'selected' : '' }}
                                                {{ $table->is_occupied && $reservation->table_id != $table->id ? 'disabled' : '' }}>
                                                Table #{{ $table->id }} ({{ $table->capacity }} seats)
                                                {{ $table->is_occupied ? '(Occupied)' : '(Available)' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('admin.reservation.update-table', $reservation->id) }}" method="POST"
                            class="d-inline ms-3">
                            @csrf
                            @method('PUT')
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="change_table_id" class="col-form-label">Change Table:</label>
                                </div>
                                <div class="col-auto">
                                    <select name="table_id" id="change_table_id" class="form-select">
                                        <option value="">Select Table</option>
                                        @foreach ($availableTables as $table)
                                            <option value="{{ $table->id }}"
                                                {{ $reservation->table_id == $table->id ? 'selected' : '' }}
                                                {{ $table->is_occupied && $reservation->table_id != $table->id ? 'disabled' : '' }}>
                                                Table #{{ $table->id }} ({{ $table->capacity }} seats)
                                                {{ $table->is_occupied ? '(Occupied)' : '(Available)' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-warning">Change Table</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if ($reservation->orders->count() > 0)
            @foreach ($reservation->orders as $order)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Order: {{ $order->order_code }}</h5>
                        <span
                            class="badge bg-{{ $order->status == 'Completed' ? 'success' : ($order->status == 'Processing' ? 'info' : ($order->status == 'Pending Payment' ? 'warning' : 'secondary')) }}">
                            {{ $order->status }}
                        </span>
                    </div>
                    <div class="card-body">
                        @if ($order->carts && $order->carts->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->carts as $cartItem)
                                            <tr>
                                                <td>{{ $cartItem->menu->name }}</td>
                                                <td>{{ $cartItem->menu->category }}</td>
                                                <td>{{ $cartItem->quantity }}</td>
                                                <td>Rp {{ number_format($cartItem->price, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format($cartItem->subtotal, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <div class="row mt-4">
                            <div class="col-md-6 offset-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Payment Summary</h6>
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Total Amount:</td>
                                                <td class="text-end">Rp
                                                    {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Down Payment (50%):</td>
                                                <td class="text-end">Rp
                                                    {{ number_format($order->down_payment_amount, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td>Remaining Amount:</td>
                                                <td class="text-end">Rp
                                                    {{ number_format($order->remaining_amount, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr class="border-top">
                                                <td><strong>Payment Status:</strong></td>
                                                <td class="text-end">
                                                    @if ($order->down_payment_paid)
                                                        <span class="badge bg-success">Down Payment Paid</span>
                                                    @else
                                                        <span class="badge bg-warning">Down Payment Pending</span>
                                                    @endif

                                                    @if ($order->full_payment_paid)
                                                        <span class="badge bg-success ms-2">Full Payment Paid</span>
                                                    @elseif($order->down_payment_paid)
                                                        <span class="badge bg-info ms-2">Full Payment Due</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="payment-actions">
                                    @if ($order->down_payment_paid && $order->remaining_amount != 0)
                                        <div class="text-center mb-3">
                                            <button type="button" class="btn btn-primary btn-lg"
                                                onclick="payFullPayment('{{ $reservation->id }}')">
                                                Pay Full Payment Now (@currency($order->remaining_amount))
                                            </button>
                                        </div>
                                    @endif

                                    @if ($order->down_payment_paid && $order->remaining_amount != 0)
                                        <div class="text-center">
                                            <form
                                                action="{{ route('admin.reservation.process-payment', $reservation->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                <div class="row g-3 align-items-center justify-content-center">
                                                    <div class="col-auto">
                                                        <label for="payment_method" class="col-form-label">Or Process Cash
                                                            Payment:</label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <select name="payment_method" id="payment_method"
                                                            class="form-select">
                                                            <option value="Cash">Cash</option>
                                                            <option value="Credit Card">Credit Card</option>
                                                            <option value="Debit Card">Debit Card</option>
                                                            <option value="QRIS">QRIS</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-warning">
                                                            Process Cash Payment (@currency($order->remaining_amount))
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info">
                No orders found for this reservation.
            </div>
        @endif
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Complete Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="payment-form">
                        <!-- Midtrans SNAPI will load here -->
                        <div id="snap-container"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel Payment</button>
                </div>
            </div>
        </div>
    </div>

    <div id="toast-container" class="toast-container" aria-live="polite" aria-atomic="true"></div>
@endsection

@section('script')
    <script>
        function showTableAssignment(select) {
            const tableAssignment = document.getElementById('tableAssignment');
            if (select.value === 'Confirmed') {
                tableAssignment.style.display = 'block';
            } else {
                tableAssignment.style.display = 'none';
            }
        }

        function payFullPayment(id) {
            $('#paymentModal').modal('show');
            $('#snap-container').html(
                '<div class="text-center"><div class="spinner-border text-primary" role="status"></div><p>Loading full payment...</p></div>'
            );

            $.ajax({
                url: '/admin/reservation/' + id + '/get-payment-token',
                type: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        window.snap.pay(response.snapToken, {
                            onSuccess: function(result) {
                                window.location.href = '/reservation/' + id +
                                    '/payment/callback?order_id=' + result.order_id +
                                    '&transaction_status=capture&payment_type=' + result
                                    .payment_type;
                            },
                            onPending: function(result) {
                                window.location.href = '/reservation/' + id +
                                    '/payment/callback?order_id=' + result.order_id +
                                    '&transaction_status=capture&payment_type=' + result
                                    .payment_type;
                            },
                            onError: function(result) {
                                window.location.href = '/reservation/' + id +
                                    '/payment/callback?order_id=' + result.order_id +
                                    '&transaction_status=capture&payment_type=' + result
                                    .payment_type;
                            },
                            onClose: function() {
                                $('#paymentModal').modal('hide');
                            }
                        });
                    } else {
                        alert(response.message);
                        $('#paymentModal').modal('hide');
                    }
                },
                error: function() {
                    alert('Failed to initialize payment. Please try again.');
                    $('#paymentModal').modal('hide');
                }
            });
        }

        (function() {
            var script = document.createElement('script');
            script.src = 'https://app.sandbox.midtrans.com/snap/snap.js';
            script.setAttribute('data-client-key', '{{ env('MIDTRANS_CLIENT_KEY') }}');
            script.async = true;
            document.head.appendChild(script);
        })();

        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('status');
            if (statusSelect) {
                showTableAssignment(statusSelect);
            }
        });
    </script>
@endsection
