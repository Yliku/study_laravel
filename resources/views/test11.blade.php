<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MathJax显示数学公式的测试</title>
    <style>
        .MathJax{outline:0;}    //设置样式，取消点击公式时蓝色的变宽
        .MathJax span{font-size:15px;}  //设置字体大小，没用？？
        .MathJax_Display{overflow-x:auto;overflow-y:hidden;}    //设置公式太长的时候不会溢出
    </style>
</head>
<body>
    <div>行内元素：$x^2+py^2$      \(ax^2+by^2\)    </div>
    <div>块状元素：$$x^3+y^3$$     \[x^4+y^4\]        $$\sqrt {a+b}$$    </div>

<script>
    function toMathML(jax,callback) {
        var mml;
        try {
            mml = jax.root.toMathML("");
        } catch(err) {
            if (!err.restart) {throw err} // an actual error
            return MathJax.Callback.After([toMathML,jax,callback],err.restart);
        }
        MathJax.Callback(callback)(mml);
    }
</script>
<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
        tex2jax: {
            inlineMath:  [ ['$','$']   , ['\\(','\\)']  ],   //让mathjax识别 $和$符号之间的内容、以及\(和\)符号之间的内容  为行内公式
            displayMath: [ ["$$","$$"] , ['\\[','\\]']  ],   //同上，显示段内公式，可自定义
            skipTags: ['script', 'noscript', 'style', 'textarea', 'pre','code','a'],    //避开某些标签
            ignoreClass:"comment-content",         //避开含该Class的标签，即该标签的内容不渲染公式
            ignoreClass: "no-mathjax | class2",    //可以通过 | 来添加多个类，写成 ignoreClass: "class1|class2"
            processClass: "mathjax"
        },
        "HTML-CSS": {
            availableFonts: ["STIX","TeX"], //可选字体
            showMathMenu: false,    //关闭公式右击菜单
        },

        //去掉渲染公式时，网页左下角的进度条提示以及加载的信息
        showProcessingMessages: false,  //关闭js加载过程信息
        messageStyle: "none"            //不显示信息
    });
    //mathjax 渲染是在加载js的时候渲染的，有时候你的数学代码是动态的，动态代码加载到页面上，MAthJax是不会重新渲染的。
    //后台返回的数据并没有被mathjax 渲染，想要重新渲染需要该代码，重新渲染，需加以下代码：
    //MathJax.Hub.Queue(["Typeset", MathJax.Hub]);  
    MathJax.Hub.Queue(
        function (){        //参数里面不能直接写代码，如果要的话要用回调函数
            var jax = MathJax.Hub.getAllJax();  //获取页面所有的数学公式，返回数组
            for (var i = 0; i < jax.length; i++) {
                toMathML(jax[i],function (mml) {
                    //alert(jax[i].originalText + "\n=>\n"+ mml);
                    //alert(mml);
                });
            }
            console.log(jax);
        }
    );
</script>
<script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>

</body>
</html>