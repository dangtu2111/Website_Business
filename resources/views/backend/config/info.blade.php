<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Thông tin</h1>
                        </div>
                        <div class="card-body">
                            <form class="el-form form-cs pt-0" action="{{route('admin.config.post')}}" method="POST" enctype="multipart/form-data"><!---->

                                <div id="page">
                                    <div class="row">@CSRF
                                        <div class="col-md-12"><label for="settingsInputEmail" class="form-label">Công ty</label> <input type="text" class="form-control" name="name" value="{{ old('status',config('info.name')?? "") }}"></div>
                                        <!-- <div class="col-md-6"><label for="settingsPhoneNumber" class="form-label">Số điện thoại</label> <input type="text" class="form-control"></div> -->
                                    </div>
                                    <div class="row m-t-lg">
                                        <div class="col-md-6"><label for="settingsInputFirstName" class="form-label">Hotline</label> <input type="text" class="form-control" name="phone" value="{{ old('phone',config('info.phone')?? "") }}"></div>
                                        <div class="col-md-6"><label for="settingsInputLastName" class="form-label">Email</label> <input type="text" class="form-control" name="email" value="{{ old('email',config('info.email')?? "") }}"></div>
                                    </div>
                                    <div class="row m-t-lg">
                                        <div class="col-md-6"><label for="settingsInputFirstName" class="form-label">Website</label> <input type="text" class="form-control" name="website" value="{{ old('website',config('info.website')?? "") }}"></div>
                                        <div class="col-md-6"><label for="settingsInputFirstName" class="form-label">Địa chỉ</label> <input type="text" class="form-control" name="address" value="{{ old('address',config('info.address')?? "") }}"></div>
                                    </div>
                                    <div class="row m-t-lg">
                                        <div class="col-md-6"><label for="settingsInputFirstName" class="form-label">Ngày thành lập</label> <input type="date" class="form-control" name="ngay_thanh_lap" value="{{ old('ngay_thanh_lap',config('info.ngay_thanh_lap')?? "") }}"></div>
                                        <div class="col-md-6"><label for="settingsInputFirstName" class="form-label">Số lượng thành viên </label> <input type="text" class="form-control" name="member" value="{{ old('member',config('info.member')?? "") }}"></div>
                                    </div>
                                    <div class="row m-t-lg">
                                        <!-- <div class="col-md-6"><label for="settingsInputFirstName" class="form-label">Facebook</label> <input type="text" class="form-control" name="facebook" value="{{ old('facebook',config('info.facebook')?? "false") }}"></div> -->
                                        <!-- <div class="col-md-6"><label for="settingsInputLastName" class="form-label">Instagram</label> <input type="text" class="form-control"></div> -->
                                        <!-- <div class="col-md-6"><label for="settingsInputLastName" class="form-label">Youtube</label> <input type="text" class="form-control" name="youtube" value="{{ old('youtube',config('info.youtube')?? "false") }}"></div> -->
                                        <!-- <div class="col-md-6"><label for="settingsInputLastName" class="form-label">WhatsApp</label> <input type="text" class="form-control"></div>
                                        <div class="col-md-6"><label for="settingsInputLastName" class="form-label">Zalo</label> <input type="text" class="form-control"></div>
                                        <div class="col-md-6"><label for="settingsInputLastName" class="form-label">Tiktok</label> <input type="text" class="form-control"></div> -->
                                        <div class="col-md-6"><label for="settingsInputLastName" class="form-label">Link đăng ký ngay</label> <input type="text" class="form-control" name="register" value="{{ old('register',config('info.register')?? "false") }}"></div>

                                        <!-- <div class="col-md-6"><label for="settingsInputLastName" class="form-label">Chat zalo</label> <input type="text" class="form-control"></div>
                                        <div class="col-md-6"><label for="settingsInputLastName" class="form-label">Chat facebook</label> <input type="text" class="form-control"></div> -->
                                    </div>
                                    <div class="row m-t-lg">
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="el-form-item mt-3"><label class="el-form-item__label">Logo</label>
                                                <div class="el-form-item__content">
                                                    <div class="holder box-img-upload box-avatar"><img src="{{ old('logoIcon',config('info.logo')?? "false") }}" width="100%"> <a class="upload-file el-link el-link--default"><!----><span class="el-link--inner"><span class="material-icons">upload_file</span></span><!----></a></div> <i class="errors errors-text__logo"></i><!---->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12"><label class="form-label">
                                                Favicon
                                            </label>
                                            <div class="cs-image">
                                                <div class="holder box-img-upload box-avatar"><img src="{{ old('logoIcon',config('info.logo')?? "false") }}" width="100%"> <a class="upload-file el-link el-link--default"><!----><span class="el-link--inner"><span class="material-icons">upload_file</span></span><!----></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12"><label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                Bộ sưu tập ảnh
                                            </label>
                                            <div class="upload-gallery">
                                                <div tabindex="0" class="el-upload el-upload--picture">

                                                    <button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="el-button el-button--primary el-button--small"><!----><!----><span>Upload photo</span></button>
                                                    <input type="text" id="thumbnail" name="logoIcon" value="{{ old('logoIcon',config('info.logo')?? "false") }}" multiple="multiple" class="el-upload__input">
                                                </div>
                                                <div class="el-upload__tip">Jpg/png has a smaller capacity 500kb</div>
                                            </div>
                                            <div class="banners"></div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row m-t-lg">
                                        <div class="col-md-12"><label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                Mạng xã hội
                                            </label> <button type="button" id="addSocialButton" class="el-button el-button--primary"><!----><!----><span>Thêm mới</span></button>
                                            <div class="galleries">
                                                @if(config('info.social_network'))
                                                @foreach (config('info.social_network') as $key=> $social )
                                                <div class="galleries-item">
                                                    <div class="galleries-item-image" style="width: 120px; height: 120px;">
                                                        <a class="uploadSocial el-link el-link--default" data-input="img_social" data-preview="img_social_preview">
                                                            <span class="el-link--inner img_social_preview">
                                                                <img src="{{$social['icon']??""}}" style="height: 100%;">

                                                            </span>
                                                            <input type="hidden" autocomplete="off" name="img_social[]" value="{{ old('img_social',$social['icon']?? "false") }}" class="img_social el-input__inner">

                                                        </a>
                                                    </div>
                                                    <div class="galleries-item-des">
                                                        <div class="galleries-item-des-group" style="grid-template-columns: repeat(1, minmax(0px, 1fr));">
                                                            <div class="galleries-item-des-item">
                                                                <div class="galleries-item-des-item-right">Tên mạng xã hội</div>
                                                                <div class="galleries-item-des-item-left">
                                                                    <div class="el-input">
                                                                       
                                                                        <input type="text" autocomplete="off" value="{{ old('nameSocial',$key?? "false") }}" name="nameSocial[]" class="el-input__inner">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="galleries-item-des-item">
                                                                <div class="galleries-item-des-item-right">Tên tài khoản</div>
                                                                <div class="galleries-item-des-item-left">
                                                                    <div class="el-input">
                                                                       
                                                                        <input type="text" autocomplete="off" value="{{ old('account_name',$social['name']?? "account_name") }}" name="account_name[]" class="el-input__inner">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="galleries-item-des-item">
                                                                <div class="galleries-item-des-item-right">Liên kết</div>
                                                                <div class="galleries-item-des-item-left">
                                                                    <div class="el-input">
                                                                        <input type="text" autocomplete="off" name="linkSocial[]" value="{{ old('img_social',$social['link']?? "false") }}" class="el-input__inner">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="el-input">
                                                            <input type="hidden" autocomplete="off" class="el-input__inner">
                                                        </div>
                                                    </div>
                                                    <a class="galleries-item-remove btn btn-danger btn-burger el-link el-link--default">
                                                        <span class="el-link--inner">
                                                            <i class="material-icons">delete_outline</i>
                                                        </span>
                                                    </a>
                                                </div>

                                                @endforeach
                                                @else
                                                <div>
                                                    <p>Social Network: {{ $social }}</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cs-tool"><button type="submit" class="el-button btn btn-success el-button--primary"><!----><!----><span><i class="material-icons">add</i> Lưu thay đổi</span></button></div>
                                    
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>