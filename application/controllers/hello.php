<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }
	// public function insertview()
	// {
	// 	$this->load->view('insert');
	// }
	public function insertcodeview()
	{
       
        $this->load->helper(array('form', 'url'));

        $this->load->library("form_validation");
        $this->form_validation->set_rules("fname","fname","required");
        $this->form_validation->set_rules("lname","lname","required|alpha");
        $this->form_validation->set_rules("email","email","required|valid_emails");
        // $this->form_validation->set_rules("pno","pno","required|min_length[10]|max_length[10]|numeric");

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('insert');
        }
        else
        {
            $config['upload_path']="images";
            $config['allowed_types']="gif|jpg|png";
            $config['max_size']=7000;
            $config['max_width']=7000;
            $config['max_height']=7000;
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('filename'))
            {

            }
            else{
                $image=$this->upload->data();
                $data=array(
                    'fname'=>$this->input->post('fname'),
                    'lname'=>$this->input->post('lname'),
                    'email'=>$this->input->post('email'),
                    'pno'=>$this->input->post('pno'),
                    'image'=>$image['file_name'],
                );
                $this->db->insert("tbl_insert",$data);

            }
            
        }
	}
    public function insertdata()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("fname","fname","required|trim|is_unique[tbl_insert.fname]");
		// $this->form_validation->set_rules("email","email","required|valid_email");
		// $this->form_validation->set_rules("pno","pno","required|numeric|max_length[10]|min_length[10]");
		// $this->form_validation->set_rules("lname","lname","required");
		if($this->form_validation->run()==false)
		{
			$this->load->view("insert");
		}
		else
		{
	    }
	}
	public function edit($id=null)
	{
		$this->db->where('id',$id);
		$data['edit']=$this->db->get("tbl_insert")->row();
		$this->load->view("edit",$data);
	}
	public function fetchdata()
	{
		$data['fetch']=$this->db->get('tbl_insert');
		$data['ftc']=$data['fetch']->result_array();
		// print_r("<pre>");
		// print_r($data);
		$this->load->view("fetchdata",$data);
	}
	public function editdata($id=null)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("fname","fname","required");
        $this->form_validation->set_rules("lname","lname","required|alpha");
        $this->form_validation->set_rules("email","email","required|valid_emails");
        $this->form_validation->set_rules("pno","pno","required|min_length[10]|max_length[10]|numeric");
		if($this->form_validation->run() == false)
		{
			$this->db->where('id',$id);
		    $data['edit']=$this->db->get("tbl_insert")->row();
			$this->load->view('edit',$data);
		}
		else
		{
			$config['upload_path']='images';
			$config['allowed_types']='jpg|png|gif';
			$config['max_size']=7000;
			$config['max_width']=7000;
			$config['max_height']=7000;
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('filename'))
			{
				$data=array(
					'fname'=>$this->input->post('fname'),
					'lname'=>$this->input->post('lname'),
					'email'=>$this->input->post('email'),
					'pno'=>$this->input->post('pno'),
					
				);
				$this->db->where('id',$_POST['id']);
				$this->db->update("tbl_insert",$data);
				redirect(base_url('hello/fetchdata'));
			}
			else{
				$data=array(
					'fname'=>$this->input->post('fname'),
					'lname'=>$this->input->post('lname'),
					'email'=>$this->input->post('email'),
					'pno'=>$this->input->post('pno'),
					
				);
				$data1 = array('filename'=>$this->upload->data());
				$cl_img = $data1['filename']['file_name'];
				$this->db->set('image',$cl_img);
				$this->db->where('id',$_POST['id']);
				$this->db->update("tbl_insert",$data);
				redirect(base_url('hello/fetchdata'));

			}

		}
	}
	public function smsview()
	{
		$this->load->view("sms");
	}
	public function ajaxview()
	{
		$this->load->view("ajax");
	}
	public function ajax()
	{
		$config['upload_path']="images";
		$config['allowed_types']="gif|jpg|png";
		$config['max_size']=7000;
		$config['max_width']=7000;
		$config['max_height']=7000;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('file'))
		{

		}
		else{
			$image=$this->upload->data();


			$imagedata=$image['file_name'];
		$data=array(
			'image'=>$imagedata,
			'title'=>$this->input->post('title'),
		);
		// print_r("<pre>");
		// print_r($image);
		// exit();
		$query=$this->db->insert("image",$data);
		echo "<script>alert('insert Successfull');</script>";
		// 	print_r("<pre>");
		// print_r($query);
		// exit();
	}
	}
	public function ajaximageview()
	{
		$this->load->view("ajaximage");
	}
	public function ajaximage()
	{
		$config['upload_path']='images';
		$config['allowed_types']='jpg|png|gif';
		$config['max_size']=7000;
		$config['max_width']=7000;
		$config['max_height']=7000;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('filename'))
		{

		}
		else{
			$image=$this->upload->data();
			$imagedata=$image['file_name'];
			$data=array(
				'fname'=>$this->input->post('fname'),
				'lname'=>$this->input->post('lname'),
				'email'=>$this->input->post('email'),
				'pno'=>$this->input->post('pno'),
				'image'=>$imagedata,
			);
			// print_r("<pre>");
			// print_r($data);
			// exit();

			$insert=$this->db->insert('tbl_insert',$data);
			if($insert)
			{
				echo "<script>alert('insert Successfull');</script>";
			}
			else
			{
				echo "<script>alert('insert Not Successfull');</script>";
			}

		}

	}
	public function ajaxfetchdata()
	{
		$select=$this->db->get('tbl_insert');
		foreach($select->result_array() as $row)
		{
			echo "<tr>";
			echo "<td>".$row['fname']."</td>";
			echo "<td>".$row['lname']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['pno']."</td>";
			// echo "<td>".$row['image']."</td>";
			echo "<td><img src='http://localhost:8080/coder/images/".$row['image']."' style='width:100px;height:100px;'></td>";
			echo "<td><button type='button' class='btn btn-danger btn-sm delete' data-id='".$row['id']."'>Delete</button></td>";
			echo "<tr>";
		}
		// print_r($select);
		// exit();
	}
	public function delete()
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$this->db->delete("tbl_insert");
	}
}
