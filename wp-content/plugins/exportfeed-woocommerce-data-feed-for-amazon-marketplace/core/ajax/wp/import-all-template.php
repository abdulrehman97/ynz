<?php 

Class ImportTemplate {
	
	function __construct(){

	}

	public function getTemplates($country){
		// global $wpdb;
		// $table = $wpdb->prefix.'amwscp_amazon_services_templates';
		// $sql = "SELECT * FROM $table WHERE country = '$country' ";
        //       $data = $wpdb->get_results($sql);
        $url = 'https://services.exportfeed.com/init.php';
        $postfields = array(
                           'fetch' => '1',
                           'country' => $country,
                          );
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($ch);
		$data = json_decode($data);

	    if (curl_errno($ch))
	        $this->error_message = 'Curl error: ' . curl_error($ch);

	    curl_close($ch);
         // echo "<pre>";
         // print_r($data->results->results);exit;
        $html = $this->buildhtml($data->results->results);
        return $html;
	}

	public function buildhtml($data=array()){
		if(count($data)>0){
			$html = '<ul>';
			foreach($data as $option){
                 $html .= '<div id="amazon_product_category_'.$option->id.'" class="btg-node-category selected" onclick=\'return amwscp_doSelectCategory("Amazonsc","'.$option->meta_name.'",'.$option->id.',"'.$option->marketplace_code.'");\'>
                     <li class ="fetch-item-type">'.$option->meta_name.'<span class="list-icon-arrow-right"></span></li>
				     <input id="item_type_'.$option->meta_name."_".$option->id.'" type="hidden" name="amazon_category" value="'.$option->id.'">
				</div>';
			}
			$html .= '</ul>';
			
			return $html;
		}
		return null;
	}


}
$country = isset($_POST['country']) ? $_POST['country'] : 'US';
$templateObject = new ImportTemplate();
$allTemplates = $templateObject->getTemplates($country);
$response = array('status'=>'success','html'=>$allTemplates);
echo json_encode($response);
die;