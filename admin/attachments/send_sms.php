	<?php	
	function send_sms($firstnames, $permit, $permit_status, $mobile_no){
	
	$url = 'http://bulksms.2way.co.za/eapi/submission/send_sms/2/2.0';
	$msg = 'Hi '.$firstnames;
	$msg .= ' your '.$permit.' is '.$permit_status;
	$msg .= '. From Global Migration SA. Visit: http://remote.gmims.co.za';
	$data = 'username=Globalimsa&password=mapapa@1531&message='.urlencode($msg).'&msisdn='.urlencode($mobile_no);

	$response = do_post_request($url, $data);

	print $response;

	
	}
	
	function do_post_request($url, $data, $optional_headers = 'Content-type:application/x-www-form-urlencoded') {
		$params = array('http'      => array(
			'method'       => 'POST',
			'content'      => $data,
			));
		if ($optional_headers !== null) {
			$params['http']['header'] = $optional_headers;
		}
	
		$ctx = stream_context_create($params);


		$response = @file_get_contents($url, false, $ctx);
		if ($response === false) {
			print "Problem reading data from $url, No status returned\n";
		}
	
		return $response;
	}
	
?>