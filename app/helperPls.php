<?php
function decryptUrl($data)
{
    try {
        $data =  decrypt(species($data));
    }catch (Exception $e){
        abort(404);
    }
    return $data;
}

function encryptUrl($data = null)
{
    if($data === null){
        $data = generateMd5();
    }
    return species(encrypt($data),false);
}

function generateMd5()
{
    return md5(now()->getTimestamp() + rand(100000000,999999999));
}


function species($data,$decode = true)
{
    if($decode === true){
        return
            base64_decode(base64_decode(base64_decode(base64_decode($data))));
    }
    return
        base64_encode(base64_encode(base64_encode(base64_encode($data))));
}
