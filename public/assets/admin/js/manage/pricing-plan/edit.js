var cleaveDayFee, cleaveWeekFee, cleaveMonthFee;
$(function () {
    var $dayFeeInput = $('input[name="daily_fee"]');
    var $weekFeeInput = $('input[name="weekly_fee"]');
    var $monthFeeInput = $('input[name="monthly_fee"]');

    // Define the conversion rates
    var daysInWeek = 7;
    var daysInMonth = 30; // Approximate days in a month

    // Initialize Cleave on the daily fee input
    cleaveDayFee = new Cleave($dayFeeInput[0], {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    // Initialize Cleave on the weekly fee input
    cleaveWeekFee = new Cleave($weekFeeInput[0], {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    // Initialize Cleave on the monthly fee input
    cleaveMonthFee = new Cleave($monthFeeInput[0], {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    // Add event listener to day fee input
    $dayFeeInput.on('input', function () {
        var dayFee = cleaveDayFee.getRawValue(); // Get the unformatted numeric value
        dayFee = parseFloat(dayFee) || 0;
        var weekFee = dayFee * daysInWeek;
        var monthFee = dayFee * daysInMonth;

        // Update the week and month fee inputs
        cleaveWeekFee.setRawValue(weekFee); // Set the formatted value
        cleaveMonthFee.setRawValue(monthFee); // Set the formatted value
    });

});

function logData() {   
    let data = { 
        id: $('[name="id"]').val(),
        name: $('[name="name"]').val(),
        daily_fee: parseFloat(cleaveDayFee.getRawValue()),
        weekly_fee: parseFloat(cleaveWeekFee.getRawValue()),
        monthly_fee: parseFloat(cleaveMonthFee.getRawValue()),
        color: $('[name="color"]').val(),
        font_type: $('input[name="fontRadioOptions"]:checked').val(),
        auto_approve: $('[name="approveRadioOptions"]:checked').val(),
        phone_display: $('[name="phoneDisplayRadioOptions"]:checked').val(),
    }
    console.log(data);
}

async function updatePricingPlan() {
    try {
        let data = { 
            name: $('[name="name"]').val(),
            daily_fee: parseFloat(cleaveDayFee.getRawValue()),
            weekly_fee: parseFloat(cleaveWeekFee.getRawValue()),
            monthly_fee: parseFloat(cleaveMonthFee.getRawValue()),
            color: $('[name="color"]').val(),
            font_type: $('input[name="fontRadioOptions"]:checked').val(),
            auto_approve: $('[name="approveRadioOptions"]:checked').val(),
            phone_display: $('[name="phoneDisplayRadioOptions"]:checked').val(),
        }
        
        let id = $('[name="id"]').val();

        const response = await sendRequest(
            `${window.location.origin}/admin/pricing-plans/update/${id}`,
            'PUT',
            data
        );

        if (response.status == 200) {
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}