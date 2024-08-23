<?php

namespace App\Repositories\Admin;
use App\Models\Company;
use App\Repositories\BaseRepository;

class CompanyRepository  extends BaseRepository
{
    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    public function getCompanyByUUID(string $field,string $uuid = null)
    {
        return $this->model->where($field, $uuid)->firstOrFail();
    }
    public function updateCompanyByUUID(string $field,string $uuid = null,array $data)
    {
        return $this->getCompanyByUUID($field,$uuid)->update($data);
    }
    public function destroyByUUID(string $field,string $uuid)
    {
        return $this->getCompanyByUUID($field,$uuid)->delete();
    }
}
?>
