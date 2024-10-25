<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show(User $user)
    {
        $ideal = $user->ideals()->paginate(2);
        return view('user.show',compact('user','ideal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        $ideal = $user->ideals()->paginate(2);
        $editing = true;
        return view('user.edit',compact('user','editing','ideal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request ,User $user)
    {
        $this->authorize('update',$user);

        $validated = $request->validated();
            if($request->has('image')) {
                $imagePath = $request->file('image')->store('profile','public');
                $validated['image']= $imagePath;

                Storage::disk('public')->delete($user->image ?? '');
            }
            $user->update($validated);
            return redirect()->route('profile');
    }

    public function profile() {
        return $this->show(auth()->user());
    }

}
