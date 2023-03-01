<script>
    $(document).ready(function() {

        // Initialize select2
        $("#selUser").select2();

        // Read selected option
        $('#but_read').click(function() {
            var username = $('#selUser option:selected').text();
            var userid = $('#selUser').val();

            $('#result').html("id : " + userid + ", name : " + username);

        });
    });
    $(document).ready(function() {
        $("#title").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{{ route('autocomplete') }}',
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.title;
                        });
                        response(resp);
                    }
                });
            },
            minLength: 2
        });
    });
</script>