<?

/*
aws ec2 implement client

*/

/*
@see aws ec2 interface	
*/
require_once('Amazon/EC2/Interface.php');

/**
	the aws Elastic compute cloud(aws EC2) web service provides you  with the ability to execute your app in amazon's computing env.
	to use amazon ec2 you simply:
*/

class Amazon_EC2_Client implements Amazon_EC2_interface
{

	const SERVICE_VERSION = '2009-11-30';

	//setting the attribute
	private $_awsAccessKeyId = null;

	private $_awsSecretAccessKey = null;

	private $_config = array(
		'ServiceURL' => 'https://ec2.amazonaws.com',
		'UserAgent' => 'Amazon EC2 PHP5 Library',
		'SignatureVersion' => 2,
		'SignatureMethod' => 'HmacSHA256',
		'ProxyHost' => null,	
		'ProxyPort' => -1,
		'MaxErrorRetry' => 3
	);

	/*
	construct new client
	
	@param string $awsAccessKeyId AWS Access Key ID
	@param string $awsSecretAccessKey AWS secret access key
	@param array $config configuration options.
	valid configuration options are:

	<ul>
	<li> serviceURL </li>
	<li> UserAgent </li>
	<li> SingatureVersion </li>
	<li> TimesREtryOnError </li>
	<li> ProxyHost </li>
	<li> ProxyPort </li>
	<li> MaxErrorRetry </li>
	</ul>
	*/
	public function __construct($awsAccessKeyId, $awsSecretAccessKey, $config = null)
	{
		//setting input and output encoding code
		iconv_set_encoding('output_encoding', 'UTF-8');
		iconv_set_encoding('input_encoding', 'UTF-8');
		iconv_set_encoding('internal_encoding', 'UTF-8');

		$this->_awsAccessKeyId = $awsAccessKeyId;
		$this->_awsSecretAccessKey = $awsSecretAccessKey;
		//check config datas
		if(!is_null($config)){
			$this->_config = array_merge(
				$this->_config,
				$config
			);
		}
	}

	/**
	Allocate address
	the AllocateAddress operation acquires an elastic IP address for use with your account.
	     * @see http://docs.amazonwebservices.com/AWSEC2/2009-11-30/DeveloperGuide/ApiReference-Query-AllocateAddress.html
     * @param mixed $request array of parameters for Amazon_EC2_Model_AllocateAddressRequest request
     * or Amazon_EC2_Model_AllocateAddressRequest object itself
     * @see Amazon_EC2_Model_AllocateAddress
     * @return Amazon_EC2_Model_AllocateAddressResponse Amazon_EC2_Model_AllocateAddressResponse
     *
     * @throws Amazon_EC2_Exception
	*/
	public function allocateAddress($request)
	{
		if($request instanceof Amazon_EC_Model_ALLocateAddressRequest){
			require_once('Amazon/EC2/M');
		}


	}

}



/***************************************************************************************************************/



//setting the aws ec2 interface datas
/*
the aws elastic compute cloud (ec2) web service provides you with
the ability to execute your applications in aws computing enviroment.
to use ec2 you simply:

1. create an amazon machine image (AMI) containing all your software, including
your operating system and associated configuration settings, applications,
libraries, etc. Think of this as zipping up the contents of your hard drive. 
we privode all the necessary tools to crate and package your AMI.

2.upload this AMI to the amazon S3 (amazon simple storage service) service. this 
gives us reliable, secure access to your AMI.

3. register your AMI with amazon ec2. this allows us to verify that your AMI has
been uploaded correctly and to allocate a unique identifier for it.

4.Use this AMI id and the amazon ec2 web service apis to run, monitor, 
and terminate as many instances of this AMI as required.

you can also skip the first three steps and choose to launch an AMI that is
provided by amazon or shared by another user.
 while instance are running, you are billed for the computing and network
 resources that they consume.

 you can also skip the first three steps and choose to launch an AMI that is 
 provided by Aws or shared by another user. 
*/

interface Amazon_EC2_interface
{

	//setting the funciton datas
	/*
	allocate address
	-the allocateAddress operation acquires an elastic IP address for use with your account.

     * account.  
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-11-30/DeveloperGuide/ApiReference-Query-AllocateAddress.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_AllocateAddressRequest request
     * or Amazon_EC2_Model_AllocateAddressRequest object itself
     * @see Amazon_EC2_Model_AllocateAddressRequest
     * @return Amazon_EC2_Model_AllocateAddressResponse Amazon_EC2_Model_AllocateAddressResponse
     *
     * @throws Amazon_EC2_Exception
	*/
	public function allocateAddress($request);


	/*
	Associate address
	-the associateAddress opeartion associates an elastic IP address with an instance.
	-If the IP address is currently assigned to another instance, the IP address is
	assigned to the new instance. This is an idempotent opeation. If you enter it
	more thatn once, amazon ec2 does not return an error.
     * @see http://docs.amazonwebservices.com/AWSEC2/2009-11-30/DeveloperGuide/ApiReference-Query-AssociateAddress.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_AssociateAddressRequest request
     * or Amazon_EC2_Model_AssociateAddressRequest object itself
     * @see Amazon_EC2_Model_AssociateAddressRequest
     * @return Amazon_EC2_Model_AssociateAddressResponse Amazon_EC2_Model_AssociateAddressResponse
     *
     * @throws Amazon_EC2_Exception
	*/
	public function associateAddress($request);


	/*
	Attach Volume
	-attach a previously created volume to a running instance.
	     * @see http://docs.amazonwebservices.com/AWSEC2/2009-11-30/DeveloperGuide/ApiReference-Query-AttachVolume.html      
     * @param mixed $request array of parameters for Amazon_EC2_Model_AttachVolumeRequest request
     * or Amazon_EC2_Model_AttachVolumeRequest object itself
     * @see Amazon_EC2_Model_AttachVolumeRequest
     * @return Amazon_EC2_Model_AttachVolumeResponse Amazon_EC2_Model_AttachVolumeResponse
     *
     * @throws Amazon_EC2_Exception
	*/
	public function attachVolume($request);


	/*
	authorize security group Ingress
	-The authorizeSecurityGroupIngress operation adds permissions to a security group.
	-Permissions are specified by the IP protocol (TCP, UDP or ICMP), the source of 
	the request (by IP)
todo: pending......
	*/
	public function authorizeSecurityGroupIngress($request);

}


?>
