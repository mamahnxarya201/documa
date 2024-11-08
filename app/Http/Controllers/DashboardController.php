<?php

namespace App\Http\Controllers;

use App\Actions\Documa\DocumentAction;
use App\Actions\Documa\LogAction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard',[
            'payload' => [
                "welcome" => (new DocumentAction())->getAllDocumentGroupByStatus(),
                "feed" => [
                    "activity" => (new LogAction())->getLatestActivity(),
                    "document" => (new LogAction())->getLatestDocument()
                ]
            ]
        ]);
    }
}
