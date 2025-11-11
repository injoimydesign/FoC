<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlagController extends Controller
{
    /**
     * Display a listing of active flags.
     */
    public function index()
    {
        $flags = Flag::active()->get();
        return view('flags.index', compact('flags'));
    }

    /**
     * Display US flags.
     */
    public function usFlags()
    {
        $flags = Flag::active()->usFlag()->get();
        return view('flags.index', compact('flags'));
    }

    /**
     * Display military flags.
     */
    public function militaryFlags()
    {
        $flags = Flag::active()->militaryFlag()->get();
        return view('flags.index', compact('flags'));
    }

    /**
     * Display the specified flag.
     */
    public function show(Flag $flag)
    {
        $discountedPrice = $flag->getDiscountedPrice();
        return view('flags.show', compact('flag', 'discountedPrice'));
    }

    /**
     * Show the form for creating a new flag (admin only).
     */
    public function create()
    {
        $this->authorize('create', Flag::class);
        return view('admin.flags.create');
    }

    /**
     * Store a newly created flag (admin only).
     */
    public function store(Request $request)
    {
        $this->authorize('create', Flag::class);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'image_url' => 'required|url',
            'flag_type' => 'required|in:us_flag,military_flag',
            'military_branch' => 'nullable|string|max:255',
            'active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $flag = Flag::create($request->all());

        return redirect()->route('admin.flags.index')
            ->with('success', 'Flag created successfully!');
    }

    /**
     * Show the form for editing the specified flag (admin only).
     */
    public function edit(Flag $flag)
    {
        $this->authorize('update', $flag);
        return view('admin.flags.edit', compact('flag'));
    }

    /**
     * Update the specified flag (admin only).
     */
    public function update(Request $request, Flag $flag)
    {
        $this->authorize('update', $flag);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'image_url' => 'required|url',
            'flag_type' => 'required|in:us_flag,military_flag',
            'military_branch' => 'nullable|string|max:255',
            'active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $flag->update($request->all());

        return redirect()->route('admin.flags.index')
            ->with('success', 'Flag updated successfully!');
    }

    /**
     * Remove the specified flag (admin only).
     */
    public function destroy(Flag $flag)
    {
        $this->authorize('delete', $flag);
        
        $flag->delete();

        return redirect()->route('admin.flags.index')
            ->with('success', 'Flag deleted successfully!');
    }
}
