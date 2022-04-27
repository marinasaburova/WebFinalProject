<?php
$class_inventory = 'nav-link';
$class_orders = 'nav-link';
$class_customers = 'nav-link';

if (isset($action)) {
    switch ($action) {
        case ('inventory'):
            $class_inventory = 'nav-link active';
            break;
        case ('orders'):
            $class_orders = 'nav-link active';
            break;
        case ('customers'):
            $class_customers = 'nav-link active';
            break;
    }
}
?>

<!-- Navigation -->
<nav class="sticky-top" id="view">
    <header class="d-flex justify-content-center py-3 bg-white">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href=".?action=inventory" class="<?php echo $class_inventory ?>">Manage Inventory</a></li>
            <li class="nav-item"><a href=".?action=orders" class="<?php echo $class_orders ?>">Manage Orders</a></li>
            <li class="nav-item"><a href="#" class="<?php echo $class_customers ?>">Manage Customers</a></li>
        </ul>
    </header>
</nav>
<!-- /.navigation -->