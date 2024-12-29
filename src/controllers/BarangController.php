<?php
use MyApp\Core\BaseController;
use MyApp\Core\Message;

class BarangController extends BaseController {

  private $barangModel;
  public function __construct() {
    $this->barangModel = $this->model('BarangModel');
  }

  public function index() {
    $data = [
      'title' => 'Barang',
      'AllBarang' => $this->barangModel->getAll()
    ];
    $this->view('template/header', $data);
    $this->view('barang/index', $data);
    $this->view('template/footer');
  }
  
  public function insert() {
    $data = [
      'title' => 'Barang'
    ];
    $this->view('template/header', $data);
    $this->view('barang/insert');
    $this->view('template/footer');
  }

  public function insert_barang() {
    $fields = [
      'nama_barang' => 'string | required | alphanumeric', // | between:3, 25
      'jumlah' => 'int | required',
      'harga_satuan' => 'float | required',
      'kadaluarsa' => 'string'
    ];
    $message = [
      'nama_barang' => [
        'required' => 'Nama barang harus diisi',
        'alphanumeric' => 'Nama barang hanya boleh huruf dan angka',
        'between' => 'Nama barang harus diantara 3 - 25 karakter'
      ],
      'jumlah' => [
        'required' => 'Jumlah barang harus diisi'
      ],
      'harga_satuan' => [
        'required' => 'Harga satuan barang harus diisi',
      ]
    ];
    [$inputs, $errors] = $this->filter($_POST, $fields, $message);

    if($inputs['kadaluarsa'] == "") {
      $inputs['kadaluarsa'] == "0000-00-00";
    }

    if ($errors) {
      Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
      $this->redirect('barang/insert');
    }

    $proc = $this->barangModel->insert($inputs);
    if($proc) {
      Message::setFlash('success', 'Berhasil !', 'Barang berhasil ditambahkan');
      $this->redirect('barang');
    }
  }

  public function edit($id) { //tambahkan parameter $id = null agar tidak ada id di url
    // if (!$id) {
    //   Message::setFlash('error', 'Gagal !', 'Id Barang tidak ditemukan');
    //   $this->redirect('barang');
    // }

    $data = [
      'title' => 'Barang',
      'barang' => $this->barangModel->getById($id)
    ];
    $this->view('template/header', $data);
    $this->view('barang/edit', $data);
    $this->view('template/footer');
  }

  public function edit_barang() {
    $fields = [
      'nama_barang' => 'string | required | alphanumeric', // | between:3, 25
      'jumlah' => 'int | required',
      'harga_satuan' => 'float | required',
      'kadaluarsa' => 'string',
      'mode' => 'string',
      'id' => 'int',
    ];
    $message = [
      'nama_barang' => [
        'required' => 'Nama barang harus diisi',
        'alphanumeric' => 'Nama barang hanya boleh huruf dan angka',
        'between' => 'Nama barang harus diantara 3 - 25 karakter'
      ],
      'jumlah' => [
        'required' => 'Jumlah barang harus diisi'
      ],
      'harga_satuan' => [
        'required' => 'Harga satuan barang harus diisi',
      ]
    ];
    [$inputs, $errors] = $this->filter($_POST, $fields, $message);

    if($inputs['kadaluarsa'] == "") {
      $inputs['kadaluarsa'] == "0000-00-00";
    }

    if ($errors) {
      Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
      $this->redirect('barang/edit/'.$inputs['id']);
    }

    if($inputs['mode'] == "update") {
      $proc = $this->barangModel->update($inputs);
      if($proc) {
        Message::setFlash('success', 'Berhasil !', 'Barang berhasil diupdate');
        $this->redirect('barang');
      }
    } else {
      $proc = $this->barangModel->delete($inputs['id']);
      if($proc) {
        Message::setFlash('success', 'Berhasil !', 'Barang berhasil dihapus');
        $this->redirect('barang');
      }
    }
  }
}