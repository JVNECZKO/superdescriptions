$(document).ready(function() {
    $('body').on('change', '.product-variants [name="group[1]"], .product-variants [name="group[2]"], .product-variants [name="group[3]"]', function() {
        var id_product = $('#product_page_product_id').val();
        var id_product_attribute = $(this).val();

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'getDescription',
                id_product: id_product,
                id_product_attribute: id_product_attribute
            },
            success: function(response) {
                if (response.success) {
                    $('#product-description').html(response.description);
                    $('#product-description-short').html(response.description_short);
                }
            }
        });
    });
});