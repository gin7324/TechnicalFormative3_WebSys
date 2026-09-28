<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = (new CustomerModel())->findAll();

        return view('customers', ['customers' => $customers]);
    }

    public function new(): string
    {
        return view('customer_form', [
            'title'    => 'New Customer',
            'action'   => site_url('customers/new'),
            'customer' => [],
            'values'   => [],
            'errors'   => [],
            'isEdit'   => false,
        ]);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return view('customer_form', [
                'title'    => 'New Customer',
                'action'   => site_url('customers/new'),
                'customer' => [],
                'values'   => $this->request->getPost(),
                'errors'   => $this->validator->getErrors(),
                'isEdit'   => false,
            ]);
        }

        (new CustomerModel())->insert([
            'full_name'  => trim($this->request->getPost('full_name')),
            'email'      => trim($this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')) ?: null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'))->with('success', 'Customer created.');
    }

    public function edit(int $id): string
    {
        $customer = (new CustomerModel())->find($id);

        if ($customer === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('customer_form', [
            'title'    => 'Edit Customer',
            'action'   => site_url("customers/{$id}/edit"),
            'customer' => $customer,
            'values'   => [],
            'errors'   => [],
            'isEdit'   => true,
        ]);
    }

    public function update(int $id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return view('customer_form', [
                'title'    => 'Edit Customer',
                'action'   => site_url("customers/{$id}/edit"),
                'customer' => $customer,
                'values'   => $this->request->getPost(),
                'errors'   => $this->validator->getErrors(),
                'isEdit'   => true,
            ]);
        }

        $model->update($id, [
            'full_name' => trim($this->request->getPost('full_name')),
            'email'     => trim($this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')) ?: null,
        ]);

        return redirect()->to(site_url('customers'))->with('success', 'Customer updated.');
    }
}