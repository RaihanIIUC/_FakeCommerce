<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponser{

    private function successResponser($data, $code){
        return response()->json($data, $code);
    }

    protected function errorResponser($message , $code){
        return response()->json(['error'=> $message ,'code'=> $code ], $code);
    }

    protected function showAll(Collection $collection , $code = 200){
        if($collection->isEmpty()){
            return $this->successResponser(['data'=> $collection], $code);
        }
        return $this->successResponser($collection, $code);
    }

    protected function showOne(Model $model , $code = 200 ){
        return $this->successResponser($model , $code);
    }

    protected function showMessage($message , $code = 200){
        return $this->successResponser(['data' => $message], $code);
    }

}
