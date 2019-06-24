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

    public function newTridharma($tahunajar,$semester){
        $post=$this->input->post();
        $id_dosen=$this->session->userdata('dosen')->id_dosen;
        $inputData=array(
        'id_dosen' => $id_dosen,
        'tahun_ajaran' => $tahunajar,
        'semester' => $semester,
        );
        $this->db->insert($this->_tridharma, $inputData);
    }

    public function tambahSKP(){
        $post=$this->input->post();
        $id_tridharma=$post["idtridharma"];
        $jenis_uraian_skp=$post["id_uraian"];
        $inputData=array(
            'id_tridharma'=>$id_tridharma,
            'jenis_uraian_skp'=>$jenis_uraian_skp,
        );
        $this->db->insert($this->_skp, $inputData);
    }

    public function hapusSKP($id_pskp){
        $where=array(
            'id_pskp'=>$id_pskp,
        );
        $this->db->delete($this->_skp,$where);
    }

    public function editSKP(){
        $post=$this->input->post();
        $idpskp=$post["idpskp"];
        $jumlahTarget=$post["jumlahTarget"];
        $satuanTarget=$post["satuanTarget"];
        $kualitasMutu=$post["kualitasMutu"];
        $jumlahWaktu=$post["jumlahWaktu"];
        $satuanWaktu=$post["satuanWaktu"];
        $where=array(
            'id_pskp'=>$idpskp
        );
        $inputData=array(
            'target_jumlah'=>$jumlahTarget,
            'target_satuan'=>$satuanTarget,
            'kualitas_mutu'=>$kualitasMutu,
            'waktu_jumlah'=>$jumlahWaktu,
            'waktu_satuan'=>$satuanWaktu,
        );
        $this->db->update($this->_skp,$inputData,$where);
    }

    public function updateSKP($inputData,$where){
        $this->db->update($this->_skp,$inputData,$where);
    }

    public function getTridharma($id_dosen,$semester,$tahunajar)
    {
        return $this->db->get_where($this->_tridharma, ["id_dosen"=>$id_dosen,"tahun_ajaran"=>$tahunajar,"semester"=>$semester])->row();
    }

    public function getSKP($id_tridharma)
    {
        // return $this->db->query("SELECT uraian_skp.uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan FROM `skp_penilaian` INNER JOIN `uraian_skp` ON skp_penilaian.id_uraian_skp=uraian_skp.id_uraian WHERE id_tridharma=$id_tridharma")->result();
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, skp_penilaian.id_pskp FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian WHERE id_tridharma=$id_tridharma")->result();
        
    }

    public function getSKPTambah($id_tridharma)
    {
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, jenis_uraian_skp.id_jenis_tridharma FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian  WHERE skp_penilaian.id_tridharma=$id_tridharma")->result();
    }

    public function getSKPperJenis($id_tridharma, $id_jenisTri)
    {
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, jenis_uraian_skp.id_jenis_tridharma, skp_penilaian.jenis_uraian_skp, skp_penilaian.nilai_kredit_akhir FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian  WHERE skp_penilaian.id_tridharma=$id_tridharma AND jenis_uraian_skp.id_jenis_tridharma=$id_jenisTri")->result();
    }

    public function getEvalSKP($id_tridharma)
    {
        // return $this->db->query("SELECT uraian_skp.uraian , skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, skp_penilaian.realisasi_jumlah, skp_penilaian.realisasi_kualitas FROM `skp_penilaian` INNER JOIN `uraian_skp` ON skp_penilaian.id_uraian_skp=uraian_skp.id_uraian WHERE id_tridharma=$id_tridharma")->result();
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian , skp_penilaian.target_jumlah, skp_penilaian.approval, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, skp_penilaian.realisasi_jumlah, skp_penilaian.realisasi_kualitas, skp_penilaian.id_pskp, skp_penilaian.berkas_bukti_capaian, skp_penilaian.nilai_kredit_akhir FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian WHERE id_tridharma=$id_tridharma")->result();
    }

    public function getListofUraian($byjenisTridharma)
    {
        return $this->db->get_where($this->_jenisUraian,["id_jenis_tridharma"=>$byjenisTridharma])->result();
    }

    public function getBKDperjenis($id_tridharma,$id_jenisTridharma)
    {
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian, skp_penilaian.target_jumlah, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, skp_penilaian.id_pskp, skp_penilaian.realisasi_jumlah, skp_penilaian.realisasi_kualitas, skp_penilaian.sks_bkd, skp_penilaian.rekomendasi, skp_penilaian.berkas_bukti_capaian FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian WHERE id_tridharma=$id_tridharma AND jenis_uraian_skp.id_jenis_tridharma=$id_jenisTridharma")->result();
    }

    public function get_tridharma_dosen($semester,$tahun, $program_didik_dosen)
    {
        return $this->db->query("SELECT  tridharma.id_dosen, tridharma.nilai_perilaku, tridharma.nilai_kredit_skp, tridharma.sks_bkd_total, tridharma.rancangan_approve, tridharma.evaluasi_approve, tridharma.persentase_skp, tridharma.total_nilai FROM `tridharma` INNER JOIN `dosen` ON tridharma.id_dosen=dosen.id_dosen  WHERE tridharma.tahun_ajaran=\"$tahun\" AND tridharma.semester=\"$semester\" AND dosen.program_didik=$program_didik_dosen")->result();
    }

    public function cek_tridharma($id_tridharma)
    {
        return $this->db->get_where("tridharma",["id_tridharma"=>$id_tridharma,])->row();
    }

    public function get_tridharma($where)
    {
        return $this->db->get_where("tridharma",$where)->result();
    }

    public function update_approval_eval_skp($id_approval)
    {
        $post=$this->input->post();
        $id_pskp=$post["idpskp"];

        $data_input=array(
            "approval"=>1,
        );

        $where=array(
            "id_pskp"=>$id_pskp,
        );

        $this->db->update($this->_skp,$data_input,$where);
    }

    public function get_skp_nilai($id_tridharma)
    {
        return $this->db->query("SELECT jenis_uraian_skp.nama as uraian , skp_penilaian.target_jumlah, skp_penilaian.approval, skp_penilaian.target_satuan, skp_penilaian.kualitas_mutu, skp_penilaian.waktu_jumlah, skp_penilaian.waktu_satuan, skp_penilaian.realisasi_jumlah, skp_penilaian.realisasi_kualitas, skp_penilaian.id_pskp, skp_penilaian.berkas_bukti_capaian, jenis_uraian_skp.kredit, jenis_uraian_skp.maks_jumlah FROM `skp_penilaian` INNER JOIN `jenis_uraian_skp` ON skp_penilaian.jenis_uraian_skp=jenis_uraian_skp.id_jenis_uraian WHERE id_tridharma=$id_tridharma")->result();
    }

    public function get_all_tridharma_dosen($id_dosen)
    {
        return $this->db->get_where("tridharma",["id_dosen"=>$id_dosen])->result();
    }

    public function update_kredit_hasil_skp($id_skp,$nilai_kredit)
    {
        $this->db->update($this->_skp,["nilai_kredit_akhir"=>$nilai_kredit],["id_pskp"=>$id_skp]);
    }



}