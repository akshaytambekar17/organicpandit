<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Search_detail_model extends CI_Model {
  
    // get city
  
  
    public function get_state()
    {
      $this->db->select('*')->from('states');
      $this->db->where('country_id', 101);
      $this->db->order_by('name', 'asc');
      $query=$this->db->get();
      return $query->result();
    }
   public function get_city()
    {
      $this->db->select('*')->from('cities');
     // $this->db->where('country_id', 101);
      $this->db->order_by('name', 'asc');
      $query=$this->db->get();
      return $query->result();
    }
  
  
    public function get_detail($slug = FALSE){
  
      // tbl_farmer
  
  
      switch ($slug) {
        case "farmer":
        $table_name = 'tbl_farmer';
        $pr_table = 'tbl_pr_farmer';
        break;
        case "fpo":
        $table_name = 'tbl_fpo';
        $pr_table = 'tbl_pr_fpo';
        break;
        case "trader":
        $table_name = 'tbl_trader';
        $pr_table = 'tbl_pr_trader';
        break;
        case "processor":
        $table_name = 'tbl_processor';
        $pr_table = 'tbl_pr_processor';
        break;
        case "buyer":
        $table_name = 'tbl_buyer';
        $pr_table = 'tbl_pr_buyer';
        break;
        case "org_consultant":
        $table_name = 'tbl_org_consultant';
        break;
        case "org_input":
        $table_name = 'tbl_org_input';
        break;
        case "packaging":
        $table_name = 'tbl_packaging';
        break;
        case "logistic":
        $table_name = 'tbl_logistic';
        break;
        case "farm_equipment":
        $table_name = 'tbl_equipment';
        break;
        case "exhibitors":
        $table_name = 'tbl_exhibitors';
        break;
        case "shops":
        $table_name = 'tbl_shops';
        break;
        case "labs":
        $table_name = 'tbl_labs';
        break;
        case "gov_agency":
        $table_name = 'tbl_gov_agency';
        break;
        case "institutions":
        $table_name = 'tbl_institutions';
        break;
        case "others":
        $table_name = 'tbl_others';
        break;
        case "restaurant":
        $table_name = 'tbl_restaurant';
        break;
        case "ngo":
        $table_name = 'tbl_ngo';
        break;
        default:
        $table_name = 'tbl_farmer';
      }
  
      $certification = $this->input->post('certificates');
      $products = $this->input->post('products');
  
  // $json = '{"pr_id":"2","pr_name":"dal"}';
      $json = json_decode($products, true);
      $pr_id = $json['pr_id'];
      $pr_name =  $json['pr_name'];
  
      $state = $this->input->post('state');
      $city = $this->input->post('city');
  
  $city_name  = '';
  $state_name = '';
  // get state name
      $this->db->select('*')->from('states');
      $this->db->where('id', $state);
      $this->db->order_by('name', 'asc');
      $qState=$this->db->get();

       if ($qState->num_rows() > 0)
{
             $row_s=$qState->result_array();
             $state_name = $row_s[0]['name'];
}
      
   
  
  //get city name
  
      $this->db->select('*')->from('cities');
      $this->db->where('id', $city);
      $this->db->order_by('name', 'asc');
      $qCity=$this->db->get();
      if ($qCity->num_rows() > 0)
{
             $row_c=$qCity->result_array();
             $city_name = $row_c[0]['name'];
}
  

  
  
  
  // get user detail
   if($slug == 'farmer' || $slug == 'fpo' || $slug == 'trader' || $slug == 'processor'){
                  
      $this->db->select('*');    
      $this->db->from($table_name);
      $this->db->join($pr_table, $table_name.'.id = '.$pr_table.'.pr_id','left outer');
             if($state!='' and $certification!='' and $pr_name!='' and $city!='')
             {
                    $where = '(state = "'.$state.'" and city = "'.$city.'" and '.$pr_table.'.pr_name = "'.$pr_name.'" and '.$table_name.'.certification = "'.$certification.'")';                    $this->db->where($where);
                     $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
             }
             else if($pr_name!='' and $city!='' and $state!='')
             {
                    
                    $where = '(state = "'.$state.'" and city = "'.$city.'" and '.$pr_table.'.pr_name = "'.$pr_name.'")';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
             }
              else if($pr_name!='' and $city!='' and $certification!='')
             {
                    $where = '( city = "'.$city.'" and '.$pr_table.'.pr_name = "'.$pr_name.'" and '.$table_name.'.certification = "'.$certification.'")';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
             }
             else if($certification!='' and $city!='' and $state!='')
             {
                  $where = '(state = "'.$state.'" and city = "'.$city.'" and '.$table_name.'.certification = "'.$certification.'")';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
                  
             }
             else if($state!='' and $pr_name!='' and $certification!='')
             {
                   $where = '(state = "'.$state.'" and '.$pr_table.'.pr_name = "'.$pr_name.'" and '.$table_name.'.certification = "'.$certification.'")';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
              }
              else if($state!='' and $city!='')
              {
                   $where = '(state = "'.$state.'" and city = "'.$city.'")';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
                  
              }
              
              else if($state!='' and $pr_name!='')
              {
                   $where = '(state = "'.$state.'" and '.$pr_table.'.pr_name = "'.$pr_name.'")';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
                  
              }
               else if($state!='' and $certification!='')
              {
                   $where = '(state = "'.$state.'" and '.$table_name.'.certification = "'.$certification.'")';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
              }
              else if($city!='' and $pr_name!='')
              {
                   $where = '(city = "'.$city.'" and '.$pr_table.'.pr_name = "'.$pr_name.'" )';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
              }
              else if($city!='' and $certification!='')
              {
                     $where = '(city = "'.$city.'" and '.$table_name.'.certification = "'.$certification.'" )';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
              }
              else if($pr_name!='' and $certification!='')
              {
                  $where = '('.$pr_table.'.pr_name = "'.$pr_name.'" and '.$table_name.'.certification = "'.$certification.'")';
                    $this->db->where($where);
                    $this->db->order_by($pr_table.'.pr_name', 'asc');
                  
              }
              
          
        else
      {
            $where = '(state = "'.$state.'" or city = "'.$city.'" or '.$pr_table.'.pr_name = "'.$pr_name.'" or '.$table_name.'.certification = "'.$certification.'")';
            $this->db->where($where);
            $this->db->group_by($table_name.'.id', 'asc');
          
      }
      
    }elseif($slug == 'buyer'){
  $this->db->select('*');    
      $this->db->from($table_name);
      $this->db->join($pr_table, $table_name.'.id = '.$pr_table.'.pr_id');
      $where = '(state = "'.$state.'" or city = "'.$city.'" or '.$pr_table.'.pr_name = "'.$pr_name.'")';
      $this->db->where($where);
      $this->db->order_by($pr_table.'.pr_name', 'asc');
    }else{
      $this->db->select('*');    
      $this->db->from($table_name);
      $where = '(state = "'.$state.'" or city = "'.$city.'")';
      $this->db->where($where);
      $this->db->order_by('id', 'asc');
    }
  
  /*
  SELECT *
  FROM (`tbl_farmer`)
  JOIN `tbl_pr_farmer` ON `tbl_farmer`.`id` = `tbl_pr_farmer`.`pr_id`
  WHERE (state = "22" and city = "2675" and tbl_pr_farmer.pr_name = "dal" and tbl_farmer.certification = "npop")
  ORDER BY `tbl_pr_farmer`.`pr_name` asc
  */
  
  $query=$this->db->get();
  $num = $query->num_rows();
  
  
  if($num > 0){
    foreach($query->result_array() as $row){
     if(!empty($row['pr_id'])){$r_pid = $row['pr_id'];}
     else{$r_pid = '';}
     if($row['is_verify']=='1'){
     echo '<div class="row search-row">
     <div class="col-md-3">
     <div class="profile-img"><img src="../upload/profile/'.$row['profile'].'" alt="organic world" ></div>
     <p class="text-center">'.$row['username'].'</p>
     </div>
     <div class="col-md-6">
     <div class="search-lico"><i class="fa fa-map-marker"></i></div>
     <div class="search-info">'.$row['fullname'].','.$row['address'].','.$state_name.','.$city_name.'</div>
  
     </div>
     <div class="col-md-3">
     <button class="btn  sdetail-btn btn-black getProfileModal" data-toggle="modal" data-target="#view-profile"  data-val="'.$row['id'].'" data="'.$r_pid.'"> View Details</button>
     <div class="profile-img"><img src="../upload/profile/Screenshot_4.png" alt="organic world" style="height:50px;width:50px;" ></div>
     </div>
     
     </div>'; }else {
        echo '<div class="row search-row">
     <div class="col-md-3">
     <div class="profile-img"><img src="../upload/profile/'.$row['profile'].'" alt="organic world" ></div>
     <p class="text-center">'.$row['username'].'</p>
     </div>
     <div class="col-md-6">
     <div class="search-lico"><i class="fa fa-map-marker"></i></div>
     <div class="search-info">'.$row['fullname'].','.$row['address'].','.$state_name.','.$city_name.'</div>
  
     </div>
     <div class="col-md-3">
     <button class="btn  sdetail-btn btn-black getProfileModal" data-toggle="modal" data-target="#view-profile"  data-val="'.$row['id'].'" data="'.$r_pid.'"> View Details</button>
     </div>
     
     </div>';
         
     }
     
     
     
     
     
  /*if($row['is_verify']=='1'){
      echo '<div class="profile-img"><img src="../upload/profile/Screenshot_4.png" alt="organic world" style="height:50px;width:50px;" ></div>
     </div>';
  }*/
  
   }
  }else{
    echo '<p class="alert alert-danger"><strong>No records found for user</strong> : '.$products.' </p>';
  
  } 
  
  }
  
  public function get_profile($slug = FALSE){
  print $id = $this->input->get('id');
  print $rid = $this->input->get('rid');
  print $slug_name = $this->input->get('slug_name');
  $pr_table = '';
    switch ($slug_name) {
      case "farmer":
        $table_name = 'tbl_farmer';
        $pr_table = 'tbl_pr_farmer';
        break;
        case "fpo":
        $table_name = 'tbl_fpo';
        $pr_table = 'tbl_pr_fpo';
        break;
        case "trader":
        $table_name = 'tbl_trader';
        $pr_table = 'tbl_pr_trader';
        break;
        case "processor":
        $table_name = 'tbl_processor';
        $pr_table = 'tbl_pr_processor';
        break;
        case "buyer":
        $table_name = 'tbl_buyer';
        $pr_table = 'tbl_pr_buyer';
        break;
        case "org_consultant":
        $table_name = 'tbl_org_consultant';
        break;
        case "org_input":
        $table_name = 'tbl_org_input';
        break;
        case "packaging":
        $table_name = 'tbl_packaging';
        break;
        case "logistic":
        $table_name = 'tbl_logistic';
        break;
        case "farm_equipment":
        $table_name = 'tbl_equipment';
        break;
        case "exhibitors":
        $table_name = 'tbl_exhibitors';
        break;
        case "shops":
        $table_name = 'tbl_shops';
        break;
        case "labs":
        $table_name = 'tbl_labs';
        break;
        case "gov_agency":
        $table_name = 'tbl_gov_agency';
        break;
        case "institutions":
        $table_name = 'tbl_institutions';
        break;
        case "others":
        $table_name = 'tbl_others';
        break;
        case "restaurant":
        $table_name = 'tbl_restaurant';
        break;
        case "ngo":
        $table_name = 'tbl_ngo';
        break;
      default:
      $table_name = 'tbl_farmer';
    } 
  
   if($slug_name == 'farmer' || $slug_name == 'fpo' || $slug_name == 'trader' || $slug_name == 'processor' || $slug_name == 'buyer'){ 
     $this->db->select('*');  
     $this->db->where('pr_id', $id);
     $querys = $this->db->get($pr_table);
  
     $this->db->select('*');    
    $this->db->where('id', $id);
    $query = $this->db->get($table_name);
  
  }
  else{
    $this->db->select('*');    
    $this->db->where('id', $rid);
    $query = $this->db->get($table_name);
  }
  // get user detail
    
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row)
      {
  
        $state = $row['state'];
        $city = $row['city'];
        $card = '';
        $cardlable = '';
        if(!empty($row['pancard'])){
          $card = $row['pancard'];
          $cardlable = 'Pan Card Number';
        }else{
          $card = $row['gst'];
          $cardlable = 'GST Number';
        }
        $certificate = '';
        if(!empty($row['certification'])){
          $certificate = '<label class="control-label col-sm-3" for="text"><i class="fa fa-certificate" aria-hidden="true"></i>  Certification:</label>
        <div class="col-sm-3">
        <p class="form-control-static">'.$row['certification'].'</p>
        </div>';
        }
  
        $certify_img = '';
        if(!empty($row['certify_img'])){
          $certify_img = ' <label class="control-label col-sm-3" for="text">Certification Image:</label>
        <div class="col-sm-3">
        <div class="c_img">
         <button class=" getImageModal"  data-val="../upload/certificate/'.$row['certify_img'].'"> <img src="../upload/certificate/'.$row['certify_img'].'" alt="organic world" class="img-responsive img-thumbnail pmodal_img" /></button>
        
        </div>
        </div>';
        }
  // get state name
        $this->db->select('*')->from('states');
        $this->db->where('id', $state);
        $this->db->order_by('name', 'asc');
        $qState=$this->db->get();

       if ($qState->num_rows() > 0)
{
             $row_s=$qState->result_array();
             $state_name = $row_s[0]['name'];
}
  
  //get city name
  
        $this->db->select('*')->from('cities');
        $this->db->where('id', $city);
        $this->db->order_by('name', 'asc');
        $qCity=$this->db->get();

       if ($qCity->num_rows() > 0)
{
             $row_c=$qCity->result_array();
             $city_name = $row_c[0]['name'];
}
        echo '
        <div class="modal-content profile-modal">
        <div class="form-horizontal">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="full-width-modalLabel"><strong class="text-green">User Detail of '.$slug_name.' </strong></h4>
        </div>
        <div class="modal-body">
        <div class="row">
        <div class="col-md-3">
        <div class="p_img">
        <img src="../upload/profile/'.$row['profile'].'" alt="organic world" class="img-responsive img-thumbnail pmodal_img" />
        </div>
        </div>
        <div class="col-md-9">
        <div class="form-horizontal">
        <div class="form-group">
        <label class="control-label col-sm-2" for="full name">Full Name:</label>
        <div class="col-sm-6">
        <p class="form-control-static">'.$row['fullname'].'</p>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="username">UserName:</label>
        <div class="col-sm-6">
        <p class="form-control-static">'.$row['username'].'</p>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Email Id:</label>
        <div class="col-sm-4">
        <p class="form-control-static">'.$row['email'].'</p>
        </div>
        <label class="control-label col-sm-2" for="mobile"><i class="fa fa-phone" aria-hidden="true"></i> Mobile:</label>
        <div class="col-sm-4">
        <p class="form-control-static">'.$row['mobile'].'</p>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="text">State:</label>
        <div class="col-sm-4">
        <p class="form-control-static">'.$state_name.'</p>
        </div>
        <label class="control-label col-sm-2" for="text">City:</label>
        <div class="col-sm-4">
        <p class="form-control-static">'.$city_name.'</p>
        </div>
        </div>
        </div>
        </div>
        </div>
  
        <div class="row">
        <div class="col-sm-12">
        <div class="form-horizontal">
        <div class="form-group">
        <label class="control-label col-sm-3" for="email"><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</label>
        <div class="col-sm-9">
        <p class="form-control-static">'.$row['address'].'</p>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-3" for="text"><i class="fa fa-id-card-o" aria-hidden="true"></i> '.$cardlable.':</label>
        <div class="col-sm-3">
        <p class="form-control-static">'.$card.'</p>
        </div>
        <label class="control-label col-sm-3" for="text"><i class="fa fa-id-card-o" aria-hidden="true"></i> Aadhar Card Number:</label>
        <div class="col-sm-3">
        <p class="form-control-static">3242 5252 5252</p>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-3" for="email"><i class="fa fa-book" aria-hidden="true"></i> Your Story:</label>
        <div class="col-sm-6">
        <p class="form-control-static">'.$row['story'].'</p>
        </div>
        </div>
        <div class="form-group">
        
        '.$certificate.'
        '.$certify_img.'
        </div>
        </div>
        </div>
        </div>'; 
  
  if(!empty($pr_table)){
    echo '
        <div class="row">
        <div class="col-md-12">
        <h4 class="modal-title"><strong class="text-green">Product Detail</strong></h4>
        </div>
        </div>
        <hr/>
        ';
        if($querys->num_rows() > 0){
          foreach ($querys->result_array() as $rows)
          {
   $pr_image = '';
        if(!empty($rows['pr_image'])){
          $pr_image = $rows['pr_image'];
        }else{
          $pr_image = 'frame.png';
        }
            echo '  
            <div class="row">
            <div class="col-md-3">
            <div class="p_img">
             <button class=" getImageModal"  data-val="../upload/product/'.$pr_image.'">
              <img src="../upload/product/'.$pr_image.'" alt="organic world" class="img-responsive img-thumbnail pmodal_img" /></button>
            
            </div>
            </div>
            <div class="col-md-9">
            <div class="form-horizontal">
            <div class="form-group">
            <label class="control-label col-sm-3" for="email">Product Name: </label>
            <div class="col-sm-9">
            <p class="form-control-static">'.$rows['pr_name'].'</p>
            </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-4" for="">Availability:- From</label>
            <div class="col-sm-3">
            <p class="form-control-static">'.$rows['pr_avlFrom'].'</p>
            </div>
            <label class="control-label col-sm-2" for="">To:</label>
            <div class="col-sm-3">
            <p class="form-control-static">'.$rows['pr_avlTo'].'</p>
            </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-4" for="text">Price:</label>
            <div class="col-sm-3">
            <p class="form-control-static">'.$rows['pr_price'].'/-</p>
            </div>
            <label class="control-label col-sm-2" for="text">Quantity:</label>
            <div class="col-sm-3">
            <p class="form-control-static">'.$rows['pr_qty'].'</p>
            </div>
            </div>
            </div>
            </div>
            </div>
            <br/>
            ';
          }
        }
      }
        '
        </div>
        </div>
        ';
      }
    }else{
      return false;
    }
  }
  }
  
  ?>