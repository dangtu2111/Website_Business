var myapp = new Vue({
    el: '#myApp',
    delimiters: ['{', '}'],
    data: function() {
        return { 
            errors: [],
            loading: false,
            key: 1,
            step: 1,
            success_text: '',
            error_text: ''
        };
    },
    methods: {
        addCart(id, e) {
            console.log();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var app = this;
            this.loading = true;
            var params = {
                _token: _token,
                id: id
            };
            $('.errors-text').html('');
            postAjax('cartAddAjax', params, function(r) {
                app.errors = [];
                if (typeof r != 'undefined') {
                    if (r.status != 200) {
                        app.loading = false;

                        app.$notify({
                            title: 'Thông báo',
                            dangerouslyUseHTMLString: true,
                            message: r.message,
                            type: 'error',
                            duration: 3000
                        });
                    } else {
                        app.loading = false;
                        var html = cartHtml(r.result);
                        $('#miniCarts').find('.num').html(r.total);
                        $('#miniCarts').find('.price').html(r.total_payment_text);
                        $('#miniCarts').find('.total-price').html(r.total_payment_text);
                        $('#miniCarts').find('.cart-info').html(html)
                        e.html('<i class="fa-solid fa-check"></i>');
                        app.$notify({
                            title: 'Thông báo',
                            dangerouslyUseHTMLString: true,
                            message: r.message,
                            type: 'success',
                            duration: 3000
                        });
                    }
                } else {
                    app.loading = false;
                    window.location.reload();
                    app.$notify({
                        showClose: true,
                        message: 'An unknown error occurred, please try again.',
                        type: 'error',
                        duration: 5000,
                        position: 'top-right',
                        offset: 60
                    });
                }     
            });
        },
        removeCart(id, e) {
            console.log();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var app = this;
            this.loading = true;
            var params = {
                _token: _token,
                id: id
            };
            $('.errors-text').html('');
            postAjax('cartRemoveAjax', params, function(r) {
                app.errors = [];
                if (typeof r != 'undefined') {
                    if (r.status != 200) {
                        app.loading = false;

                        app.$notify({
                            title: 'Thông báo',
                            dangerouslyUseHTMLString: true,
                            message: r.message,
                            type: 'error',
                            duration: 3000
                        });
                    } else {
                        app.loading = false;
                        var html = cartHtml(r.result);
                        $('#miniCarts').find('.num').html(r.total);
                        $('#miniCarts').find('.price').html(r.total_payment_text);
                        $('#miniCarts').find('.total-price').html(r.total_payment_text);
                        $('#miniCarts').find('.cart-info').html(html);
                        e.closest('.cart-prodect').remove();
                        
                        app.$notify({
                            title: 'Thông báo',
                            dangerouslyUseHTMLString: true,
                            message: r.message,
                            type: 'success',
                            duration: 3000
                        });
                    }
                } else {
                    app.loading = false;
                    window.location.reload();
                    app.$notify({
                        showClose: true,
                        message: 'An unknown error occurred, please try again.',
                        type: 'error',
                        duration: 5000,
                        position: 'top-right',
                        offset: 60
                    });
                }     
            });
        },
        removeCartDetail(id, e) {
            console.log();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var app = this;
            this.loading = true;
            var params = {
                _token: _token,
                id: id
            };
            $('.errors-text').html('');
            postAjax('cartRemoveAjax', params, function(r) {
                app.errors = [];
                if (typeof r != 'undefined') {
                    if (r.status != 200) {
                        app.loading = false;

                        app.$notify({
                            title: 'Thông báo',
                            dangerouslyUseHTMLString: true,
                            message: r.message,
                            type: 'error',
                            duration: 3000
                        });
                    } else {
                        app.loading = false;
                        var html = cartHtml(r.result);
                        $('#miniCarts').find('.num').html(r.total);
                        $('#miniCarts').find('.price').html(r.total_payment_text);
                        $('#miniCarts').find('.total-price').html(r.total_payment_text);
                        $('#miniCarts').find('.cart-info').html(html);
                        e.closest('.cart-prodect').remove();
                        location.reload();
                    }
                } else {
                    app.loading = false;
                    window.location.reload();
                    app.$notify({
                        showClose: true,
                        message: 'An unknown error occurred, please try again.',
                        type: 'error',
                        duration: 5000,
                        position: 'top-right',
                        offset: 60
                    });
                }     
            });
        },
        updateCart(id, qty, e) {
            console.log();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var app = this;
            this.loading = true;
            var params = {
                _token: _token,
                id: id,
                total: qty
            };
            $('.errors-text').html('');
            postAjax('cartUpdateAjax', params, function(r) {
                app.errors = [];
                if (typeof r != 'undefined') {
                    if (r.status != 200) {
                    } else {
                        app.loading = false;
                        var html = cartHtml(r.result);
                        $('#miniCarts').find('.num').html(r.total);
                        $('#miniCarts').find('.price').html(r.total_payment_text);
                        $('#miniCarts').find('.total-price').html(r.total_payment_text);
                        $('#miniCarts').find('.cart-info').html(html);
                        e.closest('.cart-prodect').remove();
                    }
                } else {
                    app.loading = false;
                    window.location.reload();
                    app.$notify({
                        showClose: true,
                        message: 'An unknown error occurred, please try again.',
                        type: 'error',
                        duration: 5000,
                        position: 'top-right',
                        offset: 60
                    });
                }     
            });
        },
        quickview(id, e) {
            console.log();
            var _token = $('meta[name="csrf-token"]').attr('content');
            var app = this;
            this.loading = true;
            var params = {
                _token: _token,
                id: id
            };
            $('.errors-text').html('<div class="mfp-preloader" style="display: block">Loading...</div>');
            $('.view-data').html('');
            postAjax('quickviewAjax', params, function(r) {
                app.errors = [];
                if (typeof r != 'undefined') {
                    if (r.status != 200) {
                    } else {
                        app.loading = false;
                        $('.view-data').html(r.result);
                    }
                } else {
                    app.loading = false;
                    window.location.reload();
                    app.$notify({
                        showClose: true,
                        message: 'An unknown error occurred, please try again.',
                        type: 'error',
                        duration: 5000,
                        position: 'top-right',
                        offset: 60
                    });
                }     
            });
        }
    },
    created: function () {
        $('#myApp').show();
    }
});

$(document).ready(function($) {
    $('.menu-bt').on('click', function() {
        $('.m-left-menu').addClass('m-left-menu-open');
    });

    $('.menu-close').on('click', function() {
        $('.m-left-menu').removeClass('m-left-menu-open');
    });

    $('.navbar-toggler').on('click', function() {
        var check = $(this).attr('data-show');
        if (check == 1) {
            $('#cwvnNavbar').addClass('show');
            $(this).attr('data-show', 2);
        } else {
            $('#cwvnNavbar').removeClass('show');
            $(this).attr('data-show', 1);
        }
        
    });

    $('.addToCart').on('click', function() {
        var id = $(this).attr('data-id'),
        text = $(this).attr('data-name');
        $(this).attr('disabled', true);	
        $(this).html('<i class="fa fa-spinner fa-spin"></i>');
        myapp.addCart(id, $(this));
    });
    $('.cart-remove').on('click', function() {
        var id = $(this).attr('data-id'),
        text = $(this).attr('data-name');
        $(this).attr('disabled', true);	
        $(this).html('<i class="fa fa-spinner fa-spin"></i>');
        myapp.removeCart(id, $(this));
    });

    $('.plus').on('click', function() {
        var qty = $(this).closest('.quantity_filter').find('.qty').val(),
            id = $(this).attr('data-id');
        myapp.updateCart(id, qty, $(this));
    });

    $('.minus').on('click', function() {
        var qty = $(this).closest('.quantity_filter').find('.qty').val(),
            id = $(this).attr('data-id');

        myapp.updateCart(id, qty, $(this));
    });
    $(".qty").change(function(){
        var qty = $(this).val(),
            id = $(this).attr('data-id');
        myapp.updateCart(id, qty, $(this));
    });
    $('.quickview-popup-link').on('click', function() {
        var id = $(this).attr('data-id');
        myapp.quickview(id, $(this));
    });
    
});

function addToCart(e) {
    var $this = $(e);
    var id = $this.attr('data-id'),
        text = $this.attr('data-name');
        $this.attr('disabled', true);	
        $this.html('<i class="fa fa-spinner fa-spin"></i>');
        myapp.addCart(id, $this);
}
function cartRemove(e) {
    var $this = $(e);
    var id = $this.attr('data-id'),
        text = $this.attr('data-name');
        $this.attr('disabled', true);	
        $this.html('<i class="fa fa-spinner fa-spin"></i>');
        myapp.removeCart(id, $this);
}
function cartRemoveDetail(e) {
    var $this = $(e);
    var id = $this.attr('data-id'),
        text = $this.attr('data-name');
        $this.attr('disabled', true);	
        $this.html('<i class="fa fa-spinner fa-spin"></i>');
        myapp.removeCartDetail(id, $this);
}

function cartHtml(results) {
    var html = '';
    $.each(results, function(k, v) {
        html = html + '<div class="cart-prodect d-flex"><div class="cart-img">';
        html = html + '<img src="' + v.image + '" alt="cart-img"></div>';
        html = html + '<div class="cart-product">';
        html = html + '<a href="#">' + v.name + '</a>';
        html = html + '<span>' + v.total_text + 'x' + v.price_sale_off_text + '</span><br>';
        html = html + '<p>' + v.total_price_text + '</p></div>';
        html = html + '<button data-id="' + v.id + '" class="close-icon d-flex align-items-center cart-remove" onclick="cartRemove(this)">';
        html = html + '<i class="fa-solid fa-xmark"></i></button></div>';
    });

    return html; 
}

function postAjax(href, params, callback) {
    var href = $('#' + href).val();
    $.ajax({
        'url': href,
        'async': true,
        'type': 'POST',
        'data': params,
        'success': function(response) {
            if (typeof callback == 'function') {
                callback(response)
            }
        },
        error:function(xhr){
            console.log(xhr.responseText);
        }
    }).done(function() {
    });
    
    return true;
}
if ($('#formLogin').length) {
    new Vue({
        el: '#formLogin',
        delimiters: ['{', '}'],
        data: function() {
            return { 
                form: {
                    password: '',
                    username: ''
                },
                errors: [],
                loading: false,
                key: 1,
                step: 1,
                success_text: '',
                error_text: ''
            };
        },
        methods: {
            submit() {
                var _token = $('meta[name="csrf-token"]').attr('content');
                this.form._token = _token;
                var app = this;
                this.loading = true;
                $('.errors-text').html('');
                postAjax('loginPostAjax', this.form, function(r) {
                    app.errors = [];
                    if (typeof r != 'undefined') {
                        if (r.status != 200) {
                            app.loading = false;

                            $.each(r.result, function(k, v) {
                                app.errors.push(v);
                                jQuery('.errors-text__' + k).html(v);
                            });
                            app.error_text = r.message;
                            app.key = app.key + 1;
                        } else {
                            app.loading = false;
                            app.$notify({
                                title: 'Notify',
                                dangerouslyUseHTMLString: true,
                                message: r.message,
                                type: 'success',
                                duration: 3000
                            });
                            if (typeof r.result.redirect_url != 'undefined') {
                                window.location.href = r.result.redirect_url;
                            }
                        }
                    } else {
                        app.loading = false;
                        window.location.reload();
                        app.$notify({
                            showClose: true,
                            message: 'An unknown error occurred, please try again.',
                            type: 'error',
                            duration: 5000,
                            position: 'top-right',
                            offset: 60
                        });
                    }     
                });
            }
        },
        created: function () {
            $('#formLogin').show();
        }
    }); 

    $(document).keydown(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#btLogin').click();
        }
    });
}
if ($('#formLogin1').length) {
    new Vue({
        el: '#formLogin1',
        delimiters: ['{', '}'],
        data: function() {
            return { 
                form: {
                    password: '',
                    username: ''
                },
                errors: [],
                loading: false,
                key: 1,
                step: 1,
                success_text: '',
                error_text: ''
            };
        },
        methods: {
            submit() {
                var _token = $('meta[name="csrf-token"]').attr('content');
                this.form._token = _token;
                var app = this;
                this.loading = true;
                $('.errors-text').html('');
                postAjax('loginPostAjax', this.form, function(r) {
                    app.errors = [];
                    if (typeof r != 'undefined') {
                        if (r.status != 200) {
                            app.loading = false;

                            $.each(r.result, function(k, v) {
                                app.errors.push(v);
                                jQuery('.errors-text__' + k).html(v);
                            });
                            app.error_text = r.message;
                            app.key = app.key + 1;
                        } else {
                            app.loading = false;
                            window.location.reload();
                        }
                    } else {
                        app.loading = false;
                        window.location.reload();
                        app.$notify({
                            showClose: true,
                            message: 'An unknown error occurred, please try again.',
                            type: 'error',
                            duration: 5000,
                            position: 'top-right',
                            offset: 60
                        });
                    }     
                });
            }
        },
        created: function () {
            $('#formLogin1').show();
        }
    }); 

    $(document).keydown(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#btLogin').click();
        }
    });
}
if ($('#formRegis').length) {
    new Vue({
        el: '#formRegis',
        delimiters: ['{', '}'],
        data: function() {
            return { 
                form: {
                    name: '',
                    password: '',
                    email: '',
                    password_confirm: ''
                },
                errors: [],
                loading: false,
                key: 1,
                step: 1,
                success_text: '',
                error_text: ''
            };
        },
        methods: {
            submit() {
                var _token = $('meta[name="csrf-token"]').attr('content');
                this.form._token = _token;
                var app = this;
                this.loading = true;
                $('.errors-text').html('');
                postAjax('signupPostAjax', this.form, function(r) {
                    app.errors = [];
                    if (typeof r != 'undefined') {
                        if (r.status != 200) {
                            app.loading = false;

                            $.each(r.result, function(k, v) {
                                app.errors.push(v);
                                $('.errors-text__' + k).html(v);
                            });
                            app.error_text = r.message;
                            app.key = app.key + 1;
                        } else {
                            app.loading = false;
                            app.$notify({
                                title: 'Notify',
                                dangerouslyUseHTMLString: true,
                                message: r.message,
                                type: 'success',
                                duration: 3000
                            });
                            $('.mfp-close').trigger('click');
                            $('.open-popup-link').trigger('click');
                            
                        }
                    } else {
                        app.loading = false
                        app.$notify({
                            showClose: true,
                            message: 'An unknown error occurred, please try again.',
                            type: 'error',
                            duration: 5000,
                            position: 'top-right',
                            offset: 60
                        });
                    }    
                });
            }
        },
        created: function () {
            $('#formRegis').show();
        }
    }); 

    $(document).keydown(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#btLogin').click();
        }
    });
}

if ($('#pageCheckout').length) {
    new Vue({
        el: '#pageCheckout',
        delimiters: ['{', '}'],
        data: function() {
            return { 
                form: {
                    name: '',
                    email: '',
                    phone: '',
                    province_id: '',
                    district_id: '',
                    ward_id: '',
                    address: '',
                    payment: '1'
                },
                province_options: [],
                district_options: [],
                ward_options: [],
                errors: [],
                loading: false,
                key: 1,
                step: 1,
                success_text: '',
                error_text: ''
            };
        },
        methods: {
            submit() {
                var _token = $('meta[name="csrf-token"]').attr('content');
                this.form._token = _token;
                var app = this;
                this.loading = true;
                $('.errors-text').html('');
                postAjax('paymentAjax', this.form, function(r) {
                    app.errors = [];
                    if (typeof r != 'undefined') {
                        if (r.status != 200) {
                            app.loading = false;
                            $.each(r.result, function(k, v) {
                                app.errors.push(v);
                                $('.errors-text__' + k).html(v);
                            });
                            app.error_text = r.message;
                            app.$notify({
                                title: 'Thông báo',
                                dangerouslyUseHTMLString: true,
                                message: r.message,
                                type: 'error',
                                duration: 3000
                            });
                        } else {
                            app.loading = false;
                            app.$confirm(r.message, 'Thông báo', {
                                confirmButtonText: 'Đồng ý',
                                showCancelButton: false,
                                type: 'success'
                              }).then(() => {
                                window.location.reload();
                              }).catch(() => {         
                            });
                        }
                    } else {
                        app.loading = false
                        app.$notify({
                            showClose: true,
                            message: 'An unknown error occurred, please try again.',
                            type: 'error',
                            duration: 5000,
                            position: 'top-right',
                            offset: 60
                        });
                    }    
                });
            },
            step1() {
                this.step = 1;
            },
            step32() {
                this.step = 2;
            },
            step21() {
                this.step = 1;
            },
            step2() {
                var check = 1;
                $('.errors-text').html('');
                if (this.form.name == '') {
                    $('.errors-text__name').html('Nhập tên');
                    check = 0;
                }

                if (this.form.phone == '') {
                    $('.errors-text__phone').html('Nhập số điện thoại');
                    check = 0;
                }

                if (this.form.email == '') {
                    $('.errors-text__email').html('Nhập email');
                    check = 0;
                }

                if (this.form.province_id == '') {
                    $('.errors-text__province_id').html('Chọn Tỉnh/Thành Phố');
                    check = 0;
                }

                if (this.form.district_id == '') {
                    $('.errors-text__district_id').html('Chọn Quận/Huyện');
                    check = 0;
                }

                if (this.form.ward_id == '') {
                    $('.errors-text__ward_id').html('Chọn Phường/Xã');
                    check = 0;
                }

                if (this.form.address == '') {
                    $('.errors-text__address').html('Nhập số nhà, tên đường');
                    check = 0;
                }
                if (check == 1) {
                    this.step = 2
                }
            },
            step3() {
                this.step = 3
            },
            province() {
                var _token = $('meta[name="csrf-token"]').attr('content');
                var params = {
                    _token: _token
                };
                var app = this;
                postAjax('provinceAjax', params, function(r) {
                    if (typeof r != 'undefined') {
                        if (r.status != 200) {
                        } else {
                            app.province_options = r.result;
                        }
                    }   
                });
            },
            district() {
                var _token = $('meta[name="csrf-token"]').attr('content');
                var params = {
                    id: this.form.province_id,
                    _token: _token
                };
                var app = this;
                postAjax('districtAjax', params, function(r) {
                    if (typeof r != 'undefined') {
                        if (r.status != 200) {
                        } else {
                            app.district_options = r.result;
                        }
                    }   
                });
            },
            ward() {
                var _token = $('meta[name="csrf-token"]').attr('content');
                var params = {
                    id: this.form.district_id,
                    _token: _token
                };
                var app = this;
                postAjax('wardAjax', params, function(r) {
                    if (typeof r != 'undefined') {
                        if (r.status != 200) {
                        } else {
                            app.ward_options = r.result;
                        }
                    }   
                });
            },
            info() {
                var _token = $('meta[name="csrf-token"]').attr('content');
                var params = {
                    _token: _token
                };
                var app = this;
                postAjax('infoAjax', params, function(r) {
                    if (typeof r != 'undefined') {
                        if (r.status != 200) {
                        } else {
                            app.form = r.result;
                            if (app.form.province_id != '') {
                                app.district();
                            }

                            if (app.form.district_id != '') {
                                app.ward();
                            }
                        }
                    }   
                });
            },
        },
        created: function () {
            this.province();
            this.info();
            $('#pageCheckout').show();
        }
    }); 

    $(document).keydown(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            $('#btLogin').click();
        }
    });
}