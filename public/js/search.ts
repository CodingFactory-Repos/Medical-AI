// search.ts
// Created by Louis on 08/03/2022.

// On input change show results from
$('#searchBar').on('input', function () {
    // Get the value of the input
    const search: any = $(this).val();

    // If the value is empty, don't do anything
    if (search != '') {
        // Get all symptoms from api
        $.ajax({
            url: '<?= URL_ROOT ?>/api/allSymptoms/' + search,
            type: 'GET',
            data: {
                'search': search
            },
            dataType: 'json',

            // If the request is successful
            success: function (data) {
                // If there are results
                $('.searchBarResults').text(" ");

                // For each result
                for (let i : number = 0; i < data.length; i++) {
                    // Check if already 5 results are shown
                    if (i >= 5) {
                        // If yes, break the loop
                        break;
                    } else {
                        // If not, show the result
                        $('.searchBarResults').append('<li class="symptoms" id="' + data[i].ID + '"><a href="<?= URL_ROOT ?>/search?id=' + data[i].ID + '&name=' + data[i].Name + '">' + data[i].Name + '</a></li>');
                    }
                }
            }
        });
    }
});