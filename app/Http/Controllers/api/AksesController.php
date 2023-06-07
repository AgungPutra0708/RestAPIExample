<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Akses;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use ErrorException;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Node\Query;

class AksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $akses = Akses::all();
            return response()->json($akses, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = validator::make($request->all(),[
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            Akses::create($request->all());
            $response = [
                'Success' => 'New Akses Created'
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $akses = Akses::findOrFail($id);
            $response = [
                $akses
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $akses = Akses::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['succeed' => false, 'Message' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $akses->Akses($request->all());
            $response = [
                'Success' => 'Akses Updated'
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No Result',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Akses::findOrFail($id)->delete();
            return response()->json(['success' => 'Akses deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }
}
