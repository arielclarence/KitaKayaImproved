<?php

namespace App\Services\Midtrans;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Midtrans\Snap;

class CreateSnapTokenService3 extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $namaLogin = Session::get("nama", "Saya");

        $ambilIdMember = DB::table('user')->where('nama', $namaLogin)->first();

        $tampung = $ambilIdMember->id;

        $params = [
            'transaction_details' => [
                'order_id' => $tampung,
            ],
            'item_details' => [
                [
                    'id' => 3,
                    'price' => '1100000',
                    'quantity' => 1,
                    'name' => 'Paket Terbaik',
                ],
            ],
            'customer_details' => [
                'first_name' => $ambilIdMember->nama,
                'phone' => '081234567890',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
