<?php

namespace App\Services\Midtrans;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
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


        $tampung = 5;

        // cara order id bervariasi
        if ($tampung == 6) {
            $tampung += 1;
        }

        $params = [
            'transaction_details' => [
                'order_id' => $tampung,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => '120000',
                    'quantity' => 1,
                    'name' => 'Paket Standart',
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
