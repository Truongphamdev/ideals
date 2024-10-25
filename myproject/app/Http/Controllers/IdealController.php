<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Mail\WelcomeMail;
use App\Models\ideals;
use App\Models\User;
use Illuminate\Http\Request;

class IdealController extends Controller
{
    public function index(Request $request) {
        $ideals = ideals::orderBy('created_at', 'desc');
        if ($request->has('search')) {
            $ideals = $ideals->search($request->input('search',''));
        }
        return view('home',['ideals'=>$ideals->paginate(2)
        // $ideals = ideals::when($request->has('search'),function($query){
        //     $query->search($request->input('search',''))
        // })->orderBy('created_at', 'desc')-->paginate(2)
    ]);
    }
    public function store(StoreIdeaRequest $request) {
        $request->validated();
        $ideals =  new ideals(
            ['content'=> $request->get('idea','')]
        );
        $ideals['user_id']=auth()->id();
        $ideals->save();
        return redirect()->route('index')->with('success','Idea created Successfully!');
    }
    public function delete(ideals $idea) {
            $this->authorize('ideal.delete',$idea);
            $idea->delete();  // Nếu bản ghi tồn tại, thực hiện xóa
            return redirect()->route('index');
    }
    public function edit(ideals $idea) {
        $this->authorize('ideal.edit',$idea);
        $isEditing = true;  // Chỉnh sửa biến này
        return view('ideas.share.card', compact('idea', 'isEditing'));  // Đảm bảo tên biến khớp
    }
    public function update(UpdateIdeaRequest $request,ideals $idea) {
        $this->authorize('ideal.edit',$idea);
        $request->validated();
        $idea->content = $request->get('idea','');
        $idea->save();
        return redirect()->route('ideas.show',$idea->id);

    }
    
    public function show(ideals $idea) {

        return view('ideas.show', compact('idea'));
    }
    
}
