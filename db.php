<?

class DB {

	var $table = null;
	
	var $id = null;

	function __construct() {
	
		$this->connect();
	
	}
	
	function connect() {
	
		$this->connection = @mysql_connect( 'localhost', 'wducwor_angelika', 'pass4angelika' );
		
		@mysql_select_db( 'wducwor_angelika' );
	
	}
	
	public function initial_setup() {
		
		if( $this->connection ) {
			
			// check to see if the users table has been setup
			$result = @mysql_query( 'show tables like "users"' );
			
			if( @mysql_num_rows( $result ) == 0 ) {
				
				if( file_exists( 'db_setup.txt' ) ) {
					
					echo( 'trying to execute' );
					
					// run the setup and login
					// separate sql statements
					$sql = explode( ';', file_get_contents( 'db_setup.txt' ) );
					
					foreach( $sql as $query ) {
						
						mysql_query( $query );
					
					}
					
					header( 'Location: /login' );
					exit;
					
				}
				
			} else {
				
				header( 'Location: /login' );
				exit;
				
			}
		
		}
		
	}
	
	public function save( $fields ) {
	
		$this->id = $fields['id']?$fields['id']:null;
		
		$fieldlist = array();
	
		foreach( $fields as $name => $value ) {
		
			if( $name != 'id' && $name != 'submit' ) {
			
				$fieldlist[] = $name . "='" . addslashes( $value ) . "'";
				
			}
		
		}
		
		$fieldlist[] = "modified='" . date( 'Y-m-d H:i:s' ) . "'";
		
		if( $this->id ) {
			
			$sql = "update " . $this->table . " set " . implode( ', ', $fieldlist ) . " where id=" . $this->id;
			
			$return = mysql_query( $sql );
		
			if( !$return ) {
				
				echo( $sql );
				
			}
			
			return $return;
			
		} else {
		
			$fieldlist[] = "created='" . date( 'Y-m-d H:i:s' ) . "'";
			
			$sql = "insert into " . $this->table . " set " . implode( ', ', $fieldlist );
			
			$return = mysql_query( $sql );
		
			if( !$return ) {
				
				echo( $sql );
				
			}
			
			return $return;
		
		}
		
	}
	
	public function retrieve( $scope = 'all', $fields = '*', $conditions = '' ) {
	
		$toreturn = array( );
		
		$sql = "select " . $fields . " from " . $this->table . " " . $conditions;
		
		// echo( $sql );
		
			
		$result = mysql_query( $sql );
		
		if( !$result ) {
			
			echo( $sql );
			
		}
		
		if( $scope == 'one' ) {
			
			return mysql_fetch_assoc( $result );
			
		} else if( $scope == 'pair' ) {
			
			$toreturn = array();
			
			while( $row = mysql_fetch_array( $result ) ) {
			
				$toreturn[ $row[0] ] = $row[1];
			
			}
			
			return $toreturn;
			
		} else {
		
			while( $row = mysql_fetch_assoc( $result ) ) {
			
				$toreturn[] = $row;
			
			}
			
			return $toreturn;
		
		}
	
	}
	
	public function remove( $id ) {
	
		return mysql_query( "delete from " . $this->table . " where id = " . $id );
	
	}
	
	public function query( $sql ) {
	
		return mysql_query( $sql );
	
	}

}