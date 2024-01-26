<?php

namespace App\Http\Traits;
trait apiHandeller{


    public function successMessage($msg){
        return response()->json([
            "status"=> true,
            'message'=>$msg,

        ]);

    }
    public function errorMessage($msg){
        return response()->json([
            "status"=> false,
            'message'=>$msg,

        ]);

    }
    public function data($key,$value,$msg){
        return response()->json([
            "status"=> true,
            'message'=>$msg,
            $key=>$value,

        ]);

    }
    public function returnValidationError($validator,$code = "E001")
    {
        return $this->returnError($code, $validator->errors()->first());
    }


    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }
//just from another example
    public function getErrorCode($input)
    {
        if ($input == "name")
            return 'E0011';

        else if ($input == "password")
            return 'E002';

        else if ($input == "mobile")
            return 'E003';

        else if ($input == "id_number")
            return 'E004';

        else if ($input == "birth_date")
            return 'E005';


        else if ($input == "email")
            return 'E007';


        else if ($input == "id")
            return 'E013';

        else if ($input == "name_en")
            return 'E025';

        else if ($input == "name_ar")
            return 'E026';

        else if ($input == "gender")
            return 'E027';

        else if ($input == "nickname_en")
            return 'E028';

        else
            return "";
    }

}

