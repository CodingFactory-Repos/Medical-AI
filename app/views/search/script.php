<script>
    <?php require_once PUBLIC_ROOT . '/js/header.js'; ?>
    $(document).ready(function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        for(i = 0; i < urlParams.get('name').split(',').length; i++) {
            $('#searchForm').prepend('<p class="searchTag">' + urlParams.get('name').split(',')[i] + ' <span><i class="fas fa-times"></i></span></p>');
        }

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

                    let searchActualNames = "";
                    let searchActualIds = "";

                    for(i = 0; i < urlParams.get('name').split(',').length; i++) {
                        if(searchActualNames.length > 0) {
                            searchActualNames += ",";
                            searchActualIds += ",";
                        }
                        searchActualNames += urlParams.get('name').split(',')[i];
                        searchActualIds += urlParams.get('id').split(',')[i];
                    }

                    for (var i = 0; i < data.length; i++) {
                        if (i >= 8) {
                            break;
                        } else {
                            $('.searchBarResults').append('<li class="symptoms" id="' + data[i].ID + '"><a href="<?= URL_ROOT ?>/search?id=' + searchActualIds + "," + data[i].ID + '&name=' + searchActualNames + "," + data[i].Name + '">' + data[i].Name + '</a></li>');
                        }
                    }
                }
            });
        });
        $(".searchTag").on("click", (e) => {
            console.log(e.target.innerText);
            console.log(urlParams.get('name').split(',').length);
            console.log(urlParams.get('name'))

            let searchActualNames = "";
            let searchActualIds = "";

            for(i = 0; i < urlParams.get('name').split(',').length; i++) {
                if(urlParams.get('name').split(',')[i] != e.target.innerText) {
                    console.log(searchActualNames.length)
                    if(searchActualNames.length > 0) {
                        searchActualNames += ",";
                        searchActualIds += ",";
                    }
                    searchActualNames += urlParams.get('name').split(',')[i];
                    searchActualIds += urlParams.get('id').split(',')[i];
                }
            }
            console.log (searchActualNames + " " + searchActualIds);

            if (searchActualNames.length == 0) {
                window.location.href = "<?= URL_ROOT ?>";
            } else {
                window.location.href = "<?= URL_ROOT ?>/search?id=" + searchActualIds + "&name=" + searchActualNames;
            }
            
        });
    });
</script>