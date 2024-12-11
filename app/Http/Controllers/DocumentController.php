<?php

namespace App\Http\Controllers;

use App\Actions\Documa\DocumentAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DocumentController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Document', [
            'payload' => (new DocumentAction())->getListAllDocument(),
        ]);
    }

    public function getDetailDocumentById(int $id): JsonResponse
    {
        return response()->json(['data' => (new DocumentAction())->getDetailDocumentById($id)]);
    }
}
