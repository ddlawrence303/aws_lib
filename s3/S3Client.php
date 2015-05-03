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

	/**
	Default delimiter to be used, for example while getBucket()

	@var string
	@access pubic
	@access static
	*/
	public static $defDelimiter = null;

	/*
	aws uri position

	@var string
	@access pubic
	@static
	*/
	public static $endpoint = 's3.amazonaws.com';

	/*
	proxy information
	
	@var null|array
	@acess public
	@static
	*/
	public static $proxy = null;

	/*
	connect using SSL?

	@var bool
	@access public
	@static
	*/
	public static $useSSL = false;

	/*
	use ssl validation

	@var bool
	@access public
	@static
	*/
	public static $useSSLValidation = true;

	/*
	use php exceptions
	*/
	public static $useExceptions = false;

	/*
	time offset applied to time()

	*/
	private static $__timeOffset = 0;

	/*
	ssl client key
	@var bool
	@access public
	@static
	*/
	public static $sslKey = null;

	/*
	ssl client certificate datas

	@var string
	@access public
	@static
	*/
	public static $sslCert = null;

	/*
	SSL CA cert (only required if you are having problems with your system CA certification)
	*/
	public static $sslCACert = null;

	/*
	aws key pair id
	@var string
	@access private
	@static
	*/
	private static $__signingKeyPairId = null;

	/*
	key resource, freeSigningKey() must be called to clear it from memory

	@var bool
	@access private
	@static
	*/
	private static $__signingKeyResource = false;

	/**
	constructor - if you're not using the class statically

	@param string $accessKey Access Key
	@param string $secretKey Secret key
	@param boolean $useSSL enable ssl
	@param string $endpoint aws uri
	@return void
	*/
	public fucntion __construct($accessKey = null, $secretKey = null, $useSSL = false, $endpoint = 's3.amazonaws.com')
	{


	}

	/*
	set the service endpoint

	@param string $host Hostname
	*/
	public function setEndpoint($host)
	{

	}

	/*
	set aws access key and secret key

	@param string $accessKey access key
	@param string $secretKey secret key
	*/
	public static function setAuth($accessKey, $secretKey)
	{


	}

	/*
	check if aws keys have been set
	*/
	public static function hasAuth()
	{

	}

	/*
	set ssl function on or off

	@param boolean $endabled SSL enable
	$param boolean $validate SSL certificate validation
	*/
	public static function setSSL($enable, $validate = true)
	{

	}

	/*
	set ssl client certificates (experimental)
	@param string $sslCert SSL client ceritificate
	@param string $sslKey ssl client key
	@string $sslCACert SSL CA cert (only required if your having problems with your system CA cert)
	*/
	public static function setSSLAuth($sslCert = null, $sslKey = null, $sslCACert = null)
	{

	}


	/**
	set proxy information
	@param string $host Proxy hostname and port ()
	@param string $user Proxy username
	@param string $pass Proxy password
	@param constant $type curl proxy type
	**/
	public static function setProxy($host, $user = null, $pass = null, $type = CURLPROXY_SOCKS5)
	{

	}

	/**
	set the error mode to exceptions

	@param boolean $enabled enable exception
	@return void
	*/
	public static function setExceptions($enabled = true)
	{

	}

	/*
	set aws time correction offset (use carefully)

	this can be used when an inaccurate system time is generating
	invalid request signatures. It should only be used as a last
	resort when the system time cannot be changed.
	*/
	public static function setTimeCorrectionOffset($offset = 0)
	{

	}

	/*
	set signing key

	@param string $keyPairId :: aws key pair id
	@param string $signingKey 
	*/
	public static function setSigningKey($keyPairId, $signingKey, $isFile = true)
	{

	}

	/*
	free siging key from memory, must be called if you are using setSigningKey()
	@return void
	*/
	public static function freeSigningKey()
	{

	}

	/*
	internal error handler
	@internal internal error handler
	@param string $message Error message
	@param string $file filename
	@param integer $line Line number
	@param integer $code Error code
	@return void
	*/
	private static function __triggerError($message, $file, $line, $code = 0)
	{

	}

	/*
	get a list of buckets
	@param boolean $detailed returns detailed bucket list when true
	@return array| false
	*/
	public static function listBuckets($detailed = fales)
	{

	}

	/*
	Get contents for a bucket

	if maxKeys is null, this method will loop through truncated result sets

	@param string $bucket Bucket name
	@param string $prefix Prefix
	@param string $marker Marker (last file listed)
	@param string $MAXkEYS mAX KEYS (MAXIMUM NUMBER OF KEYS TO RETURN)
	@param string $delimiter Delimiter
	@param boolean $returnCommonPrefixes :: Set to true to return commonPrefixes
	@return array|false
	*/
	public static function getBucket($bucket, $prefix = null, $marker = null, $maxKeys = null, $delimiter = null, $returnCommonPrefixes = false)
	{

	} 

	/*
	put a bucket

	@param string $bucket Bucket name
	@param constant $acl ACL flag
	@param string $location Set as 'EU' to create buckets hosted in Europe
	@return boolean
	*/
	public static function putBucket($bucket, $acl = self::ACL_PRIVATE, $location = false)
	{

	}

	/*
	delete an empty bucket

	@param string $bucket Bucket name
	@return boolean
	*/
	public static function deleteBucket($bucket)
	{

	}

	/*
	create input info array for pubObject()
	@param string $file input file
	@param mixed $md5sum :: use md5 has (supply a string if you wan t to use your own)
	@return array | false
	*/
	public static function inputFile($file, $md5sum = true)
	{

	}

	/*
	create input array info for putObject() with a resource

	@param string $resource input resource to read from
	@param integer $bufferSize Input byte size
	@param string $md5sum MD has to send(optional)
	@return array | false
	*/
	public static function inputResource(&$resource, $bufferSize = false, $md5sum = '')
	{

	}

	/*
	put an object

	@param mixed $input Input data
	@param string $bucket Bucket name
	@param string $uri Object URI
	@param constant $acl ACL constant
	@param array $metaHeaders Array of x-amz-meta-* headers
	@param array $requestHeaders Array of request headers or content type as a string
	@param constant $storageClass storage class constant
	$param constant $serverSideEncryption Server-side encryption
	@return boolean
	*/
	public static function putObject($input, $bucket, $uri, $acl=self::ACL_PRIVATE, $metaHeaders = array(), $requestHeaders = array(), $requestHeaders = array(), $storageClass = self::STORAGE_CLASS_STANDARD, $serverSideEncryption = self::SSE_NONE)
	{

	}

	/*
	put an object from a file (legacy function)

	@param string $file Input file path
	@param string $bucket Bucket name
	@param string $uri Object uri
	@param constanct $cal ACL constacnt
	....
	*/
	public static function putObjectFile($file, $bucket, $uri, $acl = self::ACL_PRIVATE, $metaHeaders = array(), $contentType = null)
	{

	}

	/*
	put an object from a string (legacy function ?)
	@param string $string Input data
	@param string $bucket Bucket name
	@param string $uri Object uri
	@param constancet $acl acl constant
	@param array $metaHeaders Array of x-amz-meta-* headers
	@param string $contentType Content type

	*/
	public static function putObjectString($string, $bucket, $uri, $acl = self::ACL_PRIVATE, $metaHeaders = array(), $contentType = 'text/palin')
	{

	}

	/*
	get an object
	@param string $bucket Bucket name
	@param string $uri Object uri
	@param mixed $saveTo filename or resource to write to
	@return mixed
	*/
	public static function getObject($bucket, $uri, $saveTo = false)
	{

	}

	/*
	get object information

	@param string $bucket Bucket name
	@param string $uri Object uri
	@param boolean $returnInfo Return response information
	@return mixed | false
	*/
	public static function getObjectInfo($bucket, $uri, $returnInfo = true)
	{

	}

	/*
	Copy an object

	@param string $srcBucket source bucket name
	@param string $srcUri srouce object uri
	@param string $bucket Destination bucket name
	@param string $uri destination object uri
	
	*/
	public static function copyObject($srcBucket, $srcUri, $bucket, $uri, $acl = self::ACL_PRIVATE, $metaHeaders = array(), $requestHeaders = array(), $storageClass = self::STORAGE_CLASS_STANDARD)
	{

	}
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
