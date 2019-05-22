<?php defined ('BASEPATH') OR exit ('no direct access allowed');

class SKP_model extends CI_Model
{
    private $_skp = "skp_penilaian";
    private $_tridharma = "tridharma";
    private $_unsurPenilaian = "unsur_penilaian";
    private $_uraianSKP = "uraian_skp";


    // private $_tableJabatan = ""

    public function rules()
    {
        return [
            
        ];
    }



    public function getTridharma($id_dosen,$semester,$tahunajar)
    {
        return $this->db->get_where($this->_tridharma, ["id_dosen"=>$id_dosen,"tahun_ajaran"=>$tahunajar,"semester"=>$semester])->row();
    }

    public function getSKP($id_tridharma)
    {
        return $this->db->query("SELECT uraian_skp.uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan FROM `skp_penilaian` INNER JOIN `uraian_skp` ON skp_penilaian.id_uraian_skp=uraian_skp.id_uraian WHERE id_tridharma=$id_tridharma")->result();
    }

    public function getEvalSKP($id_tridharma)
    {
        return $this->db->query("SELECT uraian_skp.uraian , skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, skp_penilaian.realisasi_jumlah, skp_penilaian.realisasi_kualitas FROM `skp_penilaian` INNER JOIN `uraian_skp` ON skp_penilaian.id_uraian_skp=uraian_skp.id_uraian WHERE id_tridharma=$id_tridharma")->result();
    }


    public function addPendidikan()
    {

    }

}