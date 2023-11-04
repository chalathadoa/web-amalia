<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class ManageEvents extends BaseController
{
    protected $eventsModel;

    protected $db;
    protected $dates = ['tanggal_event'];

    public function __construct()
    {
        $this->eventsModel = new \App\Models\EventsModel();
    }

    // MANAGEEVENTS
    public function index()
    {
        $eventsdb = $this->eventsModel->getEvent();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'events' => $eventsdb,
        ];
        return view('admin/manageevents/viewmanageevents.php', $data);
    }

    // CREATE EVENT
    public function add()
    {
        $eventsdb = $this->eventsModel->getEvent();

        session();
        $data = [
            'pageTitle' => 'Create New Event',
            'validation' => \Config\Services::validation(),
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'events' => $eventsdb,
        ];
        return view('admin/manageevents/viewaddevent.php', $data);
    }

    public function store()
    {
        // membuat validasi
        $validationRule = [
            'nama_event' => [
                'rules' => 'required|is_unique[events.nama_event]',
                'errors' => [
                    'is_unique' => '{field} event sudah terdaftar'
                ]
            ],
            'banner_event' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[banner_event]',
                    'is_image[banner_event]',
                    'mime_in[banner_event,image/jpg,image/jpeg,image/png,image/svg]',
                    'max_size[banner_event,1024]',
                ],
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1 MB.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Format gambar tidak diterima.'
                ]
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = [
                'errors' => $this->validator->getErrors(),
            ];

            return view('admin/manageevents/viewmanageevents.php', $data);
        }
        // get image
        $bannerEvent = $this->request->getFile('banner_event');
        $bannerName = $bannerEvent->getRandomName();

        // store the image
        $bannerEvent->move('assets/img/uploaded', $bannerName);

        $slug = url_title($this->request->getVar('nama_event'), '-', true);

        $this->eventsModel->save([
            'nama_event'         => $this->request->getVar('nama_event'),
            'slug' => $slug,
            'tanggal_event'         => $this->request->getVar('tanggal_event'),
            'banner_event'         => $bannerName,
            'deskripsi_event'         => $this->request->getVar('deskripsi_event'),
            'lokasi_event'         => $this->request->getVar('lokasi_event'),
        ]);

        session()->setFlashdata('success', 'Event berhasil dibuat!');
        // session()->setFlashdata('error', 'The action you requested is not allowed!');
        return $this->response->redirect(site_url('manage_events'));
    }
    //CREATE EVENT
    // public function tambah()
    // {
    //     $eventsdb = $this->eventsModel->getEvent();
    //     $data = [
    //         'title' => 'Form Tambah Event',
    //         'menu' => 'manage',
    //         'submenu' => 'manageevents',
    //         'events' => $eventsdb,
    //     ];
    //     return view('admin/manageevents/viewaddevent.php', $data);
    // }
    // public function save()
    // {

    //     $validationRule = [
    //         'nama_event' => [
    //             'rules' => 'required|is_unique[events.nama_event]',
    //             'errors' => [
    //                 'is_unique' => '{field} event sudah terdaftar'
    //             ]
    //         ],
    //         'banner_event' => [
    //             'label' => 'Image File',
    //             'rules' => [
    //                 'uploaded[banner_event]',
    //                 'is_image[banner_event]',
    //                 'mime_in[banner_event,image/jpg,image/jpeg,image/png,image/webp]',
    //                 'max_size[banner_event,1024]',
    //             ],
    //             'errors' => [
    //                 'max_size' => 'Ukuran gambar maksimal 1 MB.',
    //                 'is_image' => 'Yang anda pilih bukan gambar.',
    //                 'mime_in' => 'Format gambar tidak diterima.'
    //             ]
    //         ],
    //     ];

    //     if (!$this->validate($validationRule)) {
    //         $data = [
    //             'errors' => $this->validator->getErrors(),
    //         ];

    //         // return redirect()->to('/manageevents')->withInput();
    //         return view('admin/manageevents/viewmanageevents.php', $data);
    //     }

    //     $img = $this->request->getFile('banner_event');

    //     if (!$img->hasMoved()) {
    //         $filepath = WRITEPATH . 'uploads/' . $img->store();

    //         $data = ['uploaded_fileinfo' => new File($filepath)];
    //         return view('admin/manageevents/viewmanageevents.php', $data);
    //     }

    //     $data = ['errors' => 'The file has been already moved.'];

    //     $slug = url_title($this->request->getVar('nama_event'), '-', true);
    //     $this->eventsModel->save([
    //         'nama_event' => $this->request->getVar('nama_event'),
    //         'slug' => $slug,
    //         'tanggal_event' => $this->request->getVar('tanggal_event'),
    //         'banner_event' => $this->request->getVar('banner_event'),
    //         'deskripsi_event' => $this->request->getVar('deskripsi_event'),
    //         'lokasi_event' => $this->request->getVar('lokasi_event'),
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    //     return redirect()->to('/manageevents')->withInput();
    //     // return view('admin/manageevents/viewaddevent.php', $data);
    // }

    // EDIT EVENT

    // public function edit($id)
    // {
    //     $eventsdb = $this->eventsModel->getEvent();

    //     session();
    //     $data = [
    //         'pageTitle' => 'Update Event',
    //         'validation' => \Config\Services::validation(),
    //         'menu' => 'manage',
    //         'submenu' => 'manageevents',
    //         'events' => $eventsdb,
    //     ];
    //     return view('admin/manageevents/vieweditevent.php', $data);
    // }

    // public function edit($id)
    // {
    //     // ambil artikel yang akan diedit
    //     $datas['events'] = $this->eventsModel->where('id_event', $id)->first();
    //     $data = [
    //         'pageTitle' => 'Update Event',
    //         'validation' => \Config\Services::validation(),
    //         'menu' => 'manage',
    //         'submenu' => 'manageevents',
    //         'event' => $datas,
    //     ];

    //     // lakukan validasi data artikel
    //     $validation =  \Config\Services::validation();
    //     $validation->setRules([
    //         'id_event' => 'required',
    //         'nama_event' => 'required'
    //     ]);
    //     $isDataValid = $validation->withRequest($this->request)->run();
    //     // jika data vlid, maka simpan ke database
    //     if ($isDataValid) {
    //         $this->eventsModel->update($id, [
    //             "nama_event" => $this->request->getPost('nama_event'),
    //             "tanggal_event" => $this->request->getPost('tanggal_event'),
    //             "deskripsi_event" => $this->request->getPost('deskripsi_event')
    //         ]);

    //         return redirect('admin/manageevents/viewmanageevents.php');
    //     }
    //     echo view('admin/manageevents/vieweditevent.php', $data);
    // }

    public function edit($id = null)
    {
        session();
        if ($id != null) {
            $query = $this->eventsModel->getWhere(['id_event' => $id]);
            if ($query->resultID->num_rows > 0) {
                // $db['event'] = $query->getRow();
                $data = [
                    'pageTitle' => 'Create New Event',
                    'validation' => \Config\Services::validation(),
                    'menu' => 'manage',
                    'submenu' => 'manageevents',
                    'events' => $this->eventsModel->getEvent($id),
                ];
                return view('admin/manageevents/vieweditevent.php', $data);
            } else {
                throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \Codeigniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update($id)
    {
        // get old image
        $oldEvent = $this->eventsModel->find($id);
        $oldName = $oldEvent['banner_event'];

        $bannerEvent = $this->request->getFile('banner_event');
        if ($bannerEvent->isValid() && !$bannerEvent->hasMoved()) {
            if (file_exists("assets/img/uploaded/" . $oldName)) {
                unlink('assets/img/uploaded/' . $oldName);
            }
            $newName = $bannerEvent->getRandomName();
            $bannerEvent->move('assets/img/uploaded', $newName);
        } else {
            $newName = $oldName;
        }
        $slug = url_title($this->request->getVar('nama_event'), '-', true);
        $data = [
            'nama_event'         => $this->request->getVar('nama_event'),
            'slug' => $slug,
            'tanggal_event'         => $this->request->getVar('tanggal_event'),
            'banner_event'         => $newName,
            'deskripsi_event'         => $this->request->getVar('deskripsi_event'),
            'lokasi_event'         => $this->request->getVar('lokasi_event'),
        ];

        $this->eventsModel->update($id, $data);
        // $this->eventsModel->getEvent()->where('id_event', $id)->update('events', $data);
        session()->setFlashdata('success', 'Event berhasil dirubah!');
        $validation = \Config\Services::validation()->listErrors();
        return redirect()->to(site_url('manage_events'))->withInput()->with('validation', $validation);

        // return $this->response->redirect(site_url('manage_events'));

        // return redirect()->to('manage_events/edit/' . $this->request->getVar('id_event'))->withInput()->with('validation', $validation);
    }


    // READ EVENT
    public function detail($id)
    {
        helper('date');
        $dataEvent = $this->eventsModel->find($id);
        // $Udate = $date->format('U');
        // $DTdate = new DateTime("@$Udate");
        // $Rdate = $DTdate->format('d-m-Y');
        $tanggal = $dataEvent['tanggal_event'];
        $indoDate = Rdate($tanggal);

        $data = [
            'title' => 'Detail Event',
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'event' => $this->eventsModel->getEvent($id),
            'tanggal' => $indoDate,
        ];

        // jika data tidak ada
        if (empty($data['event'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Event tidak ditemukan.');
        }

        return view('admin/manageevents/viewdetail.php', $data);
    }

    // DELETE EVENT
    public function delete($id)
    {
        $this->eventsModel->delete($id);
        session()->setFlashdata('hapus', 'Event berhasil dihapus!');
        return $this->response->redirect(site_url('manage_events'));

        // return redirect()->to('/manage_events');
    }

    // RECYCLE BIN

    public function trash()
    {
        $eventsdb = $this->eventsModel->getTrashEvent();
        $data = [
            'menu' => 'manage',
            'submenu' => 'manageevents',
            'events' => $eventsdb,
        ];
        return view('admin/manageevents/viewtrashevent.php', $data);
    }
    // RESTORE FROM TRASH
    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('events')
                ->set('deleted_at', null, true)
                ->where(['id_event' => $id])
                ->update();
        } else {
            $this->db->table('events')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
        }
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('manage_events'))->with('success', 'Data berhasil direstore');
        }
    }

    // DELETED PERMANENTLY
    public function delete2($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->eventsModel->delete($id, true);
            return redirect()->to(site_url('manage_events/trash'))->with('success', 'Data berhasil dihapus permanen');
        } else {
            // $this->db->table('events')
            //     ->where('deleted_at is NOT NULL')
            //     ->delete(true);
            $this->eventsModel->purgeDeleted();
            return redirect()->to(site_url('manage_events/trash'))->with('success', 'Data Trash berhasil dihapus permanen');
        }
    }
}
