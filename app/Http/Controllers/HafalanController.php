<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hafalan;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
class HafalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
{
if ($request->ajax()) {


  $hafalan = DB::table('hafalans')
            ->leftJoin('users AS penyimak', 'penyimak.id', '=', 'hafalans.id_penyimak')
            ->leftJoin('users AS penghafal', 'penghafal.id', '=', 'hafalans.id_penghafal')->select('hafalans.*', 'penghafal.name AS nama_penghafal', 'penyimak.name AS nama_penyimak')
            ->orderBy('tanggal', 'desc')->get();


        return Datatables::of($hafalan)->addColumn('action', function($hafalan){
             $id_user = Auth::user()->id;
        return view('hafalan._action', [
        'edit_url' => route('hafalan.edit', $hafalan->id),'hapus_url' => route('hafalan.destroy',$hafalan->id),'model' => $hafalan,
        'nilai' => $hafalan->nilai, 'id_user' =>  $id_user,'id_penghafal' => $hafalan->id_penghafal,
        ]);
        })->make(true);
}
$html = $htmlBuilder
->addColumn(['data' => 'nama_penghafal', 'name'=>'nama_penghafal', 'title'=>'Penghafal'])
->addColumn(['data' => 'hafalan', 'name'=>'hafalan', 'title'=>'hafalan'])->addColumn(['data' => 'tanggal', 'name'=>'tanggal', 'title'=>'tanggal'])
->addColumn(['data' => 'nama_penyimak', 'name'=>'nama_penyimak', 'title'=>'Penyimak'])
->addColumn(['data' => 'nilai', 'name'=>'nilai', 'title'=>'nilai'])->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('hafalan.index')->with(compact('html'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hafalan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

          $this->validate($request, [
        'hafalan' => 'required'
        ]);
    $tanggal = date('Y-m-d');
    $id_user = Auth::user()->id;

 $hafalan = new  Hafalan();
 $hafalan->hafalan = $request->hafalan;
 $hafalan->id_penghafal = $id_user;
 $hafalan->tanggal = $tanggal;
 $hafalan->save();
   
return redirect('/quran/hafalan');
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
        $hafalan = Hafalan::find($id);

          return view('hafalan.edit')->with(compact('hafalan'));
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
         $id_user = Auth::user()->id;
         $Hafalan = Hafalan::find($id);
         $Hafalan->nilai = $request->nilai;
         $Hafalan->id_penyimak = $id_user;
         $Hafalan->save();
         return redirect('/quran/hafalan');
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
        Hafalan::destroy($id);
Session::flash("flash_notification", [
"level"=>"success",
"message"=>"Data Hafalan Berhasil Di Hapus"
]);
return redirect()->route('hafalan.index');
    }
}
