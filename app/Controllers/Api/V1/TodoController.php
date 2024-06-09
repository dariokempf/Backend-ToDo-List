<?php

namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;

class TodoController extends ResourceController
{

    protected $modelName = 'App\Models\Todo';
    protected $format = 'json';

    public function index()
{
    // Zusatzparameter aus der URL abrufen
    $limit = $this->request->getVar('limit') ?? 10;                 //zum abfragen(mit seitenzahlen)    {{local}}/TodoController?limit=2&page=1
    $page = $this->request->getVar('page') ?? 1;                    //zum abfragen (hochählen)          {{local}}/TodoController?order_by_id
    $orderBy = $this->request->getVar('order_by') ?? 'id';          //zum abfragen (runterzählen)       {{local}}/TodoController?order_by=id&order_direction=desc
    $tag = $this->request->getVar('tag'); // Neuer Parameter für den Tag

    // Query Builder instanziieren
    $query = $this->model->orderBy($orderBy);

    // Filterung nach Tag, falls vorhanden
    if (!empty($tag)) {
        $query->where('tag', $tag);
    }

    // Daten mit Pagination abrufen
    $all_data = $query->paginate($limit, 'default', $page);

    if (!empty($all_data)) {
        return $this->respond($all_data);
    }

    return $this->failNotFound();
}

    
    

public function show($id = null)
{
    if (!empty($id)) {
        $data = $this->model->find($id);
        if (!empty($data)) {
            return $this->respond($data);
        }
    }
    return $this->failNotFound();
}

    public function create()
    {

        $data = $this->request->getJSON(true);

        if (!empty($data)) {

            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            $new_id = $this->model->insert($data);

            if ($new_id === false) {
                return $this->failValidationErrors($this->model->errors());
            } else {
                return $this->respondCreated(['id' => $new_id] + $data);
            }
        }


        // Fehler zurückgeben, wenn das Einfügen fehlgeschlagen ist oder keine Daten übergeben wurden
        return $this->failNotFound();
    }

    public function update($id = null)
{
    if (empty($id)) {
        return $this->failValidationError('Missing ID');
    }

    $data = $this->request->getJSON(true);

    if (!empty($data)) {
        $data['updated_at'] = date('Y-m-d H:i:s');

        $success = $this->model->update($id, $data);

        if (!$success) {
            return $this->failValidationErrors($this->model->errors());
        } else {
            $updatedData = $this->model->find($id);
            return $this->respondUpdated($updatedData);
        }
    }

    return $this->failNotFound();
}

public function delete($id = null)
    {

        if (!empty($id)) {
            $data_exists = $this->model->find($id);


            if (!empty($data_exists)) {

                $delete_status = $this->model->delete($id);

                if ($delete_status === true) {
                    return $this->respondDeleted(['id' => $id]);

                }

            } else {
                return $this->failNotFound();
            }

        }
    }



}




?>