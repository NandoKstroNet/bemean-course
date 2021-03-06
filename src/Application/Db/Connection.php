<?php
namespace Application\Db;

use \PDO;

class Connection extends \PDO
{
	/**
	 * @var String
	 */
	private $host = '';

	/**
	 * @var String
	 */
	private $dbname = '';
	
	/**
	 * @var String
	 */
	private $user = '';
	
	/**
	 * @var String
	 */
	private $password = '';


	/**
	 * Realize connect with database
	 * @param array $data  
	 */
	public function __construct(array $data = null)
	{
		if(is_null($data)) {
			$data = $this->prepareCredentials();
		}

		try {
	
			$dsn = 'mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'];
			
			$con = parent::__construct($dsn, $data['user'], $data['password']);

			$this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			
			return $con;
		
		} catch(PDOexception $e) {
			return 'Sorry, not connect to database! :\'(';
		}
	}

	/**
	 * Prepare credentials case not loading credentials in construct
	 * @return array With crenditials Defaults this class
	 */
	private function prepareCredentials()
	{
		return array(	
			'host'        =>  $this->host,
			'dbname'      =>  $this->dbname,
			'user'        =>  $this->user,
			'password'    =>  $this->password
		);
	}
}