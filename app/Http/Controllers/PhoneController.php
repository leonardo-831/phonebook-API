<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Services\PhoneService;

class PhoneController extends Controller
{
    public function __construct(
        protected PhoneService $phoneService,
    ) {
    }

    /**
     * @OA\Put(
     *     path="/api/phones/{id}",
     *     summary="altera um número de telefone",
     *     tags={"Telefones"},
     *     @OA\Parameter(
     *         description="id do telefone",
     *         in="path",
     *         name="id",
     *         @OA\Schema(type="numeric"),
     *         @OA\Examples(example="int", value="1", summary="Um valor inteiro"),
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="phone",
     *                     type="array",
     *                     @OA\Items(type="string")
     *                 ),  
     *                 example={"phone": "23625325"}
     *             )
     *         )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function update(Request $request, Phone $phone)
    {
        return $this->phoneService->update($request->all(), $phone);
    }

    /**
     * @OA\Delete(
     *     path="/api/phones/{id}",
     *     summary="Apaga um telefone do contato",
     *     tags={"Telefones"},
     *     @OA\Parameter(
     *         description="Id do contato",
     *         in="path",
     *         name="id",
     *         @OA\Schema(type="numeric"),
     *         @OA\Examples(example="int", value="1", summary="Um valor inteiro"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function destroy(Phone $phone)
    {
        return $this->phoneService->delete($phone);
    }
}
