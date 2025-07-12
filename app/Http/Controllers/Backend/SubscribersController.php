<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribersController extends Controller
{
    public function index()
    {
        $newsletters = NewsletterSubscriber::latest()->get();
        return view('admin.subscriber.index', compact('newsletters'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => ['required'],
            'message' => ['required']
        ]);
        $emails = NewsletterSubscriber::where('is_verified', 1)->pluck('email')->toArray();
        Mail::to($emails)->send(new Newsletter($request->subject, $request->message));
        toastr('Mail has been send', 'success', 'success');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => 'deleted successfully']);
    }
}
