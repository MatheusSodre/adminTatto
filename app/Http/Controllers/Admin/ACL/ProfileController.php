<?php

namespace App\Http\Controllers\Admin\ACL;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUpdateProfile;
use App\Services\Admin\ProfileService;
use http\Client\Response;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(private ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = $this->profileService->all();
        return view("admin.pages.profiles.index", compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param int $id
     * @param StoreUpdateProfile
     */
    public function store(StoreUpdateProfile $request)
    {
        $this->profileService->store($request->all());
        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$profile = $this->profileService->getById($id)){
            return redirect()->back();
        }
        return view('admin.pages.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!$profile = $this->profileService->getById($id)){
            return redirect()->back();
        }
         return view('admin.pages.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProfile $request, string $id)
    {
        $this->profileService->update($request->all(),$id);

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->profileService->destroy($id);
        return redirect()->route('profiles.index');
    }

    public function search(Request $request)
    {

        $filters = $request->only("filter");
        $profiles = $this->profileService->search($request);

        return view("admin.pages.profiles.index", compact('profiles','filters'));
    }
}
