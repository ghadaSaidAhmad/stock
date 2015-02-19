<?php
class FirstData
{
	protected $host = "api.demo.globalgatewaye4.firstdata.com";
	protected $protocol = "https://";
	protected $uri = "/transaction/v14";

	/*Modify this acording to your firstdata api stuff*/
	protected $hmackey = "NJ8I4pbrNNTwzq9624G0y0jDiUv8qmzq";
	protected $keyid = "207467";
	protected $gatewayid = "AH4411-05";
	protected $password = "224df6gaa3d4lp15h2392gwyw8056ny7";


	public function request( $cardholder_name, $cc_number, $cc_expiry , $cvd_code , $amount,  $refernece_number=NULL, $customer_ref =NULL)
	{
		$location = $this->protocol . $this->host . $this->uri;
		$request = array(
				'transaction_type' => "00",
				'amount' => $amount,
				'cc_expiry' => $cc_expiry,
				'cc_number' => $cc_number,
				'cvd_code' =>  $cvd_code,
				'cardholder_name' => $cardholder_name,
				'reference_no' => $refernece_number,
				'customer_ref' =>  $customer_ref,
				'gateway_id' => $this->gatewayid,
				'password' => $this->password,
		);

		$content = json_encode($request);

		//var_dump($content);

		$gge4Date = strftime("%Y-%m-%dT%H:%M:%S", time()) . 'Z';
		$contentType = "application/json";
		$contentDigest = sha1($content);
		$contentSize = sizeof($content);
		$method = "POST";

		$hashstr = "$method\n$contentType\n$contentDigest\n$gge4Date\n$this->uri";

		$authstr = 'GGE4_API ' . $this->keyid . ':' . base64_encode(hash_hmac("sha1", $hashstr, $this->hmackey, true));


		$headers = array(
				"Content-Type: $contentType",
				"X-GGe4-Content-SHA1: $contentDigest",
				"X-GGe4-Date: $gge4Date",
				"Authorization: $authstr",
				"Accept: $contentType"
		);

		//Print the headers we area sending
		//var_dump($headers);


		//CURL stuff
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $location);

		//Warning ->>>>>>>>>>>>>>>>>>>>
		/*Hardcoded for easier implementation, DO NOT USE THIS ON PRODUCTION!!*/
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		//Warning ->>>>>>>>>>>>>>>>>>>>

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $content);

		//This guy does the job
		$output = curl_exec($ch);

		//echo curl_error($ch);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = $this->parseHeader(substr($output, 0, $header_size));
		$body = substr($output, $header_size);

		curl_close($ch);
		//Print the response header
		//var_dump($header);

		/* If we get any of this X-GGe4-Content-SHA1 X-GGe4-Date Authorization
		* then the API call is valid */
		if (isset($header['authorization']))
		{
		//Ovbiously before we do anything we should validate the hash
			//var_dump(json_decode($body));
			return json_decode($body) ;
		}
	//Otherwise just debug the error response, which is just plain text
		else
		{
			return $body;
		}
	}

	
	public function requestBank($cardholder_name , $check_number, $check_type , $account_number , $bank_id , $amount ,  $customer_id_type , $customer_id_number , $refernece_number= NULL , $customer_ref = NULL )
	{
		$location = $this->protocol . $this->host . $this->uri;
		
		$request = array(
				'transaction_type' 	=> "00",
				'amount' 			=> $amount,
				'check_number' 		=> $check_number,
				'check_type' 		=> $check_type ,
				'account_number' 	=> $account_number,
				'bank_id' 			=> $bank_id , 
				'cardholder_name' 	=> $cardholder_name,
				'customer_id_type' 	=> $customer_id_type,
				'customer_id_number'=> $customer_id_number,
				'reference_no' 		=> $refernece_number,
				'customer_ref' 		=> $customer_ref,
				'gateway_id' 		=> $this->gatewayid,
				'password' 			=> $this->password
		);
	
		$content = json_encode($request);
	
		//var_dump($content);
	
		$gge4Date = strftime("%Y-%m-%dT%H:%M:%S", time()) . 'Z';
		$contentType = "application/json";
		$contentDigest = sha1($content);
		$contentSize = sizeof($content);
		$method = "POST";
	
		$hashstr = "$method\n$contentType\n$contentDigest\n$gge4Date\n$this->uri";
	
		$authstr = 'GGE4_API ' . $this->keyid . ':' . base64_encode(hash_hmac("sha1", $hashstr, $this->hmackey, true));
	
	
		$headers = array(
				"Content-Type: $contentType",
				"X-GGe4-Content-SHA1: $contentDigest",
				"X-GGe4-Date: $gge4Date",
				"Authorization: $authstr",
				"Accept: $contentType"
		);
	
		//Print the headers we area sending
		//var_dump($headers);
	
	
		//CURL stuff
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $location);
	
		//Warning ->>>>>>>>>>>>>>>>>>>>
		/*Hardcoded for easier implementation, DO NOT USE THIS ON PRODUCTION!!*/
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		//Warning ->>>>>>>>>>>>>>>>>>>>
	
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
	
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
	
		//This guy does the job
		$output = curl_exec($ch);
	
		//echo curl_error($ch);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = $this->parseHeader(substr($output, 0, $header_size));
		$body = substr($output, $header_size);
	
		curl_close($ch);
		//Print the response header
		//var_dump($header);
	
		/* If we get any of this X-GGe4-Content-SHA1 X-GGe4-Date Authorization
			* then the API call is valid */
		if (isset($header['authorization']))
		{
			//Ovbiously before we do anything we should validate the hash
			//var_dump(json_decode($body));
			return json_decode($body);
		}
		//Otherwise just debug the error response, which is just plain text
		else
		{
			echo $body;
		}
	}
	
	
	private function parseHeader($rawHeader)
	{
		  $header = array();
	
		  //http://blog.motane.lu/2009/02/16/exploding-new-lines-in-php/
		  $lines = preg_split('/\r\n|\r|\n/', $rawHeader);
	
		  foreach ($lines as $key => $line)
		  {
			  $keyval = explode(': ', $line, 2);
		
				if (isset($keyval[0]) && isset($keyval[1]))
				{
					$header[strtolower($keyval[0])] = $keyval[1];
		  		}
		}

		return $header;
	}
}
?>