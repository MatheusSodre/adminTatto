<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUpdateFiles;
use App\Models\Files\TypeFiles;
use App\Services\Admin\FilesService;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class FilesController extends Controller
{
    private $filesService, $userService, $typeFiles;

    public function __construct(
        FilesService $filesService,
        UserService $userService,
        TypeFiles $typeFiles
    ) {
        $this->filesService = $filesService;
        $this->userService = $userService;
        $this->typeFiles = $typeFiles;
        $this->middleware(['can:arquivos']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        if (Gate::allows('ver-todos-arquivos')) {
            $files = $this->filesService->paginate(['user.profiles','type']);
        } elseif (Gate::allows('ver-arquivos', $userId)) {
            $files = $this->filesService->paginate(['user.profiles','type'], ['user_id' => $userId]);
        } else {
            abort(403);
        }
        return view("admin.pages.files.index", compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $documentos = $this->typeFiles->All();
        $clientes = $this->userService->all();
        return view('admin.pages.files.create', compact('documentos', 'clientes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$file = $this->filesService->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.files.show', compact('file'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreUpdateFiles
     */
    public function store(StoreUpdateFiles $request)
    {
        $this->filesService->store($request);
        return redirect()->route('files.index');
    }

    /**
     * attach a newly created resource in storage.
     * @param $idCliente
     */
    public function attachFileClient(Request $request, $idCliente)
    {
        $documentos = $this->typeFiles->All();
        if (!$clientes = $this->userService->findOrFail($idCliente)) {
            return redirect()->back();
        }
        return view('admin.pages.files.create', compact('documentos', 'clientes'));
    }

    /**
     * download a file pdf ,jpg, png.
     * @param $idCliente
     */
    public function download($idFile)
    {
        if (!$file = $this->filesService->find($idFile)) {
            return redirect()->back();
        }
        return $this->filesService->download($file);
    }

    /**
     * remove a file pdf ,jpg, png.
     * @param $idCliente
     */
    public function destroy($id)
    {
        if (!$file = $this->filesService->find($id)) {
            return redirect()->back();
        }
        $this->filesService->removeFile($file);
        return redirect()->route('files.index');
    }

    /**
     * download a file pdf ,jpg, png.
     * @param $idCliente
     */
    public function getFileUser($idUser)
    {
        if (!$files = $this->filesService->get(["user_id" => $idUser],['user','type'],false)) {
            return redirect()->back();
        }
        return view('admin.pages.files.showfileuser', compact('files','idUser'));
    }
    public function search(Request $request)
    {

        $filters = $request->only("filter");
        $files = $this->filesService->search($request);
        return view("admin.pages.files.index", compact('files','filters'));
    }
}
