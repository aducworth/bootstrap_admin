<?

class Auth {
	
	var $menu = array( 
						'theaters' => array( 'theaters' => 'List Theaters', 'theater' => 'Add Theater' ),
						'films' => array( 'films' => 'List Films', 'film' => 'Add Film' ),
						'studios' => array( 'studios' => 'List Studios', 'studio' => 'Add Studio' ),
						'banners' => array( 'banners' => 'List Banners', 'banner' => 'Add Banner' ),
						'users' => array( 'users' => 'List Users', 'user' => 'Add User' ) );
						
	var $always_allow = array( 'login', 'logout', 'permission' );
	
	var $admin_access = array( 'users', 'user' );
	
	var $user_types = array( 0 => 'Editor', 1 => 'Administrator' );
	
	var $show_search = array( 'theaters', 'films', 'studios', 'banners', 'users' );
	
	var $allow = array( 'login', 'db_setup' );

	function __construct() {
	
		if( !$this->logged_in() && !in_array( $_GET['url'], $this->allow ) ) {
		
			header( 'Location: /login' );
			exit;
		
		}
		
		$this->db = new DB;
		
		// check the database connection
		if( !$this->db->connection && $_GET['url'] != 'db_setup' ) {
			
			header( 'Location: /db_setup' );
			exit;
			
		}
		
		if( !$this->hasPermission( $_GET['url'] ) ) {
			
			header( 'Location: /permission' );
			exit;
			
		}
		
	}
	
	public function hasPermission( $url ) {
		
		if( in_array( $url, $this->admin_access ) && $_SESSION['logged_in_user']['admin'] == 0 ) {
			
			return false;
			
		}
		
		return true;
		
	}
	
	public function navigation() {
		
		$toreturn = '';
		
		foreach( $this->menu as $name => $items ) {
			
			// if this has a submenu
			if( is_array( $items ) ) {
				
				// build the submenu first to make sure permissions allow for the top level
				$submenu = '';
				
				foreach( $items as $url => $value ) {
						
					if( $this->hasPermission( $url ) ) {
						
						$submenu .= '<li><a href="/' . $url . '">' . $value . '</a></li>';
						
					}
					
				}
				
				// include top menu if there is a submenu
				if( $submenu ) {
					
					$toreturn .= '<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . ucwords( str_replace( '_', ' ', $name ) ) . ' <b class="caret"></b></a>
									<ul class="dropdown-menu">'
										
										. $submenu .
										
									'</ul>
								  </li>';
							  
				}
				
			// if this is a single item
			} else {
				
				if( $this->hasPermission( $name ) ) {
					
					$toreturn .= '<li><a href="/' . $name . '">' . $item . '</a></li>';
					
				}
				
			}
			
		}
		
		return $toreturn;
		
	}
	
	public function logged_in( ) {
	
		if( $_SESSION['logged_in_user'] ) {
		
			return true;
			
		}
		
		return false;
	
	}
	
	public function login() {
	
		$this->db->table = 'users';
		
		$user = $this->db->retrieve( 'one', '*', "where email='" . $_POST['email'] . "' and password='" . md5( $_POST['password'] ) . "'" );
		
		if( $user['id'] ) {
		
			$_SESSION['logged_in_user'] = $user;
			return true;
			
		} else {
		
			unset( $_SESSION['logged_in_user'] );
			return false;
		
		}
	
	}
	
	public function logout() {
	
		unset( $_SESSION['logged_in_user'] );
		
		return true;
	
	}

}

?>