<script src="{{ asset('Backend/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('Backend/js/library.js') }}"></script>
<script src="{{ asset('Backend/js/ui.js') }}"></script>
<script src="{{ asset('Backend/js/vi.js') }}?v=1736492186"></script>

<script>
  ELEMENT.locale(ELEMENT.lang.vi);
  var STATIC_URL = "{{ asset('Backend/js') }}";
</script>

<script src="{{ asset('Backend/js/tinymce/tinymce.min.js') }}"></script>
<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->
<script src="{{ asset('Backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Backend/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('Backend/js/pace.min.js') }}"></script>
<script src="{{ asset('Backend/js/main.min.js') }}"></script>
<script src="{{ asset('Backend/js/custom.js') }}?v=1736492186"></script>

    
    
    

<script>
    $(document).ready(function () {
        // Open modal
        $(".openModalBtn").on("click", function () {
            $("#modal").css("display", "flex");
            const categoryId = $(this).data("category-id");
            const categoryName = $(this).data("category-name");
            $("#modal").find(".name-category").val("Bạn có chắc muốn xóa : "+categoryName);
            $("#modal").find(".id-category").val(categoryId);
        });

        // Close modal
        $("#closeModalBtn").on("click", function () {
            $("#modal").css("display", "none");
        });

        // Close modal when clicking outside the content
        $("#modal").on("click", function (e) {
            if ($(e.target).is("#modal")) {
                $("#modal").css("display", "none");
            }
        });
    });
</script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script src="https://admin.hoidoanhnghiepquan1.com/storage/default/custom/js/nestable.js"></script>
@if (isset($config['js']) && is_array($config['js']))
        @foreach($config['js'] as $key => $val)
            <script src="{{ asset($val) }}"></script>
        @endforeach
    @endif
