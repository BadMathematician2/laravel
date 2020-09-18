<?php

namespace App\Http\Controllers\API;

use App\Example;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamplesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/examples",
     *     operationId="examplesAll",
     *     tags={"Pages"},
     *     summary="BCA",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="The page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Example not found"
     *     )
     * )
     *
     * BCA.
     *
     * @return string
     */
    public function index()
    {
        return 'Haha';
    }

    /**
     * @OA\Post (
     *     path="/examples",
     *     operationId="examplesOne",
     *     tags={"Pages"},
     *     summary="XYZ",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="The page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Example not found"
     *     )
     * )
     *
     * BCA.
     *
     * @return string
     */
    public function store()
    {
       return 'Hello';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
