<?php
include_once("../link.php");
if (isset($_POST['submit'])) {
  if (isset($_POST['pays'] ) && isset($_POST['capitale']) ) {
    if (isset($_POST['page_num'])) {
      if($_POST['page_num'] > 56 || $_POST['page_num'] < 2){
          $error = "cette page n'existe pas dans le livre ou ne contient pas de pays.";
      }
      else if (isset($_POST['langues'])) {
        if (isset($_POST['date'])) {
          $pays = $_POST['pays'];
          $capitale = $_POST['capitale'];
          $numero_page = $_POST['page_num'];
          $independance = $_POST['date'];
          $langue = $_POST['langues'];
          $newCountry = new Pays($pays, $capitale, $numero_page, $independance, $langue); 
        }
      }
      
    }
  }
   
}
class Pays {
  private $pays;
  private $capitale;
  private $nb_page;
  private $independance;
  private $langues = [];
  public $error;

    function __construct($un_pays, $laCapitale, $page, $date, $langue){
       $this->pays = $un_pays;
      $this->capitale = $laCapitale;
      $this->nb_page = $page;
      $this->independance = $date;
      $this->langues = [$langue];
    }
    //les getteurs et setteurs 
    function getPays(){
      return $this->pays;
    }
    function setPays($newPays){
       $this->pays = $newPays;
    }
    function getIndependance(){
      return $this->independance;
    }
    function setIndependance($newIndependance){
       $this->independance = $newIndependance;
    }
    function getNbPage(){
      return $this->nb_page;
    }
    function setNbPage($newNbPage){
       $this->nb_page = $newNbPage;
    }

    function getCapitale(){
      return $this->capitale;
    }
    function setCapitale($newCapitale){
       $this->capitale = $newCapitale;
    }
    function getLangues(){
      return $this->langues;
   }
   function checkdate(){
     if($this->independance > date("Y")){
       return $this->error = "la date ne peut être supérieure à la date actuelle";
       throw new RuntimeException("ne marche pas");  
      }else {
        echo  "good date";
      }
   }

   function controlData(){
     $country = htmlspecialchars($this->pays);
     $capital = htmlspecialchars($this->capitale);
     $country = htmlspecialchars($this->langues);
   }
    
}
?>
<head>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body class="">
  <div class="admin_form">
    <h4>ajouté des pays à la base de données.</h4>
    <form action="admin.php" method="post">
      <input class="form-control formulaire_admin" type="text" name="pays" id="" placeholder="nom du pays" required>
      <input class="form-control formulaire_admin" type="text" name="capitale" id="" placeholder="capitale" required>
      <input class="form-control formulaire_admin" type="text" name="langues" id="" placeholder="langues" required>
      <label for="date">date d'indépendance</label>
      <input class="form-control formulaire_admin" type="date" name="date" id="date" required>
      <input class="form-control formulaire_admin" type="number" name="page_num" id="num_" placeholder="n° de page" required>
      <input class="form-control formulaire_admin btn-primary" type="submit" name="submit" value="entrer">
    </form>


  </div>
</body>