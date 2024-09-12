<?php

namespace App\Services\Admin;

use App\Repositories\Admin\FilesRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FilesService
{
    /**
     * Create a new service instance.
     *
     * @param  FilesRepository $filesRepository
     * @return void
     */
    public function __construct(private FilesRepository $filesRepository)
    {

    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['data_arquivo'] = $this->getDateArquivo($data['data_arquivo']);
        if ($request->file('files')) {
            foreach ($request->file('files') as $file) {
                $data['name'] = !empty($data['name']) ? $this->storeAs($file, 'files', $data['name']) : $file->getClientOriginalName();
                $filePath = $file->store('files', 'public'); // Armazena na pasta `storage/app/public/files`
                $data['path'] = $filePath;
                $this->filesRepository->create($data);
                Log::channel('mysql')->info('Arquivo Criado',['user_id' => Auth::id(),'user_name' => Auth::user()->name,'destino' => $data['name']]);
            }
        }
        return true;
    }

    public function getDateArquivo($date):String
    {
        return str_replace('/', '-', $date);
    }

    public function storeAs(UploadedFile $file,string $path,string $customName): string
    {
        return $file->storeAs($path,$customName);
    }

    public function removeFile($file): bool
    {
        if (Storage::exists($file->path)) {
            $this->destroy($file->id);
            return Storage::delete($file->path);
        }
        return false;
    }

    public function download($file)
    {
        // Verifica se o arquivo existe
        if (!Storage::exists($file->path)) {
            abort(404, 'Arquivo não encontrado');
        }
        Log::channel('mysql')->info('Arquivo Baixado',['user_id' => Auth::id(),'user_name' => Auth::user()->name,'destino' => $file->name]);
        // Retorna o arquivo para download
        return Storage::disk('public')->download($file->path,$file->name);
    }

    public function paginate(array $relations = [],array $condition = [], array $columns = ['*'], int $limit = 10)
    {
        return $this->filesRepository->paginate($relations, $condition, $columns ,$limit);
    }

    public function get($condition = [],$relations = [],$taskOne)
    {
        return $this->filesRepository->get($condition,$relations,$taskOne);
    }

    public function update($request,$id):bool|null
    {
        Log::channel('mysql')->info('Arquivo Editado',['user_id' => Auth::id(),'user_name' => Auth::user()->name]);
        return $this->filesRepository->update($request,$id);
    }

    public function destroy($id):bool|null
    {
        if (!$file = $this->filesRepository->find($id)) {
            return redirect()->back();
        }
        Log::channel('mysql')->info('Arquivo Deletado',['user_id' => Auth::id(),'user_name' => Auth::user()->name,'destino' => $file->name]);
        return $this->filesRepository->delete($id);
    }

    public function search($resquet)
    {
        return $this->filesRepository->search($resquet);
    }

    public function find($id)
    {
        return $this->filesRepository->find($id);
    }
}
