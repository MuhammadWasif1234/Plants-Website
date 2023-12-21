<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <title>Plant Nest Admin Panel </title>
     <!-- Favicon -->
     <link href="img/pn.png" rel="icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
       


            <?php include "navbar.php" ?>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <?php
include "config.php";

$catquery = "SELECT COUNT(*) AS category_count FROM category";
$catresult = mysqli_query($conn, $catquery);

if ($catresult) {
    $catrow = mysqli_fetch_assoc($catresult);
    $categoryCount = $catrow['category_count'];
} else {
    $categoryCount = 0; // Default value if query fails
}
?>

<div class="col-sm-6 col-xl-3">
    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
        <i class="fa fa-chart-line fa-3x text-primary"></i>
        <div class="ms-3">
        <a href="Show Category.php"><h4 class="mb-2"> Categories</h4></a>
            <h6 class="mb-0"><?php echo $categoryCount; ?></h6>
        </div>
    </div>
</div>

<?php
include "config.php";

$orderquery = "SELECT COUNT(*) AS order_count FROM cart";
$orderresult = mysqli_query($conn, $orderquery);

if ($orderresult) {
    $orderrow = mysqli_fetch_assoc($orderresult);
    $orderCount = $orderrow['order_count'];
} else {
    $orderCount = 0; // Default value if query fails
}
?>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                            <a href="Show Order.php"><h4 class="mb-2"> Orders</h4></a>
                                <h6 class="mb-0"><?php echo $orderCount; ?></h6>
                            </div>
                        </div>
                    </div>
                    <?php
include "config.php";

$userquery = "SELECT COUNT(*) AS user_count FROM user";
$userresult = mysqli_query($conn, $userquery);

if ($orderresult) {
    $orderrow = mysqli_fetch_assoc($userresult);
    $userCount = $orderrow['user_count'];
} else {
    $userCount = 0; // Default value if query fails
}
?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                            <a href="Show User.php"><h4 class="mb-2"> User</h4></a>
                                <h6 class="mb-0"><?php echo $orderCount; ?></h6>
                            </div>
                        </div>
                    </div>

                    <?php
include "config.php";

$prodquery = "SELECT COUNT(*) AS product_count FROM products";
$prodresult = mysqli_query($conn, $prodquery);

if ($prodresult) {
    $prodrow = mysqli_fetch_assoc($prodresult);
    $prodCount = $prodrow['product_count'];
} else {
    $prodCount = 0; // Default value if query fails
}
?>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                            <a href="Show Product.php"><h4 class="mb-2"> Products</h4></a>
                                <h6 class="mb-0"><?php echo $prodCount; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <?php
include "config.php";

$query = "SELECT DATE_FORMAT(cart_date, '%Y-%m') AS month, COUNT(*) AS sales_count FROM cart GROUP BY month";
$result = mysqli_query($conn, $query);

$salesLabels = array();
$salesData = array();

while ($row = mysqli_fetch_assoc($result)) {
    $salesLabels[] = $row['month'];
    $salesData[] = $row['sales_count'];
}
?>

<div class="col-sm-12 col-xl-8 mt-5 "  style="padding-left: 5%;" >
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Monthly Sales</h6>
            <a href="">Show All</a>
        </div>
        <canvas id="monthly-sales"></canvas>
    </div>
</div>





            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Orders</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive ">
    <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="text-white">
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Quantity Ordered</th>
                <th scope="col">Ordered on</th>
                <th scope="col">Ordered By</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // $query = "SELECT c.cart_id, p.pr_name, p.pr_price, c.cart_quantity, c.cart_date, u.usr_name, u.usr_email
            //           FROM cart c
            //           INNER JOIN products p ON c.p_id = p.pr_id
            //           INNER JOIN user u ON c.u_id = u.usr_id";


            $query = "SELECT * FROM `cart`  INNER JOIN `products` ON cart.p_id = products.pr_id";
            
            $result = mysqli_query($conn, $query);
            print_r($result);
            
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {

                    $orderId = $row['cart_id'];
                    $productName = $row['pr_name'];
                    $productPrice = $row['cart_price'];
                    $orderDate = $row['cart_date'];
                    $orderedBy = $_SESSION['usr_name'];
                    $userEmail = $_SESSION['usr_email'];

                    
                    echo '<tr>';
                    echo '<td>' . $orderId . '</td>';
                    echo '<td>' . $productName . '</td>';
                    echo '<td>' . $productPrice . '</td>';
                    echo '<td>' . $quantityOrdered . '</td>';
                    echo '<td>' . $orderDate . '</td>';
                    echo '<td>' . $orderedBy . '</td>';
                    echo '<td>
                              <a href="cancel_order.php?orderid=' . $orderId . '&email=' . $userEmail . '"><button type="button" class="btn btn-square btn-primary m-2"><i class="fa fa-times"></i></button></a>
                              <a href="shipped_order.php?orderid=' . $orderId . '&email=' . $userEmail . '"><button type="button" class="btn btn-square btn-primary m-2"><i class="fa fa-truck"></i></button></a>
                              <a href="delivered_order.php?orderid=' . $orderId . '&email=' . $userEmail . '"><button type="button" class="btn btn-square btn-primary m-2"><i class="fa fa-home"></i></button></a>
                          </td>';
                    echo '</tr>';
                }
                mysqli_free_result($result);
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
            
            // Close the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

            <!-- Recent Sales End -->

            

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script>
// Data from PHP
var salesLabels = <?php echo json_encode($salesLabels); ?>;
var salesData = <?php echo json_encode($salesData); ?>;

// Chart.js setup
var ctx = document.getElementById('monthly-sales').getContext('2d');

var monthlySalesChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: salesLabels,
        datasets: [{
            label: 'Sales per Month',
            data: salesData,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


</body>

</html>