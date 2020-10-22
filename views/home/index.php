<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <?php while($row = $this->cathegoryList->fetch_assoc()) {
        echo '<li><a href="#">'.$row['kategorija'].'</a></li>';
      }
      ?>
    </ul>
  </div>
</nav>


<!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
  Indicators
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  Wrapper for slides
  <div class="carousel-inner">
    <div class="item active">
      <img src="https://cdn2.lamag.com/wp-content/uploads/sites/6/2018/06/luca-micheli-659762-unsplash.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="https://cdn.vox-cdn.com/thumbor/WBfyp5fXh1eXXF-BaUKjs02nau0=/0x0:5125x3266/1200x675/filters:focal(2059x695:2879x1515)/cdn.vox-cdn.com/uploads/chorus_image/image/65232414/828049028.jpg.0.jpg" alt="Chicago">
    </div>

    <div class="item">
      <img src="https://cdn.getyourguide.com/img/tour_img-1096032-146.jpg" alt="New York">
    </div>
  </div>

  Left and right controls
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->



<h1 class='page-header'>Ovo je pocetna stranica</h1>


<div class="row" id="root-vue">
    <div v-if='loading'>
        Loading...
    </div>
    <div v-else v-cloak>
      <div v-for="artikal in artikli" class='col col-lg-3 article'>
            <h1> {{ artikal.naziv }} </h1>
            <h3> {{ artikal.cena }} </h3>
            <img v-bind:src="'<?php echo URL; ?>/img/' + artikal.slika">
            <p> {{artikal.sifra}} </p>
          
            <a v-bind:href="'<?php echo URL; ?>article/show/'+artikal.sifra">Detaljnije</a>
        </div>
    </div>
    
  
</div>

<script src="<?php echo URL; ?>assets/scripts/vue-index.js"></script>