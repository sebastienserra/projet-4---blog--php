<div class="group">
<div id="container">

    <div class="semicircle">
      <div class="semicircleleft">
        <div class="leftarrow">
        </div> 
      </div>
    </div>
  
  <div>
        <img id="diapo" src="./public/images/alaska_img1.jpg" alt="diaporama">
  </div>

  <div class="semicircle">
    <div class="semicircleright">
      <div class="rightarrow">
      </div>
    </div>
  </div>


<div id="pause_inside">
  <div class="push" id="btn_pause">
  </div>
</div>

<div id="play_inside">
  <div class="push" id="btn_play">
  </div>
  </div>

<div id="texte_diaporama">
</div>
</div>

<div class="cards">
  <div>
  <h1>Un billet simple pour l'Alaska</h1>
</div>
   <div id="image_index_cards">
      <div>
      <h3 id="subtitle_index">Posts récents</h3>
    </div>
      <div id="joint">
    <?php
    $pagination = new Pagination;
    echo $pagination->paginate();
    ?>
     </div>

      </div>
    </div>
</div> 
