<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MahaMahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    /**
     *   Penting untuk tim lemon!!!
     *   Penjelasan : yang di comment ini untuk template pembuatan migration
     *   (WAJIB HAPUS COMMENT TEMPLATE JIKA TIDAK DIPAKAI)

     *   kode dibawah dipakai agar JSON response nya sesuai dengan permintaan dari frontend
     *   JSON response mengikuti permintaan frontend
     */

    public function toArray($request)
    {
        return [
            'idMahasiswa' => $this->idMahasiswa,
            'idKelas' => $this->idKelas,
            'nama' => $this->nama,
            'nim' => $this->nim,
            'kelas' => ($this->kelas) ? [
                $this->kelas->nama_kelas
            ] : 'Tak ada kelas',
            'email' => $this->email,
            'password' => $this->password,
            'tempat' => $this->tempat,
            'tgl_lahir' => $this->tgl_lahir,
            'jns_kelamin' => $this->jns_kelamin,
            'agama' => $this->agama,
            'nama_ayah' => $this->nama_ayah,
            'nama_ibu' => $this->nama_ibu,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'kd_pos' => $this->kd_pos,

            /**
         *  jika suatu field memiliki relasi terhadap tabel lain maka gunakan kode ini
         *  misal tabel Mahasiswa memiliki hubungan dengan tabel nilai
         *  'nilai' => ($this->kode1) ? [
         *      $this->kode1->namafield,
         *      $this->kode1->namafield,
         *  ] : '',

         *  keterangan :
         *  - kode 1 : fungsi pada model yang mendefiniskan relasi dengan tabel lain yang dituju, misal tabel nilai
         *  ex:
         *  'nilai' => ($this->nilai) ? [
         *    $this->nilai->semester,
         *    $this->nilai->nilaiAngka,
         *  ] : '',
         */
        ];
    }
}
