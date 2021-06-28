<?php

namespace App\Controllers;

use App\Models\ModelDsn;
use App\Models\ModelTa;
use CodeIgniter\Model;

class Dsn extends BaseController
{

    public function __construct()
    {
        $this->ModelDsn = new ModelDsn();
        $this->ModelTa = new ModelTa();
        $this->model = new Model;
        helper('form');
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title' => 'Dosen',
            'dosen' => $this->ModelDsn->DataDosen(),
            'ta' => $this->ModelTa->ta_aktif(),
            'isi'    => 'v_dashboard_dsn'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function jadwal()
    {
        $ta = $this->ModelTa->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Jadwal Mengajar',
            'ta'    => $ta,
            'jadwal' => $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_ta']),
            'isi'    => 'dosen/v_jadwal'
        ];
        return view('layout/v_wrapper', $data);
    }


    public function AbsenKelas()
    {
        $ta = $this->ModelTa->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Absen Kelas',
            'ta'    => $ta,
            'absen' => $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_ta']),
            'isi'    => 'dosen/absenkelas/v_absenkelas'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function tambahJurnalDosen($id_jadwal)
    {

        $dosen = $this->model->db->table('tbl_dosen')->where('nidn', $this->session->get('username'))->get()->getResultObject();

        $data = [
            'title' => 'tambah jurnal Dosen',
            'isi'    => 'dosen/absenkelas/v_tambahJurnalDosen',
            'getDosen' => $this->model->db->table('tbl_dosen')->where('nidn', $this->session->get('username'))->get()->getResultObject(),
            'matkul' =>  $this->model->db->table('tbl_jadwal')
                ->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_jadwal.id_matkul', 'left')
                ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
                ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
                ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
                ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
                ->where('tbl_jadwal.id_dosen', $dosen[0]->id_dosen)
                ->get()->getResultObject(),
            'mhs' => $this->ModelDsn->mhs($id_jadwal),
            'id_jadwal' => $id_jadwal
        ];
        return view('layout/v_wrapper', $data);
    }
    public function actTambahJurnalDosen()
    {
        if ($this->validate([
            'pertemuan' => [
                'label' => 'Pertemuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di isi !!!'
                ]
            ],
            'nama_dosen' => [
                'label' => 'Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib di isi !!!',
                ]
            ],
            'matkul' => [
                'label' => 'matkul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib di isi !!!',
                ]
            ],
            'kelas' => [
                'label' => 'kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'semester' => [
                'label' => 'semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],

            'hari' => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'tanggal' => [
                'label' => 'tanggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'awal_waktu' => [
                'label' => 'Waktu Awal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'akhir_waktu' => [
                'label' => 'Waktu berakhir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'uraian_materi' => [
                'label' => 'Uraian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib di isi !!!'
                ]
            ],
            'jmlh_mhs' => [
                'label' => 'Jumlah Mahasiswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib di isi !!!'
                ]
            ],
            'jmlh_mhs_hadir' => [
                'label' => 'Jumlah Mahasiswa Hadir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib di isi !!!'
                ]
            ],
            'jmlh_mhs_tidak_hadir' => [
                'label' => 'Jumlah Mahasiswa tidak hadir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib di isi !!!'
                ]
            ],
            'ctt_dosen' => [
                'label' => 'Catatan Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib di isi !!!'
                ]
            ],
            'tgl_ctt_dosen' => [
                'label' => 'tanggal catatan dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib di isi !!!'
                ]
            ]
        ])) {
            $file = $this->request->getFile('ttd_dosen');
            if ($_FILES['ttd_dosen']['name'] != "") {
                $name = $file->getRandomName();
                $file->move('upload/ttd/', $name);
                $data = [

                    'pertemuan' => $this->request->getPost('pertemuan'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'matkul' => $this->request->getPost('matkul'),
                    'kelas' => $this->request->getPost('kelas'),
                    'semester' => $this->request->getPost('semester'),
                    'hari' => $this->request->getPost('hari'),
                    'tanggal' => $this->request->getPost('tanggal'),
                    'awal_waktu' => $this->request->getPost('awal_waktu'),
                    'akhir_waktu' => $this->request->getPost('akhir_waktu'),
                    'uraian' => $this->request->getPost('uraian_materi'),
                    'jmlh_mahasiswa' => $this->request->getPost('jmlh_mhs'),
                    'jmlh_mahasiswa_hadir' => $this->request->getPost('jmlh_mhs_hadir'),
                    'jmlh_mahasiswa_tidak_hadir' => $this->request->getPost('jmlh_mhs_tidak_hadir'),
                    'ctt_dosen' => $this->request->getPost('ctt_dosen'),
                    'tgl_ctt_dosen' => $this->request->getPost('tgl_ctt_dosen'),
                    'ttd_dosen' => $name,
                ];
                $this->model->db->table('jurnal_dosen')->insert($data);

                session()->setFlashdata('pesan', 'Berhasil memasukan jurnal');
                return redirect()->to(base_url('dsn/AbsenKelas/'));
            }
            session()->setFlashdata('pesan', 'Gagal Memasukan jurnal');
            return redirect()->to(base_url('dsn/AbsenKelas/'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dsn/tambahJurnalDosen/' . $this->request->getPost('id_jadwal')));
        }
    }
    public function absensi($id_jadwal)
    {
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Absensi',
            'ta'    => $ta,
            'jadwal' => $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs'   => $this->ModelDsn->mhs($id_jadwal),
            'isi'    => 'dosen/absenkelas/v_absensi',

        ];
        $data['pertemuan'] = $this->model->db->table('tbl_pertemuan')->where('id_jadwal', $id_jadwal);
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
        if ($_FILES['ttd_p1']['name'] != "") {
            $file = $this->request->getFile('ttd_p1');
            $name = $file->getRandomName();

            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p1',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p2']['name'] != "") {
            $file = $this->request->getFile('ttd_p2');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p2',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $file->getRandomName());
        } else if ($_FILES['ttd_p3']['name'] != "") {
            $file = $this->request->getFile('ttd_p3');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p3',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p4']['name'] != "") {
            $file = $this->request->getFile('ttd_p4');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p4',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p5']['name'] != "") {
            $file = $this->request->getFile('ttd_p5');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p5',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p6']['name'] != "") {
            $file = $this->request->getFile('ttd_p6');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p6',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p7']['name'] != "") {
            $file = $this->request->getFile('ttd_p7');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p7',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p8']['name'] != "") {
            $file = $this->request->getFile('ttd_p8');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p8',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p9']['name'] != "") {
            $file = $this->request->getFile('ttd_p9');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p9',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p10']['name'] != "") {
            $file = $this->request->getFile('ttd_p10');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p10',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p11']['name'] != "") {
            $file = $this->request->getFile('ttd_p11');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p11',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p12']['name'] != "") {
            $file = $this->request->getFile('ttd_p12');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p12',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p13']['name'] != "") {
            $file = $this->request->getFile('ttd_p13');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p13',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p14']['name'] != "") {
            $file = $this->request->getFile('ttd_p14');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p14',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p15']['name'] != "") {
            $file = $this->request->getFile('ttd_p15');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p15',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        } else if ($_FILES['ttd_p16']['name'] != "") {
            $file = $this->request->getFile('ttd_p16');
            $name = $file->getRandomName();
            $this->model->db->table('tbl_pertemuan')->insert([
                'pertemuan' => 'p16',
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'ttd_dosen' => $name,
                'id_ketua' => $ketua[0]->id_ketua
            ]);
            $file->move('upload/ttd/', $name);
        }

        session()->setFlashdata('pesan', 'Absensi Berhasil Di Update !!');
        return redirect()->to(base_url('dsn/absensi/' . $id_jadwal));
    }
    //--------------------------------------------------------------------

    public function print_absensi($id_jadwal)
    {
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Print Absensi',
            'ta'    => $ta,
            'jadwal' => $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs'   => $this->ModelDsn->mhs($id_jadwal),

        ];
        return view('dosen/absenkelas/v_print_absensi', $data);
    }

    public function NilaiMahasiswa()
    {
        $ta = $this->ModelTa->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Nilai Mahasiswa',
            'ta'    => $ta,
            'absen' => $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_ta']),
            'isi'    => 'dosen/nilai/v_nilaimahasiswa'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function DataNilai($id_jadwal)
    {
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Nilai',
            'ta'    => $ta,
            'jadwal' => $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs'   => $this->ModelDsn->mhs($id_jadwal),
            'isi'    => 'dosen/nilai/v_datanilai'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function SimpanNilai($id_jadwal)
    {
        $mhs   = $this->ModelDsn->mhs($id_jadwal);
        foreach ($mhs as $key => $value) {
            $absen = $this->request->getPost($value['id_krs'] . 'absen');
            $tugas = $this->request->getPost($value['id_krs'] . 'nilai_tugas');
            $uts = $this->request->getPost($value['id_krs'] . 'nilai_uts');
            $uas = $this->request->getPost($value['id_krs'] . 'nilai_uas');
            $na = ($absen * 15 / 100) + ($tugas * 15 / 100) + ($uts * 30 / 100) + ($uas * 40 / 100);
            if ($na >= 85) {
                $nh = 'A';
                $bobot = 4;
            } elseif ($na < 85 && $na >= 75) {
                $nh = 'B';
                $bobot = 3;
            } elseif ($na < 75 && $na >= 65) {
                $nh = 'C';
                $bobot = 2;
            } elseif ($na < 65 && $na >= 55) {
                $nh = 'D';
                $bobot = 1;
            } else {
                $nh = 'E';
                $bobot = 0;
            }
            $data = [
                'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
                'nilai_tugas' => $this->request->getPost($value['id_krs'] . 'nilai_tugas'),
                'nilai_uts' => $this->request->getPost($value['id_krs'] . 'nilai_uts'),
                'nilai_uas' => $this->request->getPost($value['id_krs'] . 'nilai_uas'),
                'nilai_akhir' => number_format($na, 0),
                'nilai_huruf' => $nh,
                'bobot' => $bobot,
            ];
            $this->ModelDsn->SimpanNilai($data);
        }
        session()->setFlashdata('pesan', 'Nilai Berhasil Di Update !!');
        return redirect()->to(base_url('dsn/DataNilai/' . $id_jadwal));
    }

    public function PrintNilai($id_jadwal)
    {
        $ta = $this->ModelTa->ta_aktif();
        $data = [
            'title' => 'Rekap Nilai Mahasiswa',
            'ta'    => $ta,
            'jadwal' => $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs'   => $this->ModelDsn->mhs($id_jadwal),

        ];
        return view('dosen/nilai/v_printnilai', $data);
    }
}
