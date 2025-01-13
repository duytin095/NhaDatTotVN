$(function () {
    var $dayFeeInput = $('input[name="daily_fee"]');
    var $weekFeeInput = $('input[name="weekly_fee"]');
    var $monthFeeInput = $('input[name="monthly_fee"]');

    // Define the conversion rates
    var daysInWeek = 7;
    var daysInMonth = 30; // Approximate days in a month

    // Add event listener to day fee input
    $dayFeeInput.on('input', function () {
        var dayFee = parseFloat($dayFeeInput.val()) || 0;
        var weekFee = dayFee * daysInWeek;
        var monthFee = dayFee * daysInMonth;

        // Format the currency numbers
        $dayFeeInput.on('input', function () {
            var dayFee = parseFloat($dayFeeInput.val()) || 0;
            var weekFee = dayFee * daysInWeek;
            var monthFee = dayFee * daysInMonth;

            // Update the week and month fee inputs
            $weekFeeInput.val(weekFee.toFixed(0));
            $monthFeeInput.val(monthFee.toFixed(0));
        });
    });
});