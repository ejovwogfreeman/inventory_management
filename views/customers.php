<?php

include('./config/session.php');
include('./config/db.php');
include('./partials/header.php');

// Initialize variables to hold input values and error messages
$firstName = $lastName = $contact = $email = $dateRegistered = $company = $address = "";
$errors = [];
$formSubmitted = false;

// Process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formSubmitted = true;

    // Validate first name
    if (empty($_POST["firstName"])) {
        $errors['firstName'] = "First name is required.";
    } else {
        $firstName = htmlspecialchars(trim($_POST["firstName"]));
    }

    // Validate last name
    if (empty($_POST["lastName"])) {
        $errors['lastName'] = "Last name is required.";
    } else {
        $lastName = htmlspecialchars(trim($_POST["lastName"]));
    }

    // Validate contact
    if (empty($_POST["contact"])) {
        $errors['contact'] = "Contact is required.";
    } else {
        $contact = htmlspecialchars(trim($_POST["contact"]));
    }

    // Validate email
    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    // Validate date registered
    if (empty($_POST["dateRegistered"])) {
        $errors['dateRegistered'] = "Date registered is required.";
    } else {
        $dateRegistered = htmlspecialchars(trim($_POST["dateRegistered"]));
    }

    // Validate company
    if (empty($_POST["company"])) {
        $errors['company'] = "Company is required.";
    } else {
        $company = htmlspecialchars(trim($_POST["company"]));
    }

    // Validate address
    if (empty($_POST["address"])) {
        $errors['address'] = "Address is required.";
    } else {
        $address = htmlspecialchars(trim($_POST["address"]));
    }

    // If no errors, process the form (e.g., save to database)
    if (empty($errors)) {
        echo "<div class='alert alert-success'>Form submitted successfully!</div>";
        // You can further process the data, such as saving it to a database
        $formSubmitted = false; // Reset formSubmitted as the form is successfully submitted
    }
}

?>

<div class="container-fluid">
    <div class="row mt-4 rounded pt-3" style="background-color: white;">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>Customers</h1>
            <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class=" bi bi-plus me-2"></i>
                <span>ADD CUSTOMER</span>
            </button>
        </div>
        <div>
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>CATEGORY NAME</th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: rgba(0,0,0,0.05);">1</td>
                            <td>Processor</td>
                            <td>A nice processor with a good processing speed</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-pencil-square"></i>
                                <i class="bi bi-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: rgba(0,0,0,0.05);">2</td>
                            <td>Motherboard</td>
                            <td>A nice motherboard with a good processing speed</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-pencil-square"></i>
                                <i class="bi bi-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: rgba(0,0,0,0.05);">3</td>
                            <td>RAM</td>
                            <td>A nice RAM with a good processing speed</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-pencil-square"></i>
                                <i class="bi bi-trash"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade <?php echo ($formSubmitted && !empty($errors)) ? 'show d-block' : ''; ?>" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD CUSTOMER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="customerForm" class="row g-3 needs-validation" novalidate method="POST">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="w-100 me-2">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control <?php echo isset($errors['firstName']) ? 'is-invalid' : ''; ?>" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $errors['firstName'] ?? 'First name is required.'; ?>
                            </div>
                        </div>
                        <div class="w-100">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control <?php echo isset($errors['lastName']) ? 'is-invalid' : ''; ?>" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $errors['lastName'] ?? 'Last name is required.'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="w-100 me-2">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" class="form-control <?php echo isset($errors['contact']) ? 'is-invalid' : ''; ?>" id="contact" name="contact" value="<?php echo $contact; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $errors['contact'] ?? 'Contact is required.'; ?>
                            </div>
                        </div>
                        <div class="w-100">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo $email; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $errors['email'] ?? 'Email is required.'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="w-100 me-2">
                            <label for="dateRegistered" class="form-label">Date Registered</label>
                            <input type="date" class="form-control <?php echo isset($errors['dateRegistered']) ? 'is-invalid' : ''; ?>" id="dateRegistered" name="dateRegistered" value="<?php echo $dateRegistered; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $errors['dateRegistered'] ?? 'Date registered is required.'; ?>
                            </div>
                        </div>
                        <div class="w-100">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control <?php echo isset($errors['company']) ? 'is-invalid' : ''; ?>" id="company" name="company" value="<?php echo $company; ?>" required>
                            <div class="invalid-feedback">
                                <?php echo $errors['company'] ?? 'Company is required.'; ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control <?php echo isset($errors['address']) ? 'is-invalid' : ''; ?>" id="address" name="address" required><?php echo $address; ?></textarea>
                        <div class="invalid-feedback">
                            <?php echo $errors['address'] ?? 'Address is required.'; ?>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary w-100" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include('./partials/footer.php'); ?>

<style>
    .table th {
        font-size: 18px;
    }

    .table td,
    .table th {
        padding: 1rem;
    }

    .table .d-flex i {
        margin: 0 0.5rem;
        cursor: pointer;
    }

    .table .d-flex i:hover {
        color: #007bff;
    }

    .modal {
        z-index: 10055;
        /* Bootstrap default is 1050 */
    }

    .modal-backdrop {
        z-index: 10050;
        /* Bootstrap default is 1040 */
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));

        // Hide backdrop when modal is closed by clicking close button or X button
        modal._element.addEventListener('hidden.bs.modal', function() {
            document.querySelector('#staticBackdrop').classList.remove('d-block'); // Hide the backdrop
            document.getElementById('customerForm').reset(); // Reset the form
        });

        // Open the modal only if there were errors on form submission
        <?php if ($formSubmitted && !empty($errors)) : ?>
            modal.show();
        <?php endif; ?>
    });
</script>