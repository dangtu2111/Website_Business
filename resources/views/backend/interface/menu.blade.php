<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Menu</h1>
                        </div>
                        <div class="card-body">
                            <div id="page">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <button type="button" class="menu-group el-button el-button--primary"><!----><!----><span>Tạo nhóm group</span></button>

                                                <button type="button" class="lien-ket el-button el-button--primary"><!----><!----><span>Tạo liên kết</span></button>
                                            </div>
                                        </div>
                                        <div class="el-row" style="margin-left: -10px; margin-right: -10px;">
                                            <div class="el-col el-col-24" style="padding-left: 10px; padding-right: 10px;">
                                                <div id="links-output"></div>
                                                <div id="links" class="dd mt-3">
                                                    <ol id="link-list" class="dd-list">
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-tool"><button type="button" id="update-group-btn" class="btn btn-success"><i class="material-icons">add</i> Lưu thay đổi
                                        </button></div>
                                </div>
                                <div class="el-dialog__wrapper" id="dialogLink" style="z-index: 2005; display: none;">
                                    <div role="dialog" aria-modal="true" aria-label="Link" class="el-dialog" style="margin-top: 15vh; width: 420px;">
                                        <div class="el-dialog__header">
                                            <span class="el-dialog__title">Link</span>
                                            <button type="button" aria-label="Close" class="el-dialog__headerbtn"><i class="el-dialog__close el-icon el-icon-close"></i></button>
                                        </div>
                                        <div class="el-dialog__body">
                                            <form class="el-form" id="store-link" method="POST">
                                                @CSRF<!---->
                                                <div class="el-form-item"><label class="el-form-item__label" style="width: 120px;">Name</label>
                                                    <div class="el-form-item__content" style="margin-left: 120px;">
                                                        <div class="el-input"><!----><input type="text" autocomplete="off" name="name" class="name el-input__inner"><!----><!----><!----><!----></div><!---->
                                                    </div>
                                                </div>
                                                <div class="el-form-item"><label class="el-form-item__label" style="width: 120px;">Link</label>
                                                    <div class="el-form-item__content" style="margin-left: 120px;">
                                                        <div class="el-input"><!----><input type="text" autocomplete="off" name="link" class="link el-input__inner"><!----><!----><!----><!----></div><!---->
                                                    </div>
                                                </div>
                                                <input type="hidden" autocomplete="off" name="id" class="id el-input__inner"><!----><!----><!----><!---->

                                                <div class="el-form-item text-right"><!---->
                                                    <div class="el-form-item__content" style="margin-left: 120px;"><button type="button" class="el-button el-button--default"><!----><!----><span>Huỷ</span></button> <button type="submit" class="el-button el-button--primary"><!----><!----><span>Lưu thay đổi</span></button><!----></div>
                                                </div>
                                            </form>
                                        </div><!---->
                                    </div>
                                </div>
                                <div class="el-dialog__wrapper" id="dialogGroup" style="z-index: 2005; display: none;">
                                    <div role="dialog" aria-modal="true" aria-label="Link" class="el-dialog" style="margin-top: 15vh; width: 420px;">
                                        <div class="el-dialog__header">
                                            <span class="el-dialog__title">Link</span>
                                            <button type="button" aria-label="Close" class="el-dialog__headerbtn"><i class="el-dialog__close el-icon el-icon-close"></i></button>
                                        </div>
                                        <div class="el-dialog__body">
                                            <form class="el-form" id="store-group">
                                                @csrf<!---->
                                                <div class="el-form-item"><label class="el-form-item__label" style="width: 120px;">Name</label>
                                                    <div class="el-form-item__content" style="margin-left: 120px;">
                                                        <div class="el-input"><!---->
                                                            <input type="text" autocomplete="off" name="name" class="name el-input__inner"><!----><!----><!----><!---->
                                                            <input type="hidden" autocomplete="off" name="id" class="id el-input__inner"><!----><!----><!----><!---->
                                                        </div><!---->
                                                    </div>
                                                </div>
                                                <div class="el-form-item text-right"><!---->
                                                    <div class="el-form-item__content" style="margin-left: 120px;"><button type="button" class="el-button el-button--default"><!----><!----><span>Huỷ</span></button> <button type="submit" class="el-button el-button--primary"><!----><!----><span>Lưu thay đổi</span></button><!----></div>
                                                </div>
                                            </form>
                                        </div><!---->
                                    </div>
                                </div>
                                <input type="hidden" id="postAjax" value="https://admin.hoidoanhnghiepquan1.com/link/group/post/ajax"> <input type="hidden" id="postLinkAjax" value="https://admin.hoidoanhnghiepquan1.com/link/post/ajax"> <input type="hidden" id="sortedLinkPostAjax" value="https://admin.hoidoanhnghiepquan1.com/link/sorted/post/ajax"> <input type="hidden" id="searchAjax" value="https://admin.hoidoanhnghiepquan1.com/link"> <input type="hidden" id="detailAjax" value="https://admin.hoidoanhnghiepquan1.com/link/detail"> <input type="hidden" id="removeAjax" value="https://admin.hoidoanhnghiepquan1.com/link/remove"> <input type="hidden" id="linkGroupDetailAjax" value="https://admin.hoidoanhnghiepquan1.com/ajax/link/group/detail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>