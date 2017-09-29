(function () {
    var goodsDetail = {
        node: {
            closeBtn: $('.close'),
            screenW: $('.screenW'),
            subW: $('.subW'),
            share: $('#share'),
            shareBox: $('.shareBox')
        },
        /*入口*/
        init: function () {
            var self = this;
            self.closeTap();
            self.shareTap();
        },
        /*分享点击弹窗*/
        shareTap: function () {
            var self = this;
            self.node.share.on('tap', function () {
                self.wShow();
                self.node.shareBox.show().siblings().hide();
            });
        },
        /*点击关闭弹窗*/
        closeTap: function () {
            var self = this;
            self.node.closeBtn.on('tap', function () {
                self.wHide();
            });
        },
        /*窗口显示*/
        wShow: function () {
            var ua = navigator.userAgent.toLowerCase();
            if (ua.match(/MicroMessenger/i) == "micromessenger") {
                var winHeight = typeof window.innerHeight != 'undefined' ? window.innerHeight : document.documentElement.clientHeight;
                var weixinTip = $('<div id="weixinTip"><p><img src="http://999000.cn/appsort/live_weixin_share.png" alt="微信打开"/></p></div>');
                $("body").append(weixinTip);
                $("#weixinTip").css({
                    "position": "fixed",
                    "left": "0",
                    "top": "0",
                    "height": winHeight,
                    "width": "100%",
                    "z-index": "1000",
                    "background-color": "rgba(0,0,0,0.8)",
                    "filter": "alpha(opacity=80)",
                });
                $("#weixinTip p").css({
                    "text-align": "center",
                    "margin-top": "10%",
                    "padding-left": "5%",
                    "padding-right": "5%"
                });
                function removebg() {
                    $('#sharebg').remove();
                }
            } else {
                var self = this;
                self.node.screenW.show();
                self.node.subW.addClass('move').removeClass('back');
            }
        },
        /*窗口隐藏*/
        wHide: function () {
            var self = this;
            self.node.subW.addClass('back').removeClass('move');
            setTimeout(function () {
                self.node.screenW.hide();
            }, 500);
        }
    };
    /*商品js入口*/
    goodsDetail.init();

    // /*百度分享js*/
    // window._bd_share_config = {
    //     "common": {
    //         "bdSnsKey": {},
    //         "bdMini": "2",
    //         "bdMiniList": false,
    //         "bdStyle": "0",
    //         "bdSize": "16",
    //         "bdText": '自定义分享内容',
    //         "bdDesc": '自定义分享摘要',
    //         "bdUrl": '自定义分享url地址',
    //         "bdPic": '自定义分享图片'
    //     },
    //     share : [{
    //         "bdSize" : 16
    //     }],
    //     "image": {
    //         "viewList": ["qzone", "tsina", "sqq", "tqq", "weixin"],
    //         "viewText": "分享到：",
    //         "viewSize": "16"
    //     },
    //     "selectShare": {
    //         "bdContainerClass": null,
    //         "bdSelectMiniList": ["qzone", "tsina", "sqq", "tqq", "weixin"]
    //     }
    // };
    // with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
})();