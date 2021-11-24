<script>
    $(document).ready(function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        $('#searchForm').prepend('<p class="searchTag">' + urlParams.get('name') + ' <span><i class="fas fa-times"></i></span></p>');
        // On input change show results from
        $('#searchBar').on('input', function() {
            var search = $(this).val();
            $.ajax({
                url: '<?= URL_ROOT ?>/api/allSymptoms/' + $(this).val(),
                type: 'GET',
                data: {
                    'search': $(this).val()
                },
                dataType: 'json',

                success: function(data) {
                    $('.searchBarResults').text(" ");

                    for (var i = 0; i < data.length; i++) {
                        if (i >= 8) {
                            break;
                        } else {
                            $('.searchBarResults').append('<li class="symptoms" id="' + data[i].ID + '"><a href="<?= URL_ROOT ?>/search?id=' + data[i].ID + '&name=' + data[i].Name + '">' + data[i].Name + '</a></li>');
                        }
                    }
                }
            });
        });
        $(".searchTag").on("click", () => {
            console.log("ice")
        });
    });
</script>