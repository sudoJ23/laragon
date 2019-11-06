<?php

namespace App\Http\Controllers;

use App\Student;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::paginate(5);
        $students = Student::all();
        return view('siswa.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:students',
            // 'address' => 'required',
            'nisn' => 'required|unique:students'
        ]);
        Student::create($request->all());
        return redirect('/siswa')->withStatus(__('Siswa berhasil ditambahkan.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('siswa.view', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('siswa.edit', ['student' => $student]);
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
        $request->validate([
            'name' => 'required',
            // 'address' => 'required',
            'nisn' => 'required',
            'email' => 'required'
        ]);
        Student::where('id', $id)->update(['name' => $request->name, 'address' => $request->address, 'nisn' => $request->nisn, 'email' => $request->email]);
        return redirect('/siswa')->withStatus(__('Siswa berhasil diupdate.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/siswa')->withStatus(__('Siswa berhasil dihapus.'));
    }
}
