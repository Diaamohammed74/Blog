{{-- Start Script --}}


<script>
    $(function() {
        $('#category').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '{{ route('subcategories.get') }}',
                    type: 'GET',
                    data: {
                        'category_id': categoryId
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategory').empty();
                        $('#subcategory').append($('<option>').text('Choose Subcategory')
                            .attr('value', ''));
                        $.each(data, function(key, value) {
                            $('#subcategory').append($('<option>').text(value.name)
                                .attr('value', value.id));
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            } else {
                $('#subcategory').empty();
                $('#subcategory').append($('<option>').text('Choose Subcategory').attr('value', ''));
            }
        });
    });
</script>

{{-- /End Script --}}
