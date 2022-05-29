<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaHoa;

class HomeController extends Controller
{
    public function encrypt(Request $request)
    {
        $input_text = $request->input_text;
        if (isset($input_text)) {
            $status = 200;
            $Mahoa = new MaHoa;
            $result = $Mahoa->encrypt($input_text);
            $encode = $result['encode'];
            $private_key = $result['private_key'];
            $public_key = $result['public_key'];
        } else {
            $status = 404;
            $encode = Null;
            $private_key = Null;
        }

        return response()->json(['status' => $status, 'encode' => $encode, 'private_key' => $private_key, 'public_key' => $result['public_key']]);
    }

    public function decrypt(Request $request)
    {
        $input_text = $request->input_text;
        $public_key = $request->public_key;
        if (isset($input_text)) {
            $status = 200;
            $Mahoa = new MaHoa;
            $result = $Mahoa->decrypt($input_text, $public_key);
        } else {
            $status = 404;
            $result = Null;
        }
        return response()->json(['status' => $status, 'decode' => $result]);
    }
}
