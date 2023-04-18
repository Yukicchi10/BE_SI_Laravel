<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Controllers\API\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends BaseController
{
    const VALIDATION_RULES = [
        'nama' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'idKelas' => 'nullable',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'tempat' => 'required|string|max:255',
        'tgl_lahir' => 'required|date',
        'jns_kelamin' => 'required|string|max:255',
        'agama' => 'required|string|max:255',
        'nama_ayah' => 'required|string|max:255',
        'nama_ibu' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:255',
        'kd_pos' => 'required|string|max:255',
    ];
    const NumPaginate = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $mahasiswa = (MahasiswaResource::collection(Mahasiswa::all()));
            return $this->sendResponse($mahasiswa, "mahasiswa retrieved successfully");
        } catch (\Throwable $th) {
            return $this->sendError("error siswa retrieved successfully", $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, self::VALIDATION_RULES);
            $mahasiswa = new Mahasiswa;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->idKelas = $request->idKelas;
            $mahasiswa->email = $request->email;
            $mahasiswa->password = bcrypt($request->password);
            $mahasiswa->tempat = $request->tempat;
            $mahasiswa->tgl_lahir = $request->tgl_lahir;
            $mahasiswa->jns_kelamin = $request->jns_kelamin;
            $mahasiswa->agama = $request->agama;
            $mahasiswa->nama_ayah = $request->nama_ayah;
            $mahasiswa->nama_ibu = $request->nama_ibu;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->telepon = $request->telepon;
            $mahasiswa->kd_pos = $request->kd_pos;
            $mahasiswa->save();

            return $this->sendResponse(new MahasiswaResource($mahasiswa), 'Mahasiswa created successfully');
        } catch (\Throwable $th) {
            return $this->sendError('error creating Mahasiswa', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);
            return $this->sendResponse(new MahasiswaResource($mahasiswa), "mahasiswa retrieved successfully");
        } catch (\Throwable $th) {
            return $this->sendError("error retrieving mahasiswa", $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'nim' => 'required|string|max:255',
                'idKelas' => 'nullable',
                'email' => 'required|string|max:255',
                'tempat' => 'required|string|max:255',
                'tgl_lahir' => 'required|date',
                'jns_kelamin' => 'required|string|max:255',
                'agama' => 'required|string|max:255',
                'nama_ayah' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'telepon' => 'required|string|max:255',
                'kd_pos' => 'required|string|max:255',
            ]);
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->nama = $request->nama;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->idKelas = $request->idKelas;
            $mahasiswa->email = $request->email;
            $mahasiswa->tempat = $request->tempat;
            $mahasiswa->tgl_lahir = $request->tgl_lahir;
            $mahasiswa->jns_kelamin = $request->jns_kelamin;
            $mahasiswa->agama = $request->agama;
            $mahasiswa->nama_ayah = $request->nama_ayah;
            $mahasiswa->nama_ibu = $request->nama_ibu;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->telepon = $request->telepon;
            $mahasiswa->kd_pos = $request->kd_pos;
            $mahasiswa->save();
            return $this->sendResponse($mahasiswa, 'siswa updated successfully');
        } catch (\Throwable $th) {
            return $this->sendError('error updating siswa', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->delete();
            return $this->sendResponse($mahasiswa, "mahasiswa deleted successfully");
        } catch (\Throwable $th) {
            return $this->sendError("error deleting mahasiswa", $th->getMessage());
        }
    }

    public function register(Request $request)
    {
        try {
            $this->validate($request, self::VALIDATION_RULES);
            $mahasiswa = new Mahasiswa;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->idKelas = $request->idKelas;
            $mahasiswa->email = $request->email;
            $mahasiswa->password = bcrypt($request->password);
            $mahasiswa->tempat = $request->tempat;
            $mahasiswa->tgl_lahir = $request->tgl_lahir;
            $mahasiswa->jns_kelamin = $request->jns_kelamin;
            $mahasiswa->agama = $request->agama;
            $mahasiswa->nama_ayah = $request->nama_ayah;
            $mahasiswa->nama_ibu = $request->nama_ibu;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->telepon = $request->telepon;
            $mahasiswa->kd_pos = $request->kd_pos;
            $mahasiswa->save();
            return $this->sendResponse(new MahasiswaResource($mahasiswa), 'mahasiswa created successfully');
        } catch (\Throwable $th) {
            return $this->sendError('error creating mahasiswa', $th->getMessage());
        }
    }
}
