<?php


use Illuminate\Support\Facades\Validator;


if (!function_exists('admin_id')) {
    function admin_id()
    {
        return auth('admin')->user()->id;
    }
}
if (!function_exists('sendResponse')) {
    function sendResponse($status = null, $msg = null, $data = null)
    {
        return response(
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $data
            ]
        );
    }
}
if (!function_exists('validationErrorsToString')) {
    function validationErrorsToString($errArray)
    {
        $valArr = array();
        foreach ($errArray->toArray() as $key => $value) {
            $errStr = $value[0];
            array_push($valArr, $errStr);
        }
        return $valArr;
    }
}
if (!function_exists('makeValidate')) {
    function makeValidate($inputs, $rules)
    {
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return validationErrorsToString($validator->messages());
        } else {
            return true;
        }
    }
}


function checkLang()
{
    if (!isset(getallheaders()['lang'])) {
        return response()->json(['status' => 401, 'msg' => 'The language is Required']);
    }
}


function msgdata($status = true, $msg = null, $data = null, $code = 200)
{
    $responseArray = [
//        'status' => $code,
        'message' => $msg,
        'data' => $data,
    ];
    return response()->json($responseArray, $code);
}


function msg($status, $msg, $code = 200)
{
    $responseArray = [
//        'status' => $code,
        'message' => $msg,
    ];
    return response()->json($responseArray, $code);
}


function currents()
{
    return 'current';
}

function finished()
{
    return 'finished';
}

function canceled()
{
    return 'canceled';
}

function arrived()
{
    return 'arrived';
}

function success()
{
    return 200;
}

function created()
{
    return 201;
}

function validation_error()
{
    return 422;
}

function failed()
{
    return 400;
}

function not_auth()
{
    return 401;
}

function not_acceptable()
{
    return 406;
}

function not_found()
{
    return 404;
}

function not_active()
{
    return 405;
}


function upload($file, $dir)
{
    $image = time() . uniqid() . '.' . $file->getClientOriginalExtension();
    $file->move('uploads' . '/' . $dir, $image);
    return $image;
}

function upload_multiple($file, $dir)
{
    $image = time() . uniqid() . '.' . $file->getClientOriginalExtension();
    $destinationPath = $dir;
    $file->storeAs($destinationPath, $image, 'my_upload');
    return $image;
}


function sms($phone, $message)
{
//    $ch = curl_init();
//    $url = "http://basic.unifonic.com/rest/SMS/messages";
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_POST, true);
//    // curl_setopt($ch, CURLOPT_POSTFIELDS, "userid=pm@uramit.com&password=uram123&msg=".$message."&sender=Bus-exc.&to=".$client->phone."&encoding=UTF8"); // define what you want to post
//    curl_setopt($ch, CURLOPT_POSTFIELDS, "AppSid=su7G9tOZc6U0kPVnoeiJGHUDMKe8tp&Body=" . $message . "&SenderID=ALKHALIL&Recipient=" . $phone . "&encoding=UTF8&responseType=json"); // define what you want to post
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $output = curl_exec($ch);
//    curl_close($ch);
}

function send_notification($token, $title, $message)
{
    $fields = array
    (
        'registration_ids' => [$token],
        'data' => ['type' => '3'],
        'notification' => array(
            'priority' => 'high',
            'body' => $message,
            'title' => $title,
            'sound' => 'default',
            'icon' => 'icon'
        )
    );
    $API_ACCESS_KEY = 'AAAA7MITCVM:APA91bFxG1YuBa-5G6nYPwrn4KFrbKjtilNv-dlm5yXKOLJiGtMgdLSTCjYIY1i3M6Nf4au0r6b2mEL_MjfkGb1-haRJa-zZr1laU5uffby_y2n63IMaVgrh5u63aQRJZMnpJg-SAO5V';
    $headers = array
    (
        'Authorization: key=' . $API_ACCESS_KEY,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);

}
