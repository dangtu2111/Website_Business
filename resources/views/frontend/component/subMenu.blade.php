<aside class="widget">
    <h2 class="ldtl-title">Menu chính</h2>
    <div class="widget-content nav-menu">
        <div class="menu-menu-chinh-container">
            <ul class="menu">
                <li class="menu-item"><a href="">Trang chủ</a></li>
                <li class="menu-item"><a href="">Giới thiệu</a></li>
                <li class="menu-item"><a href="">Tin tức - Sự kiện</a></li>
                <li class="menu-item"><a href="">Hội viên</a></li>
                <li class="menu-item"><a href="">Đối tác</a></li>
                <li class="menu-item"><a href="">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</aside>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy tất cả các thẻ <li> với class "menu-item"
        var menuItems = document.querySelectorAll('.menu-item');
        
        // Lắng nghe sự kiện click trên từng thẻ <li>
        menuItems.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.preventDefault(); // Ngừng hành động mặc định của thẻ <a> (không chuyển trang)
                
                // Cuộn trang lên đầu
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth' // Cuộn mượt mà
                });
            });
        });
    });
</script>