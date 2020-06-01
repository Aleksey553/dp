<?php

namespace App\Http\Controllers\Api;

use App\Orders;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\CarMark;
use App\CarModel;
use App\CarType;
use App\Category;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ContentControllerPhone extends Controller
{
    private const MESSAGE_OK = 'ok';
    private const MESSAGE_ERROR = 'error';
    private const MESSAGE_ERROR_UNKNOWN_VAR = 'Key_var_error';
    private const MESSAGE_ERROR_EMPTY = 'empty_data';
    private const PUBLISHED = 1;

    public function getTypes()
    {
        $carTypes = CarType::where('published', self::PUBLISHED)->get();
        if (count($carTypes) > 0) {
            return response()->json([
                'types' => $carTypes,
                'message' => self::MESSAGE_OK
            ], 200);
        }
        return response()->json(['message' => self::MESSAGE_ERROR_EMPTY . ':' . __FUNCTION__]);
    }

    public function getMarks(Request $request)
    {
        // dd(CarType::find($request->id)->carModel->where('published', self::PUBLISHED)->first());
        if (isset($request->id)) {

            $marks = CarMark::with('CarModel')
                ->whereHas('carType', function (Builder $query) use ($request) {
                    $query->where('id', $request->id);
                })->where('published', self::PUBLISHED)->get();
            // dd($marks);
            if (count($marks) > 0) {
                return response()->json([
                    'marks' => $marks,
                    'message' => self::MESSAGE_OK
                ], 200);
            }
            return response()->json(['message' => self::MESSAGE_ERROR_EMPTY . ':' . __FUNCTION__]);
        }
        return response()->json(['message' => self::MESSAGE_ERROR_UNKNOWN_VAR . ':' . __FUNCTION__]);
    }

    public function getModels(Request $request)
    {
        // dd($request->idm);
        if (isset($request->idm) && isset($request->idt)) {
            $models = CarModel::whereHas('carType',
                function (Builder $query) use ($request) {
                    $query->where('id', $request->idt);
                })->whereHas('CarMark',
                function (Builder $query) use ($request) {
                    $query->where('id', $request->idm);
                })->where('published', self::PUBLISHED)->get();

            if (count($models) > 0) {
                return response()->json([
                    'models' => $models,
                    'message' => self::MESSAGE_OK
                ], 200);
            }
            return response()->json(['message' => self::MESSAGE_ERROR_EMPTY . ':' . __FUNCTION__], 422);
        }

        return response()->json(['request' => $request, 'message' => self::MESSAGE_ERROR_UNKNOWN_VAR . ':' . __FUNCTION__]);
    }

    public function getCategories(Request $request)
    {
        $idCategory = (isset($request->id)) ? $request->id : 0;
        if (isset($idCategory)) {

            $categories = Category::where('parent_id', $idCategory)->where('published', self::PUBLISHED)->get();

            if (count($categories) > 0) {
                return response()->json([
                    'categories' => $categories,
                    'message' => self::MESSAGE_OK
                ], 200);
            }
            return response()->json(['message' => self::MESSAGE_ERROR_EMPTY . ':' . __FUNCTION__]);
        }
        return response()->json(['message' => self::MESSAGE_ERROR_UNKNOWN_VAR . ':' . __FUNCTION__]);
    }


    public function getServices(Request $request)
    {
        if (isset($request->id)) {
            $services = Category::find($request->id)->service->where('published', self::PUBLISHED);
            if (count($services) > 0) {
                return response()->json([
                    'services' => $services,
                    'message' => self::MESSAGE_OK
                ], 200);
            }
            return response()->json(['message' => self::MESSAGE_ERROR_EMPTY . ':' . __FUNCTION__]);
        }
        return response()->json(['message' => self::MESSAGE_ERROR_UNKNOWN_VAR . ':' . __FUNCTION__]);
    }

    public function postOrder(Request $request)
    {
        $errors = [];
        if ($request->userId == null) {
            $errors[]['message'] =  'Авторизуйтесь';
        }
        if ($request->arService == null) {
            $errors[]['message'] =  'Не выбраны услуги';
        }
        if ($request->date == null) {
            $errors[]['message'] =  'Не выбрана дата';
        }
        if (!isset($request->idModel)) {
            $errors[]['message'] =  'Не выбрана модель авто';
        }
        if (!isset($request->idMark)) {
            $errors[]['message'] =  'Не выбрана марка авто';
        }
        if (!isset($request->idType)) {
            $errors[]['message'] =  'Не выбран тип авто';
        }

        if(count($errors) > 0){
            return response()->json($errors, 422);
        }


        return Orders::create([
            'user_id' => $request->userId,
            'service_id' => serialize($request->arService),
            'car_model_id' => $request->idModel,
            'car_mark_id' => $request->idMark,
            'car_type_id' => $request->idType,
            'date' => $request->date,
            'status' => Orders::STATUS_WAITING
        ]);
    }
}
