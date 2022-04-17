<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\History;
use App\User;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hour = Carbon::now()->timezone('Asia/Jakarta');
        // $tabel = User::findOrFail(Auth::user()->id);
        $tabel = History::paginate(10);
        $testing = Auth::user();
        return view('home', ['jam'=>$hour, 'tabel'=>$tabel, 'tes'=>$testing]);
    }


    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');

            Auth()->user()->update(['pp'=>$filename]);
        }
        return redirect()->back();
    }
    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$search = DB::table('histories')
		->where('tanggal','like',"%".$cari."%")
        ->where('user_id','like',"%".Auth::user()->id."%")
		->orWhere(function($query) use ($cari, $request)  {
            $query->where('lokasi','like',"%".$cari."%")
            ->where('user_id','like',"%".Auth::user()->id."%");
        })
		->orWhere(function($query) use ($cari, $request)  {
            $query->where('jam','like',"%".$cari."%")
            ->where('user_id','like',"%".Auth::user()->id."%");
        })
		->orWhere(function($query) use ($cari, $request)  {
            $query->where('suhu','like',"%".$cari."%")
            ->where('user_id','like',"%".Auth::user()->id."%");
        })
        ->where('user_id','like',"%".Auth::user()->id."%")
		->paginate();
		$user = DB::table('histories')
		->paginate();
        $hour = Carbon::now()->timezone('Asia/Jakarta');
    		// mengirim data pegawai ke view index
		return view('home',['jam'=>$hour,'tes' => $search]);

	}
}
