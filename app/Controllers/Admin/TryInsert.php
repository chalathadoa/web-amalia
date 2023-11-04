<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use CodeIgniter\Files\File;

class TryInsert extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('viewtryinsert.php', ['errors' => []]);
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[userfile,1024]',
                ],
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = [
                'errors' => $this->validator->getErrors(),
            ];

            return view('viewtryinsert.php', $data);
        }

        $img = $this->request->getFile('userfile');

        if (!$img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];
            return view('viewtrysuccess.php', $data);
        }

        $data = ['errors' => 'The file has been already moved.'];

        return view('viewtryinsert.php', $data);
    }
}
