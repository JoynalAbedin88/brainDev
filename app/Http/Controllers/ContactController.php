<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['area' => 3, 'page' => 9]);
        $contact = ContactInfo::all()->first();
        return view('backend.ContactInfo', compact('contact'));
    }


    public function message()
    {
        session(['area' => 5, 'page' => null]);
        $message = Contact::latest('id')->get();
        return view('backend.message', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValid($request);
        ContactInfo::create([
            'phone_1' => $request->phone_1,
            'phone_2' => $request->phone_2,
            'email_1' => $request->email_1,
            'email_2' => $request->email_2,
            'address' => $request->address,
            'map'     => $request->map,
        ]);
        return back()->with('success', 'Contact Information save success');
    }

    public function postMessage(Request $request)
    {  
        $request->validate([
            "name" => 'required',
            "email" => 'required',
            "phone" => 'nullable',
            "company" => 'nullable',
            "message" => 'required',
        ]);
        $email = 'naljoy600@gmail.com';

        Mail::send('email.message', compact('request'), function ($message) use($email){
            $message->from('noreply@reply.com', env('APP_NAME'))
                    ->to($email)
                    ->subject('Contact Message');
        });
        Contact::create($request->all());
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $contact->update(['status' => 1]);
        return view('backend.viewMessage', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->formValid($request);
        $contact = ContactInfo::find($id);
        $contact->update([
            'phone_1' => $request->phone_1,
            'phone_2' => $request->phone_2,
            'email_1' => $request->email_1,
            'email_2' => $request->email_2,
            'address' => $request->address,
            'map'     => $request->map,
        ]);
        return back()->with('success', 'Contact Information Update success');      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

    private function formValid($request)
    {
        return $request->validate([
            "phone_1" => 'required',
            "phone_2" => 'nullable',
            "address" => 'required',
            "email_1" => 'required',
            "email_2" => 'nullable',
            "map" => 'nullable',
        ]);
    }
}
