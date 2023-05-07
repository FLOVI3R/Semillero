<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opinion;
use App\Like;
use Auth;
use PDF;

class UserController extends Controller
{
    public function index() {
        $opinions = Opinion::all()->where("deleted", "!=", 1);
        $likes = Like::all();
        return view('user.user_dashboard', compact('opinions', 'likes'));
    }

    public function likeOpinion($id) {
        $opinion = Opinion::find($id);
        $opinion->num_likes += 1; 
        $like = new Like;
        $like->opinion_id = $opinion->id;
        $like->user_id = Auth::User()->id;
        $opinion->save();
        $like->save();
        return redirect('user');
    }

    public function generatePDF() {
        $filename = 'Opiniones.pdf';
        $likes = Like::all()->where('user_id', '===', Auth::User()->id);
        $opinions = Opinion::all();
        $data = [
            'title' => 'SEMILLERO APP | PDF AutoGenerado - Likes a Opiniones sobre Plagas',
            'name' => Auth::User()->name,
            'surname' => Auth::User()->surname,
            'likes' => $likes,
            'opinions' => $opinions,
        ];
        $html = view()->make('pdf.opinionsPDF', $data)->render();

        $pdf = new PDF;
        $pdf::SetTitle('Opiniones Plagas');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output(public_path($filename),'F');
        return response()->download(public_path($filename));
    }
}
