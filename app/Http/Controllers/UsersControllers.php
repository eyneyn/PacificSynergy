<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Str;

class UsersControllers extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        $users = $query->get();

        return view('admin.index', compact('users'));
    }
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.userUpdate', compact('user'));
    }
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'employee_number' => 'required|string|max:50',
        'position' => 'nullable|string|max:100',
        'department' => 'required|string|max:100',
        'phone_number' => 'nullable|string|max:20',
        'is_role' => 'required|in:0,1,2,3',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user->fill($validated);

    // ✅ Photo upload fix
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');

        $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $photo->getClientOriginalExtension();
        $photoName = time() . '_' . Str::slug($originalName) . '.' . $extension;

        // Save to public/uploads/photos
        $photo->move(public_path('uploads/photos'), $photoName);

        $user->photo = 'uploads/photos/' . $photoName;
    }

    $user->save(); // ✅ Don't call update() here

    return redirect()->route('admin.index')->with('success', 'User updated successfully!');
}


}
