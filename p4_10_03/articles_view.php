<div class="container">
    <div class="row">
      <div class="col-lg">
        <div id="container">
          <div class="demi_cercle">
            <div class="demi_cercle_gauche">
              <div class="flechegauche">
              </div> 
            </div>
          </div>
        <div>
          <img id="diapo" src="http://codesmile.fr/codesmile/pictures/velo1.jpg" alt="diaporama">
        </div>
        <div class="demi_cercle">
          <div class="demi_cercle_droite">
            <div class="flechedroite">
            </div>
          </div>
        </div>
      </div>
      <div id="contient_pause">
        <div class="push" id="btn_pause">
        </div>
      </div>
      <div id="contient_play">
        <div class="push" id="btn_play">
        </div>
      </div>
      <div id="texte_diaporama">
      </div>
    </div>
  </div>
</div>
<?php
  // display articles one by one
  while ($donnees = $articles->fetch())
  {
?>
  
  <div class="present">
  <p><?php echo nl2br(($donnees['article']));?></p>
  <a href="comment_form_controler.php?post_comment=<?php echo $donnees['id'] ?>" class="btn btn-primary btn-sm"><span class="far fa-comments"></span></a>
  <a href="comments_controler.php?billet=<?php echo $donnees['id']; ?>"class="btn btn-primary btn-sm"><span class="far fa-comments"></span></a>
  </div>
<?php
  }
?>
<p class="link"> 
<?php 

for($page=1;$page<=$nber_of_pages; $page++)
{
echo '<a href="articles_controler.php?page='.$page.'"> ' . $page . '</a>';
}
?>