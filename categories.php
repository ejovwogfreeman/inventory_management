<?php

include('./config/session.php');
include('./config/db.php');
include('./partials/header.php');

?>

<div class="container-fluid">
    <div class="row mt-4 rounded pt-3" style="background-color: white;">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>Categories</h1>
            <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class=" bi bi-plus me-2"></i>
                <span>ADD CATEGORY</span>
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
                            <td>1</td>
                            <td>Processor</td>
                            <td>A nice processor with a good processing speed</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-pencil-square"></i>
                                <i class="bi bi-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Motherboard</td>
                            <td>A nice motherboard with a good processing speed</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-pencil-square"></i>
                                <i class="bi bi-trash"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
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

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD CATEGORY</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
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