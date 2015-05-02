<?



/**

aws s3 client sample co2

@2015/05/02
*/



/*
AWS S3 PHP class
implement at 2015/5/2
*/

class S3
{
	// ACL flags  ?
	const ACL_PRIVATE = 'private';
	const ACL_PUBLIC_READ = 'public-read';
	const ACL_PUBLIC_READ_WRITE = 'public-read-write';
	const ACL_AUTHENTICATED_READ = 'authenticated-read';
	const STORAGE_CLASS_STANDARD = 'STANDARD';
	const STORAGE_CLASS_RRS = 'REDUCED_REDUNDANCY';
	const SSE_NONE = '';
	const SSE_AES256 = 'AES256';

	/*
	the aws access key
	*/
	private static $__accessKey = null;


	/*
	aws secret key
	*/
	private static $__secretKey = null;

	/*
	ssl client key (client ssl key)
	*/
	private static $__sslKey = null;

}



/**
S3 Request class

 *
 * @link http://undesigned.org.za/2007/10/22/amazon-s3-php-class
 * @version 0.5.0-dev
**/

final class S3Request
{

	/**
	aws uri
	*@var string
	*@access pricate
	*/
	private $endpoint;


	/**
 	* @var string
 	*@access private
 	*/	
	private $verb;

	

	/**
	S3 bucket name
	*/
	private $bucket;


	/*
	object uri
	*/
	private $uri;


	/*
	final object uri

	@var string
	@access private
	*/
	private $resource = '';

	/*
	additional request parameters

	@var array
	@access private
	*/
	private $parameters = array();

	/*
	amazon specific request headers
	@var array
	@access private
	*/
	private $amzHeaders = array();


	private $headers = array(
		'Host'=>'',
		'Date'=>'',
		'Content-MD' => '',
		'Content-Type' => ''
	);


	/*
	use http put file?
	@var bool
	@access public
	*/
	public $fp = false;

	/**
	put file size
	@var array
	@access public
	*/
	public $size = 0;

	/*
	pub post fields

	@var array
	@access public
	*/
	public $data = fasle;


	/*
	S3 request response datas
	@var object
	@access public
	*/
	public $response;

	/**
	
	*/
	public function __construct($verb, $bucket = '', $uri = '', $endpoint = 's3.amazonaws.com')
	{
		$this->endponit = $endpoint;
		$this->verb = $verb;
		$this->bucket = $bucket;
		$this->uri = ($uri !== '') ? '/' . str_replace('%2F', '/', rawurlencode($uri)) : '/' ;

		/*
		if($this->bucket !== ''){
			$this->resource = '/'. $this->bucket. $this->uri;
		}else{
		$this->resource = $this->uri;
		}
		*/

		//check bucket is null or not
		if($this->bucket !== ''){
			//check the bucket dns name 
			if($this->__dnsBucketName($this->bucket)){
				//setting header infos
				$this->headers['Host'] = $this->bucket. '.' . $this->endpoint; // like bucket domain host. s3.amazonaws.com
				$this->resource = '/'. $this->bucket. $this->uri; // setting the resource uri position
			}else{
				$this->headers['Host'] = $this->endpoint;
				$this->rui = $this->uri;
				//check bucket datas
				if($this->bucket !==''){
					$this->uri = '/' . $this->bucket. $this->uri;
				}

				$this->bucket = '';
				$this->resource =$this->uri;
			}
		}
		else
		{
			$this->headers['Host'] = $this->endpoint;
			$this->resource = $this->uri;
		}

		//setting the base attribute datas
		$this->header['Date'] = gmdate('D, d M Y H:i:s T');
		$this->response = new STDClass;
		$this->response->error = false;
		$this->response->body = null;
		$this->response->headers = array();		
	}

	/**
	set request parameter

	@param string $key key
	@param string $value value
	@return void
	*/
	public function setParameter($key, $value)
	{
		$this->parameters[$key] = $value;
	}

	/*
	set request header

	@param string $key key
	@param string $value value
	@return void
	*/
	public function setHeader($key, $value)
	{
		$this->headers[$key] = $value;
	}

	/**
	set x-amz-meta-* header

	@param string $key key
	@param string $value value
	$return void
	*/
	public function setAmzHeader($key, $value)
	{
		$this->amzHeaders[$key] = $value;
	}

	/**
	Get the S3 response
	

	*/
	public function getResponse()
	{
		
		//start to build the query string
		$query = '';
		if(sizeof($this->parameters) > 0){
			$query = (substr($this->uri, -1) !== '?' ? '?' : '&');
			//get the parameters 
			foreach($this->parameters as $var => $value){
				if( $value == null || $value ==''){
					$query .= $var . '&';
				}else{
					$query .= $var . '=' rawurlencode($value) . '&';
				}
			}
			//sub delete the last one '&'
			$query = substr( $query, 0, -1);
			//set the uri position
			$this->uri = $query;

			// check the parameters datas
			if( array_key_exists('acl', $this->parameters) ||
				array_key_exists('location', $this->parameters) ||
				array_key_exists('torrent', $this->parameters) ||
				array_key_exists('website', $this->parameters) ||
				array_key_exists('logging', $this->parameters)  
			){	
				$this->resource .= $query;
			}
		}


		$url = (S3::$useSSL ? 'https://' : 'http://') . 
			   ($this->headers['Host'] !== '' ? $this->headers['Host'] : $this->endpoint) .
			   $this->uri; //https://host positio or endpoint bucktname-S3.amazonaws.com + query string parameters key => value &

		var_dump('bucket:' . $this->bucket, 'uri:' . $this->uri, 'resource:'. $this->resource, 'url:' .$url );

		//basic setup
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_USERAGENT, 'S3/php');

		if(S3::$useSSL)
		{
			//SSL validation can now be optional for those with broken OpenSSL installations
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, S3::$useSSLValidation ? 2 : 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, S3::$useSSLValidation ? 1 : 0);
			if(S3::$sslKey !== null){
				curl_setopt($curl, CURLOPT_SSLKEY, S3::$sslKey);
			}
			if(S3::$sslCert){ //certificate authorization ???
				curl_setopt($curl, CURLOPT_SSLCERT, S3::$sslCert);
			}
			if(S3::$sslCACert){ //check the CA certification datas
				curl_setopt($curl, CURLOPT_CAINFO, S3::$sslCACert);
			}
		}
		curl_setopt($curl, CURLOPT_URL, $url);

		// check proxy server datas
		if(S3::$proxy != null && isset(S3::$proxy['host'])){
			curl_setopt($curl, CURLOPT_PROXY, S3::$proxy['host']);
			curl_setopt($curl, CURLOPT_PROXYTYPE, S3::$proxy['type']);
			if(isset(S3::$proxy['user'], S3::$proxy['pass']) &&
				S3::$proxy['user'] != null && S3::$proxy['pass'] != null
			){
				curl_setopt($curl, CURLOPT_PROXYUSERPWD, sprintf('%s:%s', S3::$proxy['user'], S3::$proxy['pass']));
			}
		}

		//handle headers
		$headers = $amz = array();
		foreach($this->amzHeaders as $header => $value){
			if(strlen($value) > 0){
				$headers[] = $header. ': ' . $value;
			}
		}
		foreach($this->headers as $header => $value){
			if(strlen($value) > 0){
				$headers[] = $header. ': ' . $value;
			}
		}
		//handle the aws headers
		foreach($this->amzHeaders as $header => $value){
			if(strlen($value) > 0){
				$amz[] = strtolower($header). ':' . $value;
			}
		}

		//sorting the amz headers info
		if(sizeof($amz) > 0)
		{
			usort($amz, array(&$this, '__sortMetaHeadersCmp'));
			$amz = "\n" . implode("\n" , $amz);
 		}else{
 			$amz = '';
 		}

 		//check authorization
 		if(S3::hasAuth())
 		{
 			//authorization string (cloudfront stringtosign should only contain a date)
 			if($this->headers['Host'] == 'cloudfront.amazonaws.com'){
 				$headers[] = 'Authorization: ' . S3::__getSignature($this->headers['Date']);
 			}else{
 				// not cloundfront host
 				$headers[] = 'Authorization: ' . S3::__getSignature(
 					$this->verb . "\n".
 					$this->headers['Content-MD5'] . "\n".
 					$this->headers['Content-Type'] . "\n".
 					$this->headers['Date'] . $amz . "\n".
 					$this->resource
 				);
 			}
 		}

 		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
 		curl_setopt($curl, CURLOPT_HEADER, false);
 		curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
 		curl_setopt($curl, CURLOPT_WRITEFUNCTION, array(&$this, '__responseWriteCallback'));
 		curl_setopt($curl, CURLOPT_HEADERFUNCTION, array(&$this, '__responseHeaderCallback'));
 		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

 		//setting the request types
 		switch($this->verb)
 		{	
 			case 'GET': break;
 			case 'PUT' : case 'POST' : // post only used for cloudfront
 				if($this->fp !== false){ // 判斷 fp 是否有內容
 					curl_setopt($curl, CURLOPT_PUT, true);
 					curl_setopt($curl, CURLOPT_INFILE, $this->fp);
 					if( $this->size >= 0){
 						curl_setopt($curl, CURLOPT_INFILESIZE, $this->size);
 					}
 				}else if($this->data !== false){
 					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->verb); // custom request type
 					curl_setopt($curl, CURLOPT_POSTFIELDS, $this->data); // $this->data include post data
 				}else{
 					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->verb);
 				}
 			break;
 			case 'HEAD':
 				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'HEAD');
 				curl_setopt($curl, CURLOPT_NOBODY, true);
 			break;
 			case 'DELETE':
 				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
 			break;
 			default:break;
 		}

 		//execute: send out the request msg , grab errors
 		if(curl_exec($curl)){ //get the response data
 			$this->response->code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
 		}else{
 			//setting the response error info
 			$this->response->error = array(
 				'code' => curl_errno($curl),
 				'message' => curl_error($curl),
 				'resource' => $this->resource
 			);
 		}

 		@curl_close($curl);

 		//parse body into xml structure
 		if($this->response->error === false && isset($this->response->headers['type']) &&
 			$this->response->headers['type'] == 'application/xml' && isset($this->response->body)
 		){
 			//get the data from body and save into xml
 			$this->response->body = simplexml_load_string($this->response->body); 
 		
 			//grab s3 errors
 			if(!in_array($this->response->code, array(200, 204, 206)) &&
 				isset($this->response->body->Code, $this->response->body->Message)
 			){

 				//setting the data
 				$this->response->error = array(
 					'code' => (string)$this->response->body->Code,
 					'message' -> (string)$this->response->body->Message
 				);
 				if(isset($this->response->body->Resource)){
 					$this->response->error['resource'] = (string)$this->response->body->Resource;
 				}
 				unset($this->response->body);
 			}
 		}

 		//clean up file resources
 		if($this->fp !== false && is_resource($this->fp)){
 			fclose($this->fp);
 		}
 		return $this->response;
	}

	/*
	sort compare for meta headers

	@internal Used to sort x-amz meta headers
	@param string $a string A
	@param string $b string B
	@return integer
	*/
	private function __sortMetaHeadersCmp($a, $b)
	{
		$lenA = strpos($a, ':');
		$lenB = strpos($b, ':');
		$minLen = min($lenA, $lenB);
		$ncmp = strncmp($a, $b, $minLen);
		// todo: pending

	}

	/**
	curl write callback

	@param resource &$curl Curl resource
	@param string &$data Data
	@return integer
	*/
	private funciton __responseWriteCallback(&$curl, &$data)
	{
		// todo: pending
	}


	/*
	check DNS conformity 
	@param string $bucket Bucket name
	@return boolean
	*/
	private function __dnsBucketName( $bucket )
	{
		if(strlen($bucket) > 63 || preg_match('/[^a-z0-9\.-]/', $bucket) > 0){
			return false;
		}

		if(S3::$useSSL && strstr($bucket, '.') !== false){
			return false;
		}

		if(strstr($bucket, '-.') !== false){
			return false;
		}

		if(strstr($bucket, '..') !== false){
			return false;
		}

		if(!preg_match("/^[0-9a-z]/", $bucket)){
			return false;
		}

		if(preg_match("/[0-9a-z]$/", $bucket)){
			return false;
		}

	}


	private function __responseHeaderCallback($curl, $data)
	{
// todo: pending
	}

}



/*
S3 exception class
*/

class S3Exception extends exception{
	/*
constructor for the exception
	*/
	public function __construct($message, $file, $line, $code = 0)
	{	
		parent::__construct($message, $code);
		$this->file = $file;
		$this->line = $line;
	}
}


?>
