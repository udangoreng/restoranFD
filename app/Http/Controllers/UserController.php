<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|string|max:15',
            'birthday' => 'nullable|date',
            'role' => 'required',
        ]);

        $data = $request->all();

        User::create($data);
        return redirect()->route('admin.user')->with('success', 'User Added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.detailuser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();

        Validator::make($data, [
            'email' => [
                'string',
                'email',
                'max:255',
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'username' => [
                'string',
                'max:255',
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'role' => 'required',
            'birthday' => 'nullable|date',
            'profile_img_path' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('profile_img_path')) {
            $data['profile_img_path'] = $request->file('profile_img_path')->storeAs('profile', $request->file('profile_img_path')->hashName(), 'public');
        }

        $user->update($data);

        return redirect()->route('admin.user')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if (Auth::id() == $user->id) {
            return redirect()->route('admin.user')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User deleted successfully.');
    }

    //USER

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userdata = Auth::user();
        $reservation = Reservation::where('user_id', $userdata->id)->whereIn('status', ['Pending Payment', 'Created', 'Confirmed', 'Dine'])->get();
        $history = Reservation::where('user_id', $userdata->id)->whereIn('status', ['Completed', 'Cancelled', 'No Show'])->get();
        return view('profile', compact('userdata', 'reservation', 'history'));
    }

    public function detail()
    {
        $userdata = Auth::user();
        $reservation = Reservation::where('user_id', $userdata->id)->whereIn('status', ['Pending Payment', 'Created', 'Confirmed', 'Dine'])->get();
        $history = Reservation::where('user_id', $userdata->id)->whereIn('status', ['Completed', 'Cancelled', 'No Show'])->get();
        return view('editprofile', compact('userdata', 'reservation', 'history'));
    }

    public function userUpdate(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'birthday' => 'nullable|date',
            'profile_img_path' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();

        if ($request->hasFile('profile_img_path')) {
            $data['profile_img_path'] = $request->file('profile_img_path')->storeAs('profile', $request->file('profile_img_path')->hashName(), 'public');
        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'User updated successfully.');
    }
}
