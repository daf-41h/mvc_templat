<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="<?= BASEURL.'/asset/css/style.css?v=<?php echo time(); ?>' ?>">
</head>
<body>
  <div class="row-home">
    <div class="left">
      <h2>System Gudang</h2>
      <div>
        <input type="text" id="mySearch" placeholder="Search ...">
      </div>
      <ul id="myMenu">
        <li>
          <a href="<?= BASEURL ?>"><i class="fa-solid fa-house"></i> Home</a>
        </li>
        <li>
          <a href="<?= BASEURL.'/barang' ?>"><i class="fa-solid fa-list"></i> Barang</a>
        </li>
        <li>
          <a href="<?= BASEURL.'/kategori' ?>"><i class="fa-solid fa-object-group"></i> Kategori</a>
        </li>
      </ul>
    </div>
    <div class="right">