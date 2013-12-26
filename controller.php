<?

class AppController {
	
	
		 
	function __construct() {
	
		$this->auth	= new Auth;
		$this->db = $this->auth->db;
		
		$this->filepath = getcwd();
		$this->site_url = 'http://' . str_replace( 'admin.', '', $_SERVER['SERVER_NAME'] );
		
		if( $this->db->connection && $_GET['url'] != 'db_setup' ) {
							
			$this->db->table = 'ratings';
				
			$this->rating_list = $this->db->retrieve('pair','id,name',' order by display_order'); 
			
			$this->db->table = 'film_types';
				
			$this->film_type_list = $this->db->retrieve('pair','id,name',' order by display_order'); 
			
			$this->db->table = 'genres';
				
			$this->genre_list = $this->db->retrieve('pair','id,name',' order by name'); 
			
			$this->db->table = 'languages';
				
			$this->language_list = $this->db->retrieve('pair','id,name',' order by name'); 
			
			$this->db->table = 'studios';
				
			$this->studio_list = $this->db->retrieve('pair','id,title',' order by title'); 
			
			$this->db->table = 'films';
				
			$this->recently_added_films = $this->db->retrieve('all','*',' order by created desc limit 5'); 
			$this->recently_modified_films = $this->db->retrieve('all','*',' order by modified desc limit 5'); 
		
		}
			
	}
	
	public function index() {
	
		if( count( $_POST ) > 0 ) {
		
		}
	
	}
	
	public function permission() {
			
		$this->message = "Sorry, but you do not have permission to access this area.";
	
	}
	
	public function db_setup() {
		
		// do the initial check to make sure tables are set up
		$this->db->initial_setup();
		
	}
		
	public function login() {
	
		if( count( $_POST ) > 0 ) {
		
			if( $this->auth->login() ) {
			
				header( 'Location: /' );
				exit;
				
			} else {
			
				$this->message = "Error logging in.";
			
			}
		
		}
	
	}
	
	public function logout() {
	
		$this->auth->logout();
		header( 'Location: /' );
		exit;
	
	}
	
	public function users() {
	
		$this->db->table = 'users';
		
		if( $_GET['search'] ) {
			
			$where = " where fname like '%" . $_GET['search'] . "%' or lname like '%" . $_GET['search'] . "%' or email like '%" . $_GET['search'] . "%'";
			
		}
			
		$this->users = $this->db->retrieve('all','*',$where); 
			
	}
					
	public function photos() {
	
		$this->db->table = 'photos';
		
		if( $_GET['search'] ) {
			
			$where = " where image like '%" . $_GET['search'] . "%'";
			
		}
			
		$this->photos = $this->db->retrieve('all','*',$where . ' order by id'); 
			
	}
	
	public function theaters() {
	
		$this->db->table = 'theaters';
		
		if( $_GET['search'] ) {
			
			$where = " where name like '%" . $_GET['search'] . "%'";
			
		}
			
		$this->theaters = $this->db->retrieve('all','*',$where . ' order by name'); 
			
	}
	
	public function films() {
	
		$this->db->table = 'films';
		
		if( $_GET['search'] ) {
			
			$where = " where title like '%" . $_GET['search'] . "%'";
			
		}
			
		$this->films = $this->db->retrieve('all','*',$where . ' order by title'); 
			
	}
	
	public function banners() {
	
		$this->db->table = 'banners';
		
		if( $_GET['search'] ) {
			
			$where = " where title like '%" . $_GET['search'] . "%'";
			
		}
			
		$this->banners = $this->db->retrieve('all','*',$where . ' order by title'); 
			
	}
	
	public function studios() {
	
		$this->db->table = 'studios';
		
		if( $_GET['search'] ) {
			
			$where = " where title like '%" . $_GET['search'] . "%'";
			
		}
			
		$this->studios = $this->db->retrieve('all','*',$where . ' order by title'); 
			
	}
	
	public function theater() {
	
		if( count( $_POST ) > 0 ) {
								
			$this->db->table = 'theaters';
						
			if( $this->db->save( $_POST ) ) {
			
				if( !$_POST['id'] ) {
				
					$_POST['id'] = mysql_insert_id();
				
				}
																						
				header( 'Location: /theaters' );
				exit;
			
			}
		
		}
		
		if( $_GET['id'] ) {
		
			$this->db->table = 'theaters';
			
			$this->result = $this->db->retrieve( 'one', '*', ' where id = ' . $_GET['id'] ); 
														
		}
		
	}
	
	public function studio() {
	
		if( count( $_POST ) > 0 ) {
								
			$this->db->table = 'studios';
						
			if( $this->db->save( $_POST ) ) {
			
				if( !$_POST['id'] ) {
				
					$_POST['id'] = mysql_insert_id();
				
				}
																						
				header( 'Location: /studios' );
				exit;
			
			}
		
		}
		
		if( $_GET['id'] ) {
		
			$this->db->table = 'studios';
			
			$this->result = $this->db->retrieve( 'one', '*', ' where id = ' . $_GET['id'] ); 
														
		}
		
	}
					
	public function user() {
	
		if( count( $_POST ) > 0 ) {
			
			unset( $_POST['password_confirm'] );
			
			if( $_POST['password'] ) {
				
				$_POST['password'] = md5( $_POST['password'] );
				
			} else {
				
				unset( $_POST['password'] );
				
			}
					
			$this->db->table = 'users';
						
			if( $this->db->save( $_POST ) ) {
			
				if( !$_POST['id'] ) {
				
					$_POST['id'] = mysql_insert_id();
				
				}
																						
				header( 'Location: /users' );
				exit;
			
			}
		
		}
		
		if( $_GET['id'] ) {
		
			$this->db->table = 'users';
			
			$this->result = $this->db->retrieve( 'one', '*', ' where id = ' . $_GET['id'] ); 
														
		}
		
	}
			
	public function photo() {
		
		if( count( $_POST ) > 0 || $_FILES['image'] ) {
		
			$this->db->table = 'photos';
			
			if( is_uploaded_file( $_FILES['image']['tmp_name'] ) ) {
				
				if( $_FILES['image']['type'] == 'image/jpeg' ) {
					
					$_POST['image'] = time() . $this->clean_filename( $_FILES['image']['name'] );
					
					$path = str_replace( 'admin', '', getcwd() ) . 'images/uploads/';
					
					move_uploaded_file( $_FILES['image']['tmp_name'], $path . 'tmp/' . $_POST['image'] ); 
					
					$resizeObj = new resize( $path . 'tmp/' . $_POST['image'] );
					$resizeObj -> resizeImage( 1120, 473, 'crop' );
					$resizeObj -> saveImage( $path . 'banners/' . $_POST['image'], 100 );
									
					$resizeObj = new resize( $path . 'tmp/' . $_POST['image'] );
					$resizeObj -> resizeImage( 200, 84, 'crop' );
					$resizeObj -> saveImage( $path . 'banners/thumbnails/' . $_POST['image'], 100 );
				
				} else {
					
					$this->message = 'Invalid type of image. Please use a jpg.';
					$_GET['id'] = $_POST['id'];
					
				}
			
			}
			
			if( !$this->message ) {
				
				if( $this->db->save( $_POST ) ) {
				
					if( !$_POST['id'] ) {
					
						$_POST['id'] = mysql_insert_id();
					
					}
																							
					header( 'Location: /photos' );
					exit;
								
				}
			
			}
		
		}
		
		if( $_GET['id'] ) {
		
			$this->db->table = 'photos';
			
			$this->result = $this->db->retrieve( 'one', '*', ' where id = ' . $_GET['id'] ); 
														
		}
		
	
	}
	
	public function film() {
		
		if( count( $_POST ) > 0 || $_FILES['film_image'] ) {
			
			$_POST['featured'] = $_POST['featured']?$_POST['featured']:0;
			$_POST['subtitles'] = $_POST['subtitles']?$_POST['subtitles']:0;
			$_POST['release_date'] = date( 'Y-m-d', strtotime( $_POST['release_date'] ) );
		
			$this->db->table = 'films';
			
			if( is_uploaded_file( $_FILES['film_image']['tmp_name'] ) ) {
				
				if( $_FILES['film_image']['type'] == 'image/jpeg' ) {
										
					$_POST['film_image'] = time() . $this->clean_filename( $_FILES['film_image']['name'] );
					
					$path = str_replace( 'admin', '', getcwd() ) . 'images/uploads/';
					
					move_uploaded_file( $_FILES['film_image']['tmp_name'], $path . 'tmp/' . $_POST['film_image'] ); 
					
					$size = getimagesize( $this->site_url . '/images/uploads/tmp/' . $_POST['film_image'] ); 
					
					if( $size[0] >= 725 && $size[1] >= 575 ) {
					
						$resizeObj = new resize( $path . 'tmp/' . $_POST['film_image'] );
						$resizeObj -> resizeImage( 725, 575, 'crop' );
						$resizeObj -> saveImage( $path . 'films/' . $_POST['film_image'], 100 );
										
						$resizeObj = new resize( $path . 'tmp/' . $_POST['film_image'] );
						$resizeObj -> resizeImage( 150, 150, 'crop' );
						$resizeObj -> saveImage( $path . 'films/thumbnails/' . $_POST['film_image'], 100 );
						
					} else {
						
						unlink( $path . 'tmp/' . $_POST['film_image'] );
						$this->message = 'Invalid type image dimensions. Must be at least 725px x 575px.';
						$_GET['id'] = $_POST['id'];
						
					}
				
				} else {
					
					$this->message = 'Invalid type of image. Please use a jpg.';
					$_GET['id'] = $_POST['id'];
					
				}
			
			}
			
			if( !$this->message ) {
				
				if( $this->db->save( $_POST ) ) {
				
					if( !$_POST['id'] ) {
					
						$_POST['id'] = mysql_insert_id();
					
					}
																							
					header( 'Location: /films' );
					exit;
								
				}
			
			}
		
		}
		
		if( $_GET['id'] ) {
		
			$this->db->table = 'films';
			
			$this->result = $this->db->retrieve( 'one', '*', ' where id = ' . $_GET['id'] ); 
														
		}
		
	
	}
	
	public function banner() {
		
		if( count( $_POST ) > 0 || $_FILES['image'] ) {
			
			$this->db->table = 'banners';
			
			if( is_uploaded_file( $_FILES['image']['tmp_name'] ) ) {
				
				if( $_FILES['image']['type'] == 'image/jpeg' ) {
					
					$_POST['image'] = time() . $this->clean_filename( $_FILES['image']['name'] );
					
					$path = str_replace( 'admin', '', getcwd() ) . 'images/uploads/';
					
					move_uploaded_file( $_FILES['image']['tmp_name'], $path . 'tmp/' . $_POST['image'] ); 
					
					$size = getimagesize( $this->site_url . '/images/uploads/tmp/' . $_POST['image'] ); 
					
					if( $size[0] >= 1200 && $size[1] >= 415 ) {
					
						$resizeObj = new resize( $path . 'tmp/' . $_POST['image'] );
						$resizeObj -> resizeImage( 1200, 415, 'crop' );
						$resizeObj -> saveImage( $path . 'banners/' . $_POST['image'], 100 );
										
						$resizeObj = new resize( $path . 'tmp/' . $_POST['image'] );
						$resizeObj -> resizeImage( 150, 150, 'crop' );
						$resizeObj -> saveImage( $path . 'banners/thumbnails/' . $_POST['image'], 100 );
						
					} else {
						
						unlink( $path . 'tmp/' . $_POST['image'] );
						$this->message = 'Invalid type image dimensions. Must be at least 1200px x 415px.';
						$_GET['id'] = $_POST['id'];
						
					}
				
				} else {
					
					$this->message = 'Invalid type of image. Please use a jpg.';
					$_GET['id'] = $_POST['id'];
					
				}
			
			}
			
			if( !$this->message ) {
				
				if( $this->db->save( $_POST ) ) {
				
					if( !$_POST['id'] ) {
					
						$_POST['id'] = mysql_insert_id();
					
					}
																							
					header( 'Location: /banners' );
					exit;
								
				}
			
			}
		
		}
		
		if( $_GET['id'] ) {
		
			$this->db->table = 'banners';
			
			$this->result = $this->db->retrieve( 'one', '*', ' where id = ' . $_GET['id'] ); 
														
		}
		
	
	}
		
	public function delete() {
		
		$this->db->table = $_GET['model'];
		$this->db->remove( $_GET['id'] );
	
		header( 'Location: /' . $_GET['model'] );
		exit;		
	
	}
	
	public function update_display_order() {
		
		$update_parts = explode( '-order-', $_GET['update_id'] );
		
		$this->db->table = $update_parts[0];
		
		$this->db->save( array( 'id' => str_replace( '-id', '', $update_parts[1] ), 'display_order' => $_GET['order'] ) );
	
		exit;		
	
	}
	
	public function add_to_list() {
		
		$model = $_GET['model'];
		$pair = $_GET['pair'];
		
		unset( $_GET['model'] );
		unset( $_GET['pair'] );
		unset( $_GET['url'] );
		unset( $_GET['ajax'] );
		
		// set the model
		$this->db->table = $model;
		
		$tocheck = array();
		
		// check to see if this one is already in the system
		foreach( $_GET as $field => $value ) {
			
			$tocheck[] = $field . "='" . addslashes( $value ) . "'";
			
			// also check to make sure there is a value for each option
			if( !$value ) {
				
				echo( json_encode( array( 'error' => $field . ' is required.' ) ) );
				exit;
				
			}
			
		}
		
		$already_there = $this->db->retrieve('one','*'," where 1=1 and ( " . implode( ' and ', $tocheck ) . " )");
		
		if( $already_there['id'] ) {
			
			echo( json_encode( array( 'error' => 'The item is already in the database.' ) ) );
			
		} else {
			
			$this->db->save( $_GET );
			
			$new_id = mysql_insert_id();
			
			$new_info = $this->db->retrieve('pair',$pair);
			
			$toreturn = '';
			
			foreach( $new_info as $id => $label ) {
				
				$selected = ( $new_id == $id )?'selected':'';
				
				$toreturn .= "<option value='" . $id . "' " . $selected . ">" . $label . "</option>";
				
			}
			
			echo( json_encode( array( 'data' => $toreturn ) ) );
			
		}
		
		exit;		
	
	}
	
	public function clean_filename( $filename ) {
	
		return preg_replace( "/[^\w\.-]/", "-", strtolower( $filename ) );
		
	}
			
}

?>