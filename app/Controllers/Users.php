<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Exceptions\PageNotFoundException;
use RuntimeException;
use Throwable;

class Users extends BaseController
{
    public function index(): string
    {
        $users = (new UserModel())->findAll();

        return view('users', ['users' => $users]);
    }

    public function new(): string
    {
        return view('user_form', [
            'title'  => 'New User',
            'action' => site_url('users/new'),
            'user'   => [],
            'values' => [],
            'errors' => [],
            'isEdit' => false,
        ]);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return view('user_form', [
                'title'  => 'New User',
                'action' => site_url('users/new'),
                'user'   => [],
                'values' => $this->request->getPost(),
                'errors' => $this->validator->getErrors(),
                'isEdit' => false,
            ]);
        }

        (new UserModel())->insert([
            'username'   => trim($this->request->getPost('username')),
            'full_name'  => trim($this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'))->with('success', 'User created.');
    }

    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('user_form', [
            'title'  => 'Edit User',
            'action' => site_url("users/{$id}/edit"),
            'user'   => $user,
            'values' => [],
            'errors' => [],
            'isEdit' => true,
        ]);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'username'  => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|max_length[100]',
        ];
        $avatar = $this->request->getFile('avatar');
        $hasAvatarUpload = $avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE;

        if ($hasAvatarUpload) {
            $rules['avatar'] = 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]|ext_in[avatar,jpg,jpeg,png]|max_size[avatar,2048]';
        }

        if (! $this->validate($rules)) {
            return view('user_form', [
                'title'  => 'Edit User',
                'action' => site_url("users/{$id}/edit"),
                'user'   => $user,
                'values' => $this->request->getPost(),
                'errors' => $this->validator->getErrors(),
                'isEdit' => true,
            ]);
        }

        $data = [
            'username'  => trim($this->request->getPost('username')),
            'full_name' => trim($this->request->getPost('full_name')),
        ];
        $newAvatar = null;

        if ($hasAvatarUpload) {
            try {
                $newAvatar = $this->storeAvatar($avatar);
            } catch (Throwable) {
                return view('user_form', [
                    'title'  => 'Edit User',
                    'action' => site_url("users/{$id}/edit"),
                    'user'   => $user,
                    'values' => $this->request->getPost(),
                    'errors' => ['avatar' => 'The profile image could not be prepared.'],
                    'isEdit' => true,
                ]);
            }

            $data['avatar'] = $newAvatar;
        }

        try {
            $model->update($id, $data);
        } catch (Throwable $exception) {
            if ($newAvatar !== null) {
                $this->deleteAvatar($newAvatar);
            }

            throw $exception;
        }

        if ($newAvatar !== null && ! empty($user['avatar'])) {
            $this->deleteAvatar($user['avatar']);
        }

        return redirect()->to(site_url('users'))->with('success', 'User updated.');
    }

    private function storeAvatar(UploadedFile $upload): string
    {
        $extension = $upload->getMimeType() === 'image/png' ? 'png' : 'jpg';
        $filename = bin2hex(random_bytes(16)) . '.' . $extension;
        $directory = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars';
        $destination = $directory . DIRECTORY_SEPARATOR . $filename;

        if (! is_dir($directory) && ! mkdir($directory, 0755, true) && ! is_dir($directory)) {
            throw new RuntimeException('Could not create avatar directory.');
        }

        $prepared = false;

        if (extension_loaded('gd')) {
            try {
                service('image')
                    ->withFile($upload->getTempName())
                    ->fit(320, 320, 'center')
                    ->save($destination);
                $prepared = true;
            } catch (Throwable) {
                $prepared = false;
            }
        }

        if (! $prepared && ! copy($upload->getTempName(), $destination)) {
            throw new RuntimeException('Could not store avatar image.');
        }

        return $filename;
    }

    private function deleteAvatar(string $filename): void
    {
        if (basename($filename) !== $filename) {
            return;
        }

        $path = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . $filename;

        if (is_file($path)) {
            unlink($path);
        }
    }
}