$(document).ready(function () {
    $('#author').on('change', function () {
        var authorId = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/get-books-by-author',
            data: { author_id: authorId },
            success: function (data) {
                var booksSelect = $('#book');
                booksSelect.empty();
                $.each(data.books, function (key, value) {
                    booksSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    });
});