<?php

include('./config/session.php');
include('./config/db.php');
include('./partials/header.php');

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user'][0]['user_id'];
    $referralLink = $_SESSION['user'][0]['referral_link'];

    // Fetch all orders of the user from the database
    $sql = "SELECT * FROM orders WHERE user_id = $userId ORDER BY date_ordered DESC";
    $result = mysqli_query($conn, $sql);
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // var_dump($orders);

    $counter = 1;
}
?>

<div class="container-fluid">
    <div>
        <div class="row mt-4 rounded pt-3" style="background-color: white;">
            <?php if (isset($_SESSION['user']) && $_SESSION['user'][0]['is_admin'] === 'true') : ?>
                <a href=' /a2z_food/admin/users.php' class="col-lg-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">ALL USERS</h5>
                            <p class="card-text">Total Users: <?php echo getTotalUsersCount(); ?></p>
                        </div>
                    </div>
                </a>

                <a href='/a2z_food/admin/index.php' class="col-lg-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">ALL ORDERS</h5>
                            <p class="card-text">Total Orders: <?php echo getTotalOrdersCount(); ?></p>
                        </div>
                    </div>
                </a>

                <a href='/a2z_food/admin/products.php' class="col-lg-3">
                    <div class="card text-dark bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">ALL PRODUCTS</h5>
                            <p class="card-text">Total Products: <?php echo getTotalProductsCount(); ?></p>
                        </div>
                    </div>
                </a>

                <a href='/a2z_food/admin/blogs.php' class="col-lg-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">ALL BLOGS</h5>
                            <p class="card-text">Total Blogs: <?php echo getTotalBlogsCount(); ?></p>
                        </div>
                    </div>
                </a>
            <?php endif ?>
            <a href='/a2z_food/referrals.php' class="col-lg-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">REFERRALS</h5>
                        <p class="card-text">Your Referrals: <?php echo getTotalReferralsOfUser(); ?></p>
                    </div>
                </div>
            </a>

            <a href='/a2z_food/orders.php' class="col-lg-3">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">ORDERS</h5>
                        <p class="card-text">Your Orders: <?php echo getTotalOrdersOfUser(); ?></p>
                    </div>
                </div>
            </a>

            <a href='/a2z_food/completed_orders.php' class="col-lg-3">
                <div class="card text-dark bg-muted mb-3">
                    <div class="card-body">
                        <h5 class="card-title">COMPLETED</h5>
                        <p class="card-text">Completed Orders: <?php echo getTotalCompletedOrdersOfUser(); ?></p>
                    </div>
                </div>
            </a>

            <a href='/a2z_food/referral_earnings.php' class="col-lg-3">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">EARNINGS</h5>
                        <p class="card-text">Your Earnings: <?php echo getTotalPaidEarningsOfUser(); ?></p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<?php include('./partials/footer.php'); ?>

<?php
// Functions to fetch counts from the database
function getTotalUsersCount()
{
    global $conn;
    $sql = "SELECT COUNT(*) as totalUsers FROM users";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['totalUsers'];
}

function getTotalOrdersCount()
{
    global $conn;
    $sql = "SELECT COUNT(*) as totalOrders FROM orders";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['totalOrders'];
}

function getTotalProductsCount()
{
    global $conn;
    $sql = "SELECT COUNT(*) as totalProducts FROM products";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['totalProducts'];
}

function getTotalBlogsCount()
{
    global $conn;
    $sql = "SELECT COUNT(*) as totalBlogs FROM blogs";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['totalBlogs'];
}

function getTotalReferralsOfUser()
{
    global $conn;
    global $userId;
    $sql = "SELECT * FROM users WHERE user_id = $userId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['referral_count'];
}

function getTotalOrdersOfUser()
{
    global $conn;
    global $userId;
    $sql = "SELECT COUNT(*) as totalOrders FROM orders WHERE user_id = $userId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['totalOrders'];
}

function getTotalCompletedOrdersOfUser()
{
    global $conn;
    global $userId;
    $sql = "SELECT COUNT(*) as completedOrders FROM orders WHERE user_id = $userId AND status ='Confirmed'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['completedOrders'];
}

function getTotalPaidEarningsOfUser()
{
    global $conn;
    global $userId;
    $sql = "SELECT SUM(comission_earned) AS totalEarnings FROM referral_earnings WHERE referrer_user_id = $userId AND status = 'paid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalEarnings = 'NGN ' . ($row['totalEarnings'] ?? 0);
    return $totalEarnings;
}

// function getTotalEarningsOfUser()
// {
//     global $conn;
//     global $userId;
//     $sql = "SELECT * FROM users WHERE user_id = $userId";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);
//     return 'NGN ' . number_format($row['referral_earning']);
// }


?>

<script>
    function copyToClipboard() {
        // Create a temporary input element
        var tempInput = document.createElement("input");

        // Set the input value to the text you want to copy
        tempInput.value = '<?php echo $referralLink; ?>';

        // Append the input element to the body
        document.body.appendChild(tempInput);

        // Select the input content
        tempInput.select();

        // Execute the copy command
        document.execCommand("copy");

        // Remove the temporary input element
        document.body.removeChild(tempInput);

        alert("Text copied to clipboard!");
    }
</script>