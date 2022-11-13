<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BuyerController extends Controller
{
    public function addToCart($nama){
        $data = json_decode(Cookie::get("data") ?? "[]", true);
        $new = [
            "nama" => $nama,
            "jumlah" => 1,
        ];
        $data[] = $new;
        Cookie::queue(Cookie::make("data", json_encode($data)));
        return redirect()->route("cart");
    }

    public function cartForm(){
        $data = json_decode(Cookie::get("data") ?? "[]", true);

        return view("cart", ["data" => $data]);

    }

    public function hapus(){
        $data = json_decode(Cookie::get("data") ?? "[]", true);
        // return response('cart')->withCookie($cookie);

        unset($data["data"]);
        Cookie::queue(Cookie::make("data", json_encode($data), 1000));
        return view("cart", ["data" => $data]);

    }

    // public function checkOut($nama){
    //     $data = $this->getData();
    //     $dataCart = $data["data"] ?? [];
    //     if(count($dataCart) > 0){
    //         $dataTrans = $data["trans"] ?? [];
    //         $new = [
    //             "idTrans" => $nama
    //         ];
    //         $dataTrans[] = $new;
    //         $data["trans"] = $dataTrans;
    //         unset($data["data"]);
    //         Cookie::queue(Cookie::make("data", json_encode($data), 1000));
    //         return view("history", ["dataTrans" => $dataTrans]);
    //     }else{
    //         return redirect()->route("cart");
    //         dd($dataCart);
    //     }
    // }

    public function checkOut(){
        $data = json_decode(Cookie::get("data") ?? "[]", true);
        unset($data["data"]);
        Cookie::queue(Cookie::make("data", json_encode($data), 1000));
        return view("history", ["data" => $data]);
    }

    public function formHistory(){
        $data = $this->getData();
        $dataTrans = $data["data"] ?? [];
        return view("history", ["data" => $dataTrans]);
        unset($data);
    }
}
