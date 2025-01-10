<script src="{{ asset('Backend/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('Backend/js/library.js') }}"></script>
<script src="{{ asset('Backend/js/ui.js') }}"></script>
<script src="{{ asset('Backend/js/vi.js') }}?v=1736492186"></script>

<script>
  ELEMENT.locale(ELEMENT.lang.vi);
  var STATIC_URL = "{{ asset('Backend/js') }}";
</script>

<script src="{{ asset('Backend/js/tinymce.min.js') }}"></script>
<script src="{{ asset('Backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Backend/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('Backend/js/pace.min.js') }}"></script>
<script src="{{ asset('Backend/js/main.min.js') }}"></script>
<script src="{{ asset('Backend/js/custom.js') }}?v=1736492186"></script>

    
    @if (isset($config['js']) && is_array($config['js']))
        @foreach($config['js'] as $key => $val)
            <script src="{{ asset($val) }}"></script>
        @endforeach
    @endif