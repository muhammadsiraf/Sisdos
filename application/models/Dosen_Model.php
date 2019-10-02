<?php defined ('BASEPATH') OR exit ('no direct access allowed');

class Dosen_model extends CI_Model
{
    private $_table = "dosen";
    // private $_tableJabatan = ""
    public $id_dosen;
    public $NIDN_NUPN;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $gelar_depan;
    public $gelar_belakang;
    public $jenis_kelamin;
    public $JAFA;
    public $TMT_JAFA;
    public $angka_kredit;
    public $username;
    public $status;
    public $ikatan_kerja;
    public $pangkat;


    public $photo="default.jpg";

    public function rules_update()
    {
        $config = array(
            array(
                'field'=>'nupn',
                'label'=>'nupn',
                // 'rules'=>'numeric',
                //     array(

                //     )
            ),
            array(
                'field'=>'nama',
                'label'=>'Nama Dosen',
                // 'rules'=>'alpha_spaces',
                //     array(

                //     )
            ),
            array(
                'field'=>'tempatlahir',
                'label'=>'tempat lahir',
                // 'rules'=>'alpha_numeric_spaces',
                //     array(

                //     )
            ),
            array(
                'field'=>'tanggallahir',
                'label'=>'tanggal lahir',
                // 'rules'=>'numeric',
                //     array(

                //     )
            ),
            array(
                'field'=>'gelardepan',
                'label'=>'gelar depan',
                // 'rules'=>'alpha_spaces',
                //     array(

                //     )
            ),
            array(
                'field'=>'gelarbelakang',
                'label'=>'gelar belakang',
                // 'rules'=>'alpha_spaces',
                //     array(

                //     )
            ),
            array(
                'field'=>'jeniskelamin',
                'label'=>'jenis kelamin',
                // 'rules'=>'alpha_spaces',
                //     array(

                //     )
            ),
        );
        return $config;
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_dosen"=>$id])->row();
    }

    public function getByUsername($username)
    {
        return $this->db->get_where($this->_table, ["username"=>$username])->row();
    }


    public function saveProfile()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->tempat_lahir = $post["tempatLahir"];
        $this->tanggal_lahir = $post["tanggalLahir"];
        $this->gelar_depan = $post["gelarDepan"];
        $this->gelar_belakang = $post["gelarBelakang"];
        $this->jenis_kelamin = $post["jenisKelamin"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->NIDN_NUPN = $post["nupn"];
        $this->tempat_lahir = $post["tempatlahir"];
        $this->tanggal_lahir = $post["tanggallahir"];
        $this->gelar_depan = $post["gelardepan"];
        $this->gelar_belakang = $post["gelarbelakang"];
        $this->jenis_kelamin = $post["jeniskelamin"];
        $this->db->update($this->_table, $this, array('id_dosen'=>$post['id']));
    }

    public function updateProfil()
    {
        $dosen=$this->session->userdata('dosen');
        $post = $this->input->post();
        $this->id_dosen = $this->session->userdata('dosen')->id_dosen;
        $this->nama = $post["nama"];
        $this->NIDN_NUPN = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->tempat_lahir = $post["tempatlahir"];
        $this->tanggal_lahir = $post["tanggallahir"];
        $this->gelar_depan = $post["gelardepan"];
        $this->gelar_belakang = $post["gelarbelakang"];
        $this->jenis_kelamin = $post["jeniskelamin"];
        $this->JAFA = $post["jafa"];
        $this->TMT_JAFA = $post["tmtjafa"];
        $this->angka_kredit = $post["angkakredit"];
        $this->username = $this->session->userdata('dosen')->username;
        $this->photo = $post["photo"];
        $this->db->update($this->_table, $this, array('id_dosen'=>$post['id']));
    }

    public function updateJabatan()
    {
        $post = $this->input->post();
        $this->id_dosen = $this->session->userdata('dosen')->id_dosen;
        $this->nama = $post["nama"];
        $this->NIDN_NUPN = $this->session->userdata('dosen')->NIDN_NUPN;
        $this->tempat_lahir = $post["tempatlahir"];
        $this->tanggal_lahir = $post["tanggallahir"];
        $this->gelar_depan = $post["gelardepan"];
        $this->gelar_belakang = $post["gelarbelakang"];
        $this->jenis_kelamin = $post["jeniskelamin"];
        $this->JAFA = $post["JAFA"];
        $this->TMT_JAFA = $post["TMTJAFA"];
        $this->angka_kredit = $post["angkakredit"];
        $this->username = $this->session->userdata('dosen')->username;
        $this->photo = $post["photo"];
        $this->db->update($this->_table, $this, array('id_dosen'=>$post['id']));
    }

    public function tambah_pangkat()
    {
        $post = $this->input->post();
        $pangkat = $post["pangkat"];
        $id_dosen = $post["id_dosen"];
        if($this->is_pangkat_udah($pangkat,$id_dosen)!=null){
            
        }
        else{
            $data=array("id_dosen"=>$id_dosen,"id_pangkat"=>$pangkat);
            $this->db->insert("riwayat_pangkat",$data);
        }
    }

    public function is_pangkat_udah($id_pangkat,$id_dosen)
    {
        return $this->db->get_where("riwayat_pangkat", ["id_pangkat"=>$id_pangkat, "id_dosen"=>$id_dosen])->row();
    }

    public function hapus_pangkat($id_riwayat_pangkat)
    {
        $where=array("id_riwayat_pangkat"=>$id_riwayat_pangkat);
        return $this->db->delete("riwayat_pangkat",$where);
    }

    public function update_pangkat($id_riwayat_pangkat,$pangkat)
    {
        $where=array("id_riwayat_pangkat"=>$id_riwayat_pangkat);
        $data=array("id_pangkat"=>$pangkat);
        return $this->db->update("riwayat_pangkat", $data, $where);
    }

    public function get_pangkat_by_dosen($id_dosen)
    {
        return $this->db->query("SELECT golongan.golongan_nama, riwayat_pangkat.id_riwayat_pangkat  FROM `golongan` INNER JOIN `riwayat_pangkat` ON golongan.id = riwayat_pangkat.id_pangkat WHERE riwayat_pangkat.id_dosen=$id_dosen")->result();
    }

    public function upload_foto_dosen($id_dosen,$nama_file)
    {
       $where=array("id_dosen"=>$id_dosen);
       $data=array("photo"=>$nama_file);
       return $this->db->update($this->_table,$data,$where);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_dosen"=>$id));
    }


    public function get_all_dosen($program_didik)
    {
        return $this->db->query("SELECT * FROM `dosen` WHERE program_didik=$program_didik")->result();
    }

    public function cek_dosen_dinilai($semester,$tahun, $prodi)
    {
        return $this->db->get_where("perilaku_penilaian",["semester"=>$semester,"tahun"=>$tahun])->result();
    }

    public function simpan_penilaian()
    {
        $post = $this->input->post();
        // $tahun=$post
        $datainsert=array(
            'id_dosen'=>$post["iddosen"],
            'semester'=>$post["semester"],
            'tahun'=>$post["tahun"],
            'orientasi'=>$post["orientasi"],
            'integritas'=>$post["integritas"],
            'komitmen'=>$post["komitmen"],
            'disiplin'=>$post["disiplin"],
            'kerjasama'=>$post["kerjasama"],
            'kepemimpinan'=>$post["kepemimpinan"],
            'sudah_nilai'=>1,
        );

        $this->db->insert("perilaku_penilaian",$datainsert);
    }

    public function cek_dosen_nilai($id_dosen,$semester, $tahun)
    {
        if($this->db->get_where("perilaku_penilaian", ["id_dosen"=>$id_dosen,"semester"=>$semester,""])->row())
        {

        }
    }

    public function edit_penilaian()
    {
        $post = $this->input->post();
        // $tahun=$post
        $datainsert=array(
            'orientasi'=>$post["orientasi"],
            'integritas'=>$post["integritas"],
            'komitmen'=>$post["komitmen"],
            'disiplin'=>$post["disiplin"],
            'kerjasama'=>$post["kerjasama"],
            'kepemimpinan'=>$post["kepemimpinan"],
            'sudah_nilai'=>1,
        );

        $where=array(
            'id_dosen'=>$post["iddosen"],
            'semester'=>$post["semester"],
            'tahun'=>$post["tahun"],
        );


        $this->db->update("perilaku_penilaian",$datainsert,$where);
        $this->update_total_nilai_rata($post["iddosen"],$post["semester"],$post["tahun"]);
    }

    public function update_total_nilai_rata($id_dosen,$semester,$tahun)
    {
        $where=array(
            'id_dosen'=>$id_dosen,
            'semester'=>$semester,
            'tahun'=>$tahun,
        );
        $data_dosen=$this->db->get_where("perilaku_penilaian",$where)->row();
        if($data_dosen!=null){
            $orientasi=$data_dosen->orientasi;
            $integritas=$data_dosen->integritas;
            $komitmen=$data_dosen->komitmen;
            $disiplin=$data_dosen->disiplin;
            $kerjasama=$data_dosen->kerjasama;
            $kepemimpinan=$data_dosen->kepemimpinan;
            $rata_total=$orientasi+$integritas+$komitmen+$disiplin+$kerjasama+$kepemimpinan;
            $rata_total=$rata_total/6;

            $data_update=array(
                'total_nilai_rata'=>$rata_total,
            );

            $this->db->update("perilaku_penilaian", $data_update,$where);
            
            $data_update=array(
                'nilai_perilaku'=>$rata_total,
            );

            $where=array(
            'id_dosen'=>$id_dosen,
            'semester'=>$semester,
            'tahun_ajaran'=>$tahun,
            );

            $this->db->update("tridharma", $data_update,$where);


        }

    }

    public function update_persetujuan_skp()
    {
        $post=$this->input->post();
        $id_tridharma=$post["id_tridharma"];
        $where=array(
            "id_tridharma"=>$id_tridharma,
        );
        $data=array(
            "rancangan_approve"=>1,
        );
        $this->db->update("tridharma",$data,$where);
    }

    public function update_persetujuan_eval_skp()
    {
        $post=$this->input->post();
        $id_tridharma=$post["id_tridharma"];
        $where=array(
            "id_tridharma"=>$id_tridharma,
        );
        $data=array(
            "evaluasi_approve"=>1,
        );
        $this->db->update("tridharma",$data,$where);
    }

    public function update_kredit_tridharma($nilai_kredit, $id_tridharma)
    {
        $where=array(
            "id_tridharma"=>$id_tridharma,
        );
        $data=array(
            "nilai_kredit_skp"=>$nilai_kredit,
        );
        $this->db->update("tridharma",$data,$where);
    }

    public function update_persentase_skp($persentase_skp, $id_tridharma)
    {
        $where=array(
            "id_tridharma"=>$id_tridharma,
        );
        $data=array(
            "persentase_skp"=>$persentase_skp,
        );
        $this->db->update("tridharma",$data,$where);
    }

    public function update_totalnilai_tridharma($total_nilai, $id_tridharma)
    {
        $where=array(
            "id_tridharma"=>$id_tridharma,
        );
        $data=array(
            "total_nilai"=>$total_nilai,
        );
        $this->db->update("tridharma",$data,$where);
    }

    public function update_angka_kredit($kredit,$id_dosen)
    {
        $this->db->update("dosen",["angka_kredit"=>$kredit],["id_dosen"=>$id_dosen]);
    }

    public function get_kredit_golongan($golongan)
    {
        return $this->db->get_where("golongan",["golongan_nama"=>$golongan])->row();
    }

    public function get_all_dosen_per($number,$offset)
    {
        return $this->db->get("dosen",$number,$offset)->result();
    }

    public function update_by_admin()
    {
        $post = $this->input->post();
        $this->nama = $post["nama_dosen"];
        $this->NIDN_NUPN = $post["nupn"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->gelar_depan = $post["gelar_depan"];
        $this->gelar_belakang = $post["gelar_belakang"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->angka_kredit = $post["kredit"];
        $this->username = $post["username"];
        $this->status = $post["status"];
        $this->ikatan_kerja = $post["ikatan_kerja"];
        $this->pangkat = $post["pangkat"];
        $this->JAFA=$post["jafa"];
        $this->TMT_JAFA=$post["tmt_jafa"];
        $this->id_dosen=$post["id_dosen"];
        $this->db->update($this->_table, $this, array('id_dosen'=>$post['id_dosen']));
    }

    public function make_dosen($data)
    {
        $this->db->insert($this->_table,$data);
    }

    public function update_dosen_where($data_update, $where)
    {
        $this->db->update($this->_table,$data_update,$where);
    }

    
    
}