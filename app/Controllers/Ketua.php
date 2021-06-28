<?php

namespace App\Controllers;

use App\Models\ModelDsn;
use App\Models\ModelTa;
use App\Models\ModelKetua;
use CodeIgniter\Model;

class Ketua extends BaseController
{

    public function __construct()
    {
        $this->ModelDsn = new ModelDsn();
        $this->ModelTa = new ModelTa();
        $this->model = new Model;
        $this->ModelMahasiswa = new ModelKetua();
        helper('form');
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data = [
            'title' => 'Rombongan Kelas',

            'isi'    => 'v_dashboard_ketua'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function absenKelas()
    {

        $id_kelasKetua =  $this->model->db->table('ketua_kelas')
            ->where('nim', $this->session->get('username'))
            ->get()->getResultObject();


        $data = [
            'title' => 'absensi Kelas',
            'isi'    => 'ketua/v_jadwal',

        ];
        $data['pertemuan'] = $this->model->db->table('tbl_pertemuan')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_pertemuan.id_jadwal')
            ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_jadwal.id_matkul')
            ->where('tbl_pertemuan.id_ketua', $id_kelasKetua[0]->id_ketua)
            ->where('tbl_pertemuan.ttd_dosen != ', "")
            ->get()->getResultArray();
        return view('layout/v_wrapper', $data);
    }

    public function absensi($id_jadwal)
    {

        $data = [
            'title' => 'Rombongan Kelas',
            'isi'    => 'ketua/v_absensi',
            'jadwal' => $this->ModelDsn->DetailJadwal($id_jadwal),
        ];
        $data['mhs'] = $this->model->db->table('tbl_krs')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_krs.id_mhs', 'left')
            ->where('id_jadwal', $id_jadwal)
            ->get()->getResultArray();
        return view('layout/v_wrapper', $data);
    }

    public function SimpanAbsen($id_jadwal)
    {
        $mhs   = $this->ModelDsn->mhs($id_jadwal);

        foreach ($mhs as $key => $value) {
            $data = [
                'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
                'p1' => $this->request->getPost($value['id_krs'] . 'p1'),
                'p2' => $this->request->getPost($value['id_krs'] . 'p2'),
                'p3' => $this->request->getPost($value['id_krs'] . 'p3'),
                'p4' => $this->request->getPost($value['id_krs'] . 'p4'),
                'p5' => $this->request->getPost($value['id_krs'] . 'p5'),
                'p6' => $this->request->getPost($value['id_krs'] . 'p6'),
                'p7' => $this->request->getPost($value['id_krs'] . 'p7'),
                'p8' => $this->request->getPost($value['id_krs'] . 'p8'),
                'p9' => $this->request->getPost($value['id_krs'] . 'p9'),
                'p10' => $this->request->getPost($value['id_krs'] . 'p10'),
                'p11' => $this->request->getPost($value['id_krs'] . 'p11'),
                'p12' => $this->request->getPost($value['id_krs'] . 'p12'),
                'p13' => $this->request->getPost($value['id_krs'] . 'p13'),
                'p14' => $this->request->getPost($value['id_krs'] . 'p14'),
                'p15' => $this->request->getPost($value['id_krs'] . 'p15'),
                'p16' => $this->request->getPost($value['id_krs'] . 'p16'),
            ];
            $this->ModelDsn->SimpanAbsen($data);
        }

        //upload gambar + insert data p1
        $krs = $this->model->db->table('tbl_krs')
            ->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_krs.id_mhs')
            ->where('tbl_krs.id_jadwal', $id_jadwal)->get()->getResultObject();;
        foreach ($krs as $kr) {
            $ketua = $this->model->db->table('ketua_kelas')
                ->where('nim', $kr->nim)->get()->getResultObject();
        }



        // $ketua = $this->model->db->table('ketua_kelas')->
        $table = $this->model->db->table('tbl_pertemuan');
        // $coba = $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p2')->get()->getResultObject();
        // var_dump($coba);
        // die;
        if ($_FILES['ttd_p1']['name'] != "") {
            $file = $this->request->getFile('ttd_p1');
            $name = $file->getRandomName();

            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p1')
                ->update([
                    'pertemuan' => 'p1',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p2']['name'] != "") {
            $file = $this->request->getFile('ttd_p2');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p2')
                ->update([
                    'pertemuan' => 'p2',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p3']['name'] != "") {
            $file = $this->request->getFile('ttd_p3');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p3')->update([
                'pertemuan' => 'p3',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_mahasiswa' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p4']['name'] != "") {
            $file = $this->request->getFile('ttd_p4');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p4')
                ->update([
                    'pertemuan' => 'p4',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p5']['name'] != "") {
            $file = $this->request->getFile('ttd_p5');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p5')
                ->update([
                    'pertemuan' => 'p5',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p6']['name'] != "") {
            $file = $this->request->getFile('ttd_p6');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p6')
                ->update([
                    'pertemuan' => 'p6',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p7']['name'] != "") {
            $file = $this->request->getFile('ttd_p7');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p7')
                ->update([
                    'pertemuan' => 'p7',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p8']['name'] != "") {
            $file = $this->request->getFile('ttd_p7');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p8')
                ->update([
                    'pertemuan' => 'p8',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p9']['name'] != "") {
            $file = $this->request->getFile('ttd_p7');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p9')
                ->update([
                    'pertemuan' => 'p9',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p10']['name'] != "") {
            $file = $this->request->getFile('ttd_p8');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p10')
                ->update([
                    'pertemuan' => 'p10',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p11']['name'] != "") {
            $file = $this->request->getFile('ttd_p8');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p11')
                ->update([
                    'pertemuan' => 'p11',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p12']['name'] != "") {
            $file = $this->request->getFile('ttd_p9');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p12')
                ->update([
                    'pertemuan' => 'p12',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p13']['name'] != "") {
            $file = $this->request->getFile('ttd_p10');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p13')
                ->update([
                    'pertemuan' => 'p13',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p14']['name'] != "") {
            $file = $this->request->getFile('ttd_p11');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p14')
                ->update([
                    'pertemuan' => 'p14',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p15']['name'] != "") {
            $file = $this->request->getFile('ttd_p12');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p15')
                ->update([
                    'pertemuan' => 'p15',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }
        if ($_FILES['ttd_p16']['name'] != "") {
            $file = $this->request->getFile('ttd_p13');
            $name = $file->getRandomName();
            $table->where('id_jadwal', $id_jadwal)->where('pertemuan', 'p6')
                ->update([
                    'pertemuan' => 'p16',
                    'id_jadwal' => $this->request->getPost('id_jadwal'),
                    'ttd_mahasiswa' => $name,
                    'id_ketua' => $ketua[0]->id_ketua
                ]);
            $file->move('upload/ttd/', $name);
        }

        session()->setFlashdata('pesan', 'Absensi Berhasil Di Update !!');
        return redirect()->to(base_url('dsn/absensi/' . $id_jadwal));
    }
}
