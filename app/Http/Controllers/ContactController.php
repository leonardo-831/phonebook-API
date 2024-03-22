<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(
        protected ContactService $contactService,
    ) {
    }

    /**
     * @OA\Get(
     *     path="/api/contacts",
     *     summary="Lista todos os contatos da agenda",
     *     tags={"Contatos"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return $this->contactService->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/contacts",
     *     summary="Salva um contato na agenda",
     *     tags={"Contatos"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="cpf",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="birthDate",
     *                     type="date"
     *                 ),          
     *                 @OA\Property(
     *                     property="phone",
     *                     type="array",
     *                     @OA\Items(type="string")
     *                 ),  
     *                 example={"name": "Leonardo", "email": "leonardo@gmail.com", "cpf": "18157634209", "birthDate": "2004-04-15", "phones": {{"phone": "12345678"}, {"phone": "24566787"}}}
     *             )
     *         )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function store(Request $request)
    {
        return $this->contactService->store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * @OA\Put(
     *     path="/api/contacts/{id}",
     *     summary="Salva um contato na agenda",
     *     tags={"Contatos"},
     *     @OA\Parameter(
     *         description="id do contato",
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
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="cpf",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="birthDate",
     *                     type="date"
     *                 ),
     *                 example={"name": "Leonardo", "email": "leonardo@gmail.com", "cpf": "18157634209", "birthDate": "2004-04-15" }
     *             )
     *         )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function update(Request $request, Contact $contact)
    {
        return $this->contactService->update($request->all(), $contact);
    }

    /**
     * @OA\Delete(
     *     path="/api/contacts/{id}",
     *     summary="Apaga um contatos da agenda",
     *     tags={"Contatos"},
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
    public function destroy(Contact $contact)
    {
        return $this->contactService->delete($contact);
    }

    public function report()
    {
        dd('oi');
        return $this->contactService->contactReport();
    }
}
