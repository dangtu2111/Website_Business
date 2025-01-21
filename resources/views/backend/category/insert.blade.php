<link rel="stylesheet" href="{{asset('backend/summernote/summernote-lite.min.css')}}">
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
                                                    <div class="el-form-item"><label class="el-form-item__label">Trạng
                                                            thái</label>
                                                        <div class="el-form-item__content">
                                                            <div role="switch" aria-checked="true"
                                                                class="el-switch is-checked"><input
                                                                    type="hidden"
                                                                    true-value="1"  value="{{ old('status',$category->status??"false") }}" name="status" false-value="2"
                                                                    class="status el-switch__input"><span
                                                                    class="el-switch__label el-switch__label--left"><!----><span
                                                                        aria-hidden="true">Off</span></span><span
                                                                    class="el-switch__core"
                                                                    style="width: 40px; border-color: rgb(19, 206, 102); background-color: rgb(19, 206, 102);"></span><span
                                                                    class="el-switch__label el-switch__label--right is-active"><!----><span>On</span></span>
                                                            </div><!---->
                                                        </div>
                                                    </div>
                                                    <div class="el-form-item"><label class="el-form-item__label">Yêu cầu
                                                            đăng nhập</label>
                                                        <div class="el-form-item__content">
                                                            <div role="switch" class="el-switch">
                                                                <input type="hidden" name="require_login"  value="{{ old('require_login',$category->require_login??"false") }}"
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
                                        {!! $config['method'] == "update" ? '<input type="hidden" name="id" value="' . $category->id . '">' : '' !!}

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