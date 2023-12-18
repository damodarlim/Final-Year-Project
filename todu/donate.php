<?php
include('includes/header.php');
include('includes/dbconnect.php');

$don_id = $_GET['id'];

$sql = "SELECT donation_table.donation_id, donation_table.title, donation_table.amount,
  donation_table.description, donation_table.donation_img FROM donation_table 
  WHERE donation_id = {$don_id}";

$result = mysqli_query($conn, $sql) or die("Query Failed.");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = mysqli_real_escape_string($conn, $_POST['amount']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $insertSql = "INSERT INTO donation_received (donation_id, payer_name, payer_email, amount, donation_date) 
                          VALUES (?, ?, ?, ?, NOW())";

            $stmt = mysqli_prepare($conn, $insertSql);

            mysqli_stmt_bind_param($stmt, "isss", $don_id, $name, $email, $amount);

            $insertResult = mysqli_stmt_execute($stmt);

            if ($insertResult) {
                echo '<script>alert("Thank you for your donation!");</script>';
            } else {
                echo '<script>alert("Failed to process donation. Please try again.");</script>';
            }
            mysqli_stmt_close($stmt);
        }
        ?>
        <!-- Start Fixed Background Img -->
        <div class="fixed-background">
            <div class="row text-light py-5 float-end">
                <div class="col-12 text-center">
                    <h1><?php echo $row['title']; ?></h1>
                </div>
            </div>

            <div class="fixed-wrap">
                <div class="fixed"></div>
            </div>
        </div>
        <!-- End Fixed Background Img -->

        <!-- Donation Section -->
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4">Support Us with: RM <?php echo $row['amount']; ?></h2>
                </div>
                <div class="col-md-8">
                    <img src="admin/upload/donation/<?php echo $row['donation_img']; ?>" alt="Donation Image"
                         class="img-fluid mb-4"/>
                    <p>
                        <?php echo $row['description']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <!-- Donation Form -->
                    <form id="donationForm" action="#" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required/>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required/>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount (MYR)</label>
                            <input type="number" class="form-control" id="amount" name="amount" required/>
                        </div>
                        <button type="submit" class="btn btn-primary">Donate Now</button>
                    </form>

                    <!-- PayPal Smart Payment Buttons Container -->
                    <div id="paypal-button-container" class="my-4"></div>
                    <!-- End Donation Form -->
                </div>
            </div>
        </div>

        <!-- Include necessary scripts -->
<script src="https://www.paypal.com/sdk/js?client-id=AdWQzE3xmc0zpomRWCORwPSJgFZDpUwbmvVL-e1ik6HdDEScW5o9R30VNGH3mf0V-Xp5WG06HSS8Vt6T&currency=MYR"></script>

<!-- PayPal Smart Payment Buttons Script -->
<script>
var paypalButtonsInitialized = false;

document.getElementById('donationForm').addEventListener('submit', function (event) {
    event.preventDefault();

    if (!paypalButtonsInitialized) {
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: document.getElementById('amount').value,
                            currency_code: 'MYR'
                        },
                    }],
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    var name = document.getElementById('name').value;
                    var email = document.getElementById('email').value;
                    var amount = document.getElementById('amount').value;
                    var transaction_id = details.id;

                    $.ajax({
                        type: 'POST',
                        url: 'insert_donation.php',
                        data: {
                            'name': name,
                            'email': email,
                            'amount': amount,
                            'transaction_id': transaction_id,
                        },
                        success: function (response) {
                            console.log('Donation successfully inserted.');
                            alert('Thank you for your donation!');
                            
                            // Reset the form after successful donation
                            document.getElementById('donationForm').reset();
                        },
                        error: function (error) {
                            console.error('Error inserting donation:', error);
                            alert('Failed to process donation. Please try again.');
                        }
                    });
                });
            },
        }).render('#paypal-button-container');

        paypalButtonsInitialized = true;
    }
});

function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var amount = document.getElementById('amount').value;

    if (name.trim() === '' || email.trim() === '' || amount.trim() === '') {
        alert('All fields are required.');
        return false;
    }
    return true;
}
</script>
        <?php
    }
}
include('includes/footer.php');
?>
