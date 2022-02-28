<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
   $hote = 'localhost';
   $utilisateur = 'root';
   $mdp = '';
   $nombdd = 'Login'; // Nom de la base de données
   $bdd = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);
         
      $username = $_POST['username']; 
      $password = $_POST['password'];
      // On prépare la requête
      $query = $bdd->prepare("SELECT * FROM client WHERE username=? AND password=?");

      // On injecte les valeurs
      $query->bindParam(1, $username);
      $query->bindParam(2, $password); 

      // On execute
      $query->execute();
         //Injection : 'OR 1=1 -- 

         if($username !== "" && $password !== ""){
         $requete = $bdd -> prepare("SELECT count(*) FROM client where username = ? AND password = ?");
         $requete->bindParam(1, $username);
         $requete->bindParam(2, $password);
         //$requete = "SELECT count(*) FROM client where username = '".$username."' and password = '".$password."' ";
         // On execute
         $requete->execute();
         $reponse = $requete->fetch(PDO::FETCH_ASSOC);
         //$reponse = mysqli_fetch_array($exec_requete);
         $count = $reponse['count(*)'];
         if($count!=0) //   nom d'utilisateur et mot de passe correctes
         {  
            $_SESSION['username'] = $username;
            header('Location: main.php');
         }
         else
         {
            header('Location: pageLogin.php?erreur=1'); // utilisateur ou mot de passe incorrect
         }
      }
   }
else
{
   header('Location: pageLogin.php');
}
?>