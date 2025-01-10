<script src="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="https://admin.hoidoanhnghiepquan1.com/storage/default/plugins/ui/library.js"></script>
    <script src="https://admin.hoidoanhnghiepquan1.com/storage/default/plugins/ui/ui.js"></script>
    <script src="https://admin.hoidoanhnghiepquan1.com/storage/default/plugins/ui/vi.js?v=1736492186"></script>
    
    <script>
      ELEMENT.locale(ELEMENT.lang.vi);
      var STATIC_URL = "https://admin.hoidoanhnghiepquan1.com/storage/default";
    </script>

    <script src="https://admin.hoidoanhnghiepquan1.com/storage/default/tinymce/tinymce.min.js"></script>
    <script src="https://admin.hoidoanhnghiepquan1.com/storage/default/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/plugins/pace/pace.min.js"></script>
    <script src="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/js/main.min.js"></script>
    <script src="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/js/custom.js?v=1736492186"></script>
    
    @if (isset($config['js']) && is_array($config['js']))
        @foreach($config['js'] as $key => $val)
            <script src="{{ asset($val) }}"></script>
        @endforeach
    @endif