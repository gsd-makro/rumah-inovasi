<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        return view('dashboard.feedbacks.index', ['feedbacks' => $feedbacks]);
    }

    public function approve(Request $request)
    {
        $feedback = Feedback::find($request->id);
        $feedback->is_approved = true;
        $feedback->save();
        return redirect()->route('feedbacks.index')->with('success', 'Feedback berhasil diapprove');
    }

    public function read(Request $request)
    {
        $feedbackIds = $request->feedback_ids;
        Feedback::whereIn('id', $feedbackIds)->update(['is_read' => true]);
        return redirect()->route('feedbacks.index')->with('success', 'Feedback sudah dibaca');
    }

    public function destroy(Request $request)
    {
        $feedback = Feedback::find($request->id);
        $feedback->delete();
        return redirect()->route('feedbacks.index')->with('success', 'Feedback berhasil dihapus');
    }

    public function reply(Request $request)
    {
        $feedback = Feedback::find($request->id);
        $feedback->admin_reply = $request->reply;
        $feedback->is_read = true;
        $feedback->save();
        return redirect()->route('feedbacks.index')->with('success', 'Feedback berhasil dijawab');
    }
}
