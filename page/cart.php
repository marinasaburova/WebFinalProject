<!-- Show's users cart and lets them edit it -->

<!-- Displays details for a specific product -->
<!-- Use GET for this page, so that users can bookmark it -->

<?php
include '../view/header.php';
include '../view/navigation.php';
?>


<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Your Cart</h2>
      <p class="lead">So cute, girl!</p>
    </div>

    <div class="row g-5">
      <!-- Summary -->
      <div class="col-md-5 col-lg-4 order-md-last">
        <div class="sticky-top" style="top:72px; z-index: 1018">

          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Summary</span>
            <span class="badge bg-primary rounded-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Product total</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$71</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Estimated Tax</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$2.01</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Shipping</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">−$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$92</strong>
            </li>
          </ul>

          <form class="card p-2" action="checkout.php#view">
            <div class="input-group">
              <button class="w-100 btn btn-secondary" type="submit">Continue to checkout</button>

            </div>
          </form>
        </div>
      </div>
      <!-- ./summary -->

      <!-- Cart -->
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Your Items</h4>
        <table class="table">
          <tbody>
            <tr>
              <td>Picture</td>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>
                <div>
                  <p class="mb-0">Total Price
                  </p>
                  <small class="text-muted">$price * quantity</small>
                </div>
              </td>
            </tr>
            <tr>
              <td>Picture</td>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>
                <div>
                  <p class="mb-0">Total Price
                  </p>
                  <small class="text-muted">$price * quantity</small>
                </div>
              </td>
            </tr>
            <tr>
              <td>Picture</td>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>
                <div>
                  <p class="mb-0">Total Price
                  </p>
                  <small class="text-muted">$price * quantity</small>
                </div>
              </td>
            </tr>
            <tr>
              <td>Picture</td>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>
                <div>
                  <p class="mb-0">Total Price
                  </p>
                  <small class="text-muted">$price * quantity</small>
                </div>
              </td>
            </tr>
            <tr>
              <td>Picture</td>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>
                <div>
                  <p class="mb-0">Total Price
                  </p>
                  <small class="text-muted">$price * quantity</small>
                </div>
              </td>
            </tr>
            <tr>
              <td>Picture</td>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>
                <div>
                  <p class="mb-0">Total Price
                  </p>
                  <small class="text-muted">$price * quantity</small>
                </div>
              </td>
            </tr>
            <tr>
              <td>Picture</td>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>
                <div>
                  <p class="mb-0">Total Price
                  </p>
                  <small class="text-muted">$price * quantity</small>
                </div>
              </td>
            </tr>
            <tr>
              <td>Picture</td>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>
                <div>
                  <p class="mb-0">Total Price
                  </p>
                  <small class="text-muted">$price * quantity</small>
                </div>
              </td>
            </tr>
            <tr>
              <td>Picture</td>
              <td>Item Name</td>
              <td>Quantity</td>
              <td>
                <div>
                  <p class="mb-0">Total Price
                  </p>
                  <small class="text-muted">$price * quantity</small>
                </div>
              </td>
            </tr>
          </tbody>

        </table>

      </div>
      <!-- ./cart -->
    </div>
  </main>

  <?php
  include '../view/footer.php';
  ?>