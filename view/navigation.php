<?php
$class_all = 'nav-link';
$class_bag = 'nav-link';
$class_sunglasses = 'nav-link';
$class_belt = 'nav-link';
$class_watch = 'nav-link';

if (isset($category)) {
  switch ($category) {
    case ('all'):
      $class_all = 'nav-link active';
      break;
    case ('bags'):
      $class_bag = 'nav-link active';
      break;
    case ('sunglasses'):
      $class_sunglasses = 'nav-link active';
      break;
    case ('belts'):
      $class_belt = 'nav-link active';
      break;
    case ('watches'):
      $class_watch = 'nav-link active';
      break;
  }
}
?>

<!-- Navigation -->
<nav class="sticky-top" id="view" style="z-index: 1021">
  <header class="d-flex justify-content-center py-3 bg-white ">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a href="." class="<?php echo $class_all ?>" aria-current="page">All Items</a>
      </li>
      <li class="nav-item"><a href=".?category=bags" class="<?php echo $class_bag ?>">Bags</a></li>
      <li class="nav-item"><a href=".?category=sunglasses" class="<?php echo $class_sunglasses ?>">Sunglasses</a></li>
      <li class="nav-item"><a href=".?category=belts" class="<?php echo $class_belt ?>">Belts</a></li>
      <li class="nav-item"><a href=".?category=watches" class="<?php echo $class_watch ?>">Watches</a></li>
    </ul>
  </header>
</nav>
<!-- /.navigation -->