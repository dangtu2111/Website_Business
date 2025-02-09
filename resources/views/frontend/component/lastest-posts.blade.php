<div class="latest-posts">
    <div class="title">
        <h2 class="ldtl-title">{{$category->title_bottom}}</h2>
    </div>
    <div class="row" id="posts-list">
        <!-- Dữ liệu bài viết sẽ được hiển thị tại đây -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Gọi API khi tải trang
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('user.get_posts', ['category' => $category->category_bottom]) }}", // URL API
            type: "GET", // Phương thức GET
            success: function(response) {
                var postsList = $('#posts-list'); // Sử dụng selector chính xác để thêm bài viết vào đúng vị trí
                postsList.empty(); // Xóa nội dung cũ

                // Kiểm tra nếu có dữ liệu
                if (response.data && response.data.data.length > 0) {
                    response.data.data.forEach(function(post) {
                        // Đưa mỗi bài viết vào trong div mới
                        postsList.append(
                            '<div class="col-lg-4 col-md-4 col-sm-6">' +
                                '<div class="news-box box-1">' +
                                    '<div class="news-img">' +
                                        '<img src="' + post.cover_image + '" alt="' + post.title + '">' +
                                    '</div>' +
                                    '<div class="news-info text-center">' +
                                        '<h5><a href="/posts/' + post.slug + '">' + post.title + '</a></h5>' +
                                    '</div>' +
                                '</div>' +
                            '</div>'
                        );
                    });
                } else {
                    postsList.append('<p>No posts available.</p>');
                }
            },
            error: function(error) {
                console.log('Error:', error);
                $('#posts-list').append('<p>There was an error loading posts.</p>');
            }
        });
    });
</script>
