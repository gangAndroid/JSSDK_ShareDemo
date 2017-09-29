<?php
require_once "jssdk.php";
$appid = 'wxab943c1c3318c99da';// 微信公众号APPID,必须通过认证
$APPSECRET = '5fff0238e55403596d0f46a2e749d8141';// 微信公众号APPSECRET,必须通过认证
$jssdk = new JSSDK($appid, $APPSECRET);
$signPackage = $jssdk->GetSignPackage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/share/css/index.css"/>
</head>
<body>
<div class="page" style="visibility: visible;">
    <a class="button" id="share" onclick="showShare();">邀请好友</a>
    <section class="screenW" id="shareLayout">
        <div class="subW">
            <div class="info">
                <div class="shareBox">
                    <h2 style="text-align: center;margin: 20px;font-size: 16px;">分享到：</h2>
                    <div class="bdsharebuttonbox">
                        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a>
                        <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友">QQ</a>
                        <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a>
                    </div>
                </div>
            </div>
            <div class="close">取消分享</div>
        </div>
    </section>
</div>
</div>
<script src="/share/js/zepto.min.js"></script>
<script src="/share/js/main.js"></script>
<!--<script type="text/javascript" src="https://wimg.yunifang.com/js/zepto.min.js" charset="utf-8"></script>-->
<script type='text/javascript' src='https://wimg.yunifang.com/js/sm.ynf.1.0.0.min.js' charset='utf-8'></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    function WeChat(title, ShareLink, ShareImgUrl, desc, backUrl) {
        // 微信配置
        wx.config({
            debug: true,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: <?php echo $signPackage["timestamp"];?>,
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareQZone', 'hideOptionMenu'] // 功能列表，我们要使用JS-SDK的什么功能
        });

        wx.ready(function () {
            // 获取"分享到朋友圈"按钮点击状态及自定义分享内容接口
            wx.onMenuShareTimeline({
                title: title, // 分享标题
                link: ShareLink,
                desc: desc,
                imgUrl: ShareImgUrl, // 分享图标
                success: function () {
                    window.location.href = backUrl;
                },
                cancel: function () {
                    return false;
                }
            });

            // 获取"分享给朋友"按钮点击状态及自定义分享内容接口
            wx.onMenuShareAppMessage({
                title: title, // 分享标题
                desc: desc, // 分享描述
                link: ShareLink,
                imgUrl: ShareImgUrl, // 分享图标
                success: function () {
                    window.location.href = backUrl;
                },
                cancel: function () {
                    return false;
                }
            });
            // 分享到QQ
            wx.onMenuShareQQ({
                title: title, // 分享标题
                desc: desc, // 分享描述
                link: ShareLink,
                imgUrl: ShareImgUrl, // 分享图标
                success: function () {
                    window.location.href = backUrl;
                },
                cancel: function () {
                    return false;
                }
            });
            // 分享到QQ空间
            wx.onMenuShareQZone({
                title: title, // 分享标题
                desc: desc, // 分享描述
                link: ShareLink,
                imgUrl: ShareImgUrl, // 分享图标
                success: function () {
                    window.location.href = backUrl;
                },
                cancel: function () {
                    return false;
                }
            });
            wx.showOptionMenu();
        });
    }
    WeChat('李娜快来！', "http://www.baidu.com/", "https://www.ziyuanniao.com/Upload/web/20170626/logo.png", '李娜李娜李娜李娜李娜李娜', "http://www.jd.com/");
</script>
<script>
    function share(content, detail, url, imgPath) {
        window._bd_share_config = {
            "common": {
                "bdSnsKey": {},
                "bdMini": "2",
                "bdMiniList": false,
                "bdStyle": "0",
                "bdSize": "16",
                "bdText": '' + content,
                "bdDesc": '' + detail,
                "bdUrl": '' + url,
                "bdPic": '' + imgPath
            },
            share: [{
                "bdSize": 16
            }],
            "image": {
                "viewList": ["qzone", "tsina", "sqq", "tqq", "weixin"],
                "viewText": "分享到：",
                "viewSize": "16"
            },
            "selectShare": {
                "bdContainerClass": null,
                "bdSelectMiniList": ["qzone", "tsina", "sqq", "tqq", "weixin"]
            }
        };
        with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion=' + ~(-new Date() / 36e5)];
    }
    share("李娜快来！", "李娜李娜李娜李娜李娜李娜", "http://www.baidu.com/", "https://www.ziyuanniao.com/Upload/web/20170626/logo.png");
</script>
</body>
</html>
