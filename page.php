<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/ManuMani/csvterremotos/master/top-20.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4">Películas Random de Netflix</h1>
<div class="row">

<?php for($t = 0; $t < count($csv); $t++){?>
    <div class="col-sm-4 col-md-3 py-3">
    <h3 class="border-top pt-3">Película<?php print($csv[$t]['num'])?></h3>
    
    <figure style="height:120px; overflow:hidden;">
    
    <img src="
    <?php if ($csv[$t]['img'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['img']);
    };?>" 

    class="img-fluid">
    </figure>

    <?php if ($csv[$t]['name'] == NULL){
        print '<h5><a href="'.($csv[$t]['url']).'">'.($csv[$t]['location']).'</a></h5>';
    } else {
        print '<h5><a href="'.($csv[$t]['url']).'">'.($csv[$t]['name']).'</a></h5>';
    }?>
  <h6 class="border-top pt-3">Genero:<?php print($csv[$t]['ref'])?></h6>
        
    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>