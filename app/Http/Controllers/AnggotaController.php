<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class AnggotaController extends Controller
{
    public function getAnggota() {
        try {
            $anggota = Cache::remember('anggota', 10 * 60, function() {
                $data    = array();
                $members = DB::table('anggota')->orderByDesc('created_at')->take(1000)->get();
                foreach ($members as $member) {
                    $data[] = array(
                        'nm_anggota' => $member->nm_anggota,
                        'tmp_lahir'  => $member->tmp_lahir,
                        'tgl_lahir'  => $member->tgl_lahir,
                        'alamat'     => $member->alamat,
                        'no_hp'      => $member->no_hp,
                        'created_at' => $member->created_at,
                    );
                };

                return $data;
            });

            if($anggota) {
                return response()->json([
                    'message' => 'Successfull',
                    'content' => [
                        'anggota' => $anggota
                    ],
                    'code' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'Failed, Data Anggota',
                    'code'    => 404
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th,
                'code'    => 500
            ]);
        }
    }
}
