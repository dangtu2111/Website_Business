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
                                <form class="el-form form-cs pt-0" action="{{route('admin.post.home_user_post')}}" method="POST">
                                    @CSRF
                                    <div class="el-form-item"><label class="el-form-item__label">Tên</label>
                                        <div class="el-form-item__content"><input type="text" name='name'
                                                value="{{ old('name',($name?? "")) }}"
                                                class="form-control" readonly> <i
                                                class="el-form-item__error errors__name"
                                                readonly></i><!----></div>
                                    </div>
                                    <div class="el-form-item"><label class="el-form-item__label">Title</label>
                                        <div class="el-form-item__content"><input type="text" name='title'
                                                value="{!! old('name',($config['title'] ?? "")) !!}"
                                                class="form-control"> <i
                                                class="el-form-item__error errors__name"></i><!----></div>
                                    </div>


                                    <div class="el-form-item"><label class="el-form-item__label">Ảnh bìa</label>
                                        <div class="el-form-item__content">
                                            @if(Request::url() == url('admin/home_user/edit/banner'))
                                                
                                            <div id="list-img">
                                            @if(!empty($config['img']))
                                                @foreach($config['img'] as $img)
                                                <div style="    display: flex">
                                                    <div class="box-img-upload box-avatar" style="width: 100%;">
                                                        <div style="height: 100%;" class="preview-img">
                                                            <img src="{{ asset($img) }}" style="height: 100%;">
                                                        </div>
                                                        <input class="input-item form-control" value="{{ $img }}" type="hidden" name="cover_image[]">
                                                        <a data-input="thumbnail" data-preview="holder" class="img-item upload-file el-link el-link--default">
                                                            <span class="el-link--inner">
                                                                <span class="material-icons">upload_file</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <button type="button" style="    background: transparent;border: none;color: red;font-size: 20px;" data-category-id="#" data-category-name="#" class="remove-img el-button el-button--danger is-circle"><!----><i class="el-icon-delete"></i><!----></button>
                                                </div>
                                               
                                                @endforeach
                                            @endif

                                                
                                            </div>

                                            @else
                                            <div class="box-img-upload box-avatar" style="width: 100%;">
                                                <div style="height: 100%;" id="holder"> <img src="{{ old('cover_image',($config['img']?? "")) }}" style="height: 100%;"> </div>
                                                <input id="thumbnail" class="form-control" value="{{ old('cover_image',($config['img']?? "")) }}" type="hidden" name="cover_image">

                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="upload-file el-link el-link--default"><!---->
                                                    <span class="el-link--inner">
                                                        <span class="material-icons">upload_file</span>
                                                    </span><!---->
                                                </a>
                                            </div>
                                            @endif

                                            <div class="el-form-item" style="margin-top:40px"><!---->
                                                <div class="el-form-item__content">


                                                    <div class="el-form-item"><label class="el-form-item__label">Mô
                                                            tả</label>
                                                        <div class="el-form-item__content">

                                                            <textarea id="summernote" rows="8" name="content"
                                                                class="form-control"
                                                                placeholder="Post content"> {{ old('content',  isset($config['content']) ? base64_decode($config['content']) : "") }}
                                                            </textarea>


                                                        </div>
                                                    </div>

                                                    <div class="el-form-item"><label class="el-form-item__label">Sắp
                                                            xếp</label>
                                                        <div class="el-form-item__content"><input type="text"
                                                                name="sort_order"
                                                                value="{{ old('sort_order',($config['sort_order']?? "") ?? "") }}"
                                                                class="form-control"> <i
                                                                class="el-form-item__error errors__sorted"></i><!---->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label
                                                            class="control-label col-md-12 col-sm-12 col-xs-12">
                                                            Danh mục hiển thị chân trang
                                                        </label>
                                                        <div class="el-select"
                                                            style="width: 100%;">

                                                            <div
                                                                class="el-input el-input--suffix">
                                                                <input type="hidden" class="category_id" name="category_id" value="{{ old('category_id',$config['category'] ?? "") }}" {{ $name === 'news' ? 'required' : '' }}>
                                                                <!----><input type="text"
                                                                    readonly="readonly"
                                                                    autocomplete="off"
                                                                    placeholder="News bắt buộc phải điền các trường khác không cần điền"
                                                                    {{ $name === 'news' ? 'required' : '' }}
                                                                    class="el-input__inner"
                                                                    style="height: 40px;"><!----><span
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