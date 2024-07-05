function showVaccinationRecords() {
    $.ajax({
        url: "./adminView/viewAllVaccinations.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showCategory() {
    $.ajax({
        url: "./adminView/viewCategories.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}




function showStaffs() {
    $.ajax({
        url: "./adminView/viewStaffs.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showHatchery() {
    $.ajax({
        url: "./adminView/viewHatchery.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showCustomers() {
    $.ajax({
        url: "./adminView/viewCustomers.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}


function showEggProduction() {
    $.ajax({
        url: "./adminView/viewEggProduction.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}



function showProducts() {
    $.ajax({
        url: "./adminView/viewProducts.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}




function showSales() {
    $.ajax({
        url: "./adminView/viewSales.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}


function showReports() {
    $.ajax({
        url: "./adminView/viewReportForm.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}





// edit customers records
function customersEditForm(id) {
    $.ajax({
        url: "./adminView/editCustomersForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}


// edit staffs records
function staffsEditForm(id) {
    $.ajax({
        url: "./adminView/staffsEditForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}


//update customers records after submit
function updateCustomers() {
    var id = $('#id').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var joiningDate = $('#joiningDate').val();
    var fd = new FormData();
    fd.append('id', id);
    fd.append('name', name);
    fd.append('email', email);
    fd.append('phone', phone);
    fd.append('joiningDate', joiningDate);

    $.ajax({
        url: './controller/updateCusController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Update customers detail Success.');
            $('form').trigger('reset');
            showCustomers();
        }
    });


}



//update staffs records after submit
function updateStaffs() {
    var id = $('#staff_id').val();
    var name = $('#staff_name').val();
    var address = $('#staff_address').val();
    var phone = $('#staff_phone').val();
    var job = $('#staff_job').val();
    var salary = $('#staff_salary').val();
    var fd = new FormData();
    fd.append('staff_id', id);
    fd.append('staff_name', name);
    fd.append('staff_address', address);
    fd.append('staff_phone', phone);
    fd.append('staff_job', job);
    fd.append('staff_salary', salary);

    $.ajax({
        url: './controller/updateStaffsController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Update staffs detail Success.');
            $('form').trigger('reset');
            showStaffs();
        }
    });


}


//add vaccination records
function addVaccinations() {
    var v_name = $('#v_name').val();
    var v_desc = $('#v_desc').val();
    var numOfBirds = $('#number_of_birds').val();
    var category = $('#category').val();
    var upload = $('#upload').val();
    var file = $('#file')[0].files[0];

    var fd = new FormData();
    fd.append('v_name', v_name);
    fd.append('v_desc', v_desc);
    fd.append('number_of_birds', numOfBirds);
    fd.append('category', category);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
        url: "./controller/addVaccinationController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Vaccination Record Added successfully.');
            $('form').trigger('reset');
            showVaccinationRecords();
        }
    });
}


//edit vaccination records
function vaccinationEditForm(id) {
    $.ajax({
        url: "./adminView/editVaccinationForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

//update vaccination records after submit
function updateVaccination() {
    var vaccination_id = $('#vaccination_id').val();
    var v_name = $('#v_name').val();
    var v_desc = $('#v_desc').val();
    var numOfBirds = $('#number_of_birds').val();
    var category = $('#category').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('vaccination_id', vaccination_id);
    fd.append('v_name', v_name);
    fd.append('v_desc', v_desc);
    fd.append('number_of_birds', numOfBirds);
    fd.append('category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);

    $.ajax({
        url: './controller/updateVaccinationController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Vaccination Records Update Success.');
            $('form').trigger('reset');
            showVaccinationRecords();
        }
    });
}

//delete vaccination records
function vaccinationDelete(id) {
    $.ajax({
        url: "./controller/deleteVaccinationController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Vaccination records Successfully deleted');
            $('form').trigger('reset');
            showVaccinationRecords();
        }
    });
}


//delete category data
function categoryDelete(id) {
    $.ajax({
        url: "./controller/catDeleteController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}



// delete customers module data

function customersDelete(id) {
    $.ajax({
        url: "./controller/cusDeleteController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Customer Successfully deleted');
            $('form').trigger('reset');

            showCustomers();
        }
    });
}



// delete products module data

function productsDelete(id) {
    $.ajax({
        url: "./controller/deleteProductsController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('product Successfully deleted');
            $('form').trigger('reset');

            showProducts();
        }
    });
}




//delete staffs data
function staffsDelete(id) {
    $.ajax({
        url: "./controller/deleteStaffsController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Staff Successfully deleted');
            $('form').trigger('reset');
            showStaffs();
        }
    });
}


//delete hatchery records
function hatcheryDelete(id) {
    $.ajax({
        url: "./controller/deleteHatcheryController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Successfully deleted');
            $('form').trigger('reset');
            showHatchery();
        }
    });
}



//delete egg production records 
function eggProductionDelete(id) {
    $.ajax({
        url: "./controller/deleteEggProductionController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('egg production Successfully deleted');
            $('form').trigger('reset');
            showEggProduction();
        }
    });
}



//edit hatchery records
function hatcheryEditForm(id) {
    $.ajax({
        url: "./adminView/editHatcheryForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}



//edit egg production records
function eggProductionEditForm(id) {
    $.ajax({
        url: "./adminView/editEggProductionForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}





//update hatchery records after submit
function updateHatchery() {
    var hatchery = $('#hatchery_id').val();
    var vaccination = $('#vaccination').val();
    var staff = $('#staffs').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('hatchery_id', hatchery);
    fd.append('vaccination', vaccination);
    fd.append('staffs', staff);
    fd.append('qty', qty);

    $.ajax({
        url: './controller/updateHatcheryController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Update Success.');
            $('form').trigger('reset');
            showHatchery();
        }
    });
}




//update hatchery records after submit
function updateEggProduction() {
    var eggProduction = $('#egg_production_id').val();
    var category = $('#category').val();
    var staffs = $('#staffs').val();
    var total = $('#total').val();
    var productionDate = $('#productionDate').val();
    var fd = new FormData();
    fd.append('egg_production_id', eggProduction);
    fd.append('category', category);
    fd.append('staffs', staffs);
    fd.append('total', total);
    fd.append('productionDate', productionDate);

    $.ajax({
        url: './controller/updateEggProductionController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Update egg production Success.');
            $('form').trigger('reset');
            showEggProduction();
        }
    });
}




// edit products records
function productsEditForm(id) {
    $.ajax({
        url: "./adminView/editProductsForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}


//update products records after submit
function updateProducts() {
    var product_id = $('#product_id').val();
    var product_name = $('#product_name').val();

    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('product_name', product_name);

    $.ajax({
        url: './controller/updateProductsController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Update product detail Success.');
            $('form').trigger('reset');
            showProducts();
        }
    });


}





//sales edit form function
function salesEditForm(saleId) {
    $.post("./adminView/editSaleForm.php", { record: saleId }, function(data) {
        $(".container").html(data);
    });
}

// sales delete function
function salesDelete(saleId) {
    if (confirm("Are you sure you want to delete this sale?")) {
        $.post("./controller/deleteSaleController.php", { record: saleId }, function(data) {
            alert(data);
            location.reload();
        });
    }
}


// AJAX function to handle sales update form submission
function updateSale() {
    var sale_id = $('#sale_id').val();
    var product = $('#product').val();
    var quantity = $('#quantity').val();
    var date = $('#date').val();
    var customer_id = $('#customer_id').val(); // Get customer_name from input field

    var fd = new FormData();
    fd.append('sale_id', sale_id);
    fd.append('product', product);
    fd.append('quantity', quantity);
    fd.append('date', date);
    fd.append('customer_id', customer_id); // Append customer_name to FormData

    $.ajax({
        url: './controller/updateSaleController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Update sales record successfully.');
            $('form').trigger('reset'); // Reset form fields
            showSales(); // Update sales list or table
        },
        error: function(xhr, status, error) {
            console.error('Failed to update sale:', error);
            alert('Failed to update sale. Please try again.');
        }
    });
}





// AJAX function to handle report generation

$(document).ready(function() {
    $('#reportForm').on('submit', generateReport);
});

function generateReport(event) {
    event.preventDefault();

    var reportData = {
        report_name: $('#report_name').val(),
        report_type: $('#report_type').val(),
        report_date: $('#report_date').val(),
        report_content: $('#report_content').val(),
        start_date: $('#start_date').val(),
        end_date: $('#end_date').val()
    };

    $.post("../controller/generateReportController.php", reportData, function(data) {
        $('#reportContainer').html(data);
    });
}

function printReport(report_id) {
    window.open('../controller/printReport.php?report_id=' + report_id, '_blank');
}

function reportEditForm(reportId) {
    $.post("./adminView/editReportForm.php", { record: reportId }, function(data) {
        $(".container").html(data);
    });
}

function reportDelete(reportId) {
    if (confirm("Are you sure you want to delete this report?")) {
        $.post("../controller/deleteReportController.php", { record: reportId }, function(data) {
            alert(data);
            location.reload();
        });
    }
}