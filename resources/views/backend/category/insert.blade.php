<link rel="stylesheet" href="{{asset('Backend/summernote/summernote-lite.min.css')}}">
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="card-header">

                            <h1 class="card-title">Tạo danh mục</h1>
                        </div>
                        <div class="card-body">
                            <div id="page">
                                <form class="el-form form-cs pt-0" action="{{route('admin.category.post')}}" method="POST">
                                    @CSRF
                                    {!! $config['method'] == "update" ? '<input type="hidden" name="id" value="' . $category->id . '">' : '' !!}
                                    <div class="el-form-item"><label class="el-form-item__label">Tên</label>
                                        <div class="el-form-item__content"><input type="text" name='name'
                                                value="{{ old('name',($category->name) ?? "") }}"
                                                class="form-control"> <i
                                                class="el-form-item__error errors__name"></i><!----></div>
                                    </div>
                                    <div class="el-form-item"><label class="el-form-item__label">Đường dẫn</label>
                                        <div class="el-form-item__content"><input type="text" name='slug'
                                                value="{{ old('slug',($category->slug) ?? "") }}"
                                                class="form-control"> <i
                                                class="el-form-item__error errors__slug"></i><!----></div>
                                    </div>
                                    <div class="el-form-item"><label class="el-form-item__label">Iframe</label>
                                        <div class="el-form-item__content"><input type="text" name='iframe'
                                                value="{{ old('iframe',($category->iframe) ?? "") }}"
                                                class="form-control"> <i
                                                class="el-form-item__error errors__iframe"></i><!----></div>
                                    </div>
                                    <div class="el-form-item"><label class="el-form-item__label">Icon</label>
                                        <div class="el-form-item__content">
                                            <div><img width="100%"> <a
                                                    class="upload-file el-link el-link--default"><!----><span
                                                        class="el-link--inner"><span
                                                            class="material-icons">upload_file</span></span><!----></a>
                                            </div><!---->
                                        </div>
                                    </div>
                                    <div class="el-form-item"><label class="el-form-item__label">Ảnh bìa</label>
                                        <div class="el-form-item__content">
                                            <div class="box-img-upload box-avatar" style="width: 100%;">
                                                <div style="height: 100%;" id="holder"> <img src="{{ old('cover_image',$category->cover_image ?? "") }}" style="height: 100%;"> </div>
                                                <input id="thumbnail" class="form-control" value="{{ old('cover_image',($category->cover_image) ?? "") }}" type="hidden" name="cover_image">

                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="upload-file el-link el-link--default"><!---->
                                                    <span class="el-link--inner">
                                                        <span class="material-icons">upload_file</span>
                                                    </span><!---->
                                                </a>
                                            </div>
                                            <div class="el-form-item" style="margin-top:40px"><!---->
                                                <div class="el-form-item__content">


                                                    <div class="el-form-item"><label class="el-form-item__label">Mô
                                                            tả</label>
                                                        <div class="el-form-item__content">

                                                            <textarea id="summernote" rows="8" name="content"
                                                                class="form-control"
                                                                placeholder="Post content">{{ old('content',$category->content ?? " ") }}</textarea>


                                                        </div>
                                                    </div>

                                                    <div class="el-form-item"><label class="el-form-item__label">Sắp
                                                            xếp</label>
                                                        <div class="el-form-item__content"><input type="text"
                                                                name="sort_order"
                                                                value="{{ old('sort_order',($category->sort_order) ?? "") }}"
                                                                class="form-control"> <i
                                                                class="el-form-item__error errors__sorted"></i><!---->
                                                        </div>
                                                    </div>
                                                    <div class="el-form-item">
                                                        
                                                            <label
                                                                class="control-label col-md-12 col-sm-12 col-xs-12">
                                                                Vị trí bên trái 
                                                            </label>
                                                            <div class="el-form-item">
                                                                <div class="el-form-item__content"><input type="text" name='title_news'
                                                                        placeholder="Nhập title cho danh mục"
                                                                        value="{{ old('title_news',($category->title_news) ?? "") }}"
                                                                        class="form-control"> <i
                                                                        class="el-form-item__error errors__slug"></i><!----></div>
                                                            </div>
                                                            <div class="el-select"
                                                                style="width: 100%;">

                                                                <div
                                                                    class="el-input el-input--suffix">
                                                                    <input type="hidden" class="category_id" name="category_news" value="{{ old('category_news',$category->category_news ?? "") }}" >
                                                                    <!----><input type="text"
                                                                        readonly="readonly"
                                                                        autocomplete="off"
                                                                        placeholder="Select"

                                                                        class=" el-input__inner"
                                                                        style="height: 40px;
                                                                                    " ><!----><span
                                                                        class="el-input__suffix"><span
                                                                            class="el-input__suffix-inner"><i
                                                                                class="el-select__caret el-input__icon el-icon-arrow-up"></i><!----><!----><!----><!----><!----></span><!----></span><!----><!---->
                                                                </div>
                                                                <div class="el-select-dropdown el-popper is-multiple"
                                                                    style="display: none; min-width: 150.05px;">
                                                                    <div class="el-scrollbar"
                                                                        style="">
                                                                        <div class="el-select-dropdown__wrap el-scrollbar__wrap"
                                                                            style="margin-bottom: -17px; margin-right: -17px;">
                                                                            <ul
                                                                                class="el-scrollbar__view el-select-dropdown__list">
                                                                                <!---->
                                                                                @foreach($categories as $category)
                                                                                <li
                                                                                    class="el-select-dropdown__item">
                                                                                    <span data="{{$category->id}}"> {{ $category->name}}</span>
                                                                                </li>

                                                                                @endforeach


                                                                            </ul>
                                                                        </div>
                                                                        <div
                                                                            class="el-scrollbar__bar is-horizontal">
                                                                            <div class="el-scrollbar__thumb"
                                                                                style="transform: translateX(0%);">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="el-scrollbar__bar is-vertical">
                                                                            <div class="el-scrollbar__thumb"
                                                                                style="transform: translateY(0%);">
                                                                            </div>
                                                                        </div>
                                                                    </div><!---->
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                    </div>
                                                    <div class="el-form-item">
                                                        
                                                            <label
                                                                class="control-label col-md-12 col-sm-12 col-xs-12">
                                                                Vị trí dưới
                                                            </label>
                                                            <div class="el-form-item">
                                                                <div class="el-form-item__content"><input type="text" name='title_bottom'
                                                                        placeholder="Nhập title cho danh mục"
                                                                        value="{{ old('title_bottom',($category->title_bottom) ?? "") }}"
                                                                        class="form-control"> <i
                                                                        class="el-form-item__error errors__slug"></i><!----></div>
                                                            </div>
                                                            <div class="el-select"
                                                                style="width: 100%;">

                                                                <div
                                                                    class="el-input el-input--suffix">
                                                                    <input type="hidden" class="category_id" name="category_bottom" value="{{ old('category_bottom',$category->category_bottom ?? "") }}" >
                                                                    <!----><input type="text"
                                                                        readonly="readonly"
                                                                        autocomplete="off"
                                                                        placeholder="Select"

                                                                        class=" el-input__inner"
                                                                        style="height: 40px;
                                                                                    " ><!----><span
                                                                        class="el-input__suffix"><span
                                                                            class="el-input__suffix-inner"><i
                                                                                class="el-select__caret el-input__icon el-icon-arrow-up"></i><!----><!----><!----><!----><!----></span><!----></span><!----><!---->
                                                                </div>
                                                                <div class="el-select-dropdown el-popper is-multiple"
                                                                    style="display: none; min-width: 150.05px;">
                                                                    <div class="el-scrollbar"
                                                                        style="">
                                                                        <div class="el-select-dropdown__wrap el-scrollbar__wrap"
                                                                            style="margin-bottom: -17px; margin-right: -17px;">
                                                                            <ul
                                                                                class="el-scrollbar__view el-select-dropdown__list">
                                                                                <!---->
                                                                                @foreach($categories as $category)
                                                                                <li
                                                                                    class="el-select-dropdown__item">
                                                                                    <span data="{{$category->id}}"> {{ $category->name}}</span>
                                                                                </li>

                                                                                @endforeach


                                                                            </ul>
                                                                        </div>
                                                                        <div
                                                                            class="el-scrollbar__bar is-horizontal">
                                                                            <div class="el-scrollbar__thumb"
                                                                                style="transform: translateX(0%);">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="el-scrollbar__bar is-vertical">
                                                                            <div class="el-scrollbar__thumb"
                                                                                style="transform: translateY(0%);">
                                                                            </div>
                                                                        </div>
                                                                    </div><!---->
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                    </div>
                                                    <div class="el-form-item"><label class="el-form-item__label">Yêu cầu
                                                            đăng nhập</label>
                                                        <div class="el-form-item__content">
                                                            <div role="switch" class="el-switch">
                                                                <input type="hidden" name="require_login" value="{{ old('require_login',$category->require_login??"false") }}"
                                                                    class="status el-switch__input">
                                                                <span
                                                                    class="el-switch__label el-switch__label--left is-active"><!----><span>Off</span></span><span
                                                                    class="el-switch__core"
                                                                    style="width: 40px; border-color: rgb(255, 73, 73); background-color: rgb(255, 73, 73);"></span><span
                                                                    class="el-switch__label el-switch__label--right"><!----><span
                                                                        aria-hidden="true">On</span></span>
                                                            </div><!---->
                                                        </div>
                                                    </div>


                                                </div>
                                            </div><!---->
                                        </div>
                                    </div>
                                    <input type="hidden" name="type" value="{{$config['method']}}"
                                        class="el-switch__input">
                                    

                                    <div class="cs-tool" style="background: transparent;box-shadow: none;">
                                        <a href="{{route('admin.category')}}" class="btn btn-secondary me-3">
                                            <i class="material-icons">undo</i> Trở về
                                        </a>

                                        <button type="submit" class="btn btn-success">
                                            <i class="material-icons">add</i> Lưu thay đổi
                                        </button>
                                    </div>

                                </form>
                                <input type="hidden" id="mediaAjax"
                                    value="https://admin.hoidoanhnghiepquan1.com/file/pagination/ajax">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>