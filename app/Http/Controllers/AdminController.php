<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DuesMember;
use App\Models\DuesCategory;
use App\Models\Payment;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::where('level', '!=', 'warga')->get();
        return view('admin.users', compact('users'));
    }

    public function createUser()
    {
        return view('admin.create_user');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4',
            'nohp' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'level' => 'required|in:admin,officer,warga',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function editUser(User $user)
    {
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:4',
            'nohp' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'level' => 'required|in:admin,officer,warga',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        $maxId = User::max('id') ?? 0;
        DB::statement("ALTER TABLE users AUTO_INCREMENT = " . ($maxId + 1));
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function members()
    {
        $members = DuesMember::with('user', 'duesCategory')->get();
        return view('admin.members', compact('members'));
    }

    public function createMember()
    {
        $users = User::all();
        $categories = DuesCategory::all();
        return view('admin.create_member', compact('users', 'categories'));
    }

    public function storeMember(Request $request)
    {
        $validated = $request->validate([
            'users_id' => 'required|exists:users,id',
            'dues_categories_id' => 'required|exists:dues_categories,id',
            'registration_date' => 'required|date',
        ]);

        DuesMember::create($validated);

        return redirect()->route('admin.members')->with('success', 'Member created successfully.');
    }

    public function editMember(DuesMember $member)
    {
        $users = User::all();
        $categories = DuesCategory::all();
        return view('admin.edit_member', compact('member', 'users', 'categories'));
    }

    public function updateMember(Request $request, DuesMember $member)
    {
        $validated = $request->validate([
            'users_id' => 'required|exists:users,id',
            'dues_categories_id' => 'required|exists:dues_categories,id',
            'registration_date' => 'required|date',
        ]);

        $member->update($validated);

        return redirect()->route('admin.members')->with('success', 'Member updated successfully.');
    }

    public function deleteMember(DuesMember $member)
    {
        $member->delete();
        return redirect()->route('admin.members')->with('success', 'Member deleted successfully.');
    }

    public function categories()
    {
        $categories = DuesCategory::all();
        return view('admin.categories', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.create_category');
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        DuesCategory::create($validated);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }

    public function editCategory(DuesCategory $category)
    {
        return view('admin.edit_category', compact('category'));
    }

    public function updateCategory(Request $request, DuesCategory $category)
    {
        $validated = $request->validate([
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        $category->update($validated);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    public function deleteCategory(DuesCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }

    public function payments()
    {
        $payments = Payment::with('user', 'duesCategory')->get();
        return view('admin.payments', compact('payments'));
    }

    public function dashboard()
    {
        $userCount = User::count();
        $memberCount = DuesMember::count();
        $categoryCount = DuesCategory::count();
        $paymentCount = Payment::count();

        return view('admin.dashboard', compact('userCount', 'memberCount', 'categoryCount', 'paymentCount'));
    }

    public function createPayment()
    {
        $users = User::all();
        $categories = DuesCategory::all();
        return view('admin.create_payment', compact('users', 'categories'));
    }

    public function storePayment(Request $request)
    {
        $validated = $request->validate([
            'users_id' => 'required|exists:users,id',
            'dues_categories_id' => 'required|exists:dues_categories,id',
            'petugas' => 'required|in:admin,officer',
        ]);

        $category = DuesCategory::find($validated['dues_categories_id']);
        $validated['nominal'] = $category->nominal;
        $validated['period'] = $category->period;
        $validated['jumlah_tagihan'] = $category->nominal;
        $validated['nominal_tagihan'] = $category->nominal;

        Payment::create($validated);

        return redirect()->route('admin.payments')->with('success', 'Payment created successfully.');
    }

    public function detailPayment(Payment $payment)
    {
        return view('admin.detail_payment', compact('payment'));
    }
}
