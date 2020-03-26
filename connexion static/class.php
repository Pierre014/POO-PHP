<?php   

    class Connect{

        static public function bdd(){
            return new PDO("mysql:host=localhost;dbname=becode;charset=utf8",'pierre','Feuille014');
        }
    }
    class Post{
       private $id_post;
       public $title_post;
       public $content_post;

       function __construct($title_post="",$content_post=""){
            $this->title_post = $title_post;
            $this->content_post = $content_post;
       }

       function remove($pdo, $id){
           $stmt = $pdo -> prepare("DELETE FROM connexion WHERE id = $id");
           $stmt ->execute();
       }
       public function addPost($pdo){
           $id = $pdo -> prepare("SELECT id FROM connexion ORDER BY id DESC limit 0,1");
           $id->execute();
           $highId = $id->fetch(PDO::FETCH_ASSOC);
           $this->id_post = $highId['id'];
           $stmt = $pdo -> prepare("INSERT INTO connexion(id,title,content) VALUES(:id,:tilte,:content)");

           $stmt -> execute(array(
               ":id"=> ++$this->id_post,
               ":tilte"=>$this->title_post,
               ":content"=>$this->content_post
           ));
       }
       public function findAllPost($pdo){
           $stmt = $pdo -> prepare("SELECT * FROM connexion");
           $stmt -> execute();
           $allPost = $stmt->fetchALL(PDO::FETCH_ASSOC);

           echo '<table>';
                echo '<tr>';
                    echo '<th>Id</th>';
                    echo '<th>title</th>';
                    echo '<th>content</th>';
                echo '</tr>';

                echo '<tbody>';
                    foreach($allPost as $posts){
                        echo '<tr>';
                            foreach($posts as $value){
                                echo '<td>';
                                    echo $value;
                                echo '</td>';
                            }
                        echo '</tr>';
                    }
                echo '</tbody>';
           echo '</table>';
       }

    }