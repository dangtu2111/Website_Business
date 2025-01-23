<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Đăng bài viết</h1>
                        </div>
                        <div class="card-body">
                            <div id="page">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-3 text-right"><a
                                            href="https://admin.hoidoanhnghiepquan1.com/post/detail"
                                            class="btn btn-success bt-add" style="margin-right: 0px;">Đăng
                                            bài viết khác</a></div>
                                            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                                    <form class="el-form form-cs pt-0" action="{{route('admin.blogs.insertPost')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <!---->
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="el-form-item mt-3"><label
                                                            class="el-form-item__label">Tiêu đề</label>
                                                        <div class="el-form-item__content"><input
                                                                name="title" value="{{ old('title',($post->title) ?? "") }}" type="text" class="form-control" required><!---->
                                                        </div>
                                                    </div>
                                                    <div class="el-form-item"><label
                                                            class="el-form-item__label">Đường dẫn</label>
                                                        <div class="el-form-item__content"><input
                                                                name="slug" value="{{ old('slug',($post->slug) ?? "") }}" type="text" class="form-control"><!---->
                                                        </div>
                                                    </div>
                                                    <div class="el-form-item"><label
                                                            class="el-form-item__label">Link download tài
                                                            liệu</label>
                                                        <div class="el-form-item__content"><input
                                                                name="download" value="{{ old('download',($post->download) ?? "") }}" type="text" class="form-control"><!---->
                                                        </div>
                                                    </div>
                                                    <div class="el-form-item"><label
                                                            class="el-form-item__label">Giới thiệu</label>
                                                        <div class="el-form-item__content">
                                                            <div class="el-textarea"><textarea
                                                                    autocomplete="off" rows="3"
                                                                    name="description"
                                                                 
                                                                    placeholder="Mô tả ngắn" maxlength="300"
                                                                    class="el-textarea__inner"
                                                                    style="min-height: 32.6px;" required>{{ old('description',($post->description) ?? "") }}</textarea><span
                                                                    class="el-input__count">0/300</span>
                                                            </div><!---->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="el-tabs el-tabs--top">
                                                                <div class="el-tabs__header is-top">
                                                                    <div class="el-tabs__nav-wrap is-top">
                                                                        <div class="el-tabs__nav-scroll">
                                                                            <div role="tablist"
                                                                                class="el-tabs__nav is-top"
                                                                                style="transform: translateX(0px);">
                                                                                <div class="el-tabs__active-bar is-top"
                                                                                    style="width: 56px; transform: translateX(0px);">
                                                                                </div>
                                                                                <div id="tab-description"
                                                                                    aria-controls="pane-description"
                                                                                    role="tab"
                                                                                    aria-selected="true"
                                                                                    tabindex="0"
                                                                                    class="el-tabs__item is-top is-active">
                                                                                    Nội dung</div>
                                                                                <div id="tab-seo"
                                                                                    aria-controls="pane-seo"
                                                                                    role="tab" tabindex="-1"
                                                                                    class="el-tabs__item is-top">
                                                                                    Tối ưu SEO</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="el-tabs__content">
                                                                    <div role="tabpanel"
                                                                        id="pane-description"
                                                                        aria-labelledby="tab-description"
                                                                        class="el-tab-pane"><textarea id="summernote" rows="8" name="content" class="form-control" placeholder="Post content">{{ old('content',$post->content ?? "") }}</textarea></div>
                                                                    <div role="tabpanel" aria-hidden="true"
                                                                        id="pane-seo"
                                                                        aria-labelledby="tab-seo"
                                                                        class="el-tab-pane"
                                                                        style="display: none;">
                                                                        <div class="el-form-item mt-3">
                                                                            <label
                                                                                class="el-form-item__label">Từ
                                                                                khoá trọng tâm</label>
                                                                            <div
                                                                                class="el-form-item__content">
                                                                                <input type="text" name="focus_keywords" value="{{ old('focus_keywords',$post->focus_keywords ?? "") }}"
                                                                                    class="form-control"><!---->
                                                                            </div>
                                                                        </div>
                                                                        <div class="el-form-item"><label
                                                                                class="el-form-item__label">Meta
                                                                                title</label>
                                                                            <div
                                                                                class="el-form-item__content">
                                                                                <input type="text"
                                                                                value="{{ old('meta_title',$post->meta_title ?? "") }}"
                                                                                    name="meta_title" class="form-control"><!---->
                                                                            </div>
                                                                        </div>
                                                                        <div class="el-form-item"><label
                                                                                class="el-form-item__label">Meta
                                                                                keyword</label>
                                                                            <div
                                                                                class="el-form-item__content">

                                                                                <input type="text"
                                                                                value="{{ old('meta_keyword',$post->meta_keyword ?? "") }}"
                                                                                    name="meta_keyword" class="form-control"><!---->
                                                                            </div>
                                                                        </div>
                                                                        <div class="el-form-item"><label
                                                                                class="el-form-item__label">Meta
                                                                                description</label>
                                                                            <div
                                                                                class="el-form-item__content">
                                                                                <div class="el-textarea">
                                                                                    <textarea
                                                                                        autocomplete="off"
                                                                                        rows="3"
                                                                                        name="meta_description"
                                                                                        maxlength="200"
                                                                                        class="el-textarea__inner"
                                                                                        style="min-height: 32.6px;">{{ old('meta_description',$post->meta_description ?? "") }}"</textarea><span
                                                                                        class="el-input__count">0/200</span>
                                                                                </div><!---->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12"><label
                                                                class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                Gallery
                                                                <a
                                                                    class="upload-file el-link el-link--default"><!----><span
                                                                        class="el-link--inner"><span
                                                                            class="material-icons">add_circle_outline</span></span><!----></a></label>
                                                            <div class="banners-detail"></div>
                                                        </div>
                                                        <div class="el-form-item mt-3"><label
                                                                class="el-form-item__label">Chuẩn SEO cơ
                                                                bản</label>
                                                            <div class="el-form-item__content">
                                                                <ul>
                                                                    <li>Từ khoá trong tiêu đề</li>
                                                                    <li>Từ khoá trong Meta Description.</li>
                                                                    <li>Từ khoá trong liên kết.</li>
                                                                    <li>Từ khoá trong nội dung đầu tiên.
                                                                    </li>
                                                                    <li>Từ khoá trong nội dung.</li>
                                                                    <li>
                                                                        Nội dung đủ dài<br>
                                                                        Nhiều hơn 2500 từ: 100% điểm<br>
                                                                        2000-2500 từ: 70% điểm<br>
                                                                        1500-2000 từ: 60% điểm<br>
                                                                        1000-1500 từ: 40% điểm<br>
                                                                        600-1000 từ: 20% điểm<br>
                                                                        Dưới 600 từ: 0% điểm<br></li>
                                                                    <li>
                                                                        Mở rộng<br>
                                                                        Từ khóa tập trung được tìm thấy
                                                                        trong (các) thuộc tính alt của hình
                                                                        ảnh.<br>
                                                                        Mật độ từ khóa là 1,17, Từ khóa tập
                                                                        trung và kết hợp xuất hiện 8
                                                                        lần.<br>
                                                                        URL dài 74 ký tự<br>
                                                                        Bạn đang liên kết với các tài nguyên
                                                                        bên ngoài.<br>
                                                                        Ít nhất một liên kết bên ngoài có
                                                                        DoFollow được tìm thấy trong nội
                                                                        dung của bạn.<br>
                                                                        Bạn đang liên kết đến các tài nguyên
                                                                        khác trên trang web của mình, điều
                                                                        này thật tuyệt.<br>
                                                                        Bạn chưa từng sử dụng Từ khóa tập
                                                                        trung này trước đây.<br></li>
                                                                    <li>
                                                                        Khả năng đọc tiêu đề<br>
                                                                        Từ khóa tập trung được sử dụng ở đầu
                                                                        tiêu đề SEO.<br>
                                                                        Tiêu đề SEO của bạn không chứa
                                                                        số.<br></li>
                                                                    <li>
                                                                        Khả năng đọc nội dung<br>
                                                                        Chia đoạn nội dung theo mục lục<br>
                                                                        Ít nhất một đoạn văn dài. Cân nhắc
                                                                        sử dụng các đoạn văn ngắn.<br>
                                                                        Nội dung của bạn chứa hình ảnh
                                                                        và/hoặc video.<br></li>
                                                                </ul><!---->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="el-form-item mt-3"><label
                                                            class="el-form-item__label">Trạng thái</label>
                                                        <div class="el-form-item__content">
                                                            <div role="switch" aria-checked="true"
                                                                class="el-switch is-checked">
                                                                <input
                                                                    type="hidden" name="status" value="{{ old('status',$post->status ?? "false") }}" true-value="1"
                                                                    false-value="0"
                                                                    class="status el-switch__input"><span
                                                                    class="el-switch__label el-switch__label--left"><!----><span
                                                                        aria-hidden="true">Tắt</span></span><span
                                                                    class="el-switch__core"
                                                                    style="width: 40px;"></span><span
                                                                    class="el-switch__label el-switch__label--right is-active"><!----><span>Bật</span></span>
                                                            </div><!---->
                                                        </div>
                                                    </div>
                                                    <div class="el-form-item"><label
                                                            class="el-form-item__label">Ảnh đại diện</label>
                                                        <div class="el-form-item__content">
                                                            <div class="box-img-upload box-avatar"
                                                                style="width: 100%;">
                                                                <div style="height: 100%;" id="holder">
                                                                <img src="{{ old('cover_image',$post->cover_image ?? "") }}" style="height: 100%;"> </div>
                                                                <input id="thumbnail" class="form-control" type="hidden" name="cover_image" value="{{ old('cover_image',$post->cover_image ?? "") }}" required>

                                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                                    class="upload-file el-link el-link--default"><!----><span
                                                                        class="el-link--inner"><span
                                                                            class="material-icons">upload_file</span></span><!----></a>
                                                            </div>
                                                            <div class="el-form-item"><!---->
                                                                <div class="el-form-item__content">

                                                                    <div class="col-md-12">
                                                                        <label
                                                                            class="control-label col-md-12 col-sm-12 col-xs-12">
                                                                            Danh mục
                                                                        </label>
                                                                        <div class="el-select"
                                                                            style="width: 100%;">

                                                                            <div
                                                                                class="el-input el-input--suffix">
                                                                                        <input type="hidden" class="category_id" name="category_id" value="{{ old('category_id',$post->category_id ?? "") }}"  required>
                                                                                <!----><input type="text"
                                                                                    readonly="readonly"
                                                                                    autocomplete="off"
                                                                                    placeholder="Select"
                                                                                   
                                                                                    class=" el-input__inner"
                                                                                    style="height: 40px;
                                                                                    " required><!----><span
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
                                                                </div>
                                                            </div><!---->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="hidden" name="type" value="{{$config['method']}}">
                                        {!! $config['method'] == "update" ? '<input type="hidden" name="id" value="' . $post->id . '">' : '' !!}

                                        
                                        <div class="cs-tool">
                                            <a
                                                href="https://admin.hoidoanhnghiepquan1.com/post"
                                                class="btn btn-secondary me-3"><i
                                                    class="material-icons">undo</i> Trở về
                                            </a>
                                            <button type="submit" class="btn btn-success"><i
                                                    class="material-icons">add</i> Lưu bài viết
                                            </button>
                                        </div>
                                    </form>
                                </div> <input type="hidden" id="postAjax"
                                    value="https://admin.hoidoanhnghiepquan1.com/post/post/ajax">
                                <div class="el-dialog__wrapper cs-box-upload page-media"
                                    style="display: none;">
                                    <div role="dialog" aria-modal="true" aria-label="QUẢN LÝ MEDIA"
                                        class="el-dialog" style="margin-top: 1vh; width: 80%;">
                                        <div class="el-dialog__header"><span class="el-dialog__title">QUẢN
                                                LÝ MEDIA</span><button type="button" aria-label="Close"
                                                class="el-dialog__headerbtn"><i
                                                    class="el-dialog__close el-icon el-icon-close"></i></button>
                                        </div><!----><!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>