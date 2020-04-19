<?php
class Crud{

	private $servername;
	private $username; 
	private $password; 
	private $dbname;
	private $charser;  


	public function connect(){

 		$this -> servername = "db5000325587.hosting-data.io";
		$this -> username ="dbu592945";
		$this -> password ="!Ch_at#22-n20";
		$this -> dbname ="dbs317714";
		$this -> charset = "utf8mb4";

		try {
				$dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
				$db = new PDO($dsn,$this -> username, $this -> password);
				$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $db;


			} catch (PDOException $e) {
				echo "Connection failed: ".$e->getMessage();
		}
			
    }		
    public function saveRecords(){
		$req = $this->connect()->prepare("INSERT INTO posts(article, title, author) values(?,?,?)");
		$req->execute(array(($_POST['article']), ($_POST['title']), ($_POST['author']) ));
	}
	public function getUser(){
					
		if(isset($_POST['login-submit'])){
			$username= ($_POST['username']);
			$_POST['password'] = ($_POST['password']);

			$req = $this->connect()->query('SELECT id, username, password FROM login');
			$data = $req->fetch();

			$isPasswordCorrect = password_verify($_POST['password'], $data['password']);

				if(empty($_POST['username']) OR empty($_POST['username']) OR $_POST['username']!=$data['username']){
					echo'Indiquez un identifiant et mot de passe valide';
				}elseif($isPasswordCorrect AND $_POST['username']==$data['username']){
					$_SESSION['username'] = $data['username'];		
					?>
 		 			<script type="text/javascript">
 		 			window.location = "http://codesmile.fr/billet_simple_alaska/controllers/backend/backend_controller.php";
 		 			</script>
 		 			<?php
					
				}else{
					echo'Indiquez un identifiant et mot de passe valide';
			}
		}	
 	}
	
	public function getAllData(){

		$req = $this->connect()->query("SELECT * FROM posts ORDER BY id DESC LIMIT 0,10");
		?>
		<table border=1>
		<?php
			while($row= $req->fetch(PDO::FETCH_ASSOC)) {
			?>		
			<div class="present">
				<div class="text_back"><?php echo $row['title'];?></div>
				<div class="text_back"><?php echo $row['article'];?></div>
				<div class="text_back"><?php echo $row['author'];?></div>
				<div class="together">
					<div class="button_one_back">
						<a href="backend_controller.php?delete=<?php echo $row['id'];?>" id="confirmation">
			   				<span class="fas fa-trash-alt"></span>
			   				<span id="tooltip_three">Supprimer</span>
			   			</a>
					</div>
					<div class="button_two_back">
						<a href="edit_controller.php?edit=<?php echo $row['id'];?>" id="control_four">
			   				<span class="fas fa-edit"></span>
			   				<span id="tooltip_four">Modifier</span>
			   			</a>
					</div>
				</div>
			</div>	
			<?php
			}
		}
		public function getAllComments(){
		// Retrieve comments
		$comments = $this->connect()->prepare("SELECT * FROM comments ORDER BY date_of_comment DESC LIMIT 0,30");
		$comments->execute(array());
		while ($donnees = $comments->fetch(PDO::FETCH_ASSOC))
		{
		?>
		<div class="present">
   			 <div><?php echo htmlspecialchars($donnees['comment']); ?></div>
		</div>
		<?php
		}
	}

	public function destroy($id){
		$rep = $this->connect()->prepare("DELETE FROM posts WHERE id=:id");
		$rep->execute(['id'=>$id]);
		return $rep;
	}
		 
	public function eraseReportedCommentInReportedComments($id){
			$report = $this->connect()->prepare('DELETE comments, reported_comments
			FROM comments
			INNER JOIN reported_comments
			ON comments.id=reported_comments.id_comment
			WHERE comments.id=:id
			');
			$report->execute(array('id'=>$id));
						?>
 		 	<script type="text/javascript">
		 	window.location = "http://codesmile.fr/billet_simple_alaska/controllers/backend/reported_comments_controller.php";
		 	</script>
		 	<?php
						
		}
	
	public function CountReportedComments(){
		// find number of total rows in table posts
		$reponse =  $this->connect()->query("SELECT COUNT(*) AS nb_comments FROM reported_comments");
		$donnees = $reponse->fetch();
		$nb_comments = $donnees['nb_comments'];
		echo $nb_comments;
	}

	//display reported comments
	public function displayReportedComments(){
		$report = $this->connect()->query('SELECT comments.id, comments.comment, comments.id_post, reported_comments.id_comment
		FROM comments 
		JOIN reported_comments
		ON comments.id = reported_comments.id_comment
		ORDER BY reported_comments.id_comment DESC
		');
		while ($donnees = $report->fetch()){
		?>
		<div class="present"> 
			<div class="text_back"> <?php echo htmlspecialchars($donnees['comment']);?></div> 
			<div class="together">
			<div class="button_three_back">
				<a href="backend_controller.php?moderate=<?php echo $donnees['id'] ?>" id="control_five">
					<span class="fas fa-trash-alt"></span>
					<span id="tooltip_five">Supprimer</span>
				</a>
			</div>
			</div>
		</div>
		<?php
		}
	} 
}


class Edit extends Crud{
	public function onePost($id){
		$req = $this->connect()->prepare("SELECT article, title, author, id FROM posts WHERE id=:id");
		$req->execute(['id'=>$id]);
		$result=$req->fetch(PDO::FETCH_ASSOC);
		?>
		<input type="text" name="title" id="title" rows="1" cols="50" maxlength="250" placeholder="<?php echo $result['title'];?>">
		<textarea name="article" id="article"  rows="10" cols="50" maxlength="250">
			<?php echo $result['article'];?>			
		</textarea>
		<input type="text" name="author" id="author" rows="1" cols="50" maxlength="250" placeholder="<?php echo $result['author'];?>">
		</p>
		<input class="btn btn-primary" type="submit" name="update" value="Update">
		<?php
	}

	public function update(){
		if(isset($_POST['update'])) {
			$article=$_POST['article'];
			$title=$_POST['title'];
			$author=$_POST['author'];
			$id=$_POST['id'];
			$req = $this->connect()->prepare("UPDATE posts SET article=:article, title=:title, author=:author, id=:id WHERE id=:id");
			$result= $req->execute(array(":article"=>$article, ":title"=>$title, ":author"=>$author, ":id"=>$id));
			?>
 		 	<script type="text/javascript">
		 	window.location = "http://codesmile.fr/billet_simple_alaska/controllers/backend/backend_controller.php";
		 	</script>
		 	<?php
		}	
	}
	public function hash_pass(){
		if(isset($_POST['password-submit'])){
			// Hachage du mot de passe
			echo $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$username = $_POST['username'];
			
			$req = $this->connect()->prepare("INSERT INTO login(username, password) VALUES (:username,:password)");
			$result= $req->execute(array('username'=>$username, 'password'=>$pass_hache));
			echo'<br>Password insere';
		}
	}	
}



class Front extends Crud{
	public function saveComment(){

		// Insertion du message à l'aide d'une requête préparée
		$req = $this->connect()->prepare("INSERT INTO comments(comment, id_post) values(?,?)");
		$req->execute(array(($_POST['comment']), ($_POST['id_post'])));
			
	}

	public function getPost(){
	// Retrieve article by id
		$req = $this->connect()->prepare("SELECT id, article, author, title, creation_date FROM posts WHERE id = ?");
		$req->execute(array($_GET['comment']));
		$donnees = $req->fetch();
		?>
		<div class="present">
   		 <p><h4><?php echo $donnees[3]; ?></h4></p>
   		 <p><?php echo $donnees[1]; ?></p>
   		 <p><?php 
   		  $timestamp = strtotime($donnees[4]); 
   		  $my_date = date('d/m/Y', $timestamp);
   		  echo $donnees[2].' le '. $my_date;
   		  ?></p>

   		  
   		</div>
		<?php
	}

	public function allTitles(){

		$req = $this->connect()->query("SELECT * FROM posts ORDER BY id");

			while($row= $req->fetch(PDO::FETCH_ASSOC)) {
			?>
			<div> - 	
			<a href="postandcomments_controller.php?comment=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
			</div>	
			<?php
			}
		}	

	
	public function getComments(){
		// Retrieve comments
		$comments = $this->connect()->prepare("SELECT * FROM comments WHERE id_post = ? ORDER BY date_of_comment DESC");
		$comments->execute(array($_GET['comment']));
		while ($donnees = $comments->fetch(PDO::FETCH_ASSOC))
		{
		?>
		<div class="present">
   			 <div><?php echo htmlspecialchars($donnees['comment']); ?></div>
   			 <div class="together">
			 	<div class="button_five_front">
    		 		<a href="postandcomments_controller.php?commentreport=<?php echo $donnees['id']; ?>&comment=<?php echo $donnees['id_post']; ?>" name="report", id="report">
    		 			<span class="fas fa-comment-slash"></span>
    		 			<span id="tooltip_six">Signaler</span>
    		 		</a>
				</div>
			</div>
		</div>
		<?php
		}
	}
	public function getReportedComment(){
		// Récupération des commentaires
		$req = $this->connect()->prepare("INSERT INTO reported_comments(id_comment) VALUES(?)");
		$req->execute(array(htmlspecialchars($_GET['commentreport'])));
	}

}

Class Pagination extends Crud{
	public function paginate(){
		
		// find number of total rows in table posts
		$reponse =  $this->connect()->query("SELECT COUNT(*) AS nb_posts FROM posts");
		$donnees = $reponse->fetch();
		$nb_posts=$donnees['nb_posts'];
		
		$results_per_page=3;
		//nber of total pages that will be displayed 
		$nber_of_pages=ceil($nb_posts/$results_per_page);

		if(!isset($_GET['page']) || $_GET['page'] <=0 || $_GET['page']>$nber_of_pages){
		  $page=1;

		}else{

		  $page= $_GET['page'];
		}

		// determine the limit for posts displayed on page
		$this_page_first_result=($page-1)*$results_per_page;
		// Retrieve all posts from table posts

		$articles = $this->connect()->query("SELECT * FROM posts ORDER BY id DESC limit $this_page_first_result, $results_per_page");
		  // display articles one by one
		  while($row= $articles->fetch(PDO::FETCH_ASSOC)) {
		  	$result=$row['article'];
		  	$string=strip_tags($result);
		  	$limit=120;  	
		  			?>	
		  	<div class="joint">
				<div class="my_container">
					<div class="my_text"><?php echo finishOnWord($string, $limit, $stop=" "); ?> ...</div>
					<div class="my_buttons">
						<div class="button_three">
							<a href="controllers/frontend/postandcomments_controller.php?comment=<?php echo $row['id'];?>" id="full_article">
		   					Lire
		   					</a>
						</div>
					</div>	
				</div>
				<div class="bellow"></div>
			</div>
			<?php
		  	}
			?>
		</div>
			<div class="link">
				<p>  
				<?php 

				for($page=1;$page<=$nber_of_pages; $page++){
				
					echo '<div id="pagination_link"><a href="./index.php?page='.$page.'"> ' . $page . '</a></div>';
				}
				?>
				</p>
			</div>
			<?php
			}
		}