<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Node\Block\Document;
include("Encode.php");
include("Decode.php");
class MaHoa extends Model
{
    public function encrypt($String)
    {
        $encrypt = _encrypt($String);
        return $encrypt;
    }

    public function decrypt($String, $public_key)
    {
        $decrypt = _decrypt($String, $public_key);
        return $decrypt;
    }
}
