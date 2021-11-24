<script>
    $(document).ready(function() {
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
                            $('.searchBarResults').append('<li class="symptoms" id="' + data[i].ID + '"><a href="<?= URL_ROOT ?>/search/' + data[i].ID + '">' + data[i].Name + '</a></li>');
                        }
                    }
                }
            });
        });
    });
</script>