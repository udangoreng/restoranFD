@extends('admin.layout.index')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Reservations</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $stats['reservations']['total'] }}</h1>
                            <div class="mb-0">
                                <span class="text-muted">
                                    <i class="mdi mdi-calendar-month"></i> 
                                    {{ $stats['reservations']['month'] }} this month
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Earnings</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">@currency($stats['earnings']['total'])</h1>
                            <div class="mb-0">
                                <span class="text-success">
                                    <i class="mdi mdi-arrow-up"></i>
                                    @currency($stats['earnings']['month']) this month
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Orders</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">{{ $stats['orders']['total'] }}</h1>
                            <div class="mb-0">
                                <span class="text-muted">
                                    <i class="mdi mdi-cart"></i>
                                    {{ $stats['orders']['month'] }} this month
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-xxl-7">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Monthly Earnings (Last 6 Months)</h5>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart chart-sm">
                                <canvas id="earningsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-6 col-xxl-5">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Recent Orders (Last 7 Days)</h5>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart chart-sm">
                                <canvas id="ordersChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Recent Reservations</h5>
                        </div>
                        <div class="card-body">
                            @if($recentReservations->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Guests</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recentReservations as $reservation)
                                                <tr>
                                                    <td>{{ $reservation->user->name ?? 'N/A' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('M d, Y') }}</td>
                                                    <td>{{ $reservation->time_in }}</td>
                                                    <td>{{ $reservation->person_attend }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'pending' ? 'warning' : 'secondary') }}">
                                                            {{ ucfirst($reservation->status) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-muted">No recent reservations found.</p>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Recent Orders</h5>
                        </div>
                        <div class="card-body">
                            @if($recentOrders->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recentOrders as $order)
                                                <tr>
                                                    <td>#{{ $order->id }}</td>
                                                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                                                    <td>@currency($order->total_amount)</td>
                                                    <td>
                                                        <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'processing' ? 'warning' : 'secondary') }}">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-muted">No recent orders found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Reservation Calendar</h5>
                        </div>
                        <div class="card-body">
                            <div id="reservationCalendar"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var earningsCtx = document.getElementById("earningsChart").getContext("2d");
        new Chart(earningsCtx, {
            type: "line",
            data: {
                labels: @json($earningsData['labels']),
                datasets: [{
                    label: "Earnings ($)",
                    fill: true,
                    backgroundColor: "rgba(215, 227, 244, 0.5)",
                    borderColor: window.theme.primary,
                    data: @json($earningsData['data'])
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    }
                }
            }
        });

        var ordersCtx = document.getElementById("ordersChart").getContext("2d");
        new Chart(ordersCtx, {
            type: "bar",
            data: {
                labels: @json($ordersData['labels']),
                datasets: [{
                    label: "Orders",
                    backgroundColor: window.theme.success,
                    borderColor: window.theme.success,
                    data: @json($ordersData['data'])
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        flatpickr("#reservationCalendar", {
            inline: true,
            mode: "multiple",
            dateFormat: "Y-m-d",
            disableMobile: "true",
            onChange: function(selectedDates, dateStr, instance) {
                
                console.log('Selected dates:', selectedDates.map(d => d.toDateString()));
            }
        });
        if (feather) {
            feather.replace({ width: 14, height: 14 });
        }
    });
</script>
@endsection