<div class="modal-overlay" id="modal">
    <div class="modal-content" style="padding: 2rem 3rem;width:50%">
        <form action="{{route('admin.category.post')}}" method="POST">
            @csrf
            <h3 style="padding-bottom:1rem">Hãy đọc kĩ trước khi thực hiện</h3>
            <input type="text" autocomplete="off" class="name-category el-input__inner" readonly>
            <input type="hidden" autocomplete="off" name="id" class="id-category el-input__inner" readonly>
            <input type="hidden" autocomplete="off" name="type" value="delete" class="el-input__inner" readonly>
            <div class="description" style="
    text-align: left;
    padding-top: 1rem;
">
                <p>Bạn có chắc chắn muốn xóa danh mục này?</p>
                <p>Sau khi xóa sẽ không thể khôi phục !</p>
                <p>Hãy suy nghĩ thật kĩ trước khi thực hiện </p>
            </div>
            <button class="modal-close" type="submit" id="closeModalBtn">Thực hiện xóa</button>
        </form>

    </div>
</div>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Danh sách bài viết</h1>
                        </div>
                        <div class="card-body">
                            <div id="page">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <div class="el-select" style="width: 100%;"><!---->
                                                    <div class="el-input el-input--suffix"><!----><input type="text" readonly="readonly" autocomplete="off" placeholder="Select" class="el-input__inner"><!----><span class="el-input__suffix"><span class="el-input__suffix-inner"><i class="el-select__caret el-input__icon el-icon-arrow-up"></i><!----><!----><!----><!----><!----></span><!----></span><!----><!----></div>
                                                    <div class="el-select-dropdown el-popper" style="display: none; min-width: 200.05px;">
                                                        <div class="el-scrollbar" style="">
                                                            <div class="el-select-dropdown__wrap el-scrollbar__wrap" style="margin-bottom: -17px; margin-right: -17px;">
                                                                <ul class="el-scrollbar__view el-select-dropdown__list"><!---->
                                                                    @foreach($categories_item as $category)
                                                                    <li class="el-select-dropdown__item"><span>{{$category->name}}</span></li>


                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                            <div class="el-scrollbar__bar is-horizontal">
                                                                <div class="el-scrollbar__thumb" style="transform: translateX(0%);"></div>
                                                            </div>
                                                            <div class="el-scrollbar__bar is-vertical">
                                                                <div class="el-scrollbar__thumb" style="transform: translateY(0%);"></div>
                                                            </div>
                                                        </div><!---->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-3">
                                                <div class="input-with-select el-input el-input-group el-input-group--append"><!----><input type="text" autocomplete="off" placeholder="Please input" class="el-input__inner"><!----><!---->
                                                    <div class="el-input-group__append"><button type="button" class="el-button el-button--default"><!----><i class="el-icon-search"></i><!----></button></div><!---->
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3 text-end"><button type="button" class="el-button el-button--warning"><!----><!----><span>Sắp xếp</span></button> <a href="{{route('admin.blogs.insert')}}" class="btn btn-success" style="margin-right: 0px; height: 40px; position: relative; top: -1px; display: inline-flex; align-content: center; align-items: center;">Đăng mới</a></div>
                                        </div>
                                        <form action="" id="pageForm" name="pageForm" method="POST" enctype="multipart/form-data">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr role="row">
                                                        <th width="70px">#</th>
                                                        <th>Name</th>
                                                        <th width="110px">Ngôn ngữ</th>
                                                        <th width="70px">Sắp xếp</th>
                                                        <th width="110px">Trạng thái</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($categories_item))
                                                    @foreach($categories_item as $category)
                                                    @if($category->post->isNotEmpty()) <!-- Kiểm tra xem category có ít nhất 1 post -->
                                                    @foreach($category->post as $post)
                                                    <tr role="row" class="even">
                                                        <td>{{$post->id}}</td>
                                                        <td><a href="{{route('admin.post.edit',['id'=>$post->id])}}">
                                                                {{$post->title}}
                                                            </a> <br>
                                                            Lượt xem: 0

                                                            <br>
                                                            Ngày đăng: {{$post->created_at}}
                                                            <br>
                                                            Ngày cập nhật: {{$post->updated_at}}
                                                            <code><a href="{{ config('app.url') . '/client/post/' . ($post->category->slug??"null") . '/' . $post->slug }}" target="_blank" style="color: rgb(102, 102, 102);">
                                                                    {{ config('app.url') . '/client/post/' . ($post->category->slug ?? 'null') . '/' . $post->slug }}</a></code>
                                                        </td>
                                                        <td class="text-center"><a href="https://admin.hoidoanhnghiepquan1.com/post/detail?id=f4c2563a-c254-4bb7-9111-72f2d68e9b45&amp;language=en">EN</a></td>
                                                        <td><input type="text" name="sorted[f4c2563a-c254-4bb7-9111-72f2d68e9b45]" value="0" style="width: 70px;"></td>
                                                        <td>
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
                                                            </div>
                                                        </td>
                                                        <td><button type="button" data-category-id="{{$post->id}}" data-category-name="{{$post->title}}" class="openModalBtn el-button el-button--danger is-circle"><!----><i class="el-icon-delete"></i><!----></button></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Sao chép</span><!----></a></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    @endforeach
                                                    @endif

                                                </tbody>
                                            </table> <input type="hidden" name="_token" value="LPulHD1lXmKcYt5ekKdqX0tXQOGR1snYZcpCGhJ6">
                                        </form>
                                    </div>
                                </div> <input type="hidden" id="copyPostAjax" value="https://admin.hoidoanhnghiepquan1.com/post/copy/post/ajax"> <input type="hidden" id="removePostAjax" value="https://admin.hoidoanhnghiepquan1.com/post/remove/post/ajax"> <input type="hidden" id="sortedAjax" value="https://admin.hoidoanhnghiepquan1.com/post/sorted/ajax">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>