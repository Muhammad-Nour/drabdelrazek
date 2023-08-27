
function calculateTotal()
{
    var salary = parseFloat($('.salary').text());
    var additional = parseFloat($('.additional').val());
    var insurance = parseFloat($('.insurance').text());
    var deduction = parseFloat($('.deduction').val());
    var loan = parseFloat($('.loan').val());

    var total_deductions = 0;
    var net_amount = 0;

    total_deductions = insurance + deduction + loan;
    net_amount = salary + additional - total_deductions;

    $('.total-deductions').text(total_deductions);
    $('.net-amount').text(net_amount);

}


 //change additional
 $('.additional').on('keyup', function() {

    calculateTotal();

});//end of additional

 //change deduction
 $('.deduction').on('keyup', function() {

    calculateTotal();

});//end of deduction

 //change loan
 $('.loan').on('keyup', function() {

    calculateTotal();

});//end of loan
