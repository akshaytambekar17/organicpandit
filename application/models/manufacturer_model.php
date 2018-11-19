<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manufacturer_model extends CI_Model{
public function showAllManufacturer(){
$query = $this->db->get('manufacturer');
if($query->num_rows() > 0){
return $query->result();
}else{
return false;
}
}
public function insert_manufacturer($new_name){
// User data array
$data = array(
'manufact_name' => $this->input->post('manufact_name'),
'company_name' => $this->input->post('company_name'),
'mob_no' => $this->input->post('mob_no'),
'altMob_no' => $this->input->post('altMob_no'),
'cin' => $this->input->post('cin'),
'tin' => $this->input->post('tin'),
'email' => $this->input->post('email'),
'pancard' => $this->input->post('pancard'),
'contact_name' => $this->input->post('contact_name'),
'contact_no' => $this->input->post('contact_no'),
'father_name' => $this->input->post('father_name'),
'aadhar_card' => $this->input->post('aadhar_card'),
'dob' => $this->input->post('dob'),
'image' => $new_name,
'bank_name' => $this->input->post('bank_name'),
'acc_no' => $this->input->post('acc_no'),
'ifsc_code' => $this->input->post('ifsc_code'),
'branch_code' => $this->input->post('branch_code')
);
// Insert user
$this->db->insert('manufacturer', $data);
if($this->db->affected_rows() > 0){
echo 'success';
}
else{
echo 'fail';
}
}
public function showManufacturer(){
$id = $this->input->get('id');
$this->db->where('id', $id);
$query = $this->db->get('manufacturer');
if($query->num_rows() > 0){
foreach ($query->result_array() as $row)
{
echo '
<div class="modal-content">
  <div class="form-horizontal">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title" id="full-width-modalLabel">Show Manufacturer</h4>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-color panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Personal Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Manufacturer Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="" class="form-control" placeholder="Manufacturer Name" value="'.$row['manufact_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Company Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <input type="text" class="form-control" placeholder="Company Name" value="'.$row['company_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Mobile No.</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tablet"></i></span>
                        <input type="text" class="form-control" placeholder="Mobile No."  value="'.$row['mob_no'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Alternate Mobile No.</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tablet"></i></span>
                        <input type="text" class="form-control" placeholder="Mobile No."  value="'.$row['altMob_no'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">CIN</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="CIN"  value="'.$row['cin'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">TIN</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="TIN"  value="'.$row['tin'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Email</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Email"  value="'.$row['email'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Pancard</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                        <input type="text" class="form-control" placeholder="Pancard"  value="'.$row['pancard'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Contact Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Contact Name"  value="'.$row['contact_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Contact No.</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" placeholder="Contact No."  value="'.$row['contact_no'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Father Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Father Name"  value="'.$row['father_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Aadhar Card</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                        <input type="text" class="form-control" placeholder="Aadhar Card"  value="'.$row['aadhar_card'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">DOB</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" placeholder="DOB"  value="'.$row['dob'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Image</label>
                    <div class="col-md-8">
                      <div>
                        <img src="'.base_url().'upload/'.$row['image'].'" style="width: 200px;height:150px;margin:0 auto;display: block;" class="img-responsive img-thumbnail">
                        <p>'.$row['image'].'</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
          </div>
          <!-- personal details panel close -->
          <div class="panel panel-color panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Bank Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Bank Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <input type="text" name="" class="form-control" placeholder="Bank Name"  value="'.$row['bank_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Account No</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                        <input type="text" class="form-control" placeholder="Account No"  value="'.$row['acc_no'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">IFSC Code</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="IFSC Code"  value="'.$row['ifsc_code'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Branch Code</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="Branch Code"  value="'.$row['branch_code'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
          </div>
          <!-- Bank Details panel close -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
</div>
';
}
}else{
return false;
}
}
// close show 

public function editManufacturer(){
$id = $this->input->get('id');
$this->db->where('id', $id);
$query = $this->db->get('manufacturer');
if($query->num_rows() > 0){
foreach ($query->result_array() as $row)
{
echo '
<div class="modal-content">
  <form class="form-horizontal" role="form">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title" id="full-width-modalLabel">Edit Manufacturer</h4>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-color panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Personal Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Manufacturer Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="" class="form-control" placeholder="Manufacturer Name" value="'.$row['manufact_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Company Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <input type="text" class="form-control" placeholder="Company Name" value="'.$row['company_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Mobile No.</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tablet"></i></span>
                        <input type="text" class="form-control" placeholder="Mobile No."  value="'.$row['mob_no'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Alternate Mobile No.</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tablet"></i></span>
                        <input type="text" class="form-control" placeholder="Mobile No."  value="'.$row['altMob_no'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">CIN</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="CIN"  value="'.$row['cin'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">TIN</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="TIN"  value="'.$row['tin'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Email</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Email"  value="'.$row['email'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Pancard</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                        <input type="text" class="form-control" placeholder="Pancard"  value="'.$row['pancard'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Contact Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Contact Name"  value="'.$row['contact_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Contact No.</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" placeholder="Contact No."  value="'.$row['contact_no'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Father Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Father Name"  value="'.$row['father_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Aadhar Card</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                        <input type="text" class="form-control" placeholder="Aadhar Card"  value="'.$row['aadhar_card'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">DOB</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" placeholder="DOB"  value="'.$row['dob'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Image</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                        <input type="file" class="form-control" >
                      </div>
                      <div>
                        <img src="'.base_url().'upload/'.$row['image'].'" style="width: 200px;height:150px;margin:0 auto;display: block;" class="img-responsive img-thumbnail">
                        <p>'.$row['image'].'</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
          </div>
          <!-- personal details panel close -->
          <div class="panel panel-color panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Bank Details</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Bank Name</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <input type="text" name="" class="form-control" placeholder="Bank Name"  value="'.$row['bank_name'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Account No</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                        <input type="text" class="form-control" placeholder="Account No"  value="'.$row['acc_no'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">IFSC Code</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="IFSC Code"  value="'.$row['ifsc_code'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Branch Code</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control" placeholder="Branch Code"  value="'.$row['branch_code'].'">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
          </div>
          <!-- Bank Details panel close -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
    </div>
  </form>
</div>
';
}
}else{
return false;
}
}
//close edit


}