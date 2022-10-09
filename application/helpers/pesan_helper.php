<?php defined('BASEPATH') or exit('No direct script access allowed');

function save_success()
{
	$pesan = array(
		'warning' => 'Berhasil!',
		'kode' => 'success',
		'pesan' => 'Data berhasil di simpan'
	);
	return json_encode($pesan);
}

function update_success()
{
	$pesan = array(
		'warning' => 'Berhasil!',
		'kode' => 'success',
		'pesan' => 'Data berhasil di perbarui'
	);
	return json_encode($pesan);
}

function delete_success()
{
	$pesan = array(
		'warning' => 'Berhasil!',
		'kode' => 'success',
		'pesan' => 'Data berhasil di hapus!'
	);
	return json_encode($pesan);
}

function import_success()
{
	$pesan = array(
		'warning' => 'Berhasil!',
		'kode' => 'success',
		'pesan' => 'Data berhasil di import'
	);
	return json_encode($pesan);
}

function save_failed()
{
	$pesan = array(
		'warning' => 'Gagal!',
		'kode' => 'error',
		'pesan' => 'Data tdak berhasil di simpan'
	);
	return json_encode($pesan);
}

function double_input()
{
	$pesan = array(
		'warning' => 'Gagal!',
		'kode' => 'error',
		'pesan' => 'Data sudah terinput'
	);
	return json_encode($pesan);
}

function import_failed()
{
	$pesan = array(
		'warning' => 'Gagal!',
		'kode' => 'error',
		'pesan' => 'Data gagal di import'
	);
	return json_encode($pesan);
}

function activate_failed()
{
	$pesan = array(
		'warning' => 'Gagal!',
		'kode' => 'error',
		'pesan' => 'Data gagal di aktifkan, data aktif tidak boleh ganda'
	);
	return json_encode($pesan);
}
