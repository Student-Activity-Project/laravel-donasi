<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\UserDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DonasiController extends Controller
{
    public function list_kampanye(){
        $data = Donasi::latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'List kampanye berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function kampanye_saya(Request $request){
        $data = Donasi::where('id_user', $request->user()->id)->latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'List kampanye berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function detail_kampanye($id){
         //find post by ID
         $post = Donasi::findOrfail($id);

         //make response JSON
         return response()->json([
             'success' => true,
             'message' => 'Detail kampanye',
             'data'    => $post
         ], 200);
    }
    
    public function open_kampanye(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'judul'   => 'required|min:5',
            'deskripsi' => 'required',
            'target_donasi' => 'required|numeric',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $post = Donasi::create([
            'judul'     => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'target_donasi' => $request->target_donasi,
            'id_user' => $request->user()->id
        ]);

        //success save to database
        if($post) {
            return response()->json([
                'success' => true,
                'message' => 'Kampanye berhasil dibuat',
                'data'    => $post
            ], 201);

        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Gagal membuka kampanye',
        ], 409);

    }
    public function hapus_kampanye(Request $request, $id)
    {
        //find donasi by ID
        $post = Donasi::findOrfail($id);

        if($post && $post->id_user == $request->user()->id) {
            //delete donasi
            $post->delete();
            return response()->json([
                'success' => true,
                'message' => 'Kampanye berhasil dihapus',
            ], 200);

        }

        //data donasi not found
        return response()->json([
            'success' => false,
            'message' => 'Kampanye tidak ditemukan!',
        ], 404);
    }

    public function beri_donasi(Request $request, $id)
    {
        //find donasi by ID
        $post = Donasi::findOrfail($id);

        if($post && $post->id_user != $request->user()->id) {

            DB::beginTransaction();
            try{
                $ud = new UserDonasi();
                $ud->id_donasi = $post->id;
                $ud->id_user = $request->user()->id;
                $ud->jumlah_donasi = $request->jumlah_donasi;
                $ud->save();

                $updatedonasi = Donasi::where('id', $id)->update(
                    ['total_donasi' => ($post->total_donasi + $request->jumlah_donasi)]
                );

                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => 'Donasi berhasil diberikan',
                ], 200);  
            }catch(\Exception $e){

                DB::rollback();
                return response()->json([
                    'success' => true,
                    'message' => 'Donasi gagal diberikan',
                ], 200);  
            }
        }

        //data donasi not found
        return response()->json([
            'success' => false,
            'message' => 'Kampanye tidak ditemukan!',
        ], 404);
    }
}