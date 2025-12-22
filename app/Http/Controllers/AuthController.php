<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'customer') {
                return redirect('/');
            } else {
                Auth::logout();
                return redirect('/login')->withErrors(['role' => 'Unauthorized Role.']);
            }
        }

        throw ValidationException::withMessages([
            'email' => 'Could Not Find Email',
            'password' => 'Password Is Incorrect'
        ]);
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|string|max:15',
        ]);

        $user = User::create($validate);
        if ($user) {
            return redirect('/login')->with('Success', 'Account Sucessfully Created');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function adminDash()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->withErrors(['role' => 'Unauthorized access.']);
        }

        $stats = $this->getDashboardStats();
        $recentReservations = Reservation::with('user')
            ->latest()
            ->take(5)
            ->get();

        $recentOrders = Order::with(['user', 'carts'])
            ->latest()
            ->take(5)
            ->get();

        $earningsData = $this->getEarningsChartData();
        $ordersData = $this->getOrdersChartData();

        return view('admin.dashboard', compact(
            'stats',
            'recentReservations',
            'recentOrders',
            'earningsData',
            'ordersData'
        ));

    }

    private function getDashboardStats()
    {
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $totalReservations = Reservation::count();
        $todayReservations = Reservation::whereDate('booking_date', $today)->count();
        $monthReservations = Reservation::whereBetween('booking_date', [$startOfMonth, $endOfMonth])->count();

        $totalOrders = Order::count();
        $todayOrders = Order::whereDate('created_at', $today)->count();
        $monthOrders = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        $totalEarnings = Order::where('status', 'Completed')->orWhere('down_payment_paid', 1)->sum('total_amount');
        $todayEarnings = Order::where('status', 'Completed')
        ->orWhere('down_payment_paid', 1)
            ->whereDate('created_at', $today)
            ->sum('total_amount');
        $monthEarnings = Order::where('status', 'Completed')
        ->orWhere('down_payment_paid', 1)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('total_amount');

        return [
            'reservations' => [
                'total' => $totalReservations,
                'today' => $todayReservations,
                'month' => $monthReservations,
            ],
            'orders' => [
                'total' => $totalOrders,
                'today' => $todayOrders,
                'month' => $monthOrders,
            ],
            'earnings' => [
                'total' => $totalEarnings,
                'today' => $todayEarnings,
                'month' => $monthEarnings,
            ],
        ];
    }

    private function getEarningsChartData()
    {
        $data = [];
        $months = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $startOfMonth = $month->copy()->startOfMonth();
            $endOfMonth = $month->copy()->endOfMonth();

            $monthlyEarnings = Order::where('status', 'completed')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->sum('total_amount');

            $data[] = $monthlyEarnings;
            $months[] = $month->format('M');
        }

        return [
            'labels' => $months,
            'data' => $data,
        ];
    }

    private function getOrdersChartData()
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);

            $dailyOrders = Order::whereDate('created_at', $date)->count();

            $data[] = $dailyOrders;
        }

        return [
            'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            'data' => $data,
        ];
    }
}
