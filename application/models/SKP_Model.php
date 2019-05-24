<?php defined ('BASEPATH') OR exit ('no direct access allowed');

class SKP_model extends CI_Model
{
    private $_skp = "skp_penilaian";
    private $_tridharma = "tridharma";
    private $_unsurPenilaian = "unsur_penilaian";
    private $_uraianSKP = "uraian_skp";
    private $_jenisUraian="jenis_uraian_skp";

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
        // return $this->db->query("SELECT uraian_skp.uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan FROM `skp_penilaian` INNER JOIN `uraian_skp` ON skp_penilaian.id_uraian_skp=uraian_skp.id_uraian WHERE id_tridharma=$id_tridharma")->result();
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian WHERE id_tridharma=$id_tridharma")->result();
        
    }

    public function getSKPTambah($id_tridharma)
    {
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, jenis_uraian_skp.id_jenis_tridharma FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian  WHERE skp_penilaian.id_tridharma=$id_tridharma")->result();
    }

    public function getSKPperJenis($id_tridharma, $id_jenisTri)
    {
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, jenis_uraian_skp.id_jenis_tridharma, skp_penilaian.jenis_uraian_skp FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian  WHERE skp_penilaian.id_tridharma=$id_tridharma AND jenis_uraian_skp.id_jenis_tridharma=$id_jenisTri")->result();
    }

    public function getEvalSKP($id_tridharma)
    {
        // return $this->db->query("SELECT uraian_skp.uraian , skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, skp_penilaian.realisasi_jumlah, skp_penilaian.realisasi_kualitas FROM `skp_penilaian` INNER JOIN `uraian_skp` ON skp_penilaian.id_uraian_skp=uraian_skp.id_uraian WHERE id_tridharma=$id_tridharma")->result();
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian , skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, skp_penilaian.realisasi_jumlah, skp_penilaian.realisasi_kualitas FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian WHERE id_tridharma=$id_tridharma")->result();

    }

    public function getListofUraian($byjenisTridharma)
    {
        return $this->db->get_where($this->_jenisUraian,["id_jenis_tridharma"=>$byjenisTridharma])->result();
    }

}