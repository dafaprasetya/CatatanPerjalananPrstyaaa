<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\History;
use Storage;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hour = Carbon::now()->timezone('Asia/Jakarta');
        // $tabel = User::findOrFail(Auth::user()->id);
        $tabel = History::paginate(10);
        $testing = Auth::user();
        return view('history.index', ['jam'=>$hour, 'tabel'=>$tabel, 'tes'=>$testing]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newHistory=$request->all();

        $request->validate([
            'user_id'=>'required',
            'lokasi'=>'required',
            'jam'=>'required',
            'tanggal'=>'required',
            'suhu'=>'required'
        ]);
        $nama = Auth::user()->name;
        $lokasi = $request['lokasi'];
        $tgl = $request['tanggal'];
        $jam = $request['jam'];
        $suhu = $request['suhu'];
        $txt = sprintf("Nama: %s \nLokasi: %s\nTanggal: %s \nJam: %s \nSuhu: %s \n \n",$nama,$lokasi,$tgl,$jam, $suhu);
        Storage::disk('local')->append('dataperjalanan.txt', $txt);

        History::create($newHistory);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
