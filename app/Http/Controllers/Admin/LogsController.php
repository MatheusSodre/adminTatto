<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Services\Admin\LogsService;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function __construct(private LogsService $logsService)
    {

    }
    public function index()
    {
        $logs = $this->logsService->paginate([],['level' => 'INFO']);
        return view("admin.pages.logs.index", compact('logs'));
    }
}
