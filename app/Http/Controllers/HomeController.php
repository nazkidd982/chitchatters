<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\ChatMessage;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $messages = ChatMessage::with('user')->get();
        return view('home', compact('messages'));
    }

    public function messages(): Collection|array
    {
        return ChatMessage::with('user')->get();
    }

    public function messageStore(Request $request)
    {
        $user = Auth::user();
        $messages = $user->messages()->create([
            'message' => $request->message
        ]);
        broadcast(new SendMessage($user, $messages))->toOthers();
        return 'message sent';
    }
}
