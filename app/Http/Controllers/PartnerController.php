<?php

namespace App\Http\Controllers;

use App\Models\Aggrement;
use App\Models\Category;
use App\Models\Message;
use App\Models\Partner;
use App\Models\TagPartner;
use App\Models\User;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated=$request->validate([
            'name' => 'required',
            'birth_date' => 'required',
            'location' => 'required',
            'description' => 'required',
            'instagram_url' => 'required',
            'image' => 'image',
        ]);
        $validated['user_id']=auth()->user()->id;
        $validated['image']=$request->file('image')->store('partners-images');

        for ($i=0; $i < $request->totalCategory ; $i++) { 
            $tags=$request['category'.$i];
            $user=auth()->user()->id;
            TagPartner::create([
                'user_id'=>$user,
                'category_id'=>$tags
            ]);
        }

        Partner::create($validated);

        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        $tags=TagPartner::where('user_id',$partner->user_id)->get();
        $categories=Category::all();
        return view('detail',compact('partner','tags','categories'));
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
    public function chat($id){
        $message1=Message::where('receiver_id',$id)->Where('sender_id',auth()->user()->id)->get();
        $message2=Message::where('receiver_id',auth()->user()->id)->Where('sender_id',$id)->get();
        $messages=$message1->merge($message2);
        $aggrement1=Aggrement::where('sender_id',auth()->user()->id)->Where('receiver_id',$id)->first();
        $aggrement2=Aggrement::where('sender_id',$id)->Where('receiver_id',auth()->user()->id)->first();
        $aggrement=$aggrement1 ?? $aggrement2;
        // dump($messages);
        $receiver=User::find($id);
        $categories=Category::all();
        return view('chat',compact('categories','receiver','messages','aggrement'));

    }
}
