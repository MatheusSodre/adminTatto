<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Logger\Uteis;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\StoreUpdateUsers;
use App\Http\Resources\Admin\UserResouce;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware(['can:users']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = $this->userService->paginate(['profiles'],['status' => "1"]);
        return view("admin.pages.users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreUpdateUsers
     */
    public function store(StoreUpdateUsers $request)
    {
        $this->userService->store($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$user = $this->userService->getById($id)) {
            return redirect()->back();
        }
        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$user = $this->userService->getById($id)) {
            return redirect()->back();
        }
         return view('admin.pages.users.edit', compact('user'));
    }

     /**
     * Store a newly created resource in storage.
     * @param int $id
     * @param StoreUpdateUsers
     */
    public function update(StoreUpdateUsers $request, string $id)
    {
        if (!$user = $this->userService->getById($id)) {
            return redirect()->back();
        }

        $this->userService->update($request,$id);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$user = $this->userService->getById($id)) {
            return redirect()->back();
        }
        $this->userService->destroy($id);
        return redirect()->route('users.index');
    }

    public function search(Request $request)
    {

        $filters = $request->only("filter");
        $users = $this->userService->search($request);

        return view("admin.pages.users.index", compact('users','filters'));
    }

    public function userStatus(Request $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->route('users.index');
    }
}
