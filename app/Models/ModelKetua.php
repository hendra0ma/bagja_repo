<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKetua extends Model
{
    public function allData()
    {
        return $this->db->table('ketua_kelas')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = ketua_kelas.id_prodi', 'left')
            ->orderBy('id_mhs', 'DESC')
            ->get()->getResultArray();
    }

    public function detailData($id_mhs)
    {
        return $this->db->table('ketua_kelas')
            ->join('tbl_prodi', 'tbl_prodi.id_prodi = ketua_kelas.id_prodi', 'left')
            ->where('id_mhs', $id_mhs)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('ketua_kelas')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('ketua_kelas')
            ->where('id_mhs', $data['id_mhs'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('ketua_kelas')
            ->where('id_mhs', $data['id_mhs'])
            ->delete($data);
    }
}
